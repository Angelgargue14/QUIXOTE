<?php
    session_start();
    $conexion = mysqli_connect("127.0.0.1", "angelgg","guerra94","QUIXOTE");
    $pedido = $_POST['pedidoterminado'];
    $query = "UPDATE PEDIDOS SET TERMINADO = 1 WHERE ID_PEDIDO =".$pedido;
    
    $ejecucion = mysqli_query($conexion, $query);
    
    header("Location: cocina.php");   
    echo $query;
    
?>
