<?php

/*
 * obtener($id): retorna un objeto de tipo Cliente
 * public function listar(): devuelve un array que contiene todas las filas del conjunto de resultados como objetos Cliente
 *  
 */

require_once 'bd/conexion.php';
require_once 'model/entidades/cliente.php';

class ClienteDAO {

    private $pdo;

    public function __construct() {
        try {
            $this->pdo = Conexion::connect();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
//Metodo que devuelve todos los clientes existentes
    public function listar() {
        try {
            $result = array();

            $stm = $this->pdo->prepare("SELECT id_cliente, nombre, apellidos, dni, fec_nac, telefono, email, num_clases, id_contacto_emerg, nombre1, descripcion1, telefono1, nombre2, descripcion2, telefono2
                                        FROM clientes
                                        INNER JOIN usuarios ON clientes.id_cliente=usuarios.id_usuario
                                        INNER JOIN contactos_emergencia ON clientes.id_contacto_emerg=contactos_emergencia.id_contacto");
            $stm->execute();

            return $stm->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
//Metodo que devuelve un cliente
    public function obtener($id) {
        try {
            $stm = $this->pdo->prepare("SELECT id_cliente, nombre, apellidos, dni, fec_nac, telefono, email, num_clases, id_contacto_emerg, nombre1, descripcion1, telefono1, nombre2, descripcion2, telefono2
                                        FROM clientes 
                                        INNER JOIN usuarios ON clientes.id_cliente=usuarios.id_usuario
                                        INNER JOIN contactos_emergencia ON clientes.id_contacto_emerg=contactos_emergencia.id_contacto
                                        WHERE id_cliente = ?");


            $stm->execute(array($id));
            return $stm->fetchObject("Cliente");
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
//Metodo que borra un cliente especifico (No esta implementado porque se borra en CASCADE en la BD al borrar usuario)
//    public function eliminar($id) {
//        try {
//            $stm = $this->pdo->prepare("DELETE FROM clientes WHERE id_cliente = ?");
//
//            $stm->execute(array($id));
//        } catch (Exception $e) {
//            die($e->getMessage());
//        }
//    }

//Metodo que actualiza un cliente
    public function actualizar(Cliente $cliente) {
        try {
            $sql = "UPDATE clientes
                    SET 
                        num_clases = ?
                    WHERE id_cliente = ?";

            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $cliente->getNum_clases()
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
//Metodo que registra un cliente
    public function registrar(Cliente $cliente) {
        try {
            $sql = "INSERT INTO clientes (id_cliente, num_clases, id_contacto_emerg) 
		        VALUES (?, 0, ?)";

            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $cliente->getId_cliente(),
                                $cliente->getId_contacto_emerg()
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
//Metodo que devuelve la id de un cliente segun su email o dni (login)
    public function getUserid($user) {
        try {
            $stm = $this->pdo->prepare("SELECT id_cliente 
                                        FROM clientes 
                                        INNER JOIN usuarios ON clientes.id_cliente=usuarios.id_usuario
                                        WHERE (dni = ? || email = ?);");

            $stm->execute(array($user, $user));
            $resultuser = $stm->fetchObject("Cliente");
            return $resultuser;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}
