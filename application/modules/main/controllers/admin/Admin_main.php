<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Class Admin_main
 */
class Admin_main extends Backend_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Start admin page
     */
    public function index()
    {
        // Set view data
        $this->data['pageTitle'] = lang('dashboard');

        // Load the view
        $this->load->view('themes/'.config_item('admin_theme').'/index', $this->data);
    }

    /**
     * Change number of elements per page
     * @param type $number
     */
    public function change_per_page($number, $redirect = 1)
    {
        // Set admin_per_page session
        $this->session->set_userdata('admin_per_page', $number);

        if ((int) $redirect == 1) {
            // Redirect to http_referrer
            $this->load->library('user_agent');
            $referrerUrl = $this->agent->referrer();
            $exUrl = explode('?', $referrerUrl);

            redirect($exUrl[0]);
        }
    }
}

/* End of file Admin.php */
/* Location: ./application/modules/main/controllers/admin/Admin_main.php */
