<?php 
    $query ="SELECT ID, Name FROM partnerssponsors WHERE Type='Sponsor'";
    $result = $mysqli->query($query);
    if($result->num_rows> 0){
      $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
?>