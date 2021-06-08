<?php

class Clase {

    private $id_clase;
    private $nombre_tipo;
    private $id_monitor;
    private $fecha;
    private $lugar;
    private $asistentes;

    function getId_clase() {
        return $this->id_clase;
    }

    function getNombre_tipo() {
        return $this->nombre_tipo;
    }

    function getId_monitor() {
        return $this->id_monitor;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getLugar() {
        return $this->lugar;
    }

    function getAsistentes() {
        return $this->asistentes;
    }

    function setId_clase($id_clase): void {
        $this->id_clase = $id_clase;
    }

    function setNombre_tipo($nombre_tipo): void {
        $this->nombre_tipo = $nombre_tipo;
    }

    function setId_monitor($id_monitor): void {
        $this->id_monitor = $id_monitor;
    }

    function setFecha($fecha): void {
        $this->fecha = $fecha;
    }

    function setLugar($lugar): void {
        $this->lugar = $lugar;
    }

    function setAsistentes($asistentes): void {
        $this->asistentes = $asistentes;
    }

}
