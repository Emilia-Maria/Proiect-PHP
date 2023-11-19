<?php 
    $query ="SELECT ID, Name FROM partnerssponsors WHERE Type='Partner'";
    $result = $mysqli->query($query);
    if($result->num_rows> 0){
      $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
?>