<?php

include "../clases/categoria.class.php";
$operacion=$_POST['operacion'];

if($operacion=="guardar"){
    $categoria = new Categoria(null, $_POST['nombre']);
    $result=$categoria->guardar();

}else if($operacion=="actualizar"){
    $categoria = new Categoria($_POST['id'], $_POST['nombre']);
    $result=$categoria->actualizar(); 

}else if($operacion=="eliminar"){
    $categoria = new Categoria($_POST['id']);
    $result=$categoria->eliminar();
} 
if($result){
    echo "<br>Categoria agregada";
}
else{
    echo "<br>ha surgido un oproblema";
}
echo "<a href='../listarCategoria.php'>Volver</a>";


?>