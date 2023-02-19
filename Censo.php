<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Censo</title>
    <style>
    body{
        width: 65%;
        background-color:black;
        color:white;
        margin:auto;
        font-size: large;
    }
        .resul{
width: 870px;
margin: 5px auto;
padding: 3px;
border: aqua 2px solid;
color:aquamarine;
text-align: center;

    }
</style>
</head>
<body>
    <h1 class="resul">Censo</h1>
    <p>Del censo realizado en una población se conocen los siguientes datos,<br> almacenados en
una tabla llamada Población: <br>
- DNI<br>
- Nombre<br>
- Día de nacimiento (2 dígitos)<br>
- Mes de nacimiento (2 dígitos)<br>
- Año de nacimiento (4 dígitos)<br>
- Sexo (‘M’: masculino / ‘F’: femenino)<br>
Desarrollar el programa que determine e imprima:<br>
a) Cuantos nacimientos hubo en el mes de octubre de todos los años.<br>
b) Cuantos nacimientos hubo antes del 9 de julio de 1970.<br>
c) Cuantos nacimientos de mujeres hubo en la primavera de 1942.<br>
d) Sexo y Nombre de la persona más anciana (solo existe una).</p>
    
<?php
require_once "dalessandro_javierconectar.php";

$consigna1="SELECT COUNT(*) FROM población WHERE mesDeNacimiento = 10 ";
$consulta=mysqli_query($conexion,$consigna1);
$resul=mysqli_fetch_array($consulta);
echo " <h2 class='resul'>La cantidad de nacimientos en octubre de todos los años fue = " . $resul[0] . "</h2><br>";


$consigna2="SELECT COUNT(*) FROM población WHERE anioDeNacimiento < 1970 or (anioDeNacimiento = 1970 and mesDeNacimiento <=7 and diaDeNacimiento <9)";
$consulta1=mysqli_query($conexion,$consigna2);
$resul2=mysqli_fetch_array($consulta1);
echo "<h2 class='resul'>La cantidad de nacimientos que hubo antes del 9 de julio de 1970 fue = " . $resul2[0] . "</h2><br>";

$consigna3="SELECT COUNT(*) FROM población WHERE sexo = 'F' AND ( anioDeNacimiento = 1942 and mesDeNacimiento = 9 and  diaDeNacimiento Between 21 and 30) or ( anioDeNacimiento = 1942 and mesDeNacimiento = 12 and  diaDeNacimiento Between 1 and 20) or anioDeNacimiento = 1942 and mesDeNacimiento = 10 or anioDeNacimiento = 1942 and  mesDeNacimiento = 11 "; 
$consulta2=mysqli_query($conexion,$consigna3);
$resul3=mysqli_fetch_array($consulta2);
echo "<h2 class='resul'>La cantidad de nacimientos que hubo en la primavera de 1942 fue = " . $resul3[0] . "</h2><br>";

$consigna4="SELECT nombre,sexo from población where anioDeNacimiento =(select Min(anioDeNacimiento) from población ) ORDER BY mesDenacimiento,diaDeNacimiento asc LIMIT 1  ";
$consulta3=mysqli_query($conexion,$consigna4);
while($fila=mysqli_fetch_array($consulta3)){
echo " <h2 class='resul'>La persona mas anciana es de sexo ".  $fila["sexo"] . " y su nombre es " . $fila["nombre"] . "</h2>";


}







//and  mesDeNacimiento <= 12 and diaDeNacimiento <21   between  (mesDeNacimiento >9 and diaDeNacimiento >=21) ";
?>









</body>
</html>