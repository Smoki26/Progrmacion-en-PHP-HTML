<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
        <title>Cargar Alumno</title>
        <link rel="icon" href="logo_alumno1.png">
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
            img{
                 width:30px; 
                height:30px;
            }
            
        </style>
        
</head>
<body style="background-color:mediumaquamarine">
    <?php
class Alumno{
          public $apellido;
          public $nombre;
          public $edad;
          public $email;                
      
          function __construct($apellido,$nombre,$edad,$email) {
          $this->apellido = $apellido;
          $this->nombre = $nombre;
          $this->edad = $edad;
          $this->email = $email;
          } 
}       
      ?>
    
    <a title="Volver al inicio" href="index.php"> <img src="logo_inicio.png"  > </a>
      
    <form class="formu" action="Alta_Alumno.php" method="POST" >
          <h1> Cargar Alumno </h1>
          <p>Apellido:</p> 
            <input type="text" name="apellido"  ></br> </br>
            <p>Nombre:</p>   
            <input type="text" name="nombre" ></br> </br>
            <p>Edad:</p>     
            <input type="number" name="edad" ></br> </br>               
            <p>Email:</p>    
            <input type="email" name="email" ></br> </br>
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
       

      
        
        
if ((isset($_POST['apellido']) and isset($_POST['nombre']) and isset($_POST['edad']) and isset($_POST['email']))) {
    if(empty($_POST['apellido'] and $_POST['nombre'] and $_POST['edad'] and $_POST['email'])){
       
        ?>  
    <form>
        <p style="color:red;">"Faltan campos por completar"</p> 
    </form>
                  <?php
}else      {
    $alumno1 = new Alumno($_POST['apellido'],$_POST['nombre'],$_POST['edad'],$_POST['email']); 
       $sqltabla1 = "INSERT INTO tabla1(apellido,nombre,edad,email) VALUE('$alumno1->apellido','$alumno1->nombre','$alumno1->edad','$alumno1->email')";
        
            $ejecutar = mysqli_query($conn, $sqltabla1);
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
</body> 
</html>