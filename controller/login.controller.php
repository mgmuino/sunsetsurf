<?php

require_once '../model/entidades/usuario.php';
require_once '../model/entidades/cliente.php';
require_once '../model/entidades/monitor.php';
require_once '../model/entidades/clase.php';
require_once '../model/usuarioDAO.php';
require_once '../model/clienteDAO.php';
require_once '../model/monitorDAO.php';
require_once '../model/claseDAO.php';


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
    private $modelclase; //Representa las operaciones de BD para las clases.

    public function __construct() {
        $this->modelusuario = new UsuarioDAO();
        $this->modelcontacto = new ContactoDAO();
        $this->modelcliente = new ClienteDAO();
        $this->modelmonitor = new MonitorDAO();
        $this->modelclase = new ClaseDAO();
    }

    public function index() {
        require_once '../view/header.php';
        require_once '../view/indexview.php';
        require_once '../view/footer.php';
    }

    public function autenticar() {
        $user = $_REQUEST['user'];
        $password = $_REQUEST['password'];

        $usu = new Usuario();
        $cli = new Cliente();
        $moni = new Monitor();

        $usu = $this->modelusuario->getUserid($user);
        $cli = $this->modelcliente->getUserid($user);
        $moni = $this->modelmonitor->getUserid($user);

        $this->modelusuario->getUserid($user) != false ? $usu = $this->modelusuario->obtener($usu->getId_usuario()) : $usu = new Usuario();
        $this->modelcliente->getUserid($user) != false ? $cli = $this->modelcliente->obtener($cli->getId_cliente()) : $cli = new Cliente();
        $this->modelmonitor->getUserid($user) != false ? $moni = $this->modelmonitor->obtener($moni->getId_monitor()) : $moni = new Monitor();

        if ($this->modelusuario->autenticar($user, $password) && ($cli->getId_cliente() == $usu->getId_usuario())) {
            session_start();
            $_SESSION["id_cliente"] = $cli->getId_cliente();
            $_SESSION["nombre"] = $usu->getNombre();
            $_SESSION["id_contacto"] = $cli->getId_contacto_emerg();
            echo "<script>alert('Bienvenido '" . $_SESSION["nombre"] . "'.');</script>";
            header('Location: ?c=cliente&a=index&id=' . $cli->getId_cliente() . '&id_contacto=' . $cli->getId_contacto_emerg());
        } else if ($this->modelusuario->autenticar($user, $password) && ($moni->getId_monitor() == $usu->getId_usuario())) {
            session_start();
            $_SESSION["id_monitor"] = $moni->getId_monitor();
            $_SESSION["nombre"] = $usu->getNombre();            
            echo "<script>alert('Bienvenido '" . $_SESSION["nombre"] . "'.');</script>";
            header('Location: ?c=monitor&a=index');
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
