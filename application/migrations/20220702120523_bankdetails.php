<?php
defined('BASEPATH') or exit('No direct script access allowed');
        
        /**
     * @property CI_DB_forge $dbforge
     * @property CI_DB_query_builder $db
     */

        class Migration_Bankdetails extends CI_Migration { 
            public function up() { 
            
                $this->dbforge->add_field(array(
                    'id' => array(
                            'type' => 'INT',
                            'constraint' => 5,
                            'unsigned' => TRUE,
                            'auto_increment' => TRUE
                    ),
                    'name' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '100'
                    ),
                    'description' => array(
                            'type' => 'TEXT',
                            'null' => TRUE
                    ),
                ));
                //$this->dbforge->add_key('id', TRUE);
                //$this->dbforge->create_table('blog');
                $this->dbforge->add_key('id', true);
                $this->dbforge->create_table('member_bankdetails_new');     
            }

            public function down()
            {
                //$this->dbforge->drop_table('member_bankdetails1',TRUE);
            }
        }
