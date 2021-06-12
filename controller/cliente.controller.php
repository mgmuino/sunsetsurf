<?php

require_once '../model/entidades/usuario.php';
require_once '../model/entidades/cliente.php';
require_once '../model/entidades/contacto_emergencia.php';
require_once '../model/usuarioDAO.php';
require_once '../model/clienteDAO.php';
require_once '../model/contactoDAO.php';


/*
 * ¿Qué va a hacer el controlador?
 * Implementar las diferentes acciones que se pueden ejecutar desde la vista. 
 * Instanciar al modelo.
 * Modificar sus propiedades (cuando sea necesario).
 * Llamar a uno de sus métodos (el cual, nos retornará algún dato).
 * Enviar los datos retornados por el modelo a la vista.
 */

//Pendiente implementar validación en servidor

class ClienteController {

    private $modelusuario; //Representa las operaciones de BD para el usuario.
    private $modelcontacto; //Representa las operaciones de BD para el contacto.
    private $modelcliente; //Representa las operaciones de BD para el cliente.  

    public function __construct() {
        $this->modelusuario = new UsuarioDAO();
        $this->modelcontacto = new ContactoDAO();
        $this->modelcliente = new ClienteDAO();
    }

    public function index() {
        require_once '../view/header.php';
        require_once '../view/cliente/cliente.php';
        require_once '../view/footer.php';
    }

    public function editar() {
        $cli = new Cliente();
        $usu = new Usuario();
        $cont = new Contacto_emergencia();

        if (isset($_REQUEST['id']) && isset($_REQUEST['id_contacto'])) {
            $cli = $this->modelcliente->obtener($_REQUEST['id']);  //Al DAO le solicitamos recuperar un cliente.
            $usu = $this->modelusuario->obtener($_REQUEST['id']);  //Al DAO le solicitamos recuperar un usuario.
            $cont = $this->modelcontacto->obtener($_REQUEST['id_contacto']);  //Al DAO le solicitamos recuperar un contacto.            
        }
        require_once '../view/header.php';
        require_once '../view/cliente/cliente-editar.php';
        require_once '../view/footer.php';
    }

    public function guardar() {
        /* Para realizar la validación podemos implementarla aquí o llamar a un método que nos recoja los datos del 
          Request y nos devuelva un bool para continuar y redirigir al index o para retornarnos al formulario de edición. */

        //Después de la validación
        $id = $_REQUEST['id'];
        $nombre = $_REQUEST['nombre'];
        $apellidos = $_REQUEST['apellidos'];
        $dni = $_REQUEST['dni'];
        $fec_nac = $_REQUEST['fec_nac'];
        $telefono = $_REQUEST['telefono'];
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $id_contacto = $_REQUEST['id_contacto'];
        $nombre1 = $_REQUEST['nombre1'];
        $descripcion1 = $_REQUEST['descripcion1'];
        $telefono1 = $_REQUEST['telefono1'];
        $nombre2 = $_REQUEST['nombre2'];
        $descripcion2 = $_REQUEST['descripcion2'];
        $telefono2 = $_REQUEST['telefono2'];

        //Creacion o Actualizacion de contacto
        $cont = new Contacto_emergencia();
        
        $cont->setNombre1($nombre1);
        $cont->setDescripcion1($descripcion1);
        $cont->setTelefono1($telefono1);
        $cont->setNombre2($nombre2);
        $cont->setDescripcion2($descripcion2);
        $cont->setTelefono2($telefono2);

        $cont->getId_contacto() > 0 ? $this->modelcontacto->actualizar($cont) : $this->modelcontacto->registrar($cont);

        //Creacion o Actualizacion de usuario
        $usu = new Usuario();
        
        $usu->setNombre($nombre);
        $usu->setApellidos($apellidos);
        $usu->setDni($dni);
        $usu->setFec_nac($fec_nac);
        $usu->setTelefono($telefono);
        $usu->setEmail($email);
        $usu->setPassword($password);

        if ($usu->getId_usuario() > 0) {
            $this->modelusuario->actualizar($usu);
        } else {
            $this->modelusuario->registrar($usu);
            
            $cli = new Cliente();
            $cli->setId_cliente($this->modelusuario->masReciente()->getId_usuario());
            $cli->setId_contacto_emerg($this->modelcontacto->masReciente()->getId_contacto());
            $this->modelcliente->registrar($cli);
        }
        header('Location: index.php');
    }

    public function eliminar() {
        $this->modelusuario->eliminar($_REQUEST['id_usuario']);
        $this->modelcontacto->eliminar($_REQUEST['id_contacto_emerg']);
        header('Location: index.php');
    }

}
