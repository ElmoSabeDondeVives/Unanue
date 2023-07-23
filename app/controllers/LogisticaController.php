<?php
require 'app/models/Rol.php';
require 'app/models/Archivo.php';
require 'app/models/Builder.php';
/*require 'app/models/Medico.php';*/
class LogisticaController{
//Variables fijas para cada llamada al controlador
private $sesion;
private $encriptar;
private $log;
private $validar;
private  $builder;
/*private $medico;*/

public function __construct()
{
//Instancias fijas para cada llamada al controlador
$this->encriptar = new Encriptar();
$this->log = new Log();
$this->sesion = new Sesion();
$this->validar = new Validar();
$this->builder= New Builder();
/*$this->medico= New Medico();*/
}
//Vistas/Opciones
//Vista de acceso al panel de inicio
public function config(){
try{
//Llamamos a la clase del Navbar, que sólo se usa
// en funciones para llamar vistas y la instaciamos
$this->nav = new Navbar();
$navs = $this->nav->listar_menus($this->encriptar->desencriptar($_SESSION['ru'],_FULL_KEY_));
$servicios = $this->builder->list('servicios',array('*'));
//Hacemos el require de los archivos a usar en las vistas
require _VIEW_PATH_ . 'header.php';
require _VIEW_PATH_ . 'navbar.php';
require _VIEW_PATH_ . 'logistica/config.php';
require _VIEW_PATH_ . 'footer.php';
} catch (Throwable $e){
//En caso de errores insertamos el error generado y redireccionamos a la vista de inicio
$this->log->insertar($e->getMessage(), get_class($this).'|'.__FUNCTION__);
echo "<script language=\"javascript\">alert(\"Error Al Mostrar Contenido. Redireccionando Al Inicio\");</script>";
echo "<script language=\"javascript\">window.location.href=\"". _SERVER_ ."\";</script>";
}
}
public function especialidades(){
try{
//Llamamos a la clase del Navbar, que sólo se usa
// en funciones para llamar vistas y la instaciamos
$this->nav = new Navbar();
$navs = $this->nav->listar_menus($this->encriptar->desencriptar($_SESSION['ru'],_FULL_KEY_));
$especialidades = $this->builder->list('especialidades',array('*'));
//Hacemos el require de los archivos a usar en las vistas
require _VIEW_PATH_ . 'header.php';
require _VIEW_PATH_ . 'navbar.php';
require _VIEW_PATH_ . 'logistica/especialidades.php';
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
$medicos= $this->medico->list_doctors();
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
public function save_service(){
        //Código de error general
        $result = 2;
        //Mensaje a devolver en caso de hacer consulta por app
        $message = 'OK';
        try{
            $ok_data = true;
            //Validamos que todos los parametros a recibir sean correctos. De ocurrir un error de validación,
            //$ok_true se cambiará a false y finalizara la ejecucion de la funcion
            $ok_data = $this->validar->validar_parametro('name_service', 'POST',true,$ok_data,80,'texto',0);
            //Validacion de datos
            if($ok_data){
                $result = $this->builder->save('servicios',array(
                    'nombre_servicio'=>$_POST['name_service'],
                    'estado_servicio'=>0,
                    'fecha_crecion' => date('Y-m-d H:i:s')
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
public function save_espe(){
        //Código de error general
        $result = 2;
        //Mensaje a devolver en caso de hacer consulta por app
        $message = 'OK';
        try{
            $ok_data = true;
            //Validamos que todos los parametros a recibir sean correctos. De ocurrir un error de validación,
            //$ok_true se cambiará a false y finalizara la ejecucion de la funcion
            $ok_data = $this->validar->validar_parametro('name_espe', 'POST',true,$ok_data,80,'texto',0);
            //Validacion de datos
            if($ok_data){
                $result = $this->builder->save('especialidades',array(
                    'nombre_especialidad'=>$_POST['name_espe'],
                    'estado_especialidad'=>0,
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
public function save_edit_service(){
        //Código de error general
        $result = 2;
        //Mensaje a devolver en caso de hacer consulta por app
        $message = 'OK';
        try{
            $ok_data = true;
            //Validamos que todos los parametros a recibir sean correctos. De ocurrir un error de validación,
            //$ok_true se cambiará a false y finalizara la ejecucion de la funcion
            $ok_data = $this->validar->validar_parametro('id_service', 'POST',true,$ok_data,10,'numero',0);
            $ok_data = $this->validar->validar_parametro('name_service', 'POST',true,$ok_data,80,'texto',0);
            //Validacion de datos
            if($ok_data){
                $result = $this->builder->update('servicios',array(
                    'nombre_servicio'=>$_POST['name_service'],
                    'estado_servicio'=>$_POST['estado_service'],
                ),array(
                    'id_servicio'=>$_POST['id_service']
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
public function save_edit_espe(){
        //Código de error general
        $result = 2;
        //Mensaje a devolver en caso de hacer consulta por app
        $message = 'OK';
        try{
            $ok_data = true;
            //Validamos que todos los parametros a recibir sean correctos. De ocurrir un error de validación,
            //$ok_true se cambiará a false y finalizara la ejecucion de la funcion
            $ok_data = $this->validar->validar_parametro('id_especialidad', 'POST',true,$ok_data,10,'numero',0);
            $ok_data = $this->validar->validar_parametro('name_especialidad', 'POST',true,$ok_data,80,'texto',0);
            //Validacion de datos
            if($ok_data){
                $result = $this->builder->update('especialidades',array(
                    'nombre_especialidad'=>$_POST['name_especialidad'],
                    'estado_especialidad'=>$_POST['estado_especialidad'],
                ),array(
                    'id_especialidad'=>$_POST['id_especialidad']
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
