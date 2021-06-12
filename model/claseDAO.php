<?php

/*
 * obtener($id): retorna un objeto de tipo Clase
 * public function listar(): devuelve un array que contiene todas las filas del conjunto de resultados como objetos Clase
 *  
 */

require_once '../bd/conexion.php';
require_once '../model/entidades/clase.php';

class ClaseDAO {

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

            $stm = $this->pdo->prepare("SELECT id_clase, nombre_tipo, id_monitor, fecha, lugar, asistentes
                                        FROM clases
                                        INNER JOIN monitores ON clases.id_monitor=monitores.id_monitor
                                        INNER JOIN tipos_clase ON clases.nombre_tipo=tipos_clase.nombre_tipo");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_CLASS, 'Clase');
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function obtener($id) {
        try {
            $stm = $this->pdo->prepare("SELECT id_clase, nombre_tipo, id_monitor, fecha, lugar, asistentes
                                        FROM clases 
                                        INNER JOIN monitores ON clases.id_monitor=monitores.id_monitor
                                        INNER JOIN tipos_clase ON clases.nombre_tipo=tipos_clase.nombre_tipo
                                        WHERE id_clase = ?");


            $stm->execute(array($id));
            return $stm->fetchObject("Clase");
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function eliminar($id) {
        try {
            $stm = $this->pdo->prepare("DELETE FROM clases WHERE id_clase = ?");

            $stm->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function actualizar(Clase $clase) {
        try {
            $sql = "UPDATE clases
                    SET 
                        nombre_tipo = ?, 
                        id_monitor = ?, 
                        fecha = ?, 
                        lugar = ?, 
                        asistentes = ?
                    WHERE id_clase = ?";

            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $clase->getNombre_tipo(),
                                $clase->getId_monitor(),
                                $clase->getFecha(),
                                $clase->getLugar(),
                                $clase->getAsistentes()
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function registrar(Clase $clase) {
        try {
            $sql = "INSERT INTO clases (nombre_tipo, id_monitor, fecha, lugar, asistentes) 
		        VALUES (?, ?, ?, ?, 0)";

            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $clase->getNombre_tipo(),
                                $clase->getId_monitor(),
                                $clase->getFecha(),
                                $clase->getLugar()                                
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}
