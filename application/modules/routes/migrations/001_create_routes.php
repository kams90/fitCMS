<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_routes extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field(array(
            'slug' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'default' => NULL
            ),
            'url' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'default' => NULL
            ),
        ));

        $this->dbforge->create_table('routes');
    }

    public function down()
    {
        $this->dbforge->drop_table('routes');
    }
}
