<?php
class tipoclase {
    private $nombre_tipo;
    private $descripcion;
    
    function getNombre_tipo() {
        return $this->nombre_tipo;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setNombre_tipo($nombre_tipo): void {
        $this->nombre_tipo = $nombre_tipo;
    }

    function setDescripcion($descripcion): void {
        $this->descripcion = $descripcion;
    }


}
