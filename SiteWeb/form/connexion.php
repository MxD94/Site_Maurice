<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "formulaire";

$conn = mysqli_connect($host, $user, $password, $dbname);
if(!$conn) {
    
   
die("La connexion a échoué : " . mysqli_connect_error());
}


if($_SERVER["REQUEST_METHOD"] == "POST") {
    
      
  
   
$nom = $_POST["nom"];
    
   
$motdepasse = $_POST["motdepasse"];

    
    
   
$query = "SELECT * FROM utilisateurs WHERE nom = '$nom' AND password = '$password'";
    
    
   
$result = mysqli_query($conn, $query);

    


if (!$conn) {
  die("La connexion à la base de données a échoué : " . mysqli_connect_error());
}


$nom = $_POST['nom'];


$sql = "SELECT * FROM utilisateurs WHERE nom = '$nom'";
$result = mysqli_query($conn, $sql);


   
if(mysqli_num_rows($result) == 0) {
        
        

session_start();
        
       
$_SESSION["nom"] = $nom;
  
       
header("location: index.html");
        
       
exit();
    } 
    }

   
else {
        
        
       
echo "L'adresse email ou le mot de passe est incorrect.";
    }
   


mysqli_close($conn);
?>

<?php
session_start(); // Démarrer la session

// Vérifier si l'utilisateur est connecté en vérifiant si la variable de session est définie
if (isset($_SESSION['utilisateur_connecte'])) {
    
   
// Rediriger l'utilisateur vers la page souhaitée
    
  

   
header("Location: http://site1/index.html");
    exit; // Terminer le script pour s'assurer que la redirection est effective
} 

else {
    
   
// Si l'utilisateur n'est pas connecté, afficher un message d'erreur ou le rediriger vers la page de connexion
    header("Location: http://signin/connexion.php");
    
   
exit; // Terminer le script pour s'assurer que la redirection est effective
}
?>

<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="nom">Nom:</label>
    <input type="text" name="nom" required placeholder="Pseudo">

    <label for="motdepasse">Mot de passe:</label>
    <input type="password" name="motdepasse" required placeholder="mot de passe">

      <button type="submit">Se connecter</button> 
  </form>


<a href="inscription.php"> inscrit toi </a> 