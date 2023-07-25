<?php

require_once("navigation.php ");
require_once("conexionBDD.php ");

?>


<h1> Exercice PDO</h1>
<img src="image/elephant1.png" class="elephantPHP" alt="logo elephant PHP">

<div class="container-lg containerExc1">
<h2>Create</h2>

<div class="exercice1">




<form  method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">

<div class=" col mb-3">
                <div>Nom :
                <label for="exampleInputName1" class="form-label"></label>
                <input type="text" class="form-control" name="username" id="exampleInputName1"></div>
                <br>
                <div>Mot de passe :
                <label for="exampleInputmdp" class="form-label"></label>
                <input type="text" class="form-control" name="password" id="exampleInputmdp"></div>
                <br>
                <div>Email :
                <label for="exampleInputEmail1" class="form-label"></label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp"></div>
                <div id="emailHelp" class="form-text"></div>
                <br>
                <button type="submit" name="soumettre" class="btn btn-dark ">Soumettre</button>
              </div>
</form>

<?php



/* condition pour verifier si la variable exist ISSET ,$_POST fait reference a la method puis on appele le "name" de l'imput */
if( isset($_POST['username'] )){
    $username = $_POST ['username'];  
}
if( isset($_POST['password'] )){
    $password = $_POST ['password'];  
}

if( isset($_POST['email'] )){
    $email = $_POST ['email'];  
}

if( isset($_POST['soumettre'] )){
    $soumettre = $_POST ['soumettre'];  
}


//préparation de la requete

$sql = "INSERT INTO users (username,email,password) VALUES (:username, :email, :password)";
$reponse =$connexion->prepare($sql);






if(isset($soumettre)){

//execution de la requete
//La fonction bindValue() permet d’affecter les valeurs des variables  et de les tester avant l’insertion
//PDO::PARAM_STR , on demande à PDO de ne laisser passer que les types de données voulu

$reponse->bindvalue(":username",$username,PDO::PARAM_STR );
$reponse->bindvalue(":email",$email,PDO::PARAM_STR );
$reponse->bindvalue(":password",$password,PDO::PARAM_STR );
$reponse->execute();

echo "Votre utilisateur a bien été créé !!";


//execution de la requete sans verification
/*$reponse->execute(array("username"=>$username,
                        "email"=>$email,
                        "password"=>$password));*/
}
?>