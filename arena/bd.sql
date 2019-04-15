-- cria a tabela
create table usuarios (
    usuario_id int AUTO_INCREMENT,
    nome varchar(50) not null,
    usuario varchar(50) not null,
    senha varchar(50) not null,
    cpf varchar(11),
    usuario_role tinyint(2) DEFAULT 0,
    PRIMARY KEY(usuario_id)
    );
-- cria o admin - senha = 123
INSERT INTO `usuarios`(`nome`, `usuario`, `senha`, `usuario_role`, `cpf`) VALUES ('admin','admin','202cb962ac59075b964b07152d234b70',1,'000000000000')
