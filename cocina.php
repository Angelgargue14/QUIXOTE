<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <link REL=StyleSheet HREF="estiloCocina.css" TYPE="text/css" MEDIA=screen>
        <title>Quixote</title>
    </head>
    <body>
        <?php
            session_start();
            $conexion = mysqli_connect("127.0.0.1", "angelgg","guerra94","QUIXOTE");
            echo"<link REL=StyleSheet HREF=\"estiloCocina.css\" TYPE=\"text/css\" MEDIA=screen>";
              if($conexion){
                $pedidos = "SELECT * FROM PEDIDOS";
                $pedidosa = mysqli_query($conexion, $pedidos);
                while($pedidosb = mysqli_fetch_assoc($pedidosa)){
                    if($pedidosb['TERMINADO'] == 0){
                        if($pedidosb['LLEVAR'] == 0){
                            echo "<a href=\"terminado.php\"><div class=\"cuadros\" id=\"".$pedidosb['ID_PEDIDO']."\"><div id=\"titulo\">".$pedidosb['ID_PEDIDO']."</div>";
                            $linea = "SELECT LI.ID_PEDIDO, LI.NUM_LINEA, LI.CANTIDAD, PR.NOMBRE, PR.TIPO FROM LINEASPEDIDO LI, PRODUCTOS PR WHERE LI.ID_PRODUCTO = PR.ID_PRODUCTO AND LI.ID_PEDIDO=".$pedidosb['ID_PEDIDO'];
                            $lineab = mysqli_query($conexion, $linea);
                            echo"<div id=\"lineas\">";
                            while ($lineac = mysqli_fetch_assoc($lineab)){
                                echo "<ul> <li>".$lineac['NOMBRE']." - ".$lineac['CANTIDAD']."</li></ul>";
                            }
                            echo "</div></div></a>";
                        }else{
                            
                            echo "<a href=\"terminado.php\"><div class=\"cuadrosdos\" id=\"".$pedidosb['ID_PEDIDO']."\"><div id=\"titulo\">".$pedidosb['ID_PEDIDO']."</div>";
                            $linea = "SELECT LI.ID_PEDIDO, LI.NUM_LINEA, LI.CANTIDAD, PR.NOMBRE, PR.TIPO FROM LINEASPEDIDO LI, PRODUCTOS PR WHERE LI.ID_PRODUCTO = PR.ID_PRODUCTO AND LI.ID_PEDIDO=".$pedidosb['ID_PEDIDO'];
                            $lineab = mysqli_query($conexion, $linea);
                            echo"<div id=\"lineas\">";
                            while ($lineac = mysqli_fetch_assoc($lineab)){
                                echo "<ul> <li>".$lineac['NOMBRE']." - ".$lineac['CANTIDAD']."</li></ul>";
                            }
                            echo "</div></div></a>";
                        }
                        
                        
                    }else{
                        echo "<div id=\"sincuadro\"><div id=\"titulo\">".$pedidosb['ID_PEDIDO']."</div>";
                        $linea = "SELECT LI.ID_PEDIDO, LI.NUM_LINEA, LI.CANTIDAD, PR.NOMBRE, PR.TIPO FROM LINEASPEDIDO LI, PRODUCTOS PR WHERE LI.ID_PRODUCTO = PR.ID_PRODUCTO AND LI.ID_PEDIDO=".$pedidosb['ID_PEDIDO'];
                        $lineab = mysqli_query($conexion, $linea);
                        echo"<div id=\"lineas\">";
                        while ($lineac = mysqli_fetch_assoc($lineab)){
                            echo "<ul> <li>".$lineac['NOMBRE']." - ".$lineac['CANTIDAD']."</li></ul>";
                        }
                        echo "</div></div></a>";
                    }
                    
                }
            }    
            mysqli_close($conexion);
        ?>
    </body>
</html>