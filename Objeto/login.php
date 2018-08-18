<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 15/08/2018
 * Time: 07:47
 */

class login
{

    public $usuario;
    public $rol;


    public function __construct()
    {
        if (isset($_SESSION['usuario'])) {
            $this->usuario = $_SESSION['usuario'];
            $this->rol = $_SESSION['rol'];
        }
    }

    /**
     * @return mixed
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param mixed $usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }


    /**
     * @return mixed
     */






    public function getRol()
    {
        return $this->rol;
    }

    /**
     * @param mixed $rol
     */
    public function setRol($rol)
    {
        $this->rol = $rol;
    }

    /**
     * @return mixed
     */

}