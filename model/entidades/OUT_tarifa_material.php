<?php

class Tarifa_material {

    private $id_tarifa;
    private $precio;

    function getId_tarifa() {
        return $this->id_tarifa;
    }

    function getPrecio() {
        return $this->precio;
    }

    function setId_tarifa($id_tarifa): void {
        $this->id_tarifa = $id_tarifa;
    }

    function setPrecio($precio): void {
        $this->precio = $precio;
    }

}
