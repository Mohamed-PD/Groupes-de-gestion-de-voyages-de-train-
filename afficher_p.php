
    
    <?php
    $server='localhost';
    $utilisateur='root';
    $motpasse='';
    $base='gestion_train';
    
    $connection=mysqli_connect($server,$utilisateur,$motpasse,$base);
   $result=mysqli_query($connection,"SELECT * FROM passagers");
echo '<table border="9">
<tr>
  <th> ID_passager : </th>
  <th> NOM : </th>
  <th> PRENOM : </th>
  <th> TELEPHONE : </th>
  <th> EMAIL : </th>
  <th> Mot de passe : </th>
  
  
  
  
</tr>';

echo "<style>

.btnn:hover{
    background: #fff;
    color: #ff0000;
}

.btnn a{
    text-decoration: none;
    color: #000;
    font-weight: bold;
}";
 echo "</style>";


while($ligne=mysqli_fetch_row($result)) {
    echo '<tr>
    <td>'.$num=$ligne[0]. '</td>
    <td>'.$nom=$ligne[1]. '</td>
    <td>'.$pass=$ligne[2]. '</td>
    <td>'.$sexe=$ligne[3]. '</td>
    <td>'.$se=$ligne[4]. '</td>
    <td>'.$s=$ligne[5]. '</td>
    
    </tr>';
    }
  echo '</table>';
echo "<br>";
   echo "<button type= submit class=btnn> <a href='passager_p.html'> Revenir</button></a>";


         ?>
