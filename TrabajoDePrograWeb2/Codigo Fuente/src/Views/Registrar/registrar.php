
<main>
	<div class="contenedor-formulario">
		

	   <form  class="d-flex justify-content-center align-items-center container " action="<?php echo getBaseAddress() . "Registrar/validarRegistro" ?>" class="formulario" name="formulario_registro" method="post">

	   <form  class="d-flex justify-content-center align-items-center container " action=# class="formulario" name="formulario_registro" method="post">

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
					    <label  class="text-primary "for="cuir">Cuit:</label>
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
					   <select class="form-control" name="sexo">
					      <option>Hombre</option>
					      <option>Mujer</option>
					      <option>Otros</option>
					  </select>

					    

					</div>
					 <div class="form-group col-md-6">
					    <label class="text-primary" for="terminos">Acepto los Terminos y Condiciones</label>
						<input  type="checkbox" name="terminosYcondiciones" id="terminos" value="si">
					</div>
				    <div class="form-group col-md-6">
					<input class="btn btn-primary" type="submit" id="btn-submit" name="enviar" value="Enviar">
				    </div>
             </div>

            

				
				    </div>
             </div>

          
	    </form>
		
	</div>
</main>

	

</body>
</html>