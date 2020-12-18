<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
        <title>Inscripciones</title>
        <link rel="icon" href="logo_inscripcion.png">
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
                border-collapse: collapse;
                width: 40%;
                margin: 40px;
                float:left;
            }

            td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }
            tr:nth-child(odd) {
                background-color:activeborder;
            }
            
            tr:nth-child(even) {
                background-color: #dddddd;
            }
            img{
                 width:30px; 
                height:30px;
            }
        </style>   
</head>
<body style="background-color:mediumaquamarine;">
    
 
    <a title="Volver al inicio" href="index.php"> <img src="logo_inicio.png"  > </a>
    <form action="Inscripcion.php" method="POST"> 
        Id del Alumno<input type="number" name="idA"><br></br>
        id de la Materia<input type="number" name="idM"><br></br>
        <input type="submit" value="Guardar" name="btn1"></br>  
    </form>
    
<?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "basephp";
        $conn = new mysqli($servername, $username, $password, $db);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
       
        
          if (isset($_POST['idA']) and isset($_POST['idM']) and isset($_POST['btn1'])) {
              if(empty($_POST['idA'] and $_POST['idM'])){
              ?>  
    <form>
        <p style="color:red;">"Faltan campos por completar"</p> 
    </form>
                  <?php
                  
          }else{
              $valor1 = $_POST['idA'];
              $valor2 = $_POST['idM'];          
              $sql1 = "INSERT INTO inscripciones (idalumno,idMateria) VALUE('$valor1','$valor2')";
        
            $ejecutar = mysqli_query($conn, $sql1);
            if ($ejecutar == 1) {
                 ?>  
    <form>
        <p style="color:greenyellow;">"Datos Guardado"</p> 
    </form>
                  <?php
            } else {
                echo "Erro al guardar datoss, faltan campos por completar";
            }
            mysqli_close($conn);
          }
        }
          
         
        
        
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
$conn = new mysqli($servername, $username, $password, $db);
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