<?php
class Migration_Create_Eventos extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'usuario_id' => [
                'type' => 'INT',
                'null' => FALSE,
            ],
            'nome_evento' => [
                'type' => 'varchar',
				'constraint' => '80',
				'null' => FALSE,
			],
			'descricao_evento' => [
                'type' => 'varchar',
				'constraint' => '255',
				'null' => FALSE,
            ],
            'path_img' => [
                'type' => 'varchar',
				'constraint' => '50',
				'null' => FALSE,
            ]
            
        ]);
        $this->dbforge->add_key('id', true);
        $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE ON UPDATE CASCADE');
        $this->dbforge->create_table('eventos', true);
    }

    public function down()
    {
        $this->dbforge->drop_table('eventos', true);
    }
}
