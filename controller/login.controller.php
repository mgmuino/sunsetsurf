<?php

require_once '../model/entidades/usuario.php';
require_once '../model/entidades/cliente.php';
require_once '../model/entidades/monitor.php';
require_once '../model/usuarioDAO.php';
require_once '../model/clienteDAO.php';
require_once '../model/monitorDAO.php';


/*
 * ¿Qué va a hacer el controlador?
 * Implementar las diferentes acciones que se pueden ejecutar desde la vista. 
 * Instanciar al modelo.
 * Modificar sus propiedades (cuando sea necesario).
 * Llamar a uno de sus métodos (el cual, nos retornará algún dato).
 * Enviar los datos retornados por el modelo a la vista.
 */

//Pendiente implementar validación en servidor

class LoginController {

    private $modelusuario; //Representa las operaciones de BD para el usuario.
    private $modelcontacto; //Representa las operaciones de BD para el contacto.
    private $modelcliente; //Representa las operaciones de BD para el cliente.  
    private $modelmonitor; //Representa las operaciones de BD para el cliente.  

    public function __construct() {
        $this->modelusuario = new UsuarioDAO();
        $this->modelcontacto = new ContactoDAO();
        $this->modelcliente = new ClienteDAO();
        $this->modelmonitor = new MonitorDAO();
    }

    public function index() {
        require_once '../view/header.php';
        require_once '../view/indexview.php';
        require_once '../view/footer.php';
    }

    public function autenticar() {
        $user = $_REQUEST['user'];
        $password = $_REQUEST['password'];

        $id_cliente = $this->modelcliente->getUserid($user);
        $id_usuario = $this->modelusuario->getUserid($user);
        $id_monitor = $this->modelmonitor->getUserid($user);

        if ($this->modelusuario->autenticar($user, $password) && ($id_cliente['id_cliente'] == $id_usuario['id_usuario'])) {
            echo "<script>alert('Usuario valido');</script>";
            require_once '../view/header.php';
            require_once '../view/cliente/cliente.php';
            require_once '../view/footer.php';
        } else if ($this->modelusuario->autenticar($user, $password) && ($id_monitor['id_monitor'] == $id_usuario['id_usuario'])) {
            echo "<script>alert('Usuario valido');</script>";
            require_once '../view/header.php';
            require_once '../view/monitor/monitor.php';
            require_once '../view/footer.php';
        } else {
            echo "<script>alert('Usuario no valido');</script>";
        }
    }

    public function logout() {
        session_start();
        // Borramos toda la sesion
        session_destroy();
        header('Location: ?');
    }

}
