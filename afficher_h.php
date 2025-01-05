
    
    <?php
    $server='localhost';
    $utilisateur='root';
    $motpasse='';
    $base='gestion_train';
    
    $connection=mysqli_connect($server,$utilisateur,$motpasse,$base);
   $result=mysqli_query($connection,"SELECT * FROM horaires");
echo '<table border="9">
<tr>
   <th> Horraire_id : </th>
  <th> train_id : </th>
  <th> gares_Id : </th>
  <th> heure_arrive : </th>
  <th> heure_depart : </th>
  <th> date : </th>
  
  
  
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
    <td>'.$sex=$ligne[4]. '</td>
    <td>'.$se=$ligne[5]. '</td>
    
    </tr>';
    }
  echo '</table>';
echo "<br>";
   echo "<button type= submit class=btnn> <a href='horraire_h.html'> Revenir</button></a>";


         ?>
