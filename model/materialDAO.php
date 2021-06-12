<?php

/*
 * obtener($id): retorna un objeto de tipo Material
 * public function listar(): devuelve un array que contiene todas las filas del conjunto de resultados como objetos Material
 *  
 */

require_once '../bd/conexion.php';
require_once '../model/entidades/material.php';

class MaterialDAO {

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

            $stm = $this->pdo->prepare("SELECT id_material, nombre, marca, descripcion, id_tarifa
                                        FROM materials");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_CLASS, 'Material');
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function obtener($id) {
        try {
            $stm = $this->pdo->prepare("SELECT id_material, nombre, marca, descripcion, id_tarifa
                                        FROM materials
                                        WHERE id_material = ?");


            $stm->execute(array($id));
            return $stm->fetchObject("Material");
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
