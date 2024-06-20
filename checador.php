<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 03/2020 v1
 */ 
 date_default_timezone_set('America/Mexico_City');
 $hora = strftime("%H:%M %p");
 $limite = "18:30 pm";
 ?>
 <div class="col-sm-7 text-center">
 <center><h1 class="text-danger"><?php echo strftime("%H:%M %p");?></h1></center>
                             </div>
 <?php
 //if( $limite > $hora ){
 ?>
<style>
 @media screen and (max-width: 980px) {
     body {
display: none;
}
}
</style>
<!DOCTYPE html>
<!--html>
     <head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
        <title>Checador</title>  
<link rel="stylesheet" href="./style.css">		
    </head>
    <body>   
        <div class="box">
		<h2> Login</h2>
		<form role="form" action="login.php" method="POST">
		<div class="inputBox">
		<input type="text" name="usuario" required="">
		<label>Usuario</label>
		</div>
		<div class ="inputBox">
		<input type="password" name="contrasena" required="">
		<label>Password</label>
		</div>
		
              <div class="radio">
                <label>
                    <input type="radio" name="optionsRadios" value="user" checked>
                    Usuario Veco
                </label>
             </div>
			 <div class="radio">
                <label>
                    <input type="radio" name="optionsRadios" value="admin">
                     .
                </label>
             </div>
			 <br>
		<input type="submit" name="" value="Entrar">
		</form>
		</div>		
    </body>
</html-->
 <?php
//}else{
?>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                             <center><img src="./img/altoveco.png" alt="Image" class="img-responsive"/></center>
                            
                        </div>
                        <div class="col-sm-7 text-center">
                             <center><h1 class="text-danger"><font color="navy">Lo sentimos, Apartir del Lunes 01 de Marzo ya no podrás checar aquí</font></h1></center>
                            <center><h3 class="text-info"><font color="navy">El nuevo checador lo encuentras en el Portal Devinsa</font></h3></center>
                            <center><h3 class="text-info"><font color="teal">(www.veco.lat/soporte.php)</font></h3></center>
                        </div>
                        <div class="col-sm-1">&nbsp;</div>
                    </div>
                </div>
        <?php
//}
?>