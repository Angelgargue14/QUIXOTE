<!doctype html>
<html>
    <head>
        
    </head>
    <body>
        <form action="terminando.php" method="POST" name="terminado">
            <h2>Cocina Quixote</h2>
            <h3>¿Qué numero de pedido has terminado?</h3>
            <input type="text" name="pedidoterminado" value="0"/> 
            <input type="submit" name="enviar" value="terminar"/> 
        </form>
        <?php
            session_start();
            
        ?>
    </body>
</html>


