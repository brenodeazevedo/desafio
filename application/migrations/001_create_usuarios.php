<?php
class Migration_Create_Usuarios extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true
			],
			'admin' => [
				'type' => 'tinyint',
				'constraint' => '2',
				'null' => FALSE,
				'default' => '0' 	
            ],
            'nome' => [
                'type' => 'varchar',
                'constraint' => '80'
            ],
            'email' => [
                'type' => 'varchar',
                'constraint' => '100'
            ],
            'cpf' => [
				'type' => 'char',
				'constraint' => '11'
			],
			'sexo' => [
				'type' => 'varchar',
				'constraint' => '1'
			],
			'senha' => [
				'type' => 'varchar',
				'constraint' => '50',
				'null' => FALSE
            ],
        ]);
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('usuarios', true);
    }

    public function down()
    {
        $this->dbforge->drop_table('usuarios', true);
    }
}
