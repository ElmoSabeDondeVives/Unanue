<?php
/**
 * Created by PhpStorm
 * User: CESARJOSE39
 * Date: 17/09/2020
 * Time: 18:04
 */
//En caso el sistema sea consumido por app móviles, se puede inhabilitar
//el acceso a los WS por este medio
define('_MANTENIMIENTO_WS', 0);
//Si el sistema se encuentra en mantenimiento, habilitamos
//aqui para que nadie pueda acceder a la misma
define('_MANTENIMIENTO_WEB', 0);

/*define('_SERVER_', 'https://hospitalunanue.000webhostapp.com/');
define('_SERVER_DB_', 'localhost');
define('_DB_', 'id21069633_unanuedata');
define('_USER_DB_', 'id21069633_root');
define('_PASSWORD_DB_', 'S3rg10j41m3s.');*/

//Variables globales de uso en todo el sistema
//Establecer Zona Horaria
date_default_timezone_set('America/Lima');
//Definicion de servidor del aplicativo
define('_SERVER_', 'http://localhost:8080/unanue/');
//Definicion de variables para conexion de base de datos
define('_SERVER_DB_', 'localhost');
define('_DB_', 'unanuedata');
define('_USER_DB_', 'root');
define('_PASSWORD_DB_', '');

//Definicion de clave de desencriptacion
define('_FULL_KEY_','ñklmqz');
//Titulo
define('_TITLE_', 'Unanue');
//Rutas de Archivos
define('_STYLES_ALL_', 'styles/');
define('_STYLES_FT_', 'styles/ft/');
define('_STYLES_ADMIN_', 'styles/admin/');
define('_STYLES_LOGIN_', 'styles/login/');
define('_STYLES_INDEX_', 'styles/inicio/');
define('_ICON_', 'media/logos/logo.png');
define('_BANNER_','media/logos/banner.png');
define('_JS_','js/');
define('_VIEW_PATH_', 'app/view/');
define('_assetsview_', 'styles/assets/');
define('_imgvargas_', 'styles/assets/img/tiendavargas/');
define('_STYLES_bt5_', 'styles/bt5/');
define('_LIBS_', 'libs/');
define('_MYSITE_','https://bufeotec.com');
//Tiempo de Cookies
//$tiempo_cookie = dias * horas * minutos * segundos;
define('_TIEMPO_COOKIE',1 * 1 * 60 * 60);
//Version
define('_VERSION_','0.1');


// Manejo de Errores Personalizado de PHP a Try/Catch
function exception_error_handler($severidad, $mensaje, $fichero, $linea) {
    $cadena =  '[LEVEL]: ' . $severidad . ' IN ' . $fichero . ': ' . $linea . '[MESSAGGE]' . $mensaje . "\n";
    $log = new Log();
    $log->insertar($cadena, "Excepcion No Manejada");
    //echo $cadena;
}