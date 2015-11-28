<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once APPPATH.'/interfaces/FixturesInterface.php';

/**
 * Class LoadUserData
 */
class UserFixture implements FixturesInterface
{
    public function load()
    {
        $CI = & get_instance();
        $CI->load->model('users/users_model', 'users');

        $faker = Faker\Factory::create();

        $CI->db->query('TRUNCATE TABLE users');

        // Hash default password
        $pass = hash('sha512', 'admin#123'.config_item('encryption_key'));

        // Load admin data
        $data = [
            'login' => 'admin',
            'email' => 'admin@litecms.pl',
            'name' => 'Admin',
            'password' => $pass,
        ];

        $CI->users->insert($data);

        for ($i = 1; $i < 100; $i++) {
            $firstName = $faker->unique()->firstName;
            $lastName = $faker->unique()->lastName;

            $data = [
                'login' => strtolower($firstName),
                'email' => strtolower($firstName).'@litecms.pl',
                'name' => $firstName.' '.$lastName,
                'password' => $pass,
            ];

            $CI->users->insert($data);
        }
    }
}
