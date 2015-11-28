<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users_model extends MY_Model
{
    public $table = 'users';
    public $primary_key = 'id_user';
    public $fillable = array();
    public $protected = array();

    function __construct()
    {
        parent::__construct();

        $this->timestamps = FALSE;
    }

    /**
     * Get validations rules
     *
     * @param string $action
     * @return array
     */
    public function get_rules($action = '', $id = 0)
    {
        $rules = array();

        $rules['name'] = array('field' => 'name', 'label' => lang('name'), 'rules' => 'required|trim|xss_clean');

        if ($action == 'add') {
            $rules['login'] = array('field' => 'login', 'label' => lang('login'), 'rules' => 'my_unique_field[users,login,id_user]|trim|required|xss_clean');
            $rules['email'] = array('field' => 'email', 'label' => lang('email'), 'rules' => 'my_unique_field[users,login,id_user]|trim|required|valid_email|xss_clean');
            $rules['password'] = array('field' => 'password', 'label' => lang('password'), 'rules' => 'required|xss_clean');
            $rules['password_repeat'] = array('field' => 'password_repeat', 'label' => lang('password_repeat'), 'rules' => 'required|matches[password]|xss_clean');
        } else {
            $rules['login'] = array('field' => 'login', 'label' => lang('login'), 'rules' => 'my_unique_field[users,login,id_user,'.$id.']]|trim|required|xss_clean');
            $rules['email'] = array('field' => 'email', 'label' => lang('email'), 'rules' => 'my_unique_field[users,email,id_user,'.$id.']]|trim|required|valid_email|xss_clean');
            $rules['password'] = array('field' => 'password', 'label' => lang('password'), 'rules' => 'xss_clean');
            $rules['password_repeat'] = array('field' => 'password_repeat', 'label' => lang('password_repeat'), 'rules' => 'matches[password]|xss_clean');
        }

        return $rules;
    }

    /**
     * Generate like query for search action
     *
     * @param type $string
     */
    public function generate_like_query($string)
    {
        if ($string) {
            $this->db->like('name', $string);
            $this->db->or_like('login', $string);
            $this->db->or_like('email', $string);
        }
    }
}

/* End of file Users_model.php */
/* Location: ./application/modules/users/models/Users_model.php */
