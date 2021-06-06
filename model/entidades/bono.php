<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of bono
 *
 * @author Admin
 */
class bono {
    private $id_bono;
    private $precio;
    private $dias;
    private $num_clases;
    
    function getId_bono() {
        return $this->id_bono;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getDias() {
        return $this->dias;
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

    function setDias($dias): void {
        $this->dias = $dias;
    }

    function setNum_clases($num_clases): void {
        $this->num_clases = $num_clases;
    }


}
