<?php
	$usuario = "veco_dvi";
	$password = "Vec83Dv19iSa@";
	$servidor = "localhost";
	$basededatos = "veco_sims_devecchi";
	$conexion = mysqli_connect( $servidor, $usuario, $password ) or die ("No se ha podido conectar al servidor de Base de datos");
	$conexion ->set_charset('utf8');
	$conexion->query("SET NAMES UTF8");
    $conexion->query("SET CHARACTER SET utf8");
	$db = mysqli_select_db( $conexion, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );

			$nombre= $_POST['usuario'];
			$clave=md5($_POST['contrasena']);
			$radio= $_POST['optionsRadios'];
			
   //$nombre=MysqlQuery::RequestPost("usuario");
    //$clave=md5(MysqlQuery::RequestPost("password"));
    //$radio=MysqlQuery::RequestPost('optionsRadios');
    if($nombre!="" && $clave!="" && $radio!=""){
        if($radio=="devecchi"){
            $sql="SELECT * FROM usuario_devecchi WHERE email_devecchi= '$nombre' AND clave ='$clave'";
	$result = mysqli_query($conexion, $sql) or die ( "Algo ha ido mal en la consulta a la base de datos");
		
		
            if(mysqli_num_rows($result)>=1){
                $reg=mysqli_fetch_array($result, MYSQLI_ASSOC);
                $_SESSION['id']=$reg['id'];
                $_SESSION['nombre']=$reg['nombre'];
                $_SESSION['nombre_usuario']=$reg['nombre_usuario'];
                $_SESSION['clave']=$clave;
                $_SESSION['email_devecchi']=$reg['email'];
				$_SESSION['telefono']=$reg['telefono'];
                $_SESSION['tipo']="devecchi";
		header ('Location: key_vista.php');
            }else{
               echo '<script language="javascript">
				alert("credenciales incorrectas favor de intentarlo. Gracias");
				window.location.href="key_dvi.php"</script>';
            }
        } 
		
		
		else{
            echo '<script language="javascript">
				alert("No existe el usuario expecificado");
				window.location.href="key_dvi.php"</script>';
        }
    }else{
        echo '
            <div class="alert alert-danger alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="text-center">OCURRIÓ UN ERROR</h4>
                <p class="text-center">
                    No puedes dejar ningún campo vacío
                </p>
            </div>
        ';
    }
	
?>