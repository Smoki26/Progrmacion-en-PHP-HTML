<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
        <title>Cargar Alumno</title>
        <link rel="icon" href="logo_materia2.png">
        <link rel="stylesheet" type="text/css" href="Estilo.css">
        <style>
            form{
                background-color: white;
                border-radius: 3px;
                font-family: Arial;
                padding: 20px;
                margin: 0 auto;
                width: 300px;
                text-align: center;
            }
            input , textarea{
                border: solid 1px #999;
                outline: none;
                padding: 10px;
                width: 280px;
            }
            table {
                font-family: arial, sans-serif;
                border-collapse:collapse;
                width: 100%;
            }

            td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even) { /*filas impares*/
                background-color: #dddddd;
            }
            tr:nth-child(odd) { /*filas pares*/
               
                background-color:activeborder;
            }
            img{
                 width:30px; 
                height:30px;
            }
        </style>
</head>
<body style="background-color:mediumaquamarine;">

    <a title="Volver al inicio" href="index.php"> <img src="logo_inicio.png"  > </a>
    <form action="Modificar_Materia.php" method="POST">
            Digite id<input type="number" name="Nid"> </br> </br>
            Nombre<input type="text" name="nombre"></br> </br>
            Curso<input type="text" name="curso"></br> </br>               
            Carrera<input type="text" name="carrera"></br> </br>
            <input type="submit" value="Guardar"> </br>
    </form>

<?php

        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "basephp";

        if (isset($_POST['nombre']) and isset($_POST['curso']) and isset($_POST['carrera']) and isset($_POST['Nid'])) {
           if(empty($_POST['nombre'] and $_POST['curso'] and $_POST['carrera'] and $_POST['Nid'])){
            ?>  
    <form>
        <p style="color:red;">"Faltan campos por completar"</p> 
    </form>
                  <?php
           }
           else{
               $id = $_POST['Nid'];
               $nombre = $_POST['nombre'];
               $curso = $_POST['curso'];
               $carrera = $_POST['carrera'];
   
$conn = new mysqli($servername, $username, $password, $db);

    
        if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE materia SET nombre='$nombre', curso='$curso', carrera='$carrera' WHERE idMateria = $id";
if (mysqli_query($conn, $sql)) {
    ?>  
    <form>
        <p style="color:greenyellow;">"Datos Modificado"</p> 
    </form>
                  <?php
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
mysqli_close($conn);
           }


}
?>
    </br>
    <table>
            <tr>
                <td>ID</td>
                <td>Nombre</td>
                <td>Curso</td>
                <td>Carrera</td>
            </tr>
<?php
$conn = new mysqli($servername, $username, $password, $db);
$sql = "SELECT * FROM materia";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    ?>
                <tr>
                    <td> <?php echo $row['idMateria'] ?> </td>
                    <td> <?php echo $row['nombre'] ?> </td>
                    <td> <?php echo $row['curso'] ?> </td>
                    <td> <?php echo $row['carrera'] ?> </td>
                </tr>

    <?php
}
mysqli_close($conn);
?>
        </table>

</body>
</html>