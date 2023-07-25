<?php

//Ouverture de connexion sur la base de données
$bdd = 'mysql:host=localhost;dbname=bdo';
$username= 'root';
$password= '';


//Vérification de connexion
try{
    $connexion = new PDO ($bdd, $username, $password );
    //echo "connexion reussi !";
}catch(PDOException $e){
    echo "erreur de connexion : ".$e->getMessage();
}
?>