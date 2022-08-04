<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <link REL=StyleSheet HREF="estilo.css" TYPE="text/css" MEDIA=screen>
        <script src="main.js" type="text/javascript"></script>
        <title>Quixote</title>
    </head>
    <body>
        <aside>
           
            <img id="logotipo" src="img/logotipo.jpeg" alt="logotipo"/>
               <a href="sesion.php"><button id="usuario">USUARIO</button></a>   
               
               <table id="cab_pidiendo">
                   <tr>
                       <td>Cant</td>
                       <td id="Desc_cab_pidiendo">Descrición</td>
                       <td class="derecha">Unidad</td>
                       <td class="derecha">total</td>
                   </tr>
               </table>
               
               <div id="lin_pidiendo">
                   <?php
                        session_start();
                        if($_SESSION['linea'] < 1 or $_SESSION['linea'] == FALSE){
                            $_SESSION['linea'] = 1;
                        }
                                           
                        $conexion = mysqli_connect("127.0.0.1", "angelgg","guerra94","QUIXOTE");
                        if ($conexion){
                            
                            $pidiendo = mysqli_query($conexion, 'SELECT * FROM PIDIENDO');
                            
                            echo"<link REL=StyleSheet HREF=\"estilo.css\" TYPE=\"text/css\" MEDIA=screen>";
                            echo"<table id=\"pidiendo\">";
                                
                                    while($pintando = mysqli_fetch_assoc($pidiendo)){
                                        $query_productos = "SELECT * FROM PRODUCTOS WHERE ID_PRODUCTO =".$pintando['ID_PRODUCTO'];
                                        $productos = mysqli_query($conexion,$query_productos);
                                        while($pin_productos = mysqli_fetch_assoc($productos)){
                                        echo"<tr>";
                                            echo"<td>".$pintando['CANTIDAD']." U.  </td>";
                                            echo "<td>".$pin_productos['NOMBRE']."</td><td>  ".$pin_productos['PRECIO']."€  </td><td>".$pin_productos['PRECIO']*$pintando['CANTIDAD']."€</td>";
                                        echo"</tr>";
                                        }
                                    }    
                            echo"</table>";
                            mysqli_close($conexion);
                        }else{
                            echo "ERROR CON LA CONEXIÓN DE LA BBDD";
                        }
                        
                   ?>
               </div>
               
               <table id="pie_pidiendo">
                    <tr>
                        <th id="totalArticulos">
                            <?php
                            $conexion = mysqli_connect("127.0.0.1", "angelgg","guerra94","QUIXOTE");
                            if($conexion){
                                $query = "SELECT SUM(CANTIDAD) AS CANTIDAD FROM PIDIENDO";
                                $cantidad = mysqli_query($conexion, $query);
                                while($cantidadi = mysqli_fetch_assoc($cantidad)){
                                    echo "<h5>".$cantidadi['CANTIDAD']." U.</h5>";
                                }
                            }
                            mysqli_close($conexion);
                          ?>
                        </th>
                      <th id="total">
                          <?php
                            $conexion = mysqli_connect("127.0.0.1", "angelgg","guerra94","QUIXOTE");
                            if($conexion){
                                $query = "SELECT SUM(PI.CANTIDAD * PR.PRECIO) AS TOTAL FROM PIDIENDO PI, PRODUCTOS PR WHERE PI.ID_PRODUCTO = PR.ID_PRODUCTO";
                                $total = mysqli_query($conexion, $query);
                                while($totali = mysqli_fetch_assoc($total)){
                                    echo "<h5>".$totali['TOTAL']." €</h5>";
                                }
                            }
                            mysqli_close($conexion);
                          ?>
                      </th>
                   </tr>
               </table>
               
               <div id="teclado">
                   <button>Desc<br>%</button>
                   <a href="/teclado/borrar.php"><button id="borrar">Borrar<br>X</button><br></a>
                   <a href="/teclado/t1.php"><button>1</button></a>
                   <a href="/teclado/t2.php"><button>2</button></a> 
                   <a href="/teclado/t3.php"><button>3</button></a><br>
                   <a href="/teclado/t4.php"><button>4</button></a>
                   <a href="/teclado/t5.php"><button>5</button></a> 
                   <a href="/teclado/t6.php"><button>6</button></a><br>
                   <a href="/teclado/t7.php"><button>7</button></a>
                   <a href="/teclado/t8.php"><button>8</button></a> 
                   <a href="/teclado/t9.php"><button>9</button></a><br>
                   <a href="/teclado/t10.php"><button>10</button></a>
               </div>
               
               <div id="cobrar">
                   <a href="cobrar.php"><button>€</button></a>
               </div>
        </aside>
        
        <section>
            <div id="botonera">
                <button id="bebidas" onclick="cambiaBeb('blue')">BEBIDAS</button>
                <button id="tapas" onclick="cambiaTap('red')">TAPAS</button>
                <button id="pinchos" onclick="cambiaPinchos('blueviolet')">PINCHOS</button>
                <button id="raciones" onclick="cambiaRaci('limegreen')">RACIONES</button>
                <button id="bocadillos" onclick="cambiaBocad('darkgoldenrod')">BOCADILLOS</button>
                <button id="postres" onclick="cambiaPostres('darkorchid')">POSTRES</button>
            </div>
            
            <div id="articulos">
                <div id="art_bebidas">
                    <a href="/bebidas/b1.php"><button>AGUA GRANDE</button></a>
                    <a href="/bebidas/b2.php"><button>AGUA PEQUEÑA</button></a>
                    <a href="/bebidas/b3.php"><button>COCA COLA</button></a>
                    <a href="/bebidas/b4.php"><button>COCA COLA ZERO</button></a>
                    <a href="/bebidas/b5.php"><button>FANTA LIMÓN</button></a>
                    <a href="/bebidas/b6.php"><button>FANTA NARANJA</button></a>
                    <a href="/bebidas/b7.php"><button>SPRITE</button></a>
                    <a href="/bebidas/b8.php"><button>AQUARIUS</button></a>
                    <a href="/bebidas/b9.php"><button>TONICA</button></a>
                    <a href="/bebidas/b10.php"><button>TONICA CEREZA</button></a>
                    <a href="/bebidas/b11.php"><button>QUINTO</button></a>
                    <a href="/bebidas/b12.php"><button>TERCIO</button></a>
                    <a href="/bebidas/b13.php"><button>JARRA 0.5L</button></a>
                    <a href="/bebidas/b14.php"><button>CERVEZA SIN</button></a>
                    <a href="/bebidas/b15.php"><button>CUBO MAHOU</button></a>
                    <a href="/bebidas/b16.php"><button>CUBO CORONITA</button></a>
                    <a href="/bebidas/b17.php"><button>CUBO HEINIKEN</button></a>
                    <a href="/bebidas/b18.php"><button>CALIMOXO</button></a>
                </div>
                <div id="art_tapas">
                    <a href="/tapas/b19.php"><button>MIGAS</button></a>
                    <a href="/tapas/b20.php"><button>ATASCABURRAS</button></a>
                    <a href="/tapas/b21.php"><button>GAZPACHO</button></a>
                    <a href="/tapas/b22.php"><button>PISTO</button></a>
                    <a href="/tapas/b23.php"><button>GACHAS</button></a>
                    <a href="/tapas/b24.php"><button>CALDERETA</button></a>
                    <a href="/tapas/b25.php"><button>CARACOLES</button></a>
                    <a href="/tapas/b26.php"><button>PATATA BRAVA</button></a>
                    <a href="/tapas/b27.php"><button>PATATA ASADA</button></a>
                    <a href="/tapas/b28.php"><button>PATATA MONTÓN</button></a>
                    <a href="/tapas/b29.php"><button>GAMBAS AJILLO</button></a>
                    <a href="/tapas/b30.php"><button>JAMÓN</button></a>
                    <a href="/tapas/b31.php"><button>HUEVOS CODORNIZ</button></a>
                    <a href="/tapas/b32.php"><button>TORTILLA PATATA</button></a>
                    <a href="/tapas/b33.php"><button>CHORIZO</button></a>
                    <a href="/tapas/b34.php"><button>MORCILLA</button></a>
                    <a href="/tapas/b35.php"><button>QUESO</button></a>
                    <a href="/tapas/b36.php"><button>ENSALADILLA</button></a>
                </div>
                <div id="art_pinchos">
                    <a href="/pinchos/b37.php"><button>JAMÓN Y PIMIENTO</button></a>
                    <a href="/pinchos/b38.php"><button>TXAKA</button></a>
                    <a href="/pinchos/b39.php"><button>GULAS CON HUEVO</button></a>
                    <a href="/pinchos/b40.php"><button>CHAMPI CON JAMÓN</button></a>
                    <a href="/pinchos/b41.php"><button>MORCILLA ALIOLI</button></a>
                    <a href="/pinchos/b42.php"><button>TORTILLA ESP</button></a>
                    <a href="/pinchos/b43.php"><button>ANCHOAS TOMATE</button></a>
                    <a href="/pinchos/b44.php"><button>ENSALADILLA</button></a>
                    <a href="/pinchos/b45.php"><button>CARNE EN SALSA</button></a>
                    <a href="/pinchos/b46.php"><button>PULPO CON PATATA</button></a>
                    <a href="/pinchos/b47.php"><button>MEJILLÓN</button></a>
                    <a href="/pinchos/b48.php"><button>MELÓN CON JAMÓN</button></a>
                    <a href="/pinchos/b49.php"><button>BOQUERONES FRITOS</button></a>
                    <a href="/pinchos/b50.php"><button>POLLO AL PIMENTÓN</button></a>
                    <a href="/pinchos/b51.php"><button>CHISTORRA</button></a>
                    <a href="/pinchos/b52.php"><button>VERDURAS OTOÑO</button></a>
                    <a href="/pinchos/b53.php"><button>POLLO AL CURRY</button></a>
                    <a href="/pinchos/b54.php"><button>MORUNO</button></a>
                </div>
                <div id="art_raciones">
                    <a href="/raciones/b55.php"><button>ALBONDIGAS</button></a>
                    <a href="/raciones/b56.php"><button>ALITAS FRITAS</button></a>
                    <a href="/raciones/b57.php"><button>PIES DE CERDO</button></a>
                    <a href="/raciones/b58.php"><button>SOLOMILLO</button></a>
                    <a href="/raciones/b59.php"><button>LACÓN</button></a>
                    <a href="/raciones/b60.php"><button>LENTEJAS</button></a>
                    <a href="/raciones/b61.php"><button>ARROZ CON CONEJO</button></a>
                    <a href="/raciones/b62.php"><button>CALDERETA</button></a>
                    <a href="/raciones/b63.php"><button>PAELLA</button></a>
                    <a href="/raciones/b64.php"><button>PISTO</button></a>
                    <a href="/raciones/b65.php"><button>MIGAS</button></a>
                    <a href="/raciones/b66.php"><button>ATASCABURRAS</button></a>
                    <a href="/raciones/b67.php"><button>GALIANOS</button></a>
                    <a href="/raciones/b68.php"><button>PARRILLADA VERDURAS</button></a>
                    <a href="/raciones/b69.php"><button>CHULETAS DE CORDERO</button></a>
                    <a href="/raciones/b70.php"><button>CHULETÓN BUEY</button></a>
                    <a href="/raciones/b71.php"><button>TRUCHA</button></a>
                    <a href="/raciones/b72.php"><button>PIMIENTOS RELLENOS</button></a>
                </div>
                <div id="art_bocadillos">
                    <a href="/bocadillos/b73.php"><button>CALAMARES</button></a>
                    <a href="/bocadillos/b74.php"><button>TERNERA</button></a>
                    <a href="/bocadillos/b75.php"><button>YORK MEMBRILLO</button></a>
                    <a href="/bocadillos/b76.php"><button>VALENCIANA</button></a>
                    <a href="/bocadillos/b77.php"><button>JAMÓN CON ACEITE</button></a>
                    <a href="/bocadillos/b78.php"><button>QUESO CURADO</button></a>
                    <a href="/bocadillos/b79.php"><button>CHERRY CON ANCHOAS</button></a>
                    <a href="/bocadillos/b80.php"><button>LOMO CON CHIMICHURRI</button></a>
                    <a href="/bocadillos/b81.php"><button>VIETNAMITA</button></a>
                    <a href="/bocadillos/b82.php"><button>SECRETO QUESO</button></a>
                    <a href="/bocadillos/b83.php"><button>SAND MIXTO</button></a>
                    <a href="/bocadillos/b84.php"><button>SAND BTL</button></a>
                    <a href="/bocadillos/b85.php"><button>SAND JARA</button></a>
                    <a href="/bocadillos/b86.php"><button>SAND GITANO</button></a>
                    <a href="/bocadillos/b87.php"><button>VEGETAL</button></a>
                    <a href="/bocadillos/b88.php"><button>HAMB NORMAL</button></a>
                    <a href="/bocadillos/b89.php"><button>HAMB COMPLETA</button></a>
                    <a href="/bocadillos/b90.php"><button>HAMB QUIXOTE</button></a>
                </div>
                <div id="art_postres">
                    <a href="/postres/b91.php"><button>CREPE ARROPE</button></a>
                    <a href="/postres/b92.php"><button>BOMB LICOR</button></a>
                    <a href="/postres/b93.php"><button>TORRIJAS</button></a>
                    <a href="/postres/b94.php"><button>FLORES MANCHEGAS</button></a>
                    <a href="/postres/b95.php"><button>ROLLETES CON GASEOSA</button></a>
                    <a href="/postres/b96.php"><button>FRESAS MACERADAS</button></a>
                    <a href="/postres/b97.php"><button>HELADO DE MIEL</button></a>
                    <a href="/postres/b98.php"><button>FRITILLAS DE CARNAVAL</button></a>
                    <a href="/postres/b99.php"><button>TESTONES</button></a>
                    <a href="/postres/b100.php"><button>TORTAS DE SAN BLAS</button></a>
                    <a href="/postres/b101.php"><button>TIRAMISÚ</button></a>
                    <a href="/postres/b102.php"><button>FRUTA</button></a>
                    <a href="/postres/b103.php"><button>HELADO CAFÉ</button></a>
                    <a href="/postres/b104.php"><button>CAFÉ SOLO</button></a>
                    <a href="/postres/b105.php"><button>BOMBÓN</button></a>
                    <a href="/postres/b106.php"><button>CORTADO</button></a>
                    <a href="/postres/b107.php"><button>MANZANILLA</button></a>
                    <a href="/postres/b108.php"><button>TILA</button></a>
                </div>
            </div>
            <div id="sines">
                    <button>1</button>
                    <button>2</button>
                    <button>3</button>
                    <button>4</button>
                    <button>5</button>
                    <button>6</button>
                    <button>7</button>
                    <button>8</button>
                    <button>9</button>
            </div>
        </section>
       
    </body>
</html>