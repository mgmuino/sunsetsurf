<?php

require_once 'model/entidades/usuario.php';
require_once 'model/entidades/cliente.php';
require_once 'model/entidades/contacto_emergencia.php';
require_once 'model/entidades/clase.php';
require_once 'model/usuarioDAO.php';
require_once 'model/clienteDAO.php';
require_once 'model/contactoDAO.php';
require_once 'model/claseDAO.php';


/*
 * ¿Qué va a hacer el controlador?
 * Implementar las diferentes acciones que se pueden ejecutar desde la vista. 
 * Instanciar al modelo.
 * Modificar sus propiedades (cuando sea necesario).
 * Llamar a uno de sus métodos (el cual, nos retornará algún dato).
 * Enviar los datos retornados por el modelo a la vista.
 */

//Pendiente implementar validación en servidor

class MonitorController {

    private $modelusuario; //Representa las operaciones de BD para el usuario.
    private $modelcontacto; //Representa las operaciones de BD para el contacto.
    private $modelcliente; //Representa las operaciones de BD para el cliente.
    private $modelclase; //Representa las operaciones de BD para las clases.

    public function __construct() {
        $this->modelusuario = new UsuarioDAO();
        $this->modelcontacto = new ContactoDAO();
        $this->modelcliente = new ClienteDAO();
        $this->modelclase = new ClaseDAO();
    }

    public function index() {
        
        $this->modelclase->listar() != false ? $fetchallclases = $this->modelclase->listar() : $fetchallclases = array();

        require_once 'view/header.php';
        require_once 'view/monitor/monitor-index.php';
        require_once 'view/footer.php';
    }

    public function eliminarclase() {
        $this->modelclase->eliminar($_REQUEST['id']);
        require_once 'view/header.php';
        require_once 'view/monitor/monitor-index.php';
        require_once 'view/footer.php';
    }

}
