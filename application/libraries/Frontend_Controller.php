<?php

class Frontend_Controller extends MY_Controller
{
    public $data = array();

    public function __construct()
    {
        parent::__construct();
        $this->load->config('my_config');

        // Set the template
        $this->output->set_template(config_item('theme'));
        $this->load->library('form_validation');
        
        // Set default data
        $this->data = [
            'metadata' => [
                'meta_title' => '',
                'meta_keywords' => '',
                'meta_description' => '',
            ]
        ];

        // Needed to callback functions in HMVC
        $this->form_validation->CI = & $this;
    }

    public function set_metadata($metadata)
    {
        dump($metadata);
        if ($metadata->meta_title != '') {
            $this->data['metadata']['meta_title'] = $this->data['metadata']['meta_title'] . ' | ' . $metadata->meta_title;
        }
        if ($metadata->meta_keywords != '') {
            $this->data['metadata']['meta_keywords'] = $this->data['metadata']['meta_keywords'] . ' | ' . $metadata->meta_keywords;
        }
        if ($metadata->meta_description != '') {
            $this->data['metadata']['meta_description'] = $this->data['metadata']['meta_description'] . ' | ' . $metadata->meta_description;
        }
    }
}

/* End of file Backend_controller.php */
/* Location: ./application/libraries/Backend_controller.php */


