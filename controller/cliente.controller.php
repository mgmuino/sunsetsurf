<?php

require_once 'model/clienteDAO.php';
require_once 'model/entidades/cliente.php';
require_once 'model/entidades/contacto_emergencia.php';

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
        require_once 'view/header.php';
        require_once 'view/cliente/cliente.php';
        require_once 'view/footer.php';
    }

    public function editar() {
        $cli = new Cliente();

        if (isset($_REQUEST['id'])) {
            $cli = $this->modelcliente->obtener($_REQUEST['id']);  //Al DAO le solicitamos recuperar un cliente.
        }

        require_once 'view/header.php';
        require_once 'view/cliente/cliente-editar.php';
        require_once 'view/footer.php';
    }

    public function guardar() {
        /* Para realizar la validación podemos implementarla aquí o llamar a un método que nos recoja los datos del 
          Request y nos devuelva un bool para continuar y redirigir al index o para retornarnos al formulario de edición. */

        //Después de la validación
        $id = $_REQUEST['id'];
        $nombre = $_REQUEST['Nombre'];
        $apellido = $_REQUEST['Apellido'];
        $correo = $_REQUEST['Correo'];
        $sexo = $_REQUEST['Sexo'];
        $fechaNacimiento = $_REQUEST['FechaNacimiento'];

        $cli = new Cliente();

        $cli->setId($id);
        $cli->setNombre($nombre);
        $cli->setApellido($apellido);
        $cli->setCorreo($correo);
        $cli->setSexo($sexo);
        $cli->setFechaNacimiento($fechaNacimiento);

        $cli->getId_cliente() > 0 ? $this->modelcliente->actualizar($cli) : $this->modelcliente->registrar($cli);

        header('Location: index.php');
    }

    public function eliminar() {
        $this->modelusuario->eliminar($_REQUEST['id_usuario']);
        $this->modelcontacto->eliminar($_REQUEST['id_contacto_emerg']);
        header('Location: index.php');
    }

}
