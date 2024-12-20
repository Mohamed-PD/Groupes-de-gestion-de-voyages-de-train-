<?php
    $server='localhost';
    $utilisateur='root';
    $motpasse='';
    $base='gestion_train';
    
    $connection=mysqli_connect($server,$utilisateur,$motpasse,$base);
    $souba=$_POST['id'];
   $result=mysqli_query($connection,"SELECT * FROM horaires WHERE horaire_id ='$souba'");
echo '<table border="9">
<tr>
   <th> horraire_id : </th>
   <th> train_id : </th>
  <th> gares_Id : </th>
  <th> date_arrive : </th>
  <th> date_depart : </th>
  <th> date : </th>
  
</tr>';


while($ligne=mysqli_fetch_row($result)) {
    echo '<tr>
   <td>'.$num=$ligne[0]. '</td>
    <td>'.$nom=$ligne[1]. '</td>
    <td>'.$pass=$ligne[2]. '</td>
    <td>'.$sexe=$ligne[3]. '</td>
    <td>'.$dates=$ligne[4]. '</td>
    <td>'.$dat=$ligne[5]. '</td>
    </tr>';
    }
  echo '</table>';
  echo "<br>";
   echo "<button type= submit class=btnn> <a href='horraire_h.html'> Revenir</button></a>";


         ?>