<?php defined('BASEPATH') || exit('No direct script access allowed');

/**
 * Articles controller
 */
class Articles extends Front_Controller
{
    protected $permissionCreate = 'Articles.Articles.Create';
    protected $permissionDelete = 'Articles.Articles.Delete';
    protected $permissionEdit   = 'Articles.Articles.Edit';
    protected $permissionView   = 'Articles.Articles.View';

    /**
	 * Constructor
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('articles/articles_model');
        $this->lang->load('articles');
		
        

		Assets::add_module_js('articles', 'articles.js');
	}

	/**
	 * Display a list of Articles data.
	 *
	 * @return void
	 */
	public function index($offset = 0)
	{
        
        $pagerUriSegment = 3;
        $pagerBaseUrl = site_url('articles/index') . '/';
        
        $limit  = $this->settings_lib->item('site.list_limit') ?: 15;

        $this->load->library('pagination');
        $pager['base_url']    = $pagerBaseUrl;
        $pager['total_rows']  = $this->articles_model->count_all();
        $pager['per_page']    = $limit;
        $pager['uri_segment'] = $pagerUriSegment;

        $this->pagination->initialize($pager);
        $this->articles_model->limit($limit, $offset);
        

        // Don't display soft-deleted records
        $this->articles_model->where($this->articles_model->get_deleted_field(), 0);
		$records = $this->articles_model->find_all();

		Template::set('records', $records);
        

		Template::render();
	}
    
}