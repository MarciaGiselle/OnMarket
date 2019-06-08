<nav class="navbar navbar-dark bg-primary navbar-expand-lg ">
  <div class="container">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="inicio.html"><img id="logo-nav" src="Webroot/img/logotipo.png" alt="Logo de la Farmacia"></a>



    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <!-- Buscador -->
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Qué estás buscando?" aria-label="Search">
        <button class="btn btn-outline-light" type="submit">Buscar</button>
      </form>


      <!-- Opciones -->

      <ul class="navbar-nav">
        <li class="nav-item ">
          <a class="nav-link" href="#">Inicio<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Historial</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href= "#">Publicar</a>
        </li>

      </ul>

    </div>
    
     <!-- Contenedor de iniciar sesion -->

            <div class="dropdown dropleft">
              <button class="btn btn-outline-light" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Iniciar Sesión</button>
              <form class="dropdown-menu p-3"  action="<?php echo getBaseAddress() . "Usuario/login" ?>" method="post">

                <div class="form-group">
                  <label for="exampleDropdownFormEmail2">Usuario</label>
                  <input type="text" class="form-control" id="exampleDropdownFormEmail2" placeholder="User" name="nombre">
                </div>
                <div class="form-group">
                  <label for="exampleDropdownFormPassword2">Contraseña</label>
                  <input type="text" class="form-control" id="exampleDropdownFormPassword2" placeholder="Contraseña"  name="pass">
                </div>
                
                <input type="submit" class="btn btn-primary" value="Iniciar Sesión" name="ingresar"/>

            

              </form>

   </div>

   <!-- Agregar referencia a registrar -->
   <form  action="<?php echo getBaseAddress()."Registrar/registrar" ?>" method="post">

     <input type="submit" value="Registrarse "class="btn btn-secondary" >

   </form>


 </div>
</nav>      

<br>

