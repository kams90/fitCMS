<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_users extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field(array(
            'id_user' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'login' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'default' => NULL
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'default' => NULL
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'default' => NULL
            ),
            'password' => array(
                'type' => 'VARCHAR',
                'constraint' => '128',
                'default' => NULL
            ),
            'type' => array(
                'type' => 'TINYINT',
                'constraint' => '1',
                'default' => 0,
                'unsigned' => TRUE
            )
        ));

        $this->dbforge->add_key('id_user', TRUE);
        $this->dbforge->create_table('users');

        // Hash default password
        $pass = hash('sha512', 'admin#123'.config_item('encryption_key'));

        // Add default user
        $this->db->query('INSERT INTO `users` (login, email, name, password) VALUES ("admin", "admin@cms.pl", "Admin", "'.$pass.'")');
        for ($i = 1; $i < 100; $i++) {
            $this->db->query('INSERT INTO `users` (login, email, name, password) VALUES ("admin'.$i.'", "admin'.$i.'@cms.pl", "Admin'.$i.'", "'.$pass.'")');
        }

        // Add unique keys on email and login
        $this->db->query('ALTER TABLE `users` ADD UNIQUE INDEX (`login`)');
        $this->db->query('ALTER TABLE `users` ADD UNIQUE INDEX (`email`)');
    }

    public function down()
    {
        $this->dbforge->drop_table('users');
    }
}
