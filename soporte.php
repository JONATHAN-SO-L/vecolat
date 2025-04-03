<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 08/2019 v1
 */
session_start();
include './lib/class_mysql.php';
include './lib/config.php';
header('Content-Type: text/html; charset=UTF-8');  
?>
<!DOCTYPE html>
<style>
.fa-copyright:before {
    content: "\f1f9";
    display: none;
}
</style>
<html>
    <head><meta charset="utf-8">
        <title>Soporte</title>
        <?php include "./inc/links.php"; ?>        
    </head>
    <body>   
        <?php include "./inc/navbarsop.php"; ?>
        
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div class="page-header">
                <h2 class="animated lightSpeedIn">Soporte Devinsa</h2>
                <span class="label label-primary">Sistemas</span>
                <p class="pull-right text-primary">
                  <strong>
                  <?php include "./inc/timezone.php"; ?>
                 </strong>
               </p>
              </div>
            </div>
          </div>
        </div>

        <?php
            if(isset($_GET['view'])){
                $content=$_GET['view'];
                $WhiteList=["index","productos","soporte","ticket","ticketcon","registro","configuracion","checador","checador1","checador2","Ccomida","Ecomida","Scomida",
                "checadas","reporte","confrh","myticket"];
                if(in_array($content, $WhiteList) && is_file("./user/".$content."-view.php")){
                    include "./user/".$content."-view.php";
                }else{
        ?>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <img src="./img/Stop.png" alt="Image" class="img-responsive"/><br>
                            <img src="./img/SadTux.png" alt="Image" class="img-responsive"/>
                            
                        </div>
                        <div class="col-sm-7 text-center">
                            <h1 class="text-danger">Lo sentimos, la opcion que ha seleccionado no se encuentra disponible</h1>
                            <h3 class="text-info">Por favor intente nuevamente</h3>
                        </div>
                        <div class="col-sm-1">&nbsp;</div>
                    </div>
                </div>
        <?php
                }
            }else{
                include "./user/iindex-view.php";
            }
        ?>

        
      <?php include './inc/foother.php'; ?>
    </body>
</html>
