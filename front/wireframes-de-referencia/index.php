<?php 
define( 'CURRENT_PAGE', 'Incicio' );
define( 'CURRENT_SECTION', 'actividades' );
define( 'PAGE_TITLE', 'Home' );
require_once "inc/header.php";
?> 

    <div class="container-fluid">
      <div class="row">
        <?php require_once "inc/sidenav.php";?> 
        <div class="col-sm-10 col-sm-offset-2 col-md-10 col-md-offset-2 main">
          <div class="row relative">
          	<section class="task-filter-applied row">
                    <ul>
                        <li class="alert alert-estatus alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Urgente
                        </li>
                        <li class="alert alert-operacion alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Compra
                        </li>
                        <li class="alert alert-contacto alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Prospecto
                        </li>
                        <li class="alert alert-inmueble  alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Departamento
                        </li>
                    </ul>
                </section>
          	<aside class="task-list col-sm-6 col-md-6 infinite-scroll">
            	
            	<article class="task panel">
                	<a href="contact-detail.php" id="show">
                	<header class="panel-heading">
                    	<div class="row">
                        	<div class="col-md-8">
                            	<h4><span class="icon icon-star"></span> Ramiro Gonzales</h4>
                            </div>
                            <div class="col-md-4 text-right">
                            	<p class="date red">Ayer. 18:30hs</p>
                            </div>
                        </div>
                	</header>
                	<div class="panel-body">
                        	<div class="row">
                            	<p class="col-md-12 lead"><strong>Llamar</strong> Espera recibir información sobre propiedades 5036 y 5628. Aprovechar y mandarle info sobre 4587</p>
                        	</div>
                            <div class="row panel-subtitle">
                                <h4 class="col-md-6">Inversor capitalización + renta</h4>
                                <h5 class="col-md-6 text-right">Compra inmueble: <strong>$18.000.000</strong></h5>
                                <div class="status ac"></div>
                            </div>
                	</div>
                    </a>
                </article>
                <article class="task panel">
                	<a href="contact-detail.php" id="show">
                	<header class="panel-heading">
                    	<div class="row">
                        	<div class="col-md-8">
                            	<h4><span class="icon icon-star"></span> Ramiro Gonzales</h4>
                            </div>
                            <div class="col-md-4 text-right">
                            	<p class="date yellow">Hoy. 15:30hs</p>
                            </div>
                        </div>
                	</header>
                	<div class="panel-body">
                        	<div class="row">
                            	<p class="col-md-12 lead"><strong>Llamar</strong> Espera recibir información sobre propiedades 5036 y 5628. Aprovechar y mandarle info sobre 4587</p>
                        	</div>
                            <div class="row panel-subtitle">
                                <h4 class="col-md-6">Inversor capitalización + renta</h4>
                                <h5 class="col-md-6 text-right">Compra inmueble: <strong>$18.000.000</strong></h5>
                                <div class="status nc"></div>
                            </div>
                	</div>
                    </a>
                </article>
                <article class="task panel">
                	<a href="contact-detail.php" id="show">
                	<header class="panel-heading">
                    	<div class="row">
                        	<div class="col-md-8">
                            	<h4><span class="icon icon-star"></span> Ramiro Gonzales</h4>
                            </div>
                            <div class="col-md-4 text-right">
                            	<p class="date green">Mañana. 12:30hs</p>
                            </div>
                        </div>
                	</header>
                	<div class="panel-body">
                        	<div class="row">
                            	<p class="col-md-12 lead"><strong>Llamar</strong> Espera recibir información sobre propiedades 5036 y 5628. Aprovechar y mandarle info sobre 4587</p>
                        	</div>
                            <div class="row panel-subtitle">
                                <h4 class="col-md-6">Inversor capitalización + renta</h4>
                                <h5 class="col-md-6 text-right">Compra inmueble: <strong>$18.000.000</strong></h5>
                                <div class="status mc"></div>
                            </div>
                	</div>
                    </a>
                </article>
                <article class="task panel">
                	<a href="contact-detail.php" id="show">
                	<header class="panel-heading">
                    	<div class="row">
                        	<div class="col-md-8">
                            	<h4><span class="icon icon-star"></span> Ramiro Gonzales</h4>
                            </div>
                            <div class="col-md-4 text-right">
                            	<p class="date">14/10/2015. 15:30hs</p>
                            </div>
                        </div>
                	</header>
                	<div class="panel-body">
                        	<div class="row">
                            	<p class="col-md-12 lead"><strong>Llamar</strong> Espera recibir información sobre propiedades 5036 y 5628. Aprovechar y mandarle info sobre 4587</p>
                        	</div>
                            <div class="row panel-subtitle">
                                <h4 class="col-md-6">Inversor capitalización + renta</h4>
                                <h5 class="col-md-6 text-right">Compra inmueble: <strong>$18.000.000</strong></h5>
                                <div class="status f"></div>
                            </div>
                	</div>
                    </a>
                </article>
                <article class="task panel no-task">
                	<a href="contact-detail.php" id="show">
                	<header class="panel-heading">
                    	<div class="row">
                        	<div class="col-md-8">
                            	<h4><span class="icon icon-star"></span> Ramiro Gonzales</h4>
                            </div>
                            <div class="col-md-4 text-right">
                            	<p class="date black">Cierre: 20/12/2015</p>
                            </div>
                        </div>
                	</header>
                	<div class="panel-body">
                    		<div class="row">
                            	<p class="col-md-12 lead">Compra inmueble: <strong>$18.000.000</strong></p>
                        	</div>
                            <div class="row panel-subtitle">
                                <h4 class="col-md-6">Inversor capitalización + renta</h4>
                                <div class="status s"></div>
                            </div>
                	</div>
                    </a>
                </article>
                <article class="task panel no-task">
                	<a href="contact-detail.php" id="show">
                	<header class="panel-heading">
                    	<div class="row">
                        	<div class="col-md-8">
                            	<h4><span class="icon icon-star"></span> Ramiro Gonzales</h4>
                            </div>
                            <div class="col-md-4 text-right">
                            	<p class="date black">Cierre: 20/12/2015</p>
                            </div>
                        </div>
                	</header>
                	<div class="panel-body">
                    		<div class="row">
                            	<p class="col-md-12 lead">Compra inmueble: <strong>$18.000.000</strong></p>
                        	</div>
                            <div class="row panel-subtitle">
                                <h4 class="col-md-6">Inversor capitalización + renta</h4>
                                <div class="status s"></div>
                            </div>
                	</div>
                    </a>
                </article>
                <article class="task panel no-task">
                	<a href="contact-detail.php" id="show">
                	<header class="panel-heading">
                    	<div class="row">
                        	<div class="col-md-8">
                            	<h4><span class="icon icon-star"></span> Ramiro Gonzales</h4>
                            </div>
                            <div class="col-md-4 text-right">
                            	<p class="date black">Cierre: 20/12/2015</p>
                            </div>
                        </div>
                	</header>
                	<div class="panel-body">
                    		<div class="row">
                            	<p class="col-md-12 lead">Compra inmueble: <strong>$18.000.000</strong></p>
                        	</div>
                            <div class="row panel-subtitle">
                                <h4 class="col-md-6">Inversor capitalización + renta</h4>
                                <div class="status s"></div>
                            </div>
                	</div>
                    </a>
                </article>
                <article class="task panel no-task">
                	<a href="contact-detail.php" id="show">
                	<header class="panel-heading">
                    	<div class="row">
                        	<div class="col-md-8">
                            	<h4><span class="icon icon-star"></span> Ramiro Gonzales</h4>
                            </div>
                            <div class="col-md-4 text-right">
                            	<p class="date black">Cierre: 20/12/2015</p>
                            </div>
                        </div>
                	</header>
                	<div class="panel-body">
                    		<div class="row">
                            	<p class="col-md-12 lead">Compra inmueble: <strong>$18.000.000</strong></p>
                        	</div>
                            <div class="row panel-subtitle">
                                <h4 class="col-md-6">Inversor capitalización + renta</h4>
                                <div class="status s"></div>
                            </div>
                	</div>
                    </a>
                </article>
                <article class="task panel no-task">
                	<a href="contact-detail.php" id="show">
                	<header class="panel-heading">
                    	<div class="row">
                        	<div class="col-md-8">
                            	<h4><span class="icon icon-star"></span> Ramiro Gonzales</h4>
                            </div>
                            <div class="col-md-4 text-right">
                            	<p class="date black">Cierre: 20/12/2015</p>
                            </div>
                        </div>
                	</header>
                	<div class="panel-body">
                    		<div class="row">
                            	<p class="col-md-12 lead">Compra inmueble: <strong>$18.000.000</strong></p>
                        	</div>
                            <div class="row panel-subtitle">
                                <h4 class="col-md-6">Inversor capitalización + renta</h4>
                                <div class="status s"></div>
                            </div>
                	</div>
                    </a>
                </article>
                <article class="task panel no-task">
                	<a href="contact-detail.php" id="show">
                	<header class="panel-heading">
                    	<div class="row">
                        	<div class="col-md-8">
                            	<h4><span class="icon icon-star"></span> Ramiro Gonzales</h4>
                            </div>
                            <div class="col-md-4 text-right">
                            	<p class="date black">Cierre: 20/12/2015</p>
                            </div>
                        </div>
                	</header>
                	<div class="panel-body">
                    		<div class="row">
                            	<p class="col-md-12 lead">Compra inmueble: <strong>$18.000.000</strong></p>
                        	</div>
                            <div class="row panel-subtitle">
                                <h4 class="col-md-6">Inversor capitalización + renta</h4>
                                <div class="status s"></div>
                            </div>
                	</div>
                    </a>
                </article>
                <article class="task panel no-task">
                	<a href="contact-detail.php" id="show">
                	<header class="panel-heading">
                    	<div class="row">
                        	<div class="col-md-8">
                            	<h4><span class="icon icon-star"></span> Ramiro Gonzales</h4>
                            </div>
                            <div class="col-md-4 text-right">
                            	<p class="date black">Cierre: 20/12/2015</p>
                            </div>
                        </div>
                	</header>
                	<div class="panel-body">
                    		<div class="row">
                            	<p class="col-md-12 lead">Compra inmueble: <strong>$18.000.000</strong></p>
                        	</div>
                            <div class="row panel-subtitle">
                                <h4 class="col-md-6">Inversor capitalización + renta</h4>
                                <div class="status s"></div>
                            </div>
                	</div>
                    </a>
                </article>

            </aside>
            
          </div>
          

        <!-- Modal nuevo contacto -->
        <div class="modal fade" id="nuevoContacto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Nuevo contacto</h4>
              </div>
              <div class="modal-body">
              	<div class="row">
                <form id="" class="form mb-lg">
                	<div class="form-group col-lg-6">
                    					<label class="control-label">Nombre</label>
                    					<input type="text" name="name" class="form-control" placeholder="Escriba el nombre del contacto..." required/>
                    					</div>
                    					<div class="form-group col-lg-6">
                    					<label class="control-label">Apellido</label>
                    					<input type="text" name="name" class="form-control" placeholder="Escriba el apellido del contacto..." required/>
                    					</div>
                    					<div class="form-group col-lg-4">
                    					<label class="control-label">Email</label>
                    					<input type="email" name="email" class="form-control" placeholder="Escriba el email del contacto..." required/>
                    					</div>
                    					<div class="form-group col-lg-4">
                    					<label class="control-label">Teléfono</label>
                    					<input type="tel" name="telefono" class="form-control" placeholder="Escriba el teléfono del contacto..." required/>
                    					</div>
                    					<div class="form-group col-lg-4">
                    					<label class="control-label">Celular</label>
                    					<input type="tel" name="celular" class="form-control" placeholder="Escriba el celular del contacto..." required/>
                    					</div>
                    					<div class="form-group col-lg-6">
                    					<label class="control-label">Origen</label>
                    					<select data-plugin-selectTwo class="form-control populate">
                    					<option value="or1">Origen 1</option>
                    					<option value="or2">Origen 2</option>
                    					</select>
                    					</div>
                    					<div class="form-group col-lg-6">
                    					<label class="control-label">Categoría</label>
                    					<select data-plugin-selectTwo class="form-control populate">
                    					<option value="ca1">Categoría 1</option>
                    					<option value="ca2">Categoría 2</option>
                    					</select>
                    					</div>
                    					<div class="form-group col-lg-12">
                    					<label class="control-label">Comentario</label>
                    					<textarea rows="5" class="form-control" placeholder="Escriba sus comentarios sobre el contacto..." required></textarea>
                    					</div>
                    				</form>
                                    </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary">Guardar</button>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Modal nuevo tarea -->
        <div class="modal fade" id="nuevaTarea" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Nueva tarea</h4>
              </div>
              <div class="modal-body">
              	<div class="row">
                <div class="col-md-10 col-md-offset-1">
                <form id="" class="form-horizontal mb-lg" novalidate>
                                                	<div class="form-group">
                                                    <label class="control-label">Acción</label>
                                                    <select data-plugin-selectTwo class="form-control populate">
															<option value="ac1">Llamar</option>
															<option value="ac2">Enviar mail</option>
                                                    </select>
                                                    </div>
                                                	<div class="form-group">
                                                    <label class="control-label">Estado</label>
                                                	<div class="switch switch-success">
														<input type="checkbox" name="switch" data-plugin-ios-switch checked="checked" />
													</div>
                                                    </div>
                                                    <div class="form-group">
                                                    <label class="control-label">Asignar fecha</label>
                                                    <div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-calendar"></i>
														</span>
														<input type="text" data-plugin-datepicker="" class="form-control">
													</div>
                                                    </div>
                                                    <div class="form-group">
                                                    <label class="control-label">Asignar hora</label>
                                                    <div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-clock-o"></i>
														</span>
														<input type="text" data-plugin-timepicker="" class="form-control">
													</div>
                                                    </div>
                                                    <div class="form-group">
                                                    <label class="control-label">Ejecutivo asignado</label>
                                                    <select data-plugin-selectTwo class="form-control populate">
															<option value="ej1">Ejecutivo 1</option>
															<option value="ej2">Ejecutivo 2</option>
                                                    </select>
                                                    </div>
                                                    <div class="form-group">
                                                    <label class="control-label">Vincular con contacto</label>
                                                    <select data-plugin-selectTwo class="form-control populate">
															<option value="ej1">Alberto Juarez</option>
															<option value="ej2">Mario Levrero</option>
                                                    </select>
                                                    </div>
                                                    <div class="form-group">
                                                    <label class="control-label">Comentarios</label>
                                                    <textarea class="form-control" rows="3" id="textareaAutosize" data-plugin-textarea-autosize="" style="overflow: hidden; word-wrap: break-word; resize: none; height: 74px;"></textarea>
                                                    </div>
                                                </form>
                                                </div>
              	</div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary">Guardar</button>
              </div>
            </div>
          </div>
        </div>


        </div>
      </div>
    </div>
    
    <?php require_once "inc/footer.php";?> 
