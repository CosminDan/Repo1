<?php defined('BASEPATH') || exit('No direct script access allowed');

/**
 * Magazines controller
 */


class Magazines extends Front_Controller
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
        $this->pdf_upload_path  = '../media/';

        parent::__construct();
    }

    /**
     * Display a list of Articles data.
     *
     * @return void
     */
    public function index($offset = 0)
    {

        // $pagerUriSegment = 3;
        // $pagerBaseUrl = site_url('articles/index') . '/';

        // $limit  = $this->settings_lib->item('site.list_limit') ?: 15;

        // $this->load->library('pagination');
        // $pager['base_url']    = $pagerBaseUrl;
        // $pager['total_rows']  = $this->articles_model->count_all();
        // $pager['per_page']    = $limit;
        // $pager['uri_segment'] = $pagerUriSegment;

        // $this->pagination->initialize($pager);
        // $this->articles_model->limit($limit, $offset);


        // // Don't display soft-deleted records
        // $this->articles_model->where($this->articles_model->get_deleted_field(), 0);
        // $records = $this->articles_model->find_all();

        // Template::set('records', $records);
        // //Template::set_message('sdasdas', 'error');

        // Template::render();
    }

    public function view()
    {
        if (!$id = $this->uri->segment(3)) {
            redirect();
        }

        $ids = explode('-', $id);

        if (!isset($ids[1]) || $ids[0] != 'pub') {
            redirect();
        }

        if (!$issue = $this->issues_model->find($ids[1])) {
            redirect();
        }

        if ($issue->status != 'published') {
            redirect();
        }

        if (!$magazine = $this->magazines_model->find($issue->magazine_id)) {
            redirect();
        }

        if (!$articles = $this->articles_model->where('issue_id', $ids[1])->order_by('page')->find_all()) {
            redirect();
        }

        $active_article = 0;
        if (isset($ids[2])) {
            $found = false;
            foreach ($articles as $key => $value) {
                if ($value->id == $ids[2]) {
                    $found = true;
                    break;
                }
            }

            if (!$found) {
                redirect();
            }
            $active_article = $ids[2];
        }

        Template::set('magazine', $magazine);
        Template::set('issue', $issue);
        Template::set('articles', $articles);
        Template::set('article_active', $active_article);


        Assets::add_module_js('magazines', 'view.js');
        Template::render();
    }

    public function download()
    {
        if (!$id = $this->uri->segment(3)) {
            redirect();
        }

        if (!$issue = $this->issues_model->find($id)) {
            redirect();
        }

        if (!$issue->pdf_file) {
            redirect();
        }

        $path = $this->pdf_upload_path.$issue->pdf_file;

        if (!file_exists($path)) {
            redirect();
        }

        $this->output->enable_profiler(false);
        $this->output->set_header('Content-Disposition: attachment; filename="'.basename($path).'"');
        $this->output->set_content_type('application/pdf');
        $this->output->set_output(file_get_contents($path));
    }

}
