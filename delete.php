<?php

require_once("navigation.php ");
require_once("conexionBDD.php ")

?>


<h1> Exercice PDO</h1>
<img src="image/elephant1.png" class="elephantPHP" alt="logo elephant PHP">

<div class="container-lg containerExc1">
<h2>Delete</h2>

<div class="exercice1">

<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Username</th>
      <th scope="col">Mail</th>
      <th scope="col">Password</th>
      <th scope="col">Supprimer</th>
    </tr>
 </thead>


<?php
if( isset($_POST['soumettre'] )){
  $soumettre = $_POST ['soumettre'];  
}


//préparation de la requete
$sql="DELETE FROM users WHERE id=:id";
$reponse =$connexion->prepare($sql);

// Affichage de la requete avec le tableau 
$requete = $connexion->query("SELECT id,username,email,password FROM users" );
//création de la boucle pour effectuer la requete
while($ligne= $requete->fetch ( )): ?>


    <tbody>
    <tr>
        <th scope="row"><?php echo"$ligne[id]";?></th>
        <td><?php echo"$ligne[username]";?></td>
        <td><?php echo"$ligne[email]";?></td>
        <td><?php echo"$ligne[password]";?></td>
        <td><form  method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
          <!-- création du bouton on passe en php la valeur de l'id -->
        <button type="submit" name="soumettre" value="<?= $ligne['id']?>" class="btn btn-primary ">Supprimer</button>
      </form>
      </td>
    </tr>
    </tbody>

   <?php endwhile; ?>  

   <?php




if(isset($soumettre)){


//execution de la requete en fesant reference au bouton
$id=$_POST ['soumettre'];
$reponse->execute(array(":id"=>$id ));


}
   ?>
  
</table>
</div>    




<?php


?>