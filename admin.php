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

if($_SESSION['tipo']!="admin"){
    session_start(); 
    session_unset();
    session_destroy();
    header("Location: ./soporte.php"); 
}
?>
<!DOCTYPE html>
<html>
    <head><meta charset="gb18030">
        <title>Administracion</title>
        <?php include "./inc/links.php"; ?>        
    </head>
    <body>   
        <?php include "./inc/navbarsop.php"; ?>
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div class="page-header">
                <h1 class="animated lightSpeedIn">Panel Administrativo</h1>
                <span class="label label-danger">sistemas</span>
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
            $WhiteList=["ticketadmin","checador","ticketedit","users","admin","config","equipo","preventivo","ticketpre","checador","checador1","checador2","pass","ticketpredit"];
            if(isset($_GET['view']) && in_array($_GET['view'], $WhiteList) && is_file("./admin/".$_GET['view']."-view.php")){
                include "./admin/".$_GET['view']."-view.php";
            }else{
                echo '<h2 class="text-center">Lo sentimos, la opcion que ha seleccionado no se encuentra disponible</h2>';
            }
        ?>


        <?php include './inc/foother.php'; ?>
        <script>
        $(document).ready(function (){

            $("#input_user").keyup(function(){
                $.ajax({
                    url:"./process2/val_admin.php?id="+$(this).val(),
                    success:function(data){
                        $("#com_form").html(data);
                    }
                });
            });


            $("#input_user2").keyup(function(){
                $.ajax({
                    url:"./process2/val_admin.php?id="+$(this).val(),
                    success:function(data){
                        $("#com_form2").html(data);
                    }
                });
            });

        });
        </script>
    </body>
</html>
