<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pages extends Frontend_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Load classes
        $this->load->model('pages/pages_model', 'pages');
        $this->load->model('routes/routes_model', 'routes');
    }

    public function show($id_page)
    {
        $page = $this->pages->get($id_page);
        if (!$page) {
            show_404();
        }

        // Set metadata
        $this->set_metadata($page);

        $this->data['page'] = $page;

        // Load the view
        $this->load->view('themes/'.config_item('theme').'/pages/show', $this->data);
    }
}

/* End of file Pages.php */
/* Location: ./application/modules/pages/controllers/Pages.php */

