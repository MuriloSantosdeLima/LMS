<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('./src/infra/Router.php');
require_once('./src/infra/Util.php');
$path = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_SERVER['REQUEST_METHOD'];
Router::addRoute('GET','/LMS/administracao/filadeprocessos','PageController','filaProcessos');
Router::addRoute('GET','/LMS/administracao/listarprocessos','PageController','listarprocessos');
Router::addRoute('GET','/LMS/administracao/cadastro','PageController','formProcesso');
Router::addRoute('GET','/LMS/administracao/processo/deletar','PageController','deletarProcesso');
Router::addRoute('POST','/LMS/administracao/cadastro','PageController','cadastrarProcesso');
Router::addRoute('POST','/LMS/administracao/processo/editar','PageController','editarProcesso');
Router::addRoute('POST','/LMS/administracao/integrar-volk','PageController','integrarVolkLMS');
if (!Router::routerExec($method, $path)) {
    Util::redirectPageTo("/LMS/administracao/filadeprocessos"); 
}
?>
