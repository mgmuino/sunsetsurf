<?php
class usuario {
    private $id_usuario;
    private $nombre;
    private $apellidos;
    private $dni;
    private $fec_nac;
    private $telefono;
    private $email;
    private $password;
    
    function getId_usuario() {
        return $this->id_usuario;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function getDni() {
        return $this->dni;
    }

    function getFec_nac() {
        return $this->fec_nac;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function setId_usuario($id_usuario): void {
        $this->id_usuario = $id_usuario;
    }

    function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    function setApellidos($apellidos): void {
        $this->apellidos = $apellidos;
    }

    function setDni($dni): void {
        $this->dni = $dni;
    }

    function setFec_nac($fec_nac): void {
        $this->fec_nac = $fec_nac;
    }

    function setTelefono($telefono): void {
        $this->telefono = $telefono;
    }

    function setEmail($email): void {
        $this->email = $email;
    }

    function setPassword($password): void {
        $this->password = $password;
    }


}
