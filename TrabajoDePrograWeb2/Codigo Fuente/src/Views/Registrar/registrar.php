<script>
    const pathRegistrar = "<?php echo getBaseAddress() .  "Registrar/validarRegistro" ; ?>";
    const pathHome = "<?php echo getBaseAddress(). "Usuario/mostrarInicio" ; ?>";
    const pathLoguear = "<?php echo getBaseAddress() .  "Usuario/login" ; ?>";
    const pathBuscador = "<?php echo getBaseAddress(). "Buscador/buscador" ; ?>";
</script>




<body>
<nav class="navbar navbar-expand-lg  navbar-dark bg-primary">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
            aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href=#><img id="logo-nav" src="../Webroot/img/logotipo.png" alt="Logo de OnMarket"></a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-2 mt-2 mt-lg-0">
            <li class="nav-item ">

                <a class="nav-link active" href="<?php echo getBaseAddress() ?>" #">Inicio<span class="sr-only">(current)</span></a>

            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Historial</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link disabled" href="#">Publicar</a>
        </ul>

        <!-- Buscador-->

        <div class="input-group">
            <form class="form-check-inline" action= "<?php echo getBaseAddress(). "Buscador/buscarProducto" ; ?>"  method="post">
                <input type="text" class="form-control" placeholder="Que estás buscando?"  id="buscador" name="buscarProducto">
                <div class="input-group-append">
                    <button class="btn btn-secondary" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </form>
        </div>

    </div>


    <!-- Contenedor de iniciar sesion -->
    <div class="d-inline-flex">
        <div class="dropdown dropleft">

            <button class="btn btn-outline-light mr-sm-2" type="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">Iniciar Sesión
            </button>

            <div class="dropdown-menu p-3">

                <div class="form-group">
                    <label for="exampleDropdownFormEmail2">Usuario</label>
                    <input type="text" class="form-control" placeholder="User"
                           name="nombre" id="inputName">
                </div>

                <div class="form-group">
                    <label for="exampleDropdownFormPassword2">Contraseña</label>
                    <input type="text" class="form-control" id="inputPass" placeholder="Contraseña"
                           name="pass">
                </div>

                <input type="submit" class="btn btn-primary" value="Iniciar Sesión" name="ingresar" id="ingresar"/>


            </div>

        </div>

    </div>

    <div>
        <!--registrar -->
        <form action="<?php echo getBaseAddress() . "Registrar/registrar" ?>" method="post">

            <input type="submit" value="  Registrarse " class="btn btn-secondary">


        </form>
    </div>

</nav>

<br>
<div class="container">

	<div class="contenedor-formulario">
        <h2  class="text-primary " >Registrarse</h2>

	   <form  class="d-flex justify-content-center align-items-center container "  class="formulario" name="formulario_registro" method="post">


	       <div class="form-row">
              
					<div class="form-group col-md-6">
					    <label  class="text-primary " for="nombre">Nombre:</label>
						<input  class="form-control" type="text" id="nombre" name="nombre">
					</div>

					 <div class="form-group col-md-6">
					    <label  class="text-primary "  for="apellido">Apellido:</label>
						<input  class="form-control" type="text" id="apellido" name="apellido">
					</div>
					 <div class="form-group col-md-6">
					    <label  class="text-primary "  for="correo">Correo:</label>
						<input  class="form-control" type="email" id="correo" name="correo">
					</div>
					 <div class="form-group col-md-6">
					    <label  class="text-primary "for="cuit">Cuit:</label>
						<input  class="form-control" type="text" id="cuit" name="cuit">
					</div>
					 <div class="form-group col-md-6">
					    <label  class="text-primary " for="nombreUsuario">Nombre de usuario:</label>
						<input  class="form-control" type="text" id="nombreUsuario" name="nombreUsuario">
					</div>
					 <div class="form-group col-md-6">
					    <label  class="text-primary " for="pass">Contraseña:</label>
						<input  class="form-control" type="password" id="pass" name="pass">
					</div>
					 <div class="form-group col-md-6">
					    <label  class="text-primary" for="pass2">Repetir Contraseña:</label>
						<input  class="form-control" type="password" id="pass2" name="pass2">
					</div>
					 <div class="form-group col-md-6">
					   <label  class="text-primary " >Sexo:</label>
					   <select class="form-control" id="sexo" name="sexo">
					      <option>Hombre</option>
					      <option>Mujer</option>
					      <option>Otros</option>
					  </select>

					    

					</div>
					 <div class="form-group col-md-6">
					    <label class="text-primary" for="terminos">Acepto los Terminos y Condiciones</label>
						<input  type="checkbox" name="terminosYcondiciones" id="terminos" >
					</div>
				    <div class="form-group col-md-6">
					<input class="btn btn-primary" type="submit"  name="enviar" id="enviar" value="Enviar">
				    </div>
             </div>

				    </div>
             </div>

          
	    </form>
		
	</div>
</main>



<br>
<footer class="bg-primary page-footer font-small blue pt-4">

    <!-- Copyright -->
    <div class="bg-secondary text-dark footer-copyright text-center py-3">© 2019 Copyright:
        <a class="text-dark" href="https://mdbootstrap.com/education/bootstrap/"> OnMarket.com</a>
    </div>
    <!-- Copyright -->

</footer>

</body>

<script src="<?php echo getBaseAddress() . "Webroot/js/registrar.js" ?>"></script>
<script src="<?php echo getBaseAddress() . "Webroot/js/utilidades.js" ?>"></script>
<script src="<?php echo getBaseAddress() . "Webroot/js/login.js" ?>"></script>
