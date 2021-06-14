<?php

require_once '../model/entidades/usuario.php';
require_once '../model/entidades/cliente.php';
require_once '../model/entidades/contacto_emergencia.php';
require_once '../model/entidades/clase.php';
require_once '../model/usuarioDAO.php';
require_once '../model/clienteDAO.php';
require_once '../model/contactoDAO.php';
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

class ClienteController {

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
        $cli = new Cliente();
        $usu = new Usuario();
        $cont = new Contacto_emergencia();

        $this->modelclase->listar() != false ? $fetchallclases = $this->modelclase->listar() : $fetchallclases = array();

        if (isset($_REQUEST['id']) && isset($_REQUEST['id_contacto'])) {
            $cli = $this->modelcliente->obtener($_REQUEST['id']);  //Al DAO le solicitamos recuperar un cliente.
            $usu = $this->modelusuario->obtener($_REQUEST['id']);  //Al DAO le solicitamos recuperar un usuario.
            $cont = $this->modelcontacto->obtener($_REQUEST['id_contacto']);  //Al DAO le solicitamos recuperar un contacto.            
        }
        require_once '../view/header.php';
        require_once '../view/cliente/cliente-index.php';
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

        //Escapando caracteres
        $id = (isset($_POST['id'])) ? htmlspecialchars(trim(strip_tags($_POST ['id']))) : "";  
        $nombre = (isset($_POST['nombre'])) ? htmlspecialchars(trim(strip_tags($_POST ['nombre']))) : ""; 
        $apellidos = (isset($_POST['apellidos'])) ? htmlspecialchars(trim(strip_tags($_POST ['apellidos']))) : ""; 
        $dni = (isset($_POST['dni'])) ? htmlspecialchars(trim(strip_tags($_POST ['dni']))) : ""; 
        $fec_nac = (isset($_POST['fec_nac'])) ? htmlspecialchars(trim(strip_tags($_POST ['fec_nac']))) : ""; 
        $telefono = (isset($_POST['telefono'])) ? htmlspecialchars(trim(strip_tags($_POST ['telefono']))) : ""; 
        $email = (isset($_POST['email'])) ? htmlspecialchars(trim(strip_tags($_POST ['email']))) : ""; 
        $password = (isset($_POST['password'])) ? htmlspecialchars(trim(strip_tags($_POST ['password']))) : ""; 
        $id_contacto = (isset($_POST['id_contacto'])) ? htmlspecialchars(trim(strip_tags($_POST ['id_contacto']))) : ""; 
        $nombre1 = (isset($_POST['nombre1'])) ? htmlspecialchars(trim(strip_tags($_POST ['nombre1']))) : ""; 
        $descripcion1 = (isset($_POST['descripcion1'])) ? htmlspecialchars(trim(strip_tags($_POST ['descripcion1']))) : ""; 
        $telefono1 = (isset($_POST['telefono1'])) ? htmlspecialchars(trim(strip_tags($_POST ['telefono1']))) : ""; 
        $nombre2 = (isset($_POST['nombre2'])) ? htmlspecialchars(trim(strip_tags($_POST ['nombre2']))) : ""; 
        $descripcion2 = (isset($_POST['descripcion2'])) ? htmlspecialchars(trim(strip_tags($_POST ['descripcion2']))) : ""; 
        $telefono2 = (isset($_POST['telefono2'])) ? htmlspecialchars(trim(strip_tags($_POST ['telefono2']))) : ""; 
        
        //Creacion o Actualizacion de contacto
        $cont = new Contacto_emergencia();

        $cont->setId_contacto($id_contacto);
        $cont->setNombre1($nombre1);
        $cont->setDescripcion1($descripcion1);
        $cont->setTelefono1($telefono1);
        $cont->setNombre2($nombre2);
        $cont->setDescripcion2($descripcion2);
        $cont->setTelefono2($telefono2);

        $cont->getId_contacto() > 0 ? $this->modelcontacto->actualizar($cont) : $this->modelcontacto->registrar($cont);

        //Creacion o Actualizacion de usuario
        $usu = new Usuario();

        $usu->setId_usuario($id);
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
    }

    public function eliminar() {
        $this->modelusuario->eliminar($_REQUEST['id']);
        $this->modelcontacto->eliminar($_REQUEST['id_contacto']);
        require_once '../view/header.php';
        require_once '../view/monitor/monitor-index.php';
        require_once '../view/footer.php';
    }

}
