<!doctype html>
<html>
    <head>
        
    </head>
    <body>
        <form action="cobrando.php" method="POST" name="cobrando">
            <h2>Caja Quixote</h2>
            <h3>¿Pedido para llevar?</h3>
            <input type="radio" name="esllevar" value="llevar"/> Pedido para llevar.
            <input type="radio" name="esllevar" value="tomar"/> Pedido para tomar.
            <input type="submit" name="enviar" value="Cobrar"/> 
        </form>
        <?php
            session_start();
            
        ?>
    </body>
</html>
