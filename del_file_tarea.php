<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 08/2019 v1
 */

 include ("conexi.php");
include 'edit_tarea.php';

	$dir= $_GET['id'];
		if(file_exists($dir)){ 
		if(unlink($dir)) 
			
				echo  '<div class="alert alert-info alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                    <a href="tarea.php" class="alert-link"><span aria-hidden="true">Cerrar</span></a>
                    <h4 class="text-center">El Archivo fue Borrado</h4>
                    <p class="text-center">
                        Favor de CERRAR esta ventana para validar información
                    </p>
                </div>
            ';
		}else{
		print "Este archivo no existe"; 
		}
?>