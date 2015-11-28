<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_pages extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field(array(
            'id_page' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'title' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'default' => NULL
            ),
            'content' => array(
                'type' => 'TEXT',
                'default' => NULL
            ),
            'meta_title' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'default' => NULL
            ),
            'meta_keywords' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'default' => NULL
            ),
            'meta_description' => array(
                'type' => 'TEXT',
                'default' => NULL
            ),
            'created_at' => array(
                'type' => 'DATETIME',
                'null' => TRUE
            ),
            'updated_at' => array(
                'type' => 'DATETIME',
                'null' => TRUE
            ),
        ));

        $this->dbforge->add_key('id_page', TRUE);
        $this->dbforge->create_table('pages');

        // Add default pages
        for ($i = 1; $i < 10000; $i++) {
            $this->db->query('INSERT INTO `pages` (title, content, created_at, updated_at) VALUES ("page'.$i.'", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec faucibus turpis lectus, ac tempor lectus malesuada quis. Fusce vehicula ante eu ultricies ultrices. Phasellus ac eros quis nunc aliquet dapibus. Nulla porta, ex eget pulvinar facilisis, eros turpis auctor odio, nec dignissim arcu urna eget odio. Nam semper, dui eu convallis tempus, purus risus pulvinar ipsum, pharetra cursus tortor ante at mi. Suspendisse eu laoreet magna. Nullam blandit suscipit justo sit amet posuere. Pellentesque vel dictum eros. Quisque at enim vulputate enim porta dapibus vel in lectus.", NOW(), NOW())');
        }
    }

    public function down()
    {
        $this->dbforge->drop_table('pages');
    }
}
