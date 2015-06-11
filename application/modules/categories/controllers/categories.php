<?php defined('BASEPATH') || exit('No direct script access allowed');

/**
 * Articles controller
 */


class Categories extends Front_Controller
{
    public function index()
    {
        Template::render();
    }

    public function import()
    {
        $categs = file_get_contents('../categs.txt');
        $categs = explode("\n", $categs);

        foreach ($categs as $key => $categ) {

        }
    }
}
