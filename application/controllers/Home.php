<?php defined('BASEPATH') || exit('No direct script access allowed');


class Home extends Front_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('application');
        $this->load->library('Template');
        $this->load->library('Assets');
        $this->load->library('settings/Settings_lib');
        $this->load->library('events');

        $this->lang->load('application');
    }

    //--------------------------------------------------------------------

    /**
     * Displays the homepage of the Bonfire app
     *
     * @return void
     */


    public function index()
    {
        $this->load->library('users/auth');
        $this->set_current_user();

        $mainCats = $this->categories_model->where('pid', 0)->find_all();

        $table = array(
            'ac' => 'articles_categories',
            'a' => 'articles',
            'mi' => 'magazine_issues'
        );

        $panels = array(
            'arts'    => array('class' => 'panel-danger', 'icon' => 'institution'),
            'science' => array('class' => 'panel-info', 'icon' => 'flask'),
            'social'  => array('class' => 'panel-success', 'icon' => 'group'),
        );

        $articlesNo = 5;

        // Get subCategs
        foreach ($mainCats as $i => $mainCat) {

            $name = explode(' ', $mainCat->name);
            $mainCat->tab_id = strtolower(current($name));
            $mainCat->panel = $panels[$mainCat->tab_id]['class'];
            $mainCat->icon = $panels[$mainCat->tab_id]['icon'];

            $subCats = $this->categories_model->find_recursive('pid', $mainCat->id);
            $subCatIDs = array();
            foreach ($subCats as $subCat) {
                $subCatIDs[] = $subCat->id;
            }

            // Most Popular Articles
            $query = $this->db->select("*")
            ->from($table['ac'])
            ->join($table['a'], "{$table['ac']}.article_id = {$table['a']}.id", 'left')
            ->join($table['mi'], "{$table['a']}.issue_id = {$table['mi']}.id", 'left')
            ->where_in("{$table['ac']}.category_id", $subCatIDs)
            ->where("{$table['mi']}.status", 'published')
            ->order_by("{$table['a']}.views", 'DESC')
            ->group_by("{$table['a']}.id")
            ->limit($articlesNo)->get();

            if (!$mainCat->articles_popular = $query->result()) {
                $mainCat->articles_popular = array();
            }

            // Recent Added Articles
            $query = $this->db->select('*')
            ->from($table['ac'])
            ->join($table['a'], "{$table['ac']}.article_id = {$table['a']}.id", 'left')
            ->join($table['mi'], "{$table['a']}.issue_id = {$table['mi']}.id", 'left')
            ->where_in("{$table['ac']}.category_id", $subCatIDs)
            ->where("{$table['mi']}.status", 'published')
            ->order_by("{$table['a']}.created_on", 'DESC')
            ->group_by("{$table['a']}.id")
            ->limit($articlesNo)->get();

            if (!$mainCat->articles_recent = $query->result()) {
                $mainCat->articles_recent = array();
            }

            $mainCats[$i] = $mainCat;
        }

        Template::set('firstPage', true);
        Template::set('mainCats', array_values($mainCats));

        Template::render();
    }//end index()

    //--------------------------------------------------------------------

}
/* end ./application/controllers/home.php */
