<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    
    $nom = htmlspecialchars($_POST["nom"]);
    $email = htmlspecialchars($_POST["email"]);
    $motdepasse = htmlspecialchars($_POST["motdepasse"]);

     
    if (!empty($nom) && !empty($email) && !empty($motdepasse)) {

        
        $serveur = "localhost";
        $utilisateur = "root";
        $mdp = "";
        $bdd = "formulaire";

        $conn = mysqli_connect($serveur, $utilisateur, $mdp, $bdd);

         
        if (!$conn) {
            die("La connexion à la base de données a échoué: " . mysqli_connect_error());
        }

        
        $sql = "INSERT INTO utilisateurs (nom, email, mdp) VALUES ('$nom', '$email', '$motdepasse')";

        
        if (mysqli_query($conn, $sql)) {
            echo "Inscription réussie!";
        } else {
            echo "Erreur: " . $sql . "<br>" . mysqli_error($conn);
        }

        
        mysqli_close($conn);
    } else {
        echo "Veuillez remplir tous les champs!";
    }
}
?>


<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="nom">Nom:</label>
    <input type="text" name="nom" required placeholder="Pseudo">

    <label for="email">Email:</label>
    <input type="email" name="email" required placeholder="Votre Email">

    <label for="motdepasse">Mot de passe:</label>
    <input type="password" name="motdepasse" required placeholder="mot de passe">

    <button type="submit">S'inscrire</button>
</form>


<a href="connexion.php"> connecte toi </a>