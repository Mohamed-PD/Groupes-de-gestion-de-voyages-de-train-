<?php

$Serveur="localhost";
$Utilisateur="root";
$Password="";
$base="gestion_train";

$connexion=mysqli_connect($Serveur,$Utilisateur,$Password,$base);


$a=$_POST['id'];


{
	$Supprime=mysqli_query($connexion,"DELETE FROM horaires WHERE horaire_id=$a");

		if ($Supprime==0) {
		echo "Erreur";
	    }else{
		echo "horraire: ",$a," a etait supprimer de la base de donnees";
		echo "<br>";
	}
}

echo "<br>
      <button type= submit class=btnn> <a href='horraire_h.html'> Revenir</button></a>
	 ";

?>