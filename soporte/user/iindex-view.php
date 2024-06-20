<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 08/2019 v1
 */
 ?>
<!--************ Imagen que reemplaza el carousel para dispositivos moviles ********-->
<div id="img-linux-tux" class="container hidden-lg hidden-md hidden-sm">
    <center><img src="img/FILTROS.jpg" class="img-responsive img-rounded" alt="Image"></center>
	<br>
</div>

<!--************************************Carousel******************************-->
<div class="container hidden-xs">
    <div class="col-xs-12">
<div id="carousel-example-generic" class="carousel slide">

  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
	<li data-target="#carousel-example-generic" data-slide-to="4"></li>
  </ol>
    <div class="carousel-inner">
       <div class="item active">
           <img src="img/nattia.jpg" alt="">
          <div class="carousel-caption">
              
          </div>
       </div>
       <div class="item">
          <img src="img/soporte.jpg" alt="">
          <div class="carousel-caption">
               
          </div>
       </div>
   </div>
   <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
       <span class="icon-prev"></span>
   </a>
   <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
     <span class="icon-next"></span>
   </a>
</div>
        </div>
     <div class="col-sm-2">&nbsp;</div>
</div>
<!--************************************ Fin Carousel******************************-->

 <hr class="hidden-xs">

<!--div class="container">
  <div class="row">
    <div class="col-md-12">
        <h1 class="text-center text-info">Fabricante de productos de la más alta calidad a nivel nacional e internacional</h1>
    </div>
  </div>
</div-->
<script>
    $(document).ready(function(){
        $("#carousel-example-generic").carousel({
            interval: 4000,
        });
    });
</script>