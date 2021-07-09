<?php
//HACEMOS LA CONEXION CON LA BBDD
if ($_POST['password'] != $_POST['password1']) {
	echo "<br>"."<h2>"."La contraseña no coincide, verifique"."</h2>";
	echo "<h5"."Regresar al Login: >"."<a href='index.html'>Login</a>"."</h5>";

}else{

$host_db = "localhost";   //donde esta la base de datos
$user_db = "root";        //el usuario del php my admin
$pass_db = "";            //clave por defecto vacio para root
$db_name = "registro";    //nombre de la base de datos
$tbl_name = "usuarios";   //me sirve para ver usuarios repetidos se coloca el nombre de la tabla
$tbl_correo = "usuarios";
//ENCRIPTAR LOS DATOS DE CLAVE
$form_pass = $_POST['password'];
$hash = password_hash($form_pass, PASSWORD_BCRYPT);

//CONECTARME HACIA LA BBDD
$conexion= new mysqli ($host_db, $user_db, $pass_db, $db_name);
if ($conexion->connect_error) { // -> especie de puntero que manda a llamar

	die("la conexion fallo: ".$conexion->connect_error);//como un eco o print
}
//BUSCAR UN USUARIO REPETIDO
$buscar_usuario = "SELECT * FROM $tbl_name WHERE nombre_usuario='$_POST[username]'";
$result=$conexion->query($buscar_usuario); //se hace la consulta
$buscar_correo = "SELECT * FROM $tbl_correo WHERE correo= '$_POST[correo]'";
$result_correo = $conexion->query($buscar_correo);
//COMPARAR SI ESQUE HAY USUARIOS REPETIDOS
$count_correo = mysqli_num_rows($result_correo);
$count = mysqli_num_rows($result);
if ($count_correo == 1) {
	echo "<br>"."El correo ingresado ya existe."."<br> ";
	echo "<a href='index.html'> porfavor escoge otro correo</a>";
}else{
	if ($count == 1) {
	echo "<br>"."El nombre de Usuario ya existe."."<br> ";
	echo "<a href='index.html'> porfavor escoge otro nombre</a>";
	}else{
	$query = "INSERT INTO usuario (nombre_usuario,password,correo) VALUES ('$_POST[username]','$hash','$_POST[correo]')";
	if ($conexion->query($query)==TRUE) {
		echo "<br>"."<h2>"."Usuario creado exitosamente"."</h2>";
		echo "<h4>"."Bienvenido:".$_POST['username'] ."</h4>";
		echo "<h5"."Nuevo Login: >"."<a href='index.html'>Login</a>"."</h5>";
	}else{
		echo "Error al crear el usuario.".$query."<br>".$connect->error;
    }
  }
 }
}
?>