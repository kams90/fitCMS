<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Main extends Frontend_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Start admin page
     */
    public function homepage()
    {
        // Load the view
        $this->load->view('themes/'.config_item('theme').'/homepage', $this->data);
    }
}

/* End of file Main.php */
/* Location: ./application/modules/main/controllers/Main.php */
