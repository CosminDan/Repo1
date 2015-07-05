<?php defined('BASEPATH') || exit('No direct script access allowed');

/**
 * Content controller
 */


class Content extends Admin_Controller
{
    protected $permissionCreate = 'Issues.Content.Create';
    protected $permissionDelete = 'Issues.Content.Delete';
    protected $permissionEdit   = 'Issues.Content.Edit';
    protected $permissionView   = 'Issues.Content.View';

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

        $this->lang->load('issues/issues');
        $this->lang->load('articles/articles');
        $this->lang->load('magazines/magazines');

        // $this->form_validation->set_error_delimiters("<span class='error'>", "</span>");



        //Assets::add_module_js('articles', 'articles.js');
        //Assets::add_module_css('articles', 'articles.css');
    }

    /**
     * Display a list of Articles data.
     *
     * @return void
     */
    public function index($id = 0, $offset = 0)
    {
        if (!$id) {
            if (!$id = $this->auth->user_magazine()) {
                redirect(SITE_AREA);
            }
        }

        // TODO: check permissions
        $magazine = $this->magazines_model->find_by('id', $id);

        if (!$magazine) {
            redirect(SITE_AREA);
        }

        $pagerUriSegment = 5;
        $pagerBaseUrl = site_url(SITE_AREA . '/content/issues/index/'.$id) . '/';

        $limit  = $this->settings_lib->item('site.list_limit') ?: 15;

        $this->load->library('pagination');
        $pager['base_url']    = $pagerBaseUrl;
        $pager['total_rows']  = $this->issues_model->count_all();
        $pager['per_page']    = $limit;
        $pager['uri_segment'] = $pagerUriSegment;

        $this->pagination->initialize($pager);
        $this->issues_model->limit($limit, $offset);

        $issues = $this->issues_model->where('magazine_id', $id)->find_all();

        if (!is_array($issues)) {
            $issues = array();
        }

        $issuesIDs = array();
        foreach ($issues as $issue) {
            $issuesIDs[] = $issue->id;
        }

        $issues_counts = $this->articles_model->count_by_issues($issuesIDs);

        foreach ($issues as $i => $issue) {
            $issues[$i]->count = 0;
            foreach ($issues_counts as $ic) {
                if ($issue->id == $ic->issue_id) {
                    $issues[$i]->count = $ic->count;
                    break;
                }
            }
        }

        Template::set('records', $issues);
        Template::set('magazine', $magazine);
        Template::set('toolbar_title', lang('issues_manage'));

        Template::render();
    }

}
