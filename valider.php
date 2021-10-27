<?php
  include('db.php'); //aqui llamo a $connexion=mysqli_connect("localhost","root","root","connexionDeBase");

  $nom=$_POST['nom'];// recibo del formulario
  $password=$_POST['password'];//recibo del formulario
  session_start();
  $_SESSION['nom']=$nom;


  $requête="SELECT*FROM users where nom='$nom' and password='$password'";// busqueda a la base de datos
  $résultat=mysqli_query($connexion,$requête);

  $files=mysqli_num_rows($résultat);// este metodo guarda el resultado

  if($files){
    
      header("location:home.php");

  }else{
      ?>
      <?php
      include("index.html");
    ?>
    <h1 class="bad">ERROR DE AUTENTIFICACION</h1>
    <?php
  }
  mysqli_free_result($résultat);
  mysqli_close($connexion);
