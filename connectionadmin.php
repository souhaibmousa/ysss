<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="connection.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>connectionbiblio</title>
</head>
<body>
    <form method="post" action="connectionadmin.php">
        <h1>
            Se connecter admin
        </h1>
        <?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $tt=$_POST['nom'];
    $Cr=$_POST['prenom'];

    $serveur="localhost";
    $utilisateur="root";
    $motdepasse="";
    $base="gestion_biblio";
    
    $data=mysqli_connect($serveur,$utilisateur,$motdepasse,$base);
    
    $tt=$_POST['nom'];
        $Cr=$_POST['prenom'];
     
    
    $result=mysqli_query($data,"SELECT * FROM administrateur WHERE email='$tt' AND mot_de_passe='$Cr'");
    if(mysqli_fetch_row($result)==0){
        echo "l`email et le mot de passe sont incorrect veuillez reessayer";
    
    }else{
        header("location:acceuadmi.html");
        exit();
    }
}
?>
<div class="mesfond">
    <p ><i class="fa fa-google"></i></p>
    <p><i class="fa fa-facebook"></i></p>
    <p><i class="fa fa-youtube"></i></p>
    <p><i class="fa fa-instagram"></i></p>
</div>
<p class="souhaib">ou utilser mon adresse e-mail :</p>
<div class="input">
    <table>
        <tr>
            <td><label>Email_admin</label></td>
            <td><input type="email" name="nom" placeholder="Email"></td>
        </tr>
        <tr>
            <td><label>Mot_de_passe_admin</label></td>
            <td><input type="password" name="prenom" placeholder="password" ></td>
        </tr>
    </table>
</div>
<div align="center">
    <input type="submit" value="se connecter" name="S'inscrire" class="but">
</div>

    </form>
    
</body>
</html>
