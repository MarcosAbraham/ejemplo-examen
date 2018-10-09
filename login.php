<?php
session_start();
require_once'LIGA3/LIGA.php';

BD('localhost', 'root', '', 'SCD');

$usuarios = LIGA ("select * from usuarios where id='$_POST[id]' and pass = md5('$_POST[pass]')");

if ($usuarios->numReg()==1){
    //echo'Si es!!!';
    $_SESSIN['id'] = $usuarios->d('id');
    $_SESSIN['pass'] = $usuarios->d('pass');
    //header('Location: sistema.php');
    echo 'Usuario válido';
}else{
    echo 'Error en los datos';
    //header('Location: index.php?error=1');
    //echo 'No es:S';
}
?>