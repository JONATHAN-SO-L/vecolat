<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 08/2019 v1
 */
  
  $bdconectada = mysql_connect('localhost','veco_dvi','Vec83Dv19iSa@');
 $conexion = mysqli_select_db('veco_ticket', $bdconectada);
 $conexion -> set_charset("utf8"); 
 
?>
