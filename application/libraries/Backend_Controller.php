<?php

class Backend_Controller extends MY_Controller
{
    public $data = array();

    public function __construct()
    {
        parent::__construct();

        // Set and Load languages
        $this->session->set_userdata('id_lang', 1);
        $this->lang->load('admin', config_item('selected_lang'));
        $this->data['id_lang'] = 1;

        // Load needed config
        $this->load->config('admin');

        // Set the admin template
        $this->output->set_template(config_item('admin_theme'));

        // Load needed library
        $this->load->library('form_validation');

        // Load needed models
        $this->load->model('auth/auth_model', 'auth');

        // Load needed helpers
        $this->load->helper('admin');

        // Needed to callback functions in HMVC
        $this->form_validation->CI = & $this;

        // Set number of elements per page
        if (!$this->session->admin_per_page) {
            $this->session->set_userdata('admin_per_page', $this->config->item('default_admin_per_page'));
        }

        // Url exceptions
        $exception_uris = array(
            config_item('admin_folder').'/auth/login',
            config_item('admin_folder').'/auth/logout',
            config_item('admin_folder').'/auth/remember'
        );

        // Set templates col
        $this->data['content_col'] = 12;
        $this->data['aside_col'] = 0;

        if (in_array(uri_string(), $exception_uris) == FALSE) {
            // Check if login
            if ($this->auth->logged_in() == FALSE) {
                redirect(base_url(config_item('admin_folder').'/auth/login'));
            }
        }

        // Save User data to variable
        if ($this->session->admin_user) {
            $this->data['loggedUser'] = (object) $this->session->admin_user;
        }

        // Set default data
        $this->data['breadcrumbs'] = array();
        $this->data['pageTitle'] = '';
    }

    /**
     * Initialize default pagination
     *
     * @param int $numberOfItems number of all items for pagination
     * @return array return array with keys: 'limit' and 'limit_offset'
     */
    public function initPagination($numberOfItems, $page = 1)
    {
        // Load pagination library
        $this->load->library('pagination');

        // Set paginaton config
        $config = [
            'base_url'             => current_url(),
            'total_rows'           => $numberOfItems,
            'per_page'             => $this->session->userdata('admin_per_page'),
            'page_query_string'    => TRUE,
            'query_string_segment' => 'page',
            'reuse_query_string'   => TRUE,
        ];

        // Initialize pagination
        $this->pagination->initialize($config);

        $params['limit_offset'] = ($page * $config["per_page"]) - $config["per_page"];
        $params['limit'] = $config["per_page"];

        return $params;
    }
}

/* End of file Backend_controller.php */
/* Location: ./application/libraries/Backend_controller.php */