<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
        <title>Modificar Alumno</title>
        <link rel="icon" href="logo_alumno2.png">
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
    <form action="Modificar_Alumno.php" method="POST">
            Digite una id<input type="number" name="Nid"> </br> </br>
            Apellido<input type="text" name="apellido"></br> </br>
            Nombre<input type="text" name="nombre"></br> </br>
            Edad<input type="number" name="edad"></br> </br>               
            Email<input type="email" name="email"></br> </br>
            <input type="submit" value="Guardar"> </br>
    </form>
    
<?php

        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "basephp";
             
          //--------------------------------------------------------------------------------  

if (isset($_POST['apellido']) and isset($_POST['nombre']) and isset($_POST['edad']) and isset($_POST['email'])) {
     if(empty($_POST['apellido'] and $_POST['nombre'] and $_POST['edad'] and $_POST['email'])){
    ?>  
    <form>
        <p style="color:red;">"Faltan campos por completar"</p> 
    </form>
                  <?php
     }
     else{
         $id = $_POST['Nid'];
    $lastname = $_POST['apellido'];
    $name = $_POST['nombre'];
    $age = $_POST['edad'];
    $mail = $_POST['email'];
 
    $conn = new mysqli($servername, $username, $password, $db);

    
   if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
      }

    $sql = "UPDATE tabla1 SET apellido='$lastname', nombre='$name', edad='$age', email='$mail' WHERE idalumno = $id";
       if (mysqli_query($conn, $sql)) {
            ?>  
    <form>
        <p style="color:greenyellow;">"Datos Modificado"</p> 
    </form>
                  <?php
      }else {
           echo "Error al modificar: " . mysqli_error($conn);
      }
      mysqli_close($conn);
     }


}
  ?>
 <?php 
 
 $conn = new mysqli($servername, $username, $password, $db);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        echo "</br>" . "Usted esta conectado a la Base de Datos" . "</br>" . "</br>";
        
        ?>
    
        <table>
            <tr>
                <td>ID</td>
                <td>Apellido</td>
                <td>Nombre</td>
                <td>Edad</td>
                <td>Email</td>
            </tr>
<?php
$sql = "SELECT * FROM tabla1 WHERE edad <> 0 ";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    ?>
                <tr>
                    <td> <?php echo $row['idalumno'] ?> </td>
                    <td> <?php echo $row['apellido'] ?> </td>
                    <td> <?php echo $row['nombre'] ?> </td>
                    <td> <?php echo $row['edad'] ?> </td>
                    <td> <?php echo $row['email'] ?> </td>
                </tr>

    <?php
}
mysqli_close($conn);
?>
        </table>
    
</body>

</html>