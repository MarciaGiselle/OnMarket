<nav class="navbar navbar-dark bg-primary navbar-expand-lg ">
  <div class="container">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="inicio.html"><img id="logo-nav" src="../Webroot/img/logotipo.png" alt="Logo de la Farmacia"></a>



    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <!-- Buscador -->
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Qué estás buscando?" aria-label="Search">
        <button class="btn btn-outline-light" type="submit">Buscar</button>
      </form>


      <!-- Opciones -->

      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo getBaseAddress()."Usuario/mostrarInicio" ?>">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Historial</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo getBaseAddress()."Producto/publicar" ?>">Publicar</a>
        </li>

      </ul>

    </div>

    <!-- Cerrar sesion -->
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <form action="<?php echo getBaseAddress()."Usuario/cerrarSesion" ?>" method="post">
         <!-- cambiar url -->

       <input type="submit" value="Cerrar Sesión "class="btn btn-outline-light">

     </form>


   </div>

   <!-- Agregar referencia a registrar -->
   <form class="disabled" action="<?php echo getBaseAddress()."Registrar/registrar" ?>" method="post">

     <input type="submit" value="Registrarse "class="btn btn-secondary" disabled>

   </form>


 </div>
</nav>      

<br>

