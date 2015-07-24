<?php defined('BASEPATH') || exit('No direct script access allowed');

/**
 * Content controller
 */


class Content extends Admin_Controller
{
    protected $permissionCreate = 'Articles.Content.Create';
    protected $permissionDelete = 'Articles.Content.Delete';
    protected $permissionEdit   = 'Articles.Content.Edit';
    protected $permissionView   = 'Articles.Content.View';

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->auth->restrict($this->permissionView);
        $this->load->model('articles_model');
        $this->load->model('authors_model');
        $this->load->model('articles_categories_model');
        $this->load->model('issues_model');
        $this->load->model('authorsofarticles_model');
        $this->load->model('institutions_model');
        $this->load->model('categories_model');
        $this->load->model('magazines_model');

        // $this->lang->load('issues/issues');
        // $this->lang->load('articles/articles');
        // $this->lang->load('magazines/magazines');

        $this->form_validation->set_error_delimiters("<span class='error'>", "</span>");



        Assets::add_module_js('articles', 'articles.js');
        //Assets::add_module_css('articles', 'articles.css');
    }

    public function getBreadcrumbs($arID = 0, $isID = 0)
    {
        return array();

        $link = '';
        $name = '';
        $article = null;

        if ($arID) {
            if (!$article = $this->articles_model->find($arID)) {
                return array();
            }
            $isID = $article->issue_id;
        }

        if ($isID && !$crumbs = Modules::run('issues/getBreadcrumbs', $isID)) {
            return array();
        }

        if ($article) {
            $link = site_url(SITE_AREA . '/content/articles/edit/'.$id) . '/';
        }

        return $crumbs;
    }

    /**
     * Display a list of Articles data.
     *
     * @return void
     */
    public function index($id = 0, $offset = 0)
    {
        if (!$id) {
            if (!$um = $this->auth->user_magazine()) {
                redirect(SITE_AREA);
            }
            $issues = $this->issues_model->where('magazine_id', $um)->order_by('id', 'DESC')->limit(1)->find_all();
            if (!isset($issues[0])) {
                redirect(SITE_AREA);
            }
            $issue = $issues[0];

        } else {
            $issue = $this->issues_model->find($id);
        }

        $pagerUriSegment = 6;
        $pagerBaseUrl = site_url(SITE_AREA . '/content/articles/index/'.$id) . '/';

        $limit  = $this->settings_lib->item('site.list_limit') ?: 15;

        $this->load->library('pagination');

        $pager = array(
            'base_url'    => $pagerBaseUrl,
            'total_rows'  => 0,
            'per_page'    => $limit,
            'uri_segment' => $pagerUriSegment,
        );

        // Get total count for issue and articles for page
        foreach (range(0, 1) as $i) {
            $this->articles_model->where('articles.issue_id', $issue->id);
            if ($i) {
                $this->articles_model->select('articles.*, institutions.name AS affiliation_name');
                $this->db->join('institutions', "institutions.id = articles.affiliation", 'left');
                $this->articles_model->limit($limit, $offset);
                $records = $this->articles_model->find_all();
            } else {
                $pager['total_rows'] = $this->articles_model->count_all();
            }
        }

        // Set tags as arrays
        foreach ($records as $k => $v) {
            $tags = array();
            if (strlen($v->tags)) {
                $tags = explode(',', $v->tags);
            }
            $records[$k]->tags = $tags;
            $records[$k]->summary_count = str_word_count($v->summary);
        }

        $this->pagination->initialize($pager);

        Template::set('issue', $issue);
        Template::set('records', $records);
        Template::set('toolbar_title', lang('articles_manage'));
        Template::set('breadcrumbs', $this->getBreadcrumbs($id));

        Template::set_block('sub_nav', 'content/_sub_nav');
        Template::set_block('breadcrumb', 'admin/breadcrumb');

        Template::render();
    }

    public function create($issue_id = 0)
    {
        if (!$issue = $this->issues_model->find_by('id', (int) $issue_id)) {
            redirect(SITE_AREA . '/content/magazines');
        }

        if (!$magazine = $this->magazines_model->find_by('id', $issue->magazine_id)) {
            redirect(SITE_AREA . '/content/magazines');
        }

        // TODO: Check if my own

        $id = $this->articles_model->insert(
            array(
                'issue_id' => $issue->id,
                'title' => 'Untitled'
            )
        );

        redirect(SITE_AREA . '/content/articles/edit/' . $id);
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
            redirect(SITE_AREA . '/content/articles');
        }

        if ($this->input->post()) {
            $this->auth->restrict($this->permissionEdit);

            if ($this->save_item('update', $id)) {
                Template::set_message(lang('articles_edit_success'), 'success');
                $article = $this->articles_model->find_by('id', $id);
                redirect(SITE_AREA . '/content/articles/index/'.$article->issue_id);
            }

            // Not validation error
            if ( ! empty($this->articles_model->error)) {
                Template::set_message(lang('articles_edit_failure') . $this->articles_model->error, 'error');
            }
        }

        $articles = $this->articles_model->find($id);
        $categories = $this->categories_model->select(array('id', 'name'))->where('pid !=', 0)->find_all();

        $this->institutions_model->select(array('id', 'name'));
        $institutions = $this->institutions_model->find_all();
        $affiliations = array('0' => 'No affiliation');

        foreach ($institutions as $inst) {
            $affiliations[$inst->id] = $inst->name;
        }

        $categs = array();
        foreach ($categories as $cat) {
            $categs[$cat->id] = $cat->name;
        }

        Template::set('articles', $articles);
        Template::set('affiliations', $affiliations);
        Template::set('categories', $categs);

        Template::set('toolbar_title', lang('articles_edit_heading'));
        Template::render();
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
        $this->form_validation->set_rules($this->articles_model->get_validation_rules());
        if ($this->form_validation->run() === false) {
            return false;
        }

        $data = $this->input->post();

        if (isset($data['issue_id'])) {
            unset($data['issue_id']);
        }

        if (isset($data['page'])) {
            $data['page'] = (int) $data['page'];
            if ($data['page'] < 1) {
                $data['page'] = 1;
            }
        }

        if (isset($data['affiliation'])) {
            if (!is_numeric($data['affiliation'])) {
                $instID = $this->institutions_model->insert(
                    array('name' => $data['affiliation'])
                );

                if (is_numeric($instID)) {
                    $data['affiliation'] = $instID;
                }
            }
        }



        // Process Tags
        $tags = array();
        if (isset($data['tags'])) $tags = $data['tags'];
        $data['tags'] = implode(',', $tags);

        $config = array();
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'pdf';
        $this->load->library('upload');
        $this->upload->initialize($config);

        // $dataPDF = null;
        // $raw_text = null;
        // if ($this->upload->do_upload('pdf_file')) {
        //     $dataPDF = $this->upload->data('pdf_file');
        //     $filepath = $config['upload_path'].$dataPDF['file_name'];
        //     $raw_text = $this->parsePDF($filepath);
        // }

        // if (!is_null($raw_text)) {
        //     $data['raw_text'] = $raw_text;
        // }

        // Make sure we only pass in the fields we want

        $mData = $this->articles_model->prep_data($data);

        // Additional handling for default values should be added below,
        // or in the model's prep_data() method


        $return = false;
        if ($type == 'insert') {
            $id = $this->articles_model->insert($mData);

            if (is_numeric($id)) {
                $return = $id;
            }
        } elseif ($type == 'update') {
            $return = $this->articles_model->update($id, $mData);
        }

        // Process Authors
        $authors = null;
        if (isset($data['authors'])) {
            $authors = $data['authors'];
        }
        if (is_array($authors)) {
            $article = $this->articles_model->find($id);
            $prevAuthorsIDs = array_keys($article->authors);
            $currAuthorsIDs = array();
            foreach ($authors as $i => $v) {
                if (!is_numeric($v)) {
                    $authorid = $this->authors_model->insert(array('name' => $v));
                    $this->authorsofarticles_model->insert(
                        array(
                            'author_id' => $authorid,
                            'article_id' => $id
                        )
                    );
                } else {
                    $currAuthorsIDs[] = $v;
                }
            }
            $daIDs = array_diff($prevAuthorsIDs, $currAuthorsIDs);
            if (count($daIDs)) {
                $aoas = $this->authorsofarticles_model->find_all_by('article_id', $id);
                // Delete authors
                foreach ($aoas as $aoa) {
                    if (in_array($aoa->author_id, $daIDs)) {
                        $this->authorsofarticles_model->delete($aoa->id);
                    }
                }
            }
        }

        if (isset($data['categories'])) {
            $this->articles_categories_model->delete_where('article_id = '.$id);
            $batch = array();
            foreach ($data['categories'] as $categ) {
                $batch[] = array(
                    'article_id' => $id,
                    'category_id' => $categ
                );
            }
            $this->articles_categories_model->insert_batch($batch);
        }

        return $return;
    }

    private function parsePDF($filepath)
    {
        $parser = new \Smalot\PdfParser\Parser();
        $pdf    = $parser->parseFile($filepath);

        // Retrieve all pages from the pdf file.
        $pages = $pdf->getPages();
        $details  = $pdf->getDetails();

        return $pdf->getText();

        // Loop over each page to extract text.
        foreach ($pages as $page) {
            echo $page->getText();
        }
        echo time();

        die;
    }

    // public function test()
    // {
    //     die();
    //     $categs = file_get_contents('../categs.txt');
    //     $categs = explode("\n", $categs);

    //     $parent = array(0, 0, 0);

    //     foreach ($categs as $line) {
    //         $categ = ltrim($line);
    //         $diff = strlen($line) - strlen($categ);
    //         $level = $diff/4;

    //         $pid = $parent[$level];

    //         $data = array(
    //             'pid'        => $pid,
    //             'name'       => $categ,
    //             'selectable' => 1
    //         );

    //         $id = $this->categories_model->insert($data);

    //         $next_level = $level+1;
    //         $parent[$next_level] = $id;

    //         echo "{$line} - {$level}\n";
    //     }
    //     die;
    // }
}
