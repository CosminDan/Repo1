<?php defined('BASEPATH') || exit('No direct script access allowed');

class Magazine_Staff_model extends BF_Model
{
    protected $table_name = 'magazine_staff';
    protected $key   = 'id';
    protected $date_format = 'datetime';

    protected $log_user  = false;
    protected $set_created = false;
    protected $set_modified = false;
    protected $soft_deletes = false;

    protected $created_field     = 'created_on';
    protected $created_by_field  = 'created_by';
    protected $modified_field    = 'modified_on';
    protected $modified_by_field = 'modified_by';
    protected $deleted_field     = 'deleted';
    protected $deleted_by_field  = 'deleted_by';

    // Customize the operations of the model without recreating the insert,
    // update, etc. methods by adding the method names to act as callbacks here.
    protected $before_insert  = array();
    protected $after_insert  = array();
    protected $before_update  = array();
    protected $after_update  = array();
    protected $before_find      = array();
    protected $after_find   = array();
    protected $before_delete  = array();
    protected $after_delete  = array();

    // For performance reasons, you may require your model to NOT return the id
    // of the last inserted row as it is a bit of a slow method. This is
    // primarily helpful when running big loops over data.
    protected $return_insert_id = true;

    // The default type for returned row data.
    protected $return_type = 'object';

    // Items that are always removed from data prior to inserts or updates.
    protected $protected_attributes = array();

    // You may need to move certain rules (like required) into the
    // $insert_validation_rules array and out of the standard validation array.
    // That way it is only required during inserts, not updates which may only
    // be updating a portion of the data.
    protected $validation_rules   = array(
        // array(
        //  'field' => 'magazines_id',
        //  'label' => 'lang:articles_field_magazines_id',
        //  'rules' => 'max_length[11]',
        // ),
        // array(
        //     'field' => 'title',
        //     'label' => 'lang:articles_field_title',
        //     'rules' => 'max_length[100]',
        // ),
        // array(
        //  'field' => 'authors_id',
        //  'label' => 'lang:articles_field_authors_id',
        //  'rules' => 'max_length[11]',
        // ),
        // array(
        //  'field' => 'affiliation',
        //  'label' => 'lang:articles_field_affiliation',
        //  'rules' => 'max_length[100]',
        // ),
        // array(
        //  'field' => 'references',
        //  'label' => 'lang:articles_field_references',
        //  'rules' => 'max_length[100]',
        // ),
        // array(
        //  'field' => 'summary',
        //  'label' => 'lang:articles_field_summary',
        //  'rules' => 'max_length[1000]',
        // ),
        // array(
        //  'field' => 'tags',
        //  'label' => 'lang:articles_field_tags',
        //  'rules' => 'max_length[100]',
        // ),
        // array(
        //  'field' => 'pdf_url',
        //  'label' => 'lang:articles_field_pdf_url',
        //  'rules' => 'max_length[50]',
        // ),
    );
    protected $insert_validation_rules  = array();
    protected $skip_validation    = true;


    public function find_all()
    {
        $this->preFind();

        return parent::find_all();
    }


    public function preFind()
    {
        $this->select("{$this->table_name}.*, users.username, users.email, roles.role_name");

        $this->db->join(
            'users',
            "users.id = {$this->table_name}.user_id",
            'left'
        );

        $this->db->join(
            'roles',
            "roles.role_id = {$this->table_name}.role_id",
            'left'
        );
    }

}
