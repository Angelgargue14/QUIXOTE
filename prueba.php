<?php
    $base = mysqli_connect("127.0.0.1","angelgg","guerra94","QUIXOTE");
                         if ($base) {
                                 echo 'Conexión realizada. <br />';
                                 echo 'Informaicón sobre el servidor: ' .mysqli_GET_host_info ($base);
                                 mysqli_close($base);
                         } else {
                         printf ('Error %d: %s.<br/>' ,mysqli_connect_errno(),mysqli_connect_error());
                         }
    //header("Location: index.php");
?>

