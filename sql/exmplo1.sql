CREATE TABLE tb_usuarios(
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,	
deslogin VARCHAR(64) NOT NULL,
dessenha VARCHAR(256) NOT NULL,
dtcadastro TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP() 		
);

INSERT INTO tb_usuarios(deslogin,dessenha) VALUES('root' , 'senha');

UPDATE tb_usuarios SET desenha = '1234' WHERE id = 1;

DELETE FROM tb_usuarios WHERE id = 1; 	


