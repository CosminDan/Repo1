<?php defined('BASEPATH') || exit('No direct script access allowed');

/**
 * Content controller
 */


class Content extends Admin_Controller
{
    protected $permissionCreate = 'Magazines.Content.Create';
    protected $permissionDelete = 'Magazines.Content.Delete';
    protected $permissionEdit   = 'Magazines.Content.Edit';
    protected $permissionView   = 'Magazines.Content.View';

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->auth->restrict($this->permissionView);

        $this->load->model('magazines_model');
        $this->load->model('issues_model');
        $this->load->model('authors_model');
        $this->load->model('articles_model');
        $this->load->model('authorsofarticles_model');
        $this->load->model('institutions_model');
        $this->load->helper('misc');
        $this->lang->load('magazines');

        // $this->form_validation->set_error_delimiters("<span class='error'>", "</span>");

        //Template::set_block('sub_nav', 'content/_sub_nav');

        //Assets::add_module_js('articles', 'articles.js');
        //Assets::add_module_css('articles', 'articles.css');
    }

    /**
     * Display a list of Articles data.
     *
     * @return void
     */
    public function index($offset = 0)
    {
        if (!has_permission('Magazines.Manage.All')) {
            // get my magazine id & redirect.
        }

        // Deleting anything?
        if (isset($_POST['delete'])) {
            $this->auth->restrict($this->permissionDelete);
            $checked = $this->input->post('checked');
            if (is_array($checked) && count($checked)) {
                $result = true;
                foreach ($checked as $pid) {
                    $deleted = $this->magazines_model->delete($pid);
                    if ($deleted == false) {
                        $result = false;
                    }
                }
                if ($result) {
                    Template::set_message(count($checked) . ' ' . lang('articles_delete_success'), 'success');
                } else {
                    Template::set_message(lang('articles_delete_failure') . $this->magazines_model->error, 'error');
                }
            }
        }

        $pagerBaseUrl = site_url(SITE_AREA . '/content/magazines/index') . '/';

        $limit  = $this->settings_lib->item('site.list_limit') ?: 15;

        $this->load->library('pagination');

        $pager = array(
            'base_url'    => $pagerBaseUrl,
            'total_rows'  => $this->magazines_model->count_all(),
            'per_page'    => $limit,
            'uri_segment' => 5,
        );

        $this->pagination->initialize($pager);
        $this->magazines_model->limit($limit, $offset);

        $records = $this->magazines_model->find_all();

        Template::set('records', $records);
        Template::set('toolbar_title', lang('magazines_manage'));

        Template::render();
    }

    /**
     * Create a Articles object.
     *
     * @return void
     */
    public function create()
    {
        $this->auth->restrict($this->permissionCreate);

        if (isset($_POST['save'])) {

            if ($insert_id = $this->save_articles()) {
                //log_activity($this->auth->user_id(), lang('articles_act_create_record') . ': ' . $insert_id . ' : ' . $this->input->ip_address(), 'articles');
                Template::set_message(lang('articles_create_success'), 'success');
                redirect(SITE_AREA . '/content/articles');
            }

            // Not validation error
            if ( ! empty($this->articles_model->error)) {
                Template::set_message(lang('articles_create_failure') . $this->articles_model->error, 'error');
            }
        }

        Template::set('toolbar_title', lang('articles_action_create'));
        Template::render();
    }



    /**
     * Allows editing of Articles data.
     *
     * @return void
     */
    public function edit()
    {
        $this->auth->restrict($this->permissionView);
        $id = $this->uri->segment(5);

        if (empty($id)) {
            redirect(SITE_AREA . '/content/magazines');
        }

        if ($this->input->post('save')) {
            $this->auth->restrict($this->permissionEdit);

            if ($this->save_item('update', $id)) {
                Template::set_message(lang('magazines_edit_success'), 'success');
                redirect(SITE_AREA . '/content/magazines');
            }

            // Not validation error
            if ( ! empty($this->magazines_model->error)) {
                Template::set_message(lang('magazines_edit_failure') . $this->magazines_model->error, 'error');
            }
        }

        $item = $this->magazines_model->find($id);
        $languages = magazines_languages();

        Template::set('item', $item);
        Template::set('languages', $languages);
        Template::set('toolbar_title', lang('magazines_edit_heading'));

        Template::render();
    }

    public function toggleVisibility()
    {
        $this->auth->restrict($this->permissionEdit);

        $id = $this->uri->segment(5);

        if (empty($id)) {
            redirect(SITE_AREA . '/content/magazines');
        }

        if ($item = $this->magazines_model->find($id)) {
            $item->approved = (int) ! (bool) $item->approved;
            $this->magazines_model->update($item->id, array('approved' => $item->approved));
        }

        redirect(SITE_AREA . '/content/magazines');
    }

    //--------------------------------------------------------------------
    // !PRIVATE METHODS
    //--------------------------------------------------------------------

    /**
     * Save the data.
     *
     * @param string  $type Either 'insert' or 'update'.
     * @param int     $id   The ID of the record to update, ignored on inserts.
     *
     * @return bool|int An int ID for successful inserts, true for successful
     * updates, else false.
     */
    private function save_item($type = 'insert', $id = 0)
    {
        if ($type == 'update') {
            $_POST['id'] = $id;
        }

        // Validate the data
        $this->form_validation->set_rules($this->magazines_model->get_validation_rules());
        if ($this->form_validation->run() === false) {
            return false;
        }

        $data = $this->input->post();

        // Make sure we only pass in the fields we want
        $mData = $this->magazines_model->prep_data($data);

        // Additional handling for default values should be added below,
        // or in the model's prep_data() method

        $return = false;
        if ($type == 'insert') {
            $id = $this->magazines_model->insert($mData);

            if (is_numeric($id)) {
                $return = $id;
            }
        } elseif ($type == 'update') {
            $return = $this->magazines_model->update($id, $mData);
        }

        return $return;
    }
}
