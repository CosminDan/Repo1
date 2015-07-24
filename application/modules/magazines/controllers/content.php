<?php defined('BASEPATH') || exit('No direct script access allowed');

/**
 * Content controller
 */


class Content extends Admin_Controller
{
    protected $permCreate = 'Magazines.Content.Create';
    protected $permDelete = 'Magazines.Content.Delete';
    protected $permEdit   = 'Magazines.Content.Edit';
    protected $permView   = 'Magazines.Content.View';

    public $magazine = null;
    public $issue = null;
    public $article = null;

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->auth->restrict($this->permView);

        $this->load->model('magazines_model');
        $this->load->model('issues_model');
        $this->load->model('authors_model');
        $this->load->model('articles_model');
        $this->load->model('authorsofarticles_model');
        $this->load->model('institutions_model');
        $this->load->helper('misc');
        $this->lang->load('magazines');

        // $this->form_validation->set_error_delimiters("<span class='error'>", "</span>");

        Template::set_block('sub_nav', 'content/_sub_nav');

        //Assets::add_module_js('articles', 'articles.js');
        //Assets::add_module_css('articles', 'articles.css');
    }

    public function main($mag = null, $iss = null, $art = null)
    {
        $params = array(
            'magazine' => $mag,
            'issue'    => $iss,
            'article'  => $art
        );

        $func = 'magazine_list';

        foreach ($params as $cat => $param) {
            if (ctype_digit($param) && $param) {
                $model = "{$cat}s_model";
                if (!$this->{$cat} = $this->{$model}->find($param)) {
                    return show_404();
                }
            } else {
                if (is_null($param)) {

                }
            }
        }

        if ($this->article && $this->issue) {
            if ($this->article->issue_id != $this->issue->id) {
                return show_404();
            }
        }

        if ($this->issue && $this->magazine) {
            if ($this->issue->magazine_id != $this->magazine->id) {
                return show_404();
            }
        }




        // $method = "{$cat}_{$param}";
        // if (method_exists($this, $method)) {
        //     Template::set_view('content/'.$method);
        //     return call_user_func_array(array($this, $method), array());
        // }
        die('asdsad');

        show_404();
    }

    /**
     * Display a list of Articles data.
     *
     * @return void
     */
    public function magazine_list($offset = 0)
    {
        if (!has_permission('Magazines.Manage.All')) {
            // get my magazine id & redirect.
        }

        // // Deleting anything?
        // if (isset($_POST['delete'])) {
        //     $this->auth->restrict($this->permDelete);
        //     $checked = $this->input->post('checked');
        //     if (is_array($checked) && count($checked)) {
        //         $result = true;
        //         foreach ($checked as $pid) {
        //             $deleted = $this->magazines_model->delete($pid);
        //             if ($deleted == false) {
        //                 $result = false;
        //             }
        //         }
        //         if ($result) {
        //             Template::set_message(count($checked) . ' ' . lang('articles_delete_success'), 'success');
        //         } else {
        //             Template::set_message(lang('articles_delete_failure') . $this->magazines_model->error, 'error');
        //         }
        //     }
        // }

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
        $this->auth->restrict($this->permCreate);

        $model = $this->magazines_model;

        if ($this->input->post()) {

            if ($this->save_item()) {
                Template::set_message(lang('articles_create_success'), 'success');
                redirect(SITE_AREA . '/content/magazines');
            }

            if ( ! empty($model->error)) {
                Template::set_message(lang('articles_create_failure') . $model->error, 'error');
            }
        }

        $item = $model->get_empty();
        $languages = magazines_languages();

        Template::set('item', $item);
        Template::set('languages', $languages);

        Template::set('toolbar_title', lang('articles_action_create'));
        Template::set_view('content/item');
        Template::render();
    }



    /**
     * Allows editing of Articles data.
     *
     * @return void
     */
    public function edit()
    {
        $this->auth->restrict($this->permView);
        $id = $this->uri->segment(5);

        if (empty($id)) {
            redirect(SITE_AREA . '/content/magazines');
        }

        if ($this->input->post()) {
            $this->auth->restrict($this->permEdit);

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
        Template::set_view('content/item');
        Template::render();
    }

    public function toggleVisibility()
    {
        $this->auth->restrict($this->permEdit);

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
