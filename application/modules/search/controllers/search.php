<?php defined('BASEPATH') || exit('No direct script access allowed');

/**
 * Articles controller
 */


class Search extends Front_Controller
{
    public function index()
    {
        redirect();
    }

    public function page()
    {
        if ($this->input->post()) {

            $inputs = array(
                'q', 'bla'
            );

            $q = array();
            foreach ($inputs as $input) {
                $q[$input] = $this->input->post($input);
            }

            $this->session->set_userdata('search_query', json_encode($q));

            redirect('search/page/1');
        }

        if (!$q = json_decode($this->session->userdata('search_query'))) {
            redirect();
        }

        $pagerUriSegment = 3;
        if (!$page = $this->uri->segment($pagerUriSegment)) {
            $page = 1;
        }
        $pagerBaseUrl = site_url('search/page/'.$page) . '/';
        $limit  = $this->settings_lib->item('site.list_limit') ?: 15;
        $this->load->library('pagination');
        $pager = array(
            'base_url'    => $pagerBaseUrl,
            'total_rows'  => $this->issues_model->count_all(),
            'per_page'    => $limit,
            'uri_segment' => $pagerUriSegment,
        );
        $this->pagination->initialize($pager);

        $table = array(
            'ac' => $this->db->dbprefix('articles_categories'),
            'a'  => $this->db->dbprefix('articles'),
            'mi' => $this->db->dbprefix('magazine_issues')
        );

        $am = $this->articles_model;
        //title, summary, tags
        $s = trim($q->q);
        $am->select("{$table['a']}.*");
        $am->join($table['mi'], "{$table['a']}.issue_id = {$table['mi']}.id", 'left');

        $wor = array();
        $wor[] = "{$table['a']}.title LIKE '%".$this->db->escape_like_str($s)."%'";
        $wor[] = "{$table['a']}.summary LIKE '%".$this->db->escape_like_str($s)."%'";
        $wor[] = "{$table['a']}.tags LIKE '%".$this->db->escape_like_str($s)."%'";

        $where = "{$table['mi']}.status = 'published' and (".implode(' OR ', $wor).")";
        $this->db->where($where, null, false);

        if (!$records = $am->find_all()) {
            $records = array();
        }

        foreach ($records as $i => $v) {
            $records[$i]->cat_names = array();
            foreach ($v->categories as $c) {
                if ($cat = $this->categories_model->find($c)) {
                    $records[$i]->cat_names[$c] = $cat->name;
                }
            }
        }

        //print_r($records); die;

        //$this->_model->limit($limit, $offset);
        Template::set('records', $records);
        Template::set('search_query', $s);

        Template::render();
    }
}
