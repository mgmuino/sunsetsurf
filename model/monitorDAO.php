<?php

/*
 * obtener($id): retorna un objeto de tipo Monitor
 * public function listar(): devuelve un array que contiene todas las filas del conjunto de resultados como objetos Monitor
 *  
 */

require_once '../bd/conexion.php';
require_once '../model/entidades/monitor.php';

class MonitorDAO {

    private $pdo;

    public function __construct() {
        try {
            $this->pdo = Conexion::connect();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listar() {
        try {
            $result = array();

            $stm = $this->pdo->prepare("SELECT id_monitor, nombre, apellidos, dni, fec_nac, telefono, email, num_titulo, cert_delitos
                                        FROM monitores
                                        INNER JOIN usuarios ON monitores.id_monitor=usuarios.id_usuario");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_CLASS, 'Monitor');
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function obtener($id) {
        try {
            $stm = $this->pdo->prepare("SELECT id_monitor, nombre, apellidos, dni, fec_nac, telefono, email, num_titulo, cert_delitos 
                                        FROM monitores 
                                        INNER JOIN usuarios ON monitores.id_monitor=usuarios.id_usuario
                                        WHERE id_monitor = ?");


            $stm->execute(array($id));
            return $stm->fetchObject("Monitor");
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function eliminar($id) {
        try {
            $stm = $this->pdo->prepare("DELETE FROM monitores WHERE id_monitor = ?");

            $stm->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function actualizar(Monitor $monitor) {
        try {
            $sql = "UPDATE monitores
                    SET 
                        num_titulo=?,
                        cert_delitos=?
                    WHERE id_monitor = ?";

            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $monitor->getNum_titulo(),
                                $monitor->getCert_delitos()
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function registrar(Monitor $monitor) {
        try {
            $sql = "INSERT INTO monitores (num_titulo, cert_delitos) 
		        VALUES (?, ?)";

            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $monitor->getNum_titulo(),
                                $monitor->getCert_delitos()
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getUserid($user) {
        try {
            $stm = $this->pdo->prepare("SELECT id_monitor 
                                        FROM monitores 
                                        INNER JOIN usuarios ON monitores.id_monitor=usuarios.id_usuario
                                        WHERE (dni = ? || email = ?);");

            $stm->execute(array($user, $user));
            $resultuser = $stm->fetch();
            return $resultuser;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}
