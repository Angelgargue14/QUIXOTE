<?php
    session_start();
    $conexion = mysqli_connect("127.0.0.1", "angelgg","guerra94","QUIXOTE");
        if($conexion){
            //CREACIÓN DEL PEDIDO
            if($_POST["esllevar"] == 'llevar'){
                $query = "INSERT INTO PEDIDOS (DNI_EMPLEADO, LLEVAR, TERMINADO) VALUES ('71226832H',0,0)";
                
            }else{
                $query = "INSERT INTO PEDIDOS (DNI_EMPLEADO, LLEVAR, TERMINADO) VALUES ('71226832H',1,0)";
                
            }
            $ejecucion = mysqli_query($conexion, $query);
            
            //CREACIÓN LÍNEAS DEL PEDIDO
            $query = "SELECT MAX(ID_PEDIDO) AS PEDIDO FROM PEDIDOS";
            $resultado = mysqli_query($conexion, $query);
            while ($numPedido = mysqli_fetch_assoc($resultado)){
                $pedido = $numPedido['PEDIDO'];
            }
            
            $querydos = "SELECT * FROM PIDIENDO";
            $resultadodos = mysqli_query($conexion, $querydos);
            while ($pidiendo = mysqli_fetch_assoc($resultadodos)){
                $insertLin = "INSERT INTO LINEASPEDIDO VALUES (".$pedido.",".$pidiendo['NUM_LINEA'].",".$pidiendo['ID_PRODUCTO'].",".$pidiendo['CANTIDAD'].")";
                
                $resultado = mysqli_query ($conexion,$insertLin);
            }
            header("Location: teclado/borrar.php");          
            
        }

?>

