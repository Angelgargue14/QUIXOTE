<?php
session_start();
$conexion = mysqli_connect("127.0.0.1", "angelgg","guerra94","QUIXOTE");
$idproducto = 91;
    if ($conexion){
        $linea = $_SESSION['linea'];
        $cantidad = $_SESSION['cantidad'];
        $producto = "SELECT * FROM PIDIENDO WHERE ID_PRODUCTO = ".$idproducto;
        echo "consulta = ".$producto;
        $resultado = mysqli_query($conexion,$producto);
        
            if(mysqli_num_rows($resultado) == 0){
               $insercion = "INSERT INTO PIDIENDO VALUES ($linea, $idproducto, $cantidad)";
               $ejecucion = mysqli_query($conexion, $insercion);
                    if($ejecucion){
                        $_SESSION['linea'] = $_SESSION['linea'] + 1;
                        $_SESSION['cantidad'] = 1;
                    }
            }else{
               while($registro = mysqli_fetch_assoc($resultado)){   
                    $suma = $registro['CANTIDAD'] + $cantidad; 
                    $modificar = "UPDATE PIDIENDO SET CANTIDAD =".$suma." WHERE ID_PRODUCTO = ".$idproducto;
                    $ejecucion = mysqli_query($conexion, $modificar);
           
                    $_SESSION['cantidad'] = 1;
                }
            }
        mysqli_close($conexion);
        header("Location: ../index.php");
    }
?>
