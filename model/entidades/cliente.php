<?php

class Cliente {

    private $id_cliente;
    private $num_clases;
    private $id_contacto_emerg;

    function getId_cliente() {
        return $this->id_cliente;
    }

    function getNum_clases() {
        return $this->num_clases;
    }

    function getId_contacto_emerg() {
        return $this->id_contacto_emerg;
    }

    function setId_cliente($id_cliente): void {
        $this->id_cliente = $id_cliente;
    }

    function setNum_clases($num_clases): void {
        $this->num_clases = $num_clases;
    }

    function setId_contacto_emerg($id_contacto_emerg): void {
        $this->id_contacto_emerg = $id_contacto_emerg;
    }

}
