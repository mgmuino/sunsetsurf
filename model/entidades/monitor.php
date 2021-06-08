<?php

class Monitor {

    private $id_monitor;
    private $num_titulo;
    private $cert_delitos;

    function getId_monitor() {
        return $this->id_monitor;
    }

    function getNum_titulo() {
        return $this->num_titulo;
    }

    function getCert_delitos() {
        return $this->cert_delitos;
    }

    function setId_monitor($id_monitor): void {
        $this->id_monitor = $id_monitor;
    }

    function setNum_titulo($num_titulo): void {
        $this->num_titulo = $num_titulo;
    }

    function setCert_delitos($cert_delitos): void {
        $this->cert_delitos = $cert_delitos;
    }

}
