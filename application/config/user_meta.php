<?php defined('BASEPATH') || exit('No direct script access allowed');
/**
 * Bonfire
 *
 * An open source project to allow developers to jumpstart their development of
 * CodeIgniter applications.
 *
 * @package   Bonfire
 * @author    Bonfire Dev Team
 * @copyright Copyright (c) 2011 - 2014, Bonfire Dev Team
 * @license   http://opensource.org/licenses/MIT
 * @link      http://cibonfire.com
 * @since     Version 1.0
 * @filesource
 */


//------------------------------------------------------------------------------
// User Meta Fields Config - These are just examples of various options
// The following examples show how to use regular inputs, select boxes,
// state and country select boxes.
//------------------------------------------------------------------------------

$config['user_meta_fields'] =  array(
    // array(
    //     'name'   => 'state',
    //     'label'   => lang('user_meta_state'),
    //     'rules'         => 'trim|max_length[3]',
    //     'form_detail' => array(
    //         'type' => 'state_select',
    //         'settings' => array(
    //             'name'      => 'state',
    //             'id'        => 'state',
    //             'maxlength' => '3',
    //             'class'     => 'span1'
    //         ),
    //     ),
    // ),
    array(
        'name'        => 'country',
        'label'       => lang('user_meta_country'),
        'rules'       => 'required|trim|max_length[100]',
        'admin_only'  => false,
        'form_detail' => array(
            'type'     => 'country_select',
            'settings' => array(
                'name'      => 'country',
                'id'        => 'country',
                'maxlength' => '100',
                'class'     => ''
            ),
        ),
    ),
    array(
        'name'        => 'pub_name',
        'label'       => lang('pa_pub_name'),
        'rules'       => 'required|trim|max_length[255]',
        'form_detail' => array(
            'type' => 'input',
            'settings' => array(
                'name'      => 'pub_name',
                'id'        => 'pub_name',
                'maxlength' => '255',
                'class'     => ''
            ),
        ),
    ),
    array(
        'name'        => 'pub_description',
        'label'       => lang('pa_pub_description'),
        'rules'       => 'trim|max_length[65500]',
        'form_detail' => array(
            'type' => 'textarea',
            'settings' => array(
                'name'      => 'pub_description',
                'id'        => 'pub_description',
                'maxlength' => '65500',
                'class'     => ''
            ),
        ),
    ),
    array(
        'name'        => 'pub_website',
        'label'       => lang('pa_pub_website'),
        'rules'       => 'required|trim|max_length[255]',
        'form_detail' => array(
            'type' => 'input',
            'settings' => array(
                'name'      => 'pub_website',
                'id'        => 'pub_website',
                'maxlength' => '255',
                'class'     => ''
            ),
        ),
    ),
);
