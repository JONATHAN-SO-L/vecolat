<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 08/2019 v1
 */
 ?>
<?php
include '../lib/class_mysql.php';
include '../lib/config.php';

$sql=  Mysql::consulta("SELECT rfc FROM empresas WHERE rfc='".MysqlQuery::RequestGet('id')."'");

if(mysqli_num_rows($sql)>0){
    echo '<span class="glyphicon glyphicon-remove form-control-feedback"></span>';
    echo '<label class="control-label" for="inputSuccess2" style="margin-top:10px; color: #f30808;";>El RFC ya existe, por favor elige otro RFC para la empresa</label>';
}else{
    echo '<span class="glyphicon glyphicon-ok form-control-feedback"></span>';
}