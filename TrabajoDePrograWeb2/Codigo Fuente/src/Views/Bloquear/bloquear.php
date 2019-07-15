<div class="container justify-content-center text-center mt-5">
    <h3 class="text-primary text-center mt-4 mb-3">Confirmación de Bloqueo</h3>

<form action="<?php echo getBaseAddress() .'Bloquear/confirmarBloqueo' ?>" method="post">

    <input type="hidden" value="<?php echo $usuario["id"] ?>" name="id_user">

    <h6> Id de Usuario <?php echo $usuario["id"] ?></h6>
 <h6>Nombre de usuario:  <?php echo $usuario["userName"] ?> </h6>
 <h6> Nombre: <?php echo $usuario["name"] ?> </h6>
 <h6>Apellido: <?php echo $usuario["lastname"] ?> </h6>
 <h6>Email: <?php echo $usuario["email"] ?> </h6>


    <input class="btn btn-primary" type="submit" value="Bloquear">
    <a href="<?php echo getBaseAddress() . "PerfilesDeUsuarios/usuarios" ?>">
        <input   value="cancelar" class="btn btn-primary" id="publicar" >
    </a>
</form>
</div>