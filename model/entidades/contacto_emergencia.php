<?php

class Contacto_emergencia {

    private $id_contacto;
    private $nombre1;
    private $descripcion1;
    private $telefono1;
    private $nombre2;
    private $descripcion2;
    private $telefono2;

    function getId_contacto() {
        return $this->id_contacto;
    }

    function getNombre1() {
        return $this->nombre1;
    }

    function getDescripcion1() {
        return $this->descripcion1;
    }

    function getTelefono1() {
        return $this->telefono1;
    }

    function getNombre2() {
        return $this->nombre2;
    }

    function getDescripcion2() {
        return $this->descripcion2;
    }

    function getTelefono2() {
        return $this->telefono2;
    }

    function setId_contacto($id_contacto): void {
        $this->id_contacto = $id_contacto;
    }

    function setNombre1($nombre1): void {
        $this->nombre1 = $nombre1;
    }

    function setDescripcion1($descripcion1): void {
        $this->descripcion1 = $descripcion1;
    }

    function setTelefono1($telefono1): void {
        $this->telefono1 = $telefono1;
    }

    function setNombre2($nombre2): void {
        $this->nombre2 = $nombre2;
    }

    function setDescripcion2($descripcion2): void {
        $this->descripcion2 = $descripcion2;
    }

    function setTelefono2($telefono2): void {
        $this->telefono2 = $telefono2;
    }

}
