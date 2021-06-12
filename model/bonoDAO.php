<?php

/*
 * obtener($id): retorna un objeto de tipo Bono
 * public function listar(): devuelve un array que contiene todas las filas del conjunto de resultados como objetos Bono
 *  
 */

require_once '../bd/conexion.php';
require_once '../model/entidades/bono.php';

class BonoDAO {

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

            $stm = $this->pdo->prepare("SELECT id_bono, precio, num_clases
                                        FROM bonos");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_CLASS, 'Bono');
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function obtener($id) {
        try {
            $stm = $this->pdo->prepare("SELECT id_bono, precio, num_clases
                                        FROM bonos
                                        WHERE id_bono = ?");


            $stm->execute(array($id));
            return $stm->fetchObject("Bono");
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
