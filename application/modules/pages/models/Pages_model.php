<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pages_model extends MY_Model
{
    public $table = 'pages';
    public $primary_key = 'id_page';
    public $fillable = array('title', 'content', 'meta_title', 'meta_keywords', 'meta_description');
    public $protected = array();
    public $rules = array();

    function __construct()
    {
        $this->timestamps = true;
        parent::__construct();

        $this->set_rules();
    }

    /**
     * Get validations rules
     *
     * @param string $action
     * @return array
     */
    public function set_rules()
    {
        $this->rules = [
            'insert' => [
                'title' => ['field' => 'title', 'label' => lang('title'), 'rules' => 'required|trim|xss_clean'],
                'content' => ['field' => 'content', 'label' => lang('content'), 'rules' => 'trim'],
                'meta_title' => ['field' => 'meta_title', 'label' => lang('meta').' '.lang('title'), 'rules' => 'trim|xss_clean'],
                'meta_keywords' => ['field' => 'meta_keywords', 'label' => lang('meta').' '.lang('keywords'), 'rules' => 'trim|xss_clean'],
                'meta_description' => ['field' => 'meta_description', 'label' => lang('meta').' '.lang('description'), 'rules' => 'trim|xss_clean'],
            ],
            'update' => [
                'title' => ['field' => 'title', 'label' => lang('title'), 'rules' => 'required|trim|xss_clean'],
                'content' => ['field' => 'content', 'label' => lang('content'), 'rules' => 'trim'],
                'meta_title' => ['field' => 'meta_title', 'label' => lang('meta').' '.lang('title'), 'rules' => 'trim|xss_clean'],
                'meta_keywords' => ['field' => 'meta_keywords', 'label' => lang('meta').' '.lang('keywords'), 'rules' => 'trim|xss_clean'],
                'meta_description' => ['field' => 'meta_description', 'label' => lang('meta').' '.lang('description'), 'rules' => 'trim|xss_clean'],
            ]
        ];
    }

    /**
     * Generate like query for search action
     *
     * @param string $string
     */
    public function generate_like_query($string)
    {
        if ($string) {
            $this->db->like('title', $string);
        }
    }
    
    /**
     * Create route from pages
     */
    public function update_routes()
    {
        $CI =& get_instance();
        $CI->load->model('routes/routes_model', 'routes');

        $CI->routes->after_create = [];
        $CI->routes->after_update = [];
        $CI->routes->after_delete = [];

        $pages = $this->get_all();
        if ($pages) {
            foreach($pages as $page) {
                $pageUrl = $CI->config->item('pages_route_controller').$page->id_page;
                $pageSlug = $CI->routes->prepare_unique_slug($page->title);
                $routeData = $CI->routes->where(['url' => $pageUrl])->count();

                if ($routeData <= 0) {
                    $routesData = [
                        'slug' => $pageSlug,
                        'url' => $pageUrl,
                    ];
                    $this->routes->insert($routesData);
                }
            }
        }
        $CI->routes->save_routes();
    }
}

/* End of file Pages_model.php */
/* Location: ./application/modules/pages/models/Pages_model.php */
