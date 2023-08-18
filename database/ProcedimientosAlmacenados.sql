-- PROCEDIMIENTOS ALMACENADOS

-- PROCEDIMIENTO PARA LOGIN - USUARIO
DELIMITER $$
CREATE PROCEDURE spu_usuarios_login(IN correo_ 	VARCHAR(60))
BEGIN
	SELECT idusuario, correo, clave
	FROM usuarios
	WHERE correo = correo_;
END $$

-- LISTAR USUARIO
DELIMITER $$
CREATE PROCEDURE spu_listar_usuario()
BEGIN
	SELECT idusuario,
		nombres,
		apellidos,
		correo
	FROM usuarios
	WHERE estado = 'A';
END $$

CALL spu_listar_usuario();


-- PROCEDIMIENTO ALMACENADO PARA REGISTRAR USUARIO
DELIMITER $$
CREATE PROCEDURE spu_registrar_usuario(
	IN nombres_		VARCHAR(50),
	IN apellidos_		VARCHAR(50),
	IN correo_		VARCHAR(60),
	IN clave_		VARCHAR(90)
)
BEGIN
	INSERT INTO usuarios(nombres,apellidos,correo,clave)
	VALUES(nombres_,apellidos_,correo_,clave_);
END $$

-- PROCEDIMIENTO PARA RECUPERAR USUARIOS
/*delimiter $$
create procedure spu_recuperar_usuario
begin
end $$
*/

--   ACTUALIZAR USUARIO
DELIMITER $$
CREATE PROCEDURE spu_actualizar_usuario(
	IN idusuario_	INT,
	IN nombres_ 	VARCHAR(50), 
	IN apellidos_ 	VARCHAR(50)
)
BEGIN
	UPDATE usuarios SET
	nombres = nombres_,
	apellidos = apellidos_
	WHERE idusuario = idusuario_;
END $$