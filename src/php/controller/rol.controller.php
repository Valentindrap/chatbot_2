<?php

include "../clases/rol.class.php";
$operacion=$_POST['operacion'];

if($operacion=="guardar"){
    $rol = new Rol(null, $_POST['nombre']);
    $result=$rol->guardar();

}else if($operacion=="actualizar"){
    $rol = new Rol($_POST['id'], $_POST['nombre']);
    $result=$rol->actualizar(); 

}else if($operacion=="eliminar"){
    $rol = new Rol($_POST['id']);
    $result=$rol->eliminar();
} 
if($result){
    echo "<br>NASHEEEEEEEIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII👌👌👌👌👌👌";
}
else{
    echo "<br>NOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO👌👌👌👌👌👌👌👌👌👌👌👌👌👌👌👌👌👌👌👌👌👌👌👌👌👌👌👌👌";
}
echo "<a href='../listarRol.php'>Volver</a>";


?>