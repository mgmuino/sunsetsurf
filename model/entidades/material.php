<?php
class Material {
    private $id_material;
    private $nombre;
    private $marca;
    private $talla;
    
    function getId_material() {
        return $this->id_material;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getMarca() {
        return $this->marca;
    }

    function getTalla() {
        return $this->talla;
    }

    function setId_material($id_material): void {
        $this->id_material = $id_material;
    }

    function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    function setMarca($marca): void {
        $this->marca = $marca;
    }

    function setTalla($talla): void {
        $this->talla = $talla;
    }


}
