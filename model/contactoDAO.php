<?php

require_once '../bd/conexion.php';
require_once '../model/entidades/contacto_emergencia.php';

class ContactoDAO {

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
            $stm = $this->pdo->prepare("SELECT id_contacto, nombre1, descripcion1, telefono1, nombre2, descripcion2, telefono2 
                                        FROM contactos_emergencia 
                                        WHERE id_contacto = ?");


            $stm->execute(array($id));
            return $stm->fetchObject("Contacto_emergencia");
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function eliminar($id) {
        try {
            $stm = $this->pdo->prepare("DELETE FROM contactos_emergencia WHERE id_contacto = ?");

            $stm->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function actualizar(Contacto_emergencia $contacto_emergencia) {
        try {
            $sql = "UPDATE contactos_emergencia
                    SET 
                        nombre1          =?, 
                        descripcion1     =?,
                        telefono1        =?,
                        nombre2          =?, 
                        descripcion2     =?,
                        telefono2        =?
                    WHERE id_contacto = ?";

            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $contacto_emergencia->getNombre1(),
                                $contacto_emergencia->getDescripcion1(),
                                $contacto_emergencia->getTelefono1(),
                                $contacto_emergencia->getNombre2(),
                                $contacto_emergencia->getDescripcion2(),
                                $contacto_emergencia->getTelefono2()
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function registrar(Contacto_emergencia $contacto_emergencia) {
        try {
            $sql = "INSERT INTO contactos_emergencia (nombre1, descripcion1, telefono1, nombre2, descripcion2, telefono2) 
		        VALUES (?, ?, ?, ?, ?, ?)";

            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $contacto_emergencia->getNombre1(),
                                $contacto_emergencia->getDescripcion1(),
                                $contacto_emergencia->getTelefono1(),
                                $contacto_emergencia->getNombre2(),
                                $contacto_emergencia->getDescripcion2(),
                                $contacto_emergencia->getTelefono2()
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function masReciente() {
        try {
            $stm = $this->pdo->prepare("SELECT    id_contacto, nombre1, descripcion1, telefono1, nombre2, descripcion2, telefono2
                                        FROM      contactos_emergencia
                                        ORDER BY  id_contacto DESC
                                        LIMIT     1;");

            $stm->execute();
            return $stm->fetchObject("Contacto_emergencia");
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}
