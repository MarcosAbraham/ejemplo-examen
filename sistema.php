<?php
session_start();
if (empty($_SESSION['id']) && empty($_SESSION['pass'])){
    require_once 'LIGA3/LIGA.php';
    
BD('localhost', 'root', '', 'SCD');
    
    HTML::cabeceras(array('title'=>'sistema seguro', 'description'=>'lo que sea...'));
    
    $body = array ('contenedor'=>array('uno'=>'<p>Usuario válido</p>',
                                       'dos'=>'<a href="cerrar.php">Cerrar sesión</a>'));
    $tabla = 'usuarios';
 $liga  = LIGA($tabla);
 
  $cols = array('*', '-pass');
  $join = array('depende'=>$liga);
  HTML::tabla($liga, 'Instancias de '.$tabla, $cols, true, $join);
    HTML::cuerpo($body);
    
    
    HTML:: pie();
}else{
   header('Location: .?error=1');
}
?>