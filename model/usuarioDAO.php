<?php

require_once '../bd/conexion.php';
require_once '../model/entidades/usuario.php';

class UsuarioDAO {

    private $pdo;

    public function __construct() {
        try {
            $this->pdo = Conexion::connect();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function obtener($id) {
        try {
            $stm = $this->pdo->prepare("SELECT id_usuario, nombre, apellidos, dni, fec_nac, telefono, email 
                                        FROM usuarios 
                                        WHERE id_usuario = ?");


            $stm->execute(array($id));
            return $stm->fetchObject("Usuario");
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function eliminar($id) {
        try {
            $stm = $this->pdo->prepare("DELETE FROM usuarios WHERE id_usuario = ?");

            $stm->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function actualizar(Usuario $usuario) {
        try {
            $sql = "UPDATE usuarios
                    SET 
                        nombre          =?, 
                        apellidos       =?,
                        dni             =?,
                        fec_nac         =?, 
                        telefono        =?,
                        email           =?,
                        password        =MD5(?)
                    WHERE id_usuario = ?";

            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $usuario->getNombre(),
                                $usuario->getApellidos(),
                                $usuario->getDni(),
                                $usuario->getFec_nac(),
                                $usuario->getTelefono(),
                                $usuario->getPassword()
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function registrar(Usuario $usuario) {
        try {
            $sql = "INSERT INTO usuarios (nombre, apellidos, dni, fec_nac, telefono, email, password) 
		        VALUES (?, ?, ?, ?, ?, ?, MD5(?))";

            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $usuario->getNombre(),
                                $usuario->getApellidos(),
                                $usuario->getDni(),
                                $usuario->getFec_nac(),
                                $usuario->getTelefono(),
                                $usuario->getEmail(),
                                $usuario->getPassword()
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}
