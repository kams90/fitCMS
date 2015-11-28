<?php

class MY_Controller extends MX_Controller
{
    public function __construct()
    {
        $this->db->query("SET NAMES 'utf8'");

        parent::__construct();
    }
}

