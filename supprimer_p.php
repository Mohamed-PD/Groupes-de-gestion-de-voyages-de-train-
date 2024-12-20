<?php

$Serveur="localhost";
$Utilisateur="root";
$Password="";
$base="gestion_train";

$connexion=mysqli_connect($Serveur,$Utilisateur,$Password,$base);


$a=$_POST['ID'];


{
	$Supprime=mysqli_query($connexion,"DELETE FROM passagers WHERE passager_id=$a");

		if ($Supprime==0) {
		echo "Erreur";
	    }else{
		echo " passager: ",$a," a etait supprimer de la base de donnees";
		echo "<br>";
	}
}

echo "<br>
      <button type= submit class=btnn> <a href='passager_p.html'> Revenir</button></a>
	 ";

?>