 <?php
    $server='localhost';
    $utilisateur='root';
    $motpasse='';
    $base='gestion_train';
    
    $connection=mysqli_connect($server,$utilisateur,$motpasse,$base);
    $souba=$_POST['souba'];
   $result=mysqli_query($connection,"SELECT * FROM administrateur WHERE admin_id ='$souba'");
echo '<table border="9">
<tr>
  
   <th> Admin_Id : </th>
  <th> nom : </th>
  <th>Prénom :</th>
  <th>Num_Tel :</th>
  <th>Email :</th>
  <th>Mot_De_Passe :</th>
</tr>';


while($ligne=mysqli_fetch_row($result)) {
    echo '<tr>
    <td>'.$num=$ligne[0]. '</td>
    <td>'.$nom=$ligne[1]. '</td>
    <td>'.$pass=$ligne[2]. '</td>
    <td>'.$sexe=$ligne[3]. '</td>
    <td>'.$filiere=$ligne[4]. '</td>
    <td>'.$email=$ligne[5]. '</td>
    </tr>';
    }
  echo '</table>';
  echo "<br>";
   echo "<button type= submit class=btnn> <a href='BouttonAdministrateur.html'> Revenir</button></a>";


         ?>