<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once APPPATH.'/interfaces/FixturesInterface.php';

/**
 * Class PagesFixture
 */
class PagesFixture implements FixturesInterface
{
    public function load()
    {
        $CI = & get_instance();
        $CI->load->model('pages/pages_model', 'pages');
        $CI->load->model('routes/routes_model', 'routes');
        $CI->load->config('admin');
        $CI->load->helper('admin');

        $faker = Faker\Factory::create();

        $CI->db->query('TRUNCATE TABLE pages');
        $CI->db->query('TRUNCATE TABLE routes');

        for ($i = 1; $i < 100; $i++) {
            $title = $faker->unique()->sentence(3);

            $data = [
                'title' => $title,
                'content' => $faker->text(1500),
                'meta_title' => $title,
                'meta_keywords' => $faker->sentence(3),
                'meta_description' => $faker->text(100),
            ];

            $CI->pages->insert($data);
        }

        $CI->pages->update_routes();
    }
}
