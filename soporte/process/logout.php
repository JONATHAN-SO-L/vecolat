<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 08/2019 v1
 */
 ?>
 <?php
session_start(); 
session_unset();
session_destroy(){
header("Location: ../index.php") 
}
?>