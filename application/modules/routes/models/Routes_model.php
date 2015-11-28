<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Routes_model extends MY_Model
{
    protected $_table_name = 'routes';
    protected $_order_by = '';
    public $after_create = ['save_routes'];
    public $after_update = ['save_routes'];
    public $after_delete = ['save_routes'];

    function __construct()
    {
        $this->timestamps = false;

        parent::__construct();
    }

    /**
     * Generate file with dynamic routes
     *
     * @return void
     */
    public function save_routes()
    {
        $routes = $this->get_all();

        if ($routes) {

            $data[] = "<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');";

            foreach ($routes as $route) {
                $data[] = '$route["'.$route->slug.'"] = "'.$route->url.'";';
            }

            $output = implode("\n", $data);

            $this->load->helper('file');

            $fileName = APPPATH.'cache/dynamic_routes.php';
            write_file($fileName, $output);
            chmod($fileName, 0777);
        }
    }

    /**
     * Prepare unique slug
     *
     * @param string $slug
     * @param string $url
     * @return string
     */
    public function prepare_unique_slug($slug, $url = '')
    {
        $slugOk = mb_strtolower(url_title($slug), 'utf-8');
        $slugTmp = $slugOk;

        $i = 0;
        while ($route = $this->where(['slug' => $slugTmp, 'url !=' => $url])->count()) {
            $i++;
            $slugTmp = $slugOk.'-'.$i;
        }

        if ($i > 0) {
            $slugOk .= '-'.$i;
        }

        return $slugOk;
    }
}

/* End of file copythis_model.php */
/* Location: ./application/modules/routes/models/Routes_model.php */
