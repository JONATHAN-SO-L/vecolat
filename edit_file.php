<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 08/2019 v1
 */
 ?>
<form role="form" action="" method="POST" enctype="multipart/form-data">
<div class="caja">
						<form method="post" for="archivo2" action="" enctype="multipart/form-data">
						<h3> Subtituir Archivo 2</h3>
						<input type="file" name="archivo2[]" id="archivo2" />
						</div>
						
						 <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10 text-center">
                              <button type="submit" class="btn btn-info">Guardar</button>
							  </div>
                          </div>

<?php
							$num_archivo=count($_FILES['logotipo']['name']);
		for ($i=0; $i <=$num_archivo; $i++){
			if(!empty($_FILES['logotipo']['name'][$i])){
				
				$ruta_log="files/empresas/$rfc"; //era rfc
				$logo=$_FILES['logotipo']['name'][$i];
		if(!file_exists($ruta_log)){
						mkdir($ruta_log);
					}
				$ruta_log=$ruta_log."/".$_FILES['logotipo']['name'][$i];
				if(file_exists($ruta_log)){
					echo "";
				}else{
					$ruta_tmplog=$_FILES['logotipo']['tmp_name'][$i];
					move_uploaded_file($ruta_tmplog, $ruta_log);
					echo"";
				}
			}
		}
						?>