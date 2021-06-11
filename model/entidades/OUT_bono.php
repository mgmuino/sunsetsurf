<?php
class Bono {
    private $id_bono;
    private $precio;
    private $num_clases;
    
    function getId_bono() {
        return $this->id_bono;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getNum_clases() {
        return $this->num_clases;
    }

    function setId_bono($id_bono): void {
        $this->id_bono = $id_bono;
    }

    function setPrecio($precio): void {
        $this->precio = $precio;
    }

    function setNum_clases($num_clases): void {
        $this->num_clases = $num_clases;
    }


}
