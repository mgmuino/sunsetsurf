<?php

/*
 * obtener($id): retorna un objeto de tipo Cliente
 * public function listar(): devuelve un array que contiene todas las filas del conjunto de resultados como objetos Cliente
 *  
 */

require_once 'bd/database.php';
require_once 'model/entidades/cliente.php';
class ClienteDAO
{
    private $pdo;
    
    public function __construct()
	{
		try
		{
			$this->pdo = Database::connect();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM clientes");
			$stm->execute();
                        
			return $stm->fetchAll(PDO::FETCH_CLASS, 'Cliente');
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function obtener($id)
	{ 
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM clientes WHERE id = ?");
			          

			$stm->execute(array($id));
			return $stm->fetchObject("Cliente");
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function eliminar($id)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM clientes WHERE id = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function actualizar(Cliente $cliente)
	{
		try 
		{
			$sql = "UPDATE clientes SET 
						nombre          = ?, 
						apellido        = ?,
                                                correo        = ?,
						sexo            = ?, 
						fechaNacimiento = ?
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $cliente->getNombre(), 
                        $cliente->getCorreo(),
                        $cliente->getApellido(),
                        $cliente->getSexo(),
                        $cliente->getFechaNacimiento(),
                        $cliente->getId()
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function registrar(Cliente $cliente)
	{
		try 
		{
		$sql = "INSERT INTO clientes (nombre,correo,apellido,sexo,fechaNacimiento,fechaRegistro) 
		        VALUES (?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $cliente->getNombre(),
                    $cliente->getCorreo(), 
                    $cliente->getApellido(), 
                    $cliente->getSexo(),
                    $cliente->getFechaNacimiento(),
                    date('Y-m-d')
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
        
        //Otras funciones
        public function buscarPor($nombreCampo, $valorCampo){
            try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM clientes WHERE $nombreCampo='$valorCampo'");
			$stm->execute();
                        
			return $stm->fetchAll(PDO::FETCH_CLASS, 'Cliente');
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
        }
        
        public function alumnosCurso($idCurso){
            
        }
        
        public function relacion($nombreTabla, $idFK){
            
            
        }
        
        //Los métodos comunes a varias clases pueden implementarse en una clase GeneralDAO
}