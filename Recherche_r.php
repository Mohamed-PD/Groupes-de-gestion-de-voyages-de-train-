<?php
    $server='localhost';
    $utilisateur='root';
    $motpasse='';
    $base='gestion_train';
    
    $connection=mysqli_connect($server,$utilisateur,$motpasse,$base);
    $souba=$_POST['Modifier'];
   $result=mysqli_query($connection,"SELECT * FROM reservations WHERE reservation_id='$souba'");
echo '<table border="9">
<tr>
  
   <th> reservation_ID :  </th>
  <th> passager_id : </th>
  <th> train_id : </th>
  <th> num_place : : </th>
  <th> date reservation : </th>
</tr>';


while($ligne=mysqli_fetch_row($result)) {
    echo '<tr>
    <td>'.$num=$ligne[0]. '</td>
    <td>'.$id=$ligne[1]. '</td>
    <td>'.$nom=$ligne[2]. '</td>
    <td>'.$type=$ligne[3]. '</td>
    <td>'.$cap=$ligne[4]. '</td>
    
   
    </tr>';
    }
  echo '</table>';
  echo "<br>";
   echo "<button type= submit class=btnn> <a href='Reservation_r.html'> Revenir</button></a>";


         ?>