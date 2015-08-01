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

        $this->load->helper('misc');
        $this->lang->load('magazines');

        // $this->form_validation->set_error_delimiters("<span class='error'>", "</span>");

        Template::set_block('sub_nav', 'content/_sub_nav');

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
        $this->auth->restrict($this->permCreate); //Magazines.Content.Create

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

        if (!$id = $this->uri->segment(5)) {
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

    public function staff()
    {
        $this->auth->restrict($this->permEdit);

        if (!$id = $this->uri->segment(5)) {
            redirect(SITE_AREA . '/content/magazines');
        }

        $staff = $this->magazine_staff_model->where('magazine_id', $id)->find_all();

        if (!$staff) $staff = array();

        $roles = $this->role_model->where('magazine_role', '1')->find_all();
        $rolesAssoc = array();
        foreach ($roles as $role) {
            $rolesAssoc[$role->role_id] = $role->role_name;
        }

        if ($this->input->post()) {
            if ($this->save_staff()) {
                redirect(SITE_AREA . '/content/magazines/staff/'.$id);
            }
        }

        Template::set('magazine_id', $id);
        Template::set('records', $staff);
        Template::set('roles', $rolesAssoc);
        Template::set('toolbar_title', lang('magazines_manage'));

        Template::render();
    }

    public function dismissUser()
    {
        $this->auth->restrict($this->permEdit);

        if (!$id = $this->uri->segment(5)) {
            redirect(SITE_AREA . '/content/magazines');
        }

        if (!$ms = $this->magazine_staff_model->find($id)) {
            redirect(SITE_AREA . '/content/magazines');
        }

        $this->magazine_staff_model->delete($id);

        redirect(SITE_AREA . '/content/magazines/staff/'.$ms->magazine_id);
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

    private function save_staff()
    {
        $mag   = $this->input->post('magazine_id');
        $role  = $this->input->post('role_id');
        $email = $this->input->post('email');

        $this->load->library('form_validation');

        if (!$this->form_validation->valid_email($email)) {
            Template::set_message(lang('magazines_staff_bad_email'), 'error');
            return false;
        }

        if (!$mag || !$role || !$email) {
            Template::set_message(lang('magazines_staff_bad_data'), 'error');
            return false;
        }

        if (!$user = $this->user_model->find_by('email', $email)) {
            // create user
            $this->load->helper('string');
            $data = array(
                'email'    => $email,
                'username' => $email,
                'password' => random_string()
            );
            $user_id = $this->user_model->insert($data);
        } else {
            $user_id = $user->id;
        }

        if ($staff = $this->magazine_staff_model->where('user_id', $user_id)->where('magazine_id', $mag)->find_all()) {
            Template::set_message(lang('magazines_staff_exists'), 'error');
            return false;
        }


        $data = array(
            'magazine_id' => $mag,
            'user_id' => $user_id,
            'role_id' => $role
        );

        if (!$this->magazine_staff_model->insert($data)) {
            Template::set_message(lang('magazines_staff_add_fail'), 'error');
            return false;
        }

        return true;
    }



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
