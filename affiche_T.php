
    
    <?php
    $server='localhost';
    $utilisateur='root';
    $motpasse='';
    $base='gestion_train';
    
    $connection=mysqli_connect($server,$utilisateur,$motpasse,$base);
   $result=mysqli_query($connection,"SELECT * FROM trains");
echo '<table border="9">
<tr>
  <th> Train_ID : </th>
  <th> Nom du train : </th>
  <th> type de train : </th>
  <th> capacite  : </th>
  <th> ville_depart : </th>
  <th> ville_arriver : </th>
  <th> siege : </th>
  <th> date_disponibilte : </th>
  
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
    <td>'.$id=$ligne[1]. '</td>
    <td>'.$nom=$ligne[2]. '</td>
    <td>'.$type=$ligne[3]. '</td>
    <td>'.$cap=$ligne[4]. '</td>
    <td>'.$i=$ligne[5]. '</td>
    <td>'.$n=$ligne[6]. '</td>
    <td>'.$n=$ligne[7]. '</td>
    
    </tr>';
    }
  echo '</table>';
echo "<br>";
   echo "<button type= submit class=btnn> <a href='button_T.html'> Revenir</button></a>";


         ?>

