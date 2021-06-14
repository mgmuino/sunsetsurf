<?php

require_once 'bd/conexion.php';
require_once 'model/entidades/usuario.php';

class UsuarioDAO {

    private $pdo;

    public function __construct() {
        try {
            $this->pdo = Conexion::connect();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //Metodo que comprueba la existencia de un usuario
    public function existuser($dni, $email) {
        try {
            $stm = $this->pdo->prepare("SELECT dni, email FROM usuarios WHERE (dni = ? || email = ?) ");


            $stm->execute(array($dni, $email));
            return $stm->fetchObject("Usuario");
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
//Metodo que obtiene un usuario segun la id
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
//Metodo que borra un usuario
    public function eliminar($id) {
        try {
            $stm = $this->pdo->prepare("DELETE FROM usuarios WHERE id_usuario = ?");

            $stm->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
//Metodo que acutaliza un usuario
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
                                $usuario->getEmail(),
                                $usuario->getPassword(),
                                $usuario->getId_usuario()
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
//Metodo que registra un nuevo usuario
    public function registrar(Usuario $usuario) {
        try {
            $sql = "INSERT INTO usuarios (nombre, apellidos, dni, fec_nac, telefono, email, password) 
		        VALUES (?, ?, ?, ?, ?, ?, SHA1(?));";

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
//Metodo que devuelve el usuario creado mas reciente
    public function masReciente() {
        try {
            $stm = $this->pdo->prepare("SELECT    id_usuario, nombre, apellidos, dni, fec_nac, telefono, email
                                        FROM      usuarios
                                        ORDER BY  id_usuario DESC
                                        LIMIT     1;");

            $stm->execute();
            return $stm->fetchObject("Usuario");
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
//Metodo que autentixa un usuario contra la base de datos
    public function autenticar($user, $password) {
        try {
            $stm = $this->pdo->prepare("SELECT * 
                                        FROM usuarios 
                                        WHERE (dni = ? || email = ?) AND password = SHA1(?);");

            $stm->execute(array($user, $user, $password));
            $resultuser = $stm->fetch();
            
            if ($resultuser) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //Metodo que devuelve la id de un usuario segun su email o dni (login)
    public function getUserid($user) {
        try {
            $stm = $this->pdo->prepare("SELECT id_usuario 
                                        FROM usuarios 
                                        WHERE (dni = ? || email = ?);");

            $stm->execute(array($user, $user));
            $resultuser = $stm->fetchObject("Usuario");
             return $resultuser;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
