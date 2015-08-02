<?php defined('BASEPATH') || exit('No direct script access allowed');

/**
 * Content controller
 */


class Content extends Admin_Controller
{
    protected $permCreate = 'Issues.Content.Create';
    protected $permDelete = 'Issues.Content.Delete';
    protected $permEdit   = 'Issues.Content.Edit';
    protected $permView   = 'Issues.Content.View';

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

        $this->magazine_id = $this->session->userdata('magazine_id');
        $this->pdf_upload_path  = '../media/';
        $this->cover_upload_path  = './media/';

        // $this->form_validation->set_error_delimiters("<span class='error'>", "</span>");
        //Assets::add_modul1e_js('articles', 'articles.js');
        //Assets::add_module_css('articles', 'articles.css');
    }



    /**
     * Display a list of Articles data.
     *
     * @return void
     */
    public function index($id = 0, $offset = 0)
    {
        if (!$id = $this->uri->segment(5)) {
            $id = $this->magazine_id;
        }

        if (!$id) {
            redirect(SITE_AREA.'/content/magazines');
        }

        // TODO: check perms
        if (!$magazine = $this->magazines_model->find_by('id', $id)) {
            redirect(SITE_AREA.'/content/magazines');
        }

        $this->session->set_userdata('magazine_id', $magazine->id);

        $pagerUriSegment = 6;
        $offset = $this->uri->segment($pagerUriSegment);
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
        Template::set('page_head', "{$magazine->title} Issues");

        Template::set_block('sub_nav', 'content/_sub_nav');

        Template::render();
    }

    public function create($mid = 0)
    {
        $this->auth->restrict($this->permCreate);

        $model = $this->issues_model;
        // TODO: Check if my own

        if (!$magazine = $this->magazines_model->find_by('id', (int) $mid)) {
            redirect(SITE_AREA . '/content/magazines');
        }

        if ($this->input->post()) {
            $this->auth->restrict($this->permCreate);

            if ($this->save_item()) {
                Template::set_message(lang('articles_edit_success'), 'success');
                $article = $model->find_by('id', $id);
                redirect(SITE_AREA . '/content/issues/index/'.$mid);
            }

            if ( ! empty($model->error)) {
                Template::set_message(lang('articles_edit_failure') . $model->error, 'error');
            }
        }

        $issue = $model->get_empty();
        $issue->magazine_id = $mid;
        $issue->year_published = date('Y');

        Template::set('item', $issue);
        Template::set('toolbar_title', "Create New Issue");
        Template::set('page_head', "New {$magazine->title} Issue");

        Template::set_view('content/item');

        Template::render();
    }

    public function edit($id = 0)
    {
        $this->auth->restrict($this->permCreate);

        $model = $this->issues_model;
        // TODO: Check if my own

        if (!$issue = $model->find_by('id', $id)) {
            redirect(SITE_AREA .'/content/issues');
        }

        if (!$magazine = $this->magazines_model->find_by('id', (int) $issue->magazine_id)) {
            redirect(SITE_AREA . '/content/magazines');
        }

        if ($this->input->post()) {
            $this->auth->restrict($this->permCreate);

            if ($this->save_item('update', $id)) {
                Template::set_message(lang('articles_edit_success'), 'success');
                $article = $model->find_by('id', $id);
                redirect(SITE_AREA . '/content/issues/index/'.$mid);
            }

            if ( ! empty($model->error)) {
                Template::set_message(lang('articles_edit_failure') . $model->error, 'error');
            }
        }

        Template::set('item', $issue);
        Template::set('toolbar_title', "Edit Issue");
        Template::set('page_head', "Edit {$magazine->title} Issue");

        Template::set_view('content/item');

        Template::render();
    }

    public function pdf()
    {
        if (!$id = $this->uri->segment(5)) {
            redirect(SITE_AREA . '/content/issues');
        }

        if (!$issue = $this->issues_model->find($id)) {
            redirect(SITE_AREA . '/content/issues');
        }

        if (!$issue->pdf_file) {
            redirect(SITE_AREA . '/content/issues');
        }

        $path = $this->pdf_upload_path.$issue->pdf_file;

        if (!file_exists($path)) {
            redirect(SITE_AREA . '/content/issues');
        }

        $this->output->enable_profiler(false);
        $this->output->set_header('Content-Disposition: attachment; filename="'.basename($path).'"');
        $this->output->set_content_type('application/pdf');
        $this->output->set_output(file_get_contents($path));
    }

    private function save_item($type = 'insert', $id = 0)
    {
        if ($type == 'update') {
            $_POST['id'] = $id;
        }

        $model = $this->issues_model;

        // Validate the data
        $this->form_validation->set_rules($model->get_validation_rules());
        if ($this->form_validation->run() === false) {
            return false;
        }

        $data = $this->input->post();

        $mData = $model->prep_data($data);

        $return = false;
        if ($type == 'insert') {
            $id = $model->insert($mData);
            if (is_numeric($id)) {
                $return = $id;
            }
        } elseif ($type == 'update') {
            $return = $model->update($id, $mData);
        }

        // Upload File
        $this->uploadPDF($id, 'pdf_upload');
        $this->uploadCover($id, 'cover_upload');

        // Add empty articles
        if (isset($data['articles_no'])) {
            $articles_no = (int) $data['articles_no'];
            if ($articles_no > 20) {
                $articles_no = 20;
            }
            $batch = array();
            for ($i = 0; $i < $articles_no; $i++) {
                $batch[] = array(
                    'issue_id' => $id,
                    'title'    => 'Untitled'
                );
            }
            $this->articles_model->insert_batch($batch);
        }
        return $return;
    }

    private function uploadPDF($id, $uploadName = 'pdf_upload')
    {
        $this->load->helper('string');

        $model       = $this->issues_model;
        $issue       = $model->find($id);
        $magID       = $issue->magazine_id;
        $upBasePath  = $this->pdf_upload_path;
        $upSubPath   = "mag_{$magID}/";
        $upload_path = $upBasePath.$upSubPath;

        if (!is_dir($upload_path)) {
            mkdir($upload_path);
        }

        do {
            $file_name = "{$id}-".random_string('alnum', 16).'.pdf';
        } while (file_exists($upload_path.$file_name));

        $config = array(
            'upload_path'   => $upload_path,
            'file_name'     => $file_name,
            'allowed_types' => 'pdf'
        );
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload($uploadName)) {
            $model->update(
                $id,
                array(
                    'id' => $id,
                    'pdf_file' => $upSubPath.$file_name
                )
            );
        }

        return true;
    }

    private function uploadCover($id, $uploadName = 'cover_upload')
    {
        $this->load->helper('string');

        $model       = $this->issues_model;
        $issue       = $model->find($id);
        $magID       = $issue->magazine_id;
        $upBasePath  = $this->cover_upload_path;
        $upSubPath   = "mag_{$magID}/";
        $upload_path = $upBasePath.$upSubPath;

        if (!is_dir($upload_path)) {
            mkdir($upload_path);
        }

        do {
            $file_name = "{$id}-".random_string('alnum', 16).'.jpg';
        } while (file_exists($upload_path.$file_name));

        $config = array(
            'upload_path'   => $upload_path,
            'file_name'     => $file_name,
            'allowed_types' => 'jpg'
        );
        $this->load->library('upload');
        $this->upload->initialize($config);


        if ($this->upload->do_upload($uploadName)) {
            $model->update(
                $id,
                array(
                    'id' => $id,
                    'cover_file' => $upSubPath.$file_name
                )
            );
        }

        $config = array(
            'image_library'  => 'gd2',
            'source_image'   => $upload_path.$file_name,
            'create_thumb'   => false,
            'maintain_ratio' => false,
            'width'          => 630,
            'height'         => 890,
        );

        $this->load->library('image_lib');
        $this->image_lib->initialize($config);

        $this->image_lib->resize();

        return true;
    }

}
