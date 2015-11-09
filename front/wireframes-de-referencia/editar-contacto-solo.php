<?php 
define( 'CURRENT_PAGE', 'Contact detail' );
define( 'CURRENT_SECTION', 'contacto' );
define( 'PAGE_TITLE', 'Detalle del contacto' );
require_once "inc/header.php";
?> 


    <div class="container-fluid">
      <div class="row">
        <?php require_once "inc/sidenav.php";?> 
        <div class="col-sm-10 col-sm-offset-2 col-md-10 col-md-offset-2 main">
          <div class="row relative">
          	
          	
            <section class="col-sm-6 col-md-6 panel contact-edit solo">
            	<header class="panel-heading">
                	<div class="panel-title pull-left">
                    	<h3><span class="icon icon-edit"></span> Editar contacto</h3>
                    </div>
                	<div class="panel-actions text-right pull-right">
                    	<a href="#" title="Guardar" class="btn btn-default btn-xs"><span class="icon icon-confirm"></span> Guardar</a>
                        <a href="#" title="Cancelar" class="btn btn-default btn-xs"><span class="icon icon-delete"></span> Cancelar</a>
                    </div>
            	</header>
                <hr/>
            	<div class="panel-body">
                        <form id="" class="form mb-lg">
                        	<div class="form-group">
                        		<label class="control-label">Nombre</label>
                        		<input type="text" name="name" class="form-control" placeholder="Ramiro" required/>
                        	</div>
                        	<div class="form-group">
                        		<label class="control-label">Apellido</label>
                        		<input type="text" name="name" class="form-control" placeholder="Gonzales" required/>
                        	</div>
                        	<div class="form-group">
                        		<label class="control-label">Email</label>
                        		<input type="email" name="email" class="form-control" placeholder="ramiro.gonzales@gmail.com" required/>
                        	</div>
                        	<div class="form-group">
                        		<label class="control-label">Teléfono</label>
                        		<input type="tel" name="telefono" class="form-control" placeholder="1234 3258" required/>
                        	</div>
                        	<div class="form-group">
                        		<label class="control-label">Celular</label>
                        		<input type="tel" name="celular" class="form-control" placeholder="15 2365 5698" required/>
                        	</div>
                            <div class="form-group">
                        		<label class="control-label">Linkedin</label>
                        		<input type="url" name="celular" class="form-control" placeholder="http://linkedin.com/ramiro.gonzales" required/>
                        	</div>
                            <div class="form-group">
                        		<label class="control-label">Skype</label>
                        		<input type="text" name="celular" class="form-control" placeholder="@ramiro.gonzales" required/>
                        	</div>
                        	<div class="form-group">
                        		<label class="control-label">Origen</label>
                        		<select data-plugin-selectTwo class="form-control populate">
                        		<option value="or1">Origen 1</option>
                        		<option value="or2">Origen 2</option>
                        		</select>
                        	</div>
                        	<div class="form-group">
                        		<label class="control-label">Tipo</label>
                        		<select data-plugin-selectTwo class="form-control populate">
                        		<option value="ca1">prospecto</option>
                        		<option value="ca2">inversor capitalización</option>
                                <option value="ca2">inversor capitalización + renta</option>
                                <option value="ca2">inversor renta</option>
                                <option value="ca2">propietario</option>
                                <option value="ca2">inquilino</option>
                        		</select>
                        	</div>
                            <div class="form-group">
                        		<label class="control-label">Categoría</label>
                        		<select data-plugin-selectTwo class="form-control populate">
                        		<option value="ca1">Platino</option>
                        		<option value="ca2">Oro</option>
                                <option value="ca2">Plata</option>
                                <option value="ca2">Bronce</option>
                        		</select>
                        	</div>
                        	<div class="form-group">
                        		<label class="control-label">Comentario</label>
                        		<textarea rows="5" class="form-control" placeholder="En este texto escribo un comentario libre sobre el contacto...and when we woke up, we had these bodies. If rubbin' frozen dirt in your crotch is wrong, hey I don't wanna be right. Is the Space Pope reptilian!? File not found. Oh, I don't have time for this. I have to go and buy a single piece of fruit with a coupon and then return it, making people wait behind me while I complain." required></textarea>
                        	</div>
                            <div class="form-group">
                        		<input type="submit" class="btn btn-primary dark_bg" value="Guardar">
                        	</div>
                        </form>
            	</div>
            </section>
          </div>
          


        </div>
      </div>
    </div>

  <?php require_once "inc/footer.php";?>
