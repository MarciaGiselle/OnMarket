<!DOCTYPE html>
<html>
<head>
    <title>Envío de mails con PHP</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php

?>
<form action="<?php echo getBaseAddress() . "Contacto/enviarMensaje" ?>"  method="post">

        <h1>Contacto</h1>
        <label>Asunto</label><br>
        <input type="text" size="55" name="asunto" value="" required autofocus style="" placeholder="Asunto" ><br>
        <label>De</label><br>
        <input type="text" size="25" name="nombre" value="" required style="" placeholder="Tu Nombre" >
        <input type="email" size="25" name="emisor" required style="" placeholder="Email remitente" value=""><br>
        <label>Para</label><br>
        <input type="text" size="55" name="receptor" required style="" placeholder="Email destinatario" value="">
        <label>Si quieres enviar a varios e-mails, separalos con una coma ",".</label><br><br>
        <label>Mensaje</label><br>
        <textarea name="cuerpo" style="" placeholder="Contenido del mensaje" cols="57" rows="10"></textarea><br>
        <input type="submit" name="enviar" value="Enviar">
        <br><br>

</form>
</body>
</html>