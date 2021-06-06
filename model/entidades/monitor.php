<?php
class monitor extends usuario{
    private $num_titulo;
    private $cert_delitos;
    
    function getNum_titulo() {
        return $this->num_titulo;
    }

    function getCert_delitos() {
        return $this->cert_delitos;
    }

    function setNum_titulo($num_titulo): void {
        $this->num_titulo = $num_titulo;
    }

    function setCert_delitos($cert_delitos): void {
        $this->cert_delitos = $cert_delitos;
    }


}
