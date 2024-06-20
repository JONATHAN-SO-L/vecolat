<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 08/2019 v1
 */
function Conectarse(){
	
 $link = mysqli_connect("localhost", "veco_dvi", "Vec83Dv19iSa@");
 if(!$link)
	 exit();
 $con=mysqli_select_db("veco_ticket",$link);
 if(!$con)
	 exit();
 return $link;
}
?>