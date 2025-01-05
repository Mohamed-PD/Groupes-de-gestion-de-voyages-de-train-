<?php

$Serveur="localhost";
$Utilisateur="root";
$Password="";
$base="gestion_train";

$connexion=mysqli_connect($Serveur,$Utilisateur,$Password,$base);


$a=$_POST['Modifier'];


{
	$Supprime=mysqli_query($connexion,"DELETE FROM gares WHERE gare_id=$a");

		if ($Supprime==0) {
		echo "Erreur";
	    }else{
		echo "gares ID: ",$a," a etait supprimer de la base de donnees";
		echo "<br>";
	}
}

echo "<br>
      <button type= submit class=btnn> <a href='Gares.html'> Revenir</button></a>
	 ";

?>