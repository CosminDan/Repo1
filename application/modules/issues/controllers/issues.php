<?php defined('BASEPATH') || exit('No direct script access allowed');


class Issues extends Front_Controller
{

    /**
     * Constructor
     *
     * @return void
     */


    public function __construct()
    {
        parent::__construct();

        $this->load->model('issues/issues_model');
    }

    public function getBreadcrumbs($a = null)
    {
        return array('test' => 'test');
    }

    public function index($offset = 0)
    {

    }

}
