<?php

require_once("navigation.php ");
require_once("conexionBDD.php ")

?>


<h1> Exercice PDO</h1>
<img src="image/elephant1.png" class="elephantPHP" alt="logo elephant PHP">

<div class="container-lg containerExc1">
<h2>Read</h2>

<div class="exercice1">

<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Username</th>
      <th scope="col">Mail</th>
      <th scope="col">Password</th>
    </tr>
 </thead>


<?php

//préparation de la requete
$requete = $connexion->query("SELECT id,username,email,password FROM users" );


//création de la boucle pour effectuer la requete
while($ligne= $requete->fetch ( )): ?>


    <tbody>
    <tr>
        <th scope="row"><?php echo"$ligne[id]";?></th>
        <td><?php echo"$ligne[username]";?></td>
        <td><?php echo"$ligne[email]";?></td>
        <td><?php echo"$ligne[password]";?></td>
    </tr>
    </tbody>

   <?php endwhile; ?>  
    
  
</table>
</div>    

 


  