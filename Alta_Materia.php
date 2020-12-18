<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
        <title>Cargar Materia</title>
        <link rel="icon" href="logo_materia1.png">
        <link href="Estilo.css" rel="stylesheet" type="text/css" >
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
            img{
                 width:30px; 
                height:30px;
            }
        </style>
        
</head>
<body style="background-color:mediumaquamarine;">
<?php 
class Materia{        
          public $nombre;
          public $curso;
          public $carrera;                
      
          function __construct($nombre,$curso,$carrera) {
          $this->nombre = $nombre;
          $this->curso = $curso;
          $this->carrera = $carrera;
          } 
}       
      ?>
      <a title="Volver al inicio" href="index.php"> <img src="logo_inicio.png"  > </a>
    <form action="Alta_Materia.php" method="POST">
            <h1>Cargar Materia</h1>
            <p>Nombre:</p>
            <input type="text" name="nombreM" ></br> </br>
            <p>Curso:</p>
            <input type="text" name="cursoM" ></br> </br>
            <p>Carrera:</p>
            <input type="text" name="carreraM" ></br> </br>                          
            <input type="submit" value="Guardar"> </br>

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
        

        
        //--------------------------------------------------------------------------------------
        //cargar MATERIA
        //--------------------------------------------------------------------------------------
          if (isset($_POST['nombreM']) and isset($_POST['cursoM']) and isset($_POST['carreraM'])) {  
              
              if(empty($_POST['nombreM'] and $_POST['cursoM'] and $_POST['carreraM'])){
                    
                      ?>  
    <form>
        <p style="color:red;">"Faltan campos por completar"</p> 
    </form>
                  <?php
              }else{
                $materia1 = new Materia($_POST['nombreM'],$_POST['cursoM'],$_POST['carreraM']);             
                $sqltabla2 = "INSERT INTO materia(nombre,curso,carrera) VALUE('$materia1->nombre','$materia1->curso','$materia1->carrera')";
        
                $ejecutar = mysqli_query($conn, $sqltabla2);
              if ($ejecutar == 1) {
                  ?>  
    <form>
        <p style="color:greenyellow;">"Datos Guardado"</p> 
    </form>
                  <?php
             }else {
                    
                 echo "Erro al guardar datoss, faltan campos por completar";
             }
             mysqli_close($conn);
            }
          }
        //--------------------------------------------------------------------------------------
        
?>

</body>
</html>