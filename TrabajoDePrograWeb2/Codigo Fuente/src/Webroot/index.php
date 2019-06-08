<?php
date_default_timezone_set('America/Argentina/Buenos_Aires');

define('WEBROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_NAME"]));
define('ROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_FILENAME"]));

require_once ROOT . 'Config/core.php';
require_once ROOT . 'router.php';
require_once ROOT . 'request.php';
require_once ROOT . 'dispatcher.php';

massiveImport('Helpers');
massiveImport('Utils');
massiveImport('Models');

function massiveImport($folder)
{
    $path = ROOT . $folder . "/*.php";
    foreach (glob($path) as $filename)
    {
        require_once "$filename";
    }
}

function throwError404()
{
    http_response_code(404);
    include ROOT . "Views/NoCompletado/noCompletado.php";
    die();
}

function globalExceptionHandler($exception)
{
    $strError = "Error " . $exception->getCode() . ":" . $exception->getMessage();
    echo $strError;
    $strLog = "[". date("Y-m-d H:i:s") ."]" . $strError . PHP_EOL;
    file_put_contents("exception-log.txt", $strLog,FILE_APPEND);
    throwError404();
}

set_exception_handler('globalExceptionHandler');

function getBaseAddress()
{
    $protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https' : 'http';
    $filenamepattern = '/' . basename(__FILE__) . '/';
    $url = $protocol . '://' . $_SERVER['HTTP_HOST'] . preg_replace($filenamepattern, "", $_SERVER['REQUEST_URI']);
    return substr_replace($url, "", strripos($url, "/src/") + 5);
}



function consultarSesionIniciada(){
    if(!isset($_SESSION["loguedo"])){
        echo getBaseAddress();
    }else{
        //sino, calculamos el tiempo transcurrido
        $fechaGuardada = $_SESSION["ultimoAcceso"];
        $ahora = date("Y-n-j H:i:s");
        $tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada));
//comparamos el tiempo transcurrido
        if($tiempo_transcurrido >= 5) {
//si pasaron 10 minutos o más
            session_destroy(); // destruyo la sesión
            echo '<alert>sesion destroy</alert>';
            // header("Location: index.php"); //envío al usuario a la pag. de autenticación
//sino, actualizo la fecha de la sesión
        }else {
            $_SESSION["ultimoAcceso"] = $ahora;
        }
    }}

session_start();

$dispatch = new Dispatcher();
$dispatch->dispatch();
?>
