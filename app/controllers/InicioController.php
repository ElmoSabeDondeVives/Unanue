<?php
require 'app/models/Rol.php';
require 'app/models/Archivo.php';
require 'app/models/Builder.php';
class InicioController{
//Variables fijas para cada llamada al controlador
    private $sesion;
    private $encriptar;
    private $log;
    private $validar;
    private  $builder;
    private $medico;

    public function __construct()
    {
//Instancias fijas para cada llamada al controlador
        $this->encriptar = new Encriptar();
        $this->log = new Log();
        $this->sesion = new Sesion();
        $this->validar = new Validar();
        $this->builder= New Builder();
    }
//Vistas/Opciones
//Vista de acceso al panel de inicio
    public function inicio(){
        try{
//Llamamos a la clase del Navbar, que sólo se usa
// en funciones para llamar vistas y la instaciamos
            $this->nav = new Navbar();
            $navs = $this->nav->listar_menus($this->encriptar->desencriptar($_SESSION['ru'],_FULL_KEY_));
//Hacemos el require de los archivos a usar en las vistas
            require _VIEW_PATH_ . 'inicio/header.php';

            require _VIEW_PATH_ . 'inicio/inicio.php';
            require _VIEW_PATH_ . 'inicio/footer.php';
        } catch (Throwable $e){
//En caso de errores insertamos el error generado y redireccionamos a la vista de inicio
            $this->log->insertar($e->getMessage(), get_class($this).'|'.__FUNCTION__);
            echo "<script language=\"javascript\">alert(\"Error Al Mostrar Contenido. Redireccionando Al Inicio\");</script>";
            echo "<script language=\"javascript\">window.location.href=\"". _SERVER_ ."\";</script>";
        }
    }

}
