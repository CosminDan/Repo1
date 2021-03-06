<?php defined('BASEPATH') || exit('No direct script access allowed');

/**
 * Settings controller
 */
class Settings extends Admin_Controller
{
    protected $permissionCreate = 'Articles.Settings.Create';
    protected $permissionDelete = 'Articles.Settings.Delete';
    protected $permissionEdit   = 'Articles.Settings.Edit';
    protected $permissionView   = 'Articles.Settings.View';

    /**
	 * Constructor
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
		
        $this->auth->restrict($this->permissionView);
		$this->load->model('articles/articles_model');
        $this->lang->load('articles');
		
            $this->form_validation->set_error_delimiters("<span class='error'>", "</span>");
        
		Template::set_block('sub_nav', 'settings/_sub_nav');

		Assets::add_module_js('articles', 'articles.js');
	}

	/**
	 * Display a list of Articles data.
	 *
	 * @return void
	 */
	public function index($offset = 0)
	{
        // Deleting anything?
		if (isset($_POST['delete'])) {
            $this->auth->restrict($this->permissionDelete);
			$checked = $this->input->post('checked');
			if (is_array($checked) && count($checked)) {

                // If any of the deletions fail, set the result to false, so
                // failure message is set if any of the attempts fail, not just
                // the last attempt

				$result = true;
				foreach ($checked as $pid) {
					$deleted = $this->articles_model->delete($pid);
                    if ($deleted == false) {
                        $result = false;
                    }
				}
				if ($result) {
					Template::set_message(count($checked) . ' ' . lang('articles_delete_success'), 'success');
				} else {
					Template::set_message(lang('articles_delete_failure') . $this->articles_model->error, 'error');
				}
			}
		}
        $pagerUriSegment = 5;
        $pagerBaseUrl = site_url(SITE_AREA . '/settings/articles/index') . '/';
        
        $limit  = $this->settings_lib->item('site.list_limit') ?: 15;

        $this->load->library('pagination');
        $pager['base_url']    = $pagerBaseUrl;
        $pager['total_rows']  = $this->articles_model->count_all();
        $pager['per_page']    = $limit;
        $pager['uri_segment'] = $pagerUriSegment;

        $this->pagination->initialize($pager);
        $this->articles_model->limit($limit, $offset);
        
		$records = $this->articles_model->find_all();

		Template::set('records', $records);
        
    Template::set('toolbar_title', lang('articles_manage'));

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
				log_activity($this->auth->user_id(), lang('articles_act_create_record') . ': ' . $insert_id . ' : ' . $this->input->ip_address(), 'articles');
				Template::set_message(lang('articles_create_success'), 'success');

				redirect(SITE_AREA . '/settings/articles');
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
		$id = $this->uri->segment(5);
		if (empty($id)) {
			Template::set_message(lang('articles_invalid_id'), 'error');

			redirect(SITE_AREA . '/settings/articles');
		}
        
		if (isset($_POST['save'])) {
			$this->auth->restrict($this->permissionEdit);

			if ($this->save_articles('update', $id)) {
				log_activity($this->auth->user_id(), lang('articles_act_edit_record') . ': ' . $id . ' : ' . $this->input->ip_address(), 'articles');
				Template::set_message(lang('articles_edit_success'), 'success');
				redirect(SITE_AREA . '/settings/articles');
			}

            // Not validation error
            if ( ! empty($this->articles_model->error)) {
                Template::set_message(lang('articles_edit_failure') . $this->articles_model->error, 'error');
			}
		}
        
		elseif (isset($_POST['delete'])) {
			$this->auth->restrict($this->permissionDelete);

			if ($this->articles_model->delete($id)) {
				log_activity($this->auth->user_id(), lang('articles_act_delete_record') . ': ' . $id . ' : ' . $this->input->ip_address(), 'articles');
				Template::set_message(lang('articles_delete_success'), 'success');

				redirect(SITE_AREA . '/settings/articles');
			}

            Template::set_message(lang('articles_delete_failure') . $this->articles_model->error, 'error');
		}
        
        Template::set('articles', $this->articles_model->find($id));

		Template::set('toolbar_title', lang('articles_edit_heading'));
		Template::render();
	}

	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/**
	 * Save the data.
	 *
	 * @param string $type Either 'insert' or 'update'.
	 * @param int	 $id	The ID of the record to update, ignored on inserts.
	 *
	 * @return bool|int An int ID for successful inserts, true for successful
     * updates, else false.
	 */
	private function save_articles($type = 'insert', $id = 0)
	{
		if ($type == 'update') {
			$_POST['id'] = $id;
		}

        // Validate the data
        $this->form_validation->set_rules($this->articles_model->get_validation_rules());
        if ($this->form_validation->run() === false) {
            return false;
        }

		// Make sure we only pass in the fields we want
		
		$data = $this->articles_model->prep_data($this->input->post());

        // Additional handling for default values should be added below,
        // or in the model's prep_data() method
        

        $return = false;
		if ($type == 'insert') {
			$id = $this->articles_model->insert($data);

			if (is_numeric($id)) {
				$return = $id;
			}
		} elseif ($type == 'update') {
			$return = $this->articles_model->update($id, $data);
		}

		return $return;
	}
}