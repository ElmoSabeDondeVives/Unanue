<?php
require 'app/models/Rol.php';
require 'app/models/Archivo.php';
require 'app/models/Builder.php';
class MedicosController{
//Variables fijas para cada llamada al controlador
private $sesion;
private $encriptar;
private $log;
private $validar;
private  $builder;

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
public function registro(){
try{
//Llamamos a la clase del Navbar, que sólo se usa
// en funciones para llamar vistas y la instaciamos
$this->nav = new Navbar();
$navs = $this->nav->listar_menus($this->encriptar->desencriptar($_SESSION['ru'],_FULL_KEY_));
//Hacemos el require de los archivos a usar en las vistas
require _VIEW_PATH_ . 'header.php';
require _VIEW_PATH_ . 'navbar.php';
require _VIEW_PATH_ . 'medicos/registro.php';
require _VIEW_PATH_ . 'footer.php';
} catch (Throwable $e){
//En caso de errores insertamos el error generado y redireccionamos a la vista de inicio
$this->log->insertar($e->getMessage(), get_class($this).'|'.__FUNCTION__);
echo "<script language=\"javascript\">alert(\"Error Al Mostrar Contenido. Redireccionando Al Inicio\");</script>";
echo "<script language=\"javascript\">window.location.href=\"". _SERVER_ ."\";</script>";
}
}
public function list(){
try{
//Llamamos a la clase del Navbar, que sólo se usa
// en funciones para llamar vistas y la instaciamos
$this->nav = new Navbar();
$navs = $this->nav->listar_menus($this->encriptar->desencriptar($_SESSION['ru'],_FULL_KEY_));
$medicos= $this->builder->list('medicos', array(
    'nombre_medico','apellidos_medico', 'dni_medico','estado_medico'
));
//Hacemos el require de los archivos a usar en las vistas
require _VIEW_PATH_ . 'header.php';
require _VIEW_PATH_ . 'navbar.php';
require _VIEW_PATH_ . 'medicos/list.php';
require _VIEW_PATH_ . 'footer.php';
} catch (Throwable $e){
//En caso de errores insertamos el error generado y redireccionamos a la vista de inicio
$this->log->insertar($e->getMessage(), get_class($this).'|'.__FUNCTION__);
echo "<script language=\"javascript\">alert(\"Error Al Mostrar Contenido. Redireccionando Al Inicio\");</script>";
echo "<script language=\"javascript\">window.location.href=\"". _SERVER_ ."\";</script>";
}
}
public function save_medic(){
        //Código de error general
        $result = 2;
        //Mensaje a devolver en caso de hacer consulta por app
        $message = 'OK';
        try{
            $ok_data = true;
            //Validamos que todos los parametros a recibir sean correctos. De ocurrir un error de validación,
            //$ok_true se cambiará a false y finalizara la ejecucion de la funcion
            $ok_data = $this->validar->validar_parametro('dni_medico', 'POST',true,$ok_data,10,'numero',0);
            $ok_data = $this->validar->validar_parametro('nombre_medico', 'POST',true,$ok_data,150,'texto',0);
            $ok_data = $this->validar->validar_parametro('apellidos_medico', 'POST',false,$ok_data,150,'texto',0);
            //Validacion de datos
            if($ok_data){
                $result = $this->builder->save('medicos',array(
                    'dni_medico'=>$_POST['dni_medico'],
                    'nombre_medico'=>$_POST['nombre_medico'],
                    'apellidos_medico'=>$_POST['apellidos_medico'],
                    'direccion_medico'=>$_POST['direccion_medico'],
                    'telefono_medico'=>$_POST['telefono_medico'],
                    'email_medico'=>$_POST['email_medico'],
                    'id_especialidad'=>$_POST['id_especialidad'],
                    'estado_medico'=>1,
                    'fecha_creacion' => date('Y-m-d H:i:s')
                ));

            } else {
                //Código 6: Integridad de datos erronea
                $result = 6;
                $message = "Integridad de datos fallida. Algún parametro se está enviando mal";
            }
        } catch (Exception $e){
            //Registramos el error generado y devolvemos el mensaje enviado por PHP
            $this->log->insertar($e->getMessage(), get_class($this).'|'.__FUNCTION__);
            $message = $e->getMessage();
        }
        //Retornamos el json
        echo json_encode(array("result" => array("code" => $result, "message" => $message)));
    }

}
