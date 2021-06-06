<?php
class cliente extends usuario{
    private $num_clases;
    private $id_contacto_emerg;
    
    function getNum_clases() {
        return $this->num_clases;
    }

    function getId_contacto_emerg() {
        return $this->id_contacto_emerg;
    }

    function setNum_clases($num_clases): void {
        $this->num_clases = $num_clases;
    }

    function setId_contacto_emerg($id_contacto_emerg): void {
        $this->id_contacto_emerg = $id_contacto_emerg;
    }


}
