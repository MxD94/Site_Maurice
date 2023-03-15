<?php


session_start();

// Vérifie si l'utilisateur est connecté
if(isset($_SESSION["nom"])) {
    
   
// Rediriger vers la page souhaitée
    
   
header("Location: http://www.example.com/index.html");
    
   
exit();
}
?>
