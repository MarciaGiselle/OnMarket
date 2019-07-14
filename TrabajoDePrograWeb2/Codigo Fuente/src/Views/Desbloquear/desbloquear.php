<form action="<?php echo getBaseAddress() .'Desbloquear/confirmarDesbloqueo' ?>" method="post">
<div> <?php echo $usuario["id"] ?>

    <input type="hidden" value="<?php echo $usuario["id"] ?>" name="id_user">
</div>
 <div> <?php echo $usuario["userName"] ?> </div>
 <div> <?php echo $usuario["name"] ?> </div>
 <div> <?php echo $usuario["lastname"] ?> </div>
 <div> <?php echo $usuario["email"] ?> </div>


    <input class="btn btn-primary" type="submit" value="desbloquear">
    <a href="<?php echo getBaseAddress() . "PerfilesDeUsuarios/usuarios" ?>">
        <input   value="cancelar" class="btn btn-primary" id="publicar" >
    </a>
</form>

