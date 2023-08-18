CREATE DATABASE proyectoInnovacion
USE proyectoInnovacion


-- CREACCION DE LA TABLA LOGIN
CREATE TABLE usuarios(
	idusuario 	INT		AUTO_INCREMENT	PRIMARY KEY,
	nombres		VARCHAR(50)	NOT NULL,
	apellidos	VARCHAR(50)	NOT NULL,
	correo		VARCHAR(60)	NOT NULL,
	clave		VARCHAR(90)	NOT NULL,
	estado		CHAR(1)		NOT NULL DEFAULT 'A',
	fecharegistro	DATETIME 	NOT NULL DEFAULT NOW(),
	fechaupdate	DATETIME	NULL,
	CONSTRAINT uk_correo_cor 	UNIQUE(correo)
)ENGINE = INNODB;

INSERT INTO usuarios(nombres, apellidos, correo, clave)
VALUES ('Alonso Enrique','Muñoz Quispe','alonsomunoz263@gmail.com','Alonso123');

SELECT * FROM usuarios

UPDATE usuarios SET
	clave = '$2y$10$2zYo94jLxnAEq/VotFMTYeWSYNIv25NKFoTqwDouLmUHROBgBw2f.'
	WHERE idusuario = 1;