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
          	
            <section class="col-sm-6 col-md-6 panel contact-detail solo">
            	<header class="panel-heading">
                	<div class="panel-title pull-left">
                    <h3><span class="icon icon-star"></span> <a href="#" data-toggle="tooltip" data-placement="top" title="Tooltip on top">Ramiro Gonzales</a> <small>Inversor capitalización + renta</small></h3>
                    </div>
                	<div class="panel-actions text-right pull-right">
                    	<a href="#" data-toggle="tooltip" data-placement="top" title="Escribir un mail"><span class="icon icon-send"></span></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Llamar al contacto"><span class="icon icon-mobile"></span></a>
                        <a href="editar-contacto-solo.php" data-toggle="tooltip" data-placement="top" title="Editar contacto"><span class="icon icon-edit"></span></a>
                        <a href="contactos.php" data-toggle="tooltip" data-placement="top" title="Volver al listado"><span class="icon icon-delete"></span></a>
                    </div>
                    <div class="v-card pull-left">
                    	<p><span class="icon icon-mobile"></span> 4240 1377</p>
                    	<p><span class="icon icon-mobile"></span> 15 36010545</p>
                    	<p><span class="icon icon-send"></span> ramiro@gmail.com</p>
                    	<p><a href="#" title="Ver perfil en Linkedin"><span class="icon-linkedin"></span></a></p>
                    	<p><a href="#" title="Skype"><span class="icon-skype"></span></a></p>
                    </div>
                    <div class="btn-group pull-right">
                        	<button class="btn btn-default btn-xs" data-toggle="modal" data-target="#nuevaTarea">Nueva tarea</button>
                        	<button class="btn btn-default btn-xs" data-toggle="modal" data-target="#nuevaOperacion">Nueva Operación</button>
                    </div>
                    <div class="comment">
                    	<p>En este texto escribo un comentario libre sobre el contacto...and when we woke up, we had these bodies. If rubbin' frozen dirt in your crotch is wrong, hey I don't wanna be right. Is the Space Pope reptilian!? File not found. Oh, I don't have time for this. I have to go and buy a single piece of fruit with a coupon and then return it, making people wait behind me while I complain.</p>
                    </div>
            	</header>
            	<div class="panel-body">
                	<div class="row">
                        <div class="alert alert-estatus" role="alert">
                            <div class="alert-heading row">
                                <div class="col-md-10">
                                    <div class="checkbox pull-left">
                                        <input type="checkbox" class="styled" id="singleCheckbox2" value="option2" aria-label="Single checkbox Two">
                                        <label></label>
                                    </div>
                                    <h4 class="pull-left"><strong>Proxima:</strong> Llamar por teléfono. Ofrecerle propiedad de Mitre 345.</h4>
                                </div>
                                <div class="col-md-2">
                                    <p class="date text-right">Hoy. 15:30hs</p>
                                </div>
                            </div>
                            <div class="row operacion">
                                <p class="col-md-8"><small>Operación:</small> <strong>Compra inmueble</strong></p>
                                <p class="col-md-4 text-right">Inversión: <strong>$18.000.000</strong></p>
                                <div class="status ac"></div>
                            </div>
                        </div>
                        <div class="pending-list">
                        	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                              <article class="task panel">
                                <header class="panel-heading" role="tab" id="headingOne">
                                    <a role="button" class="pull-left"data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    	<div class="checkbox">
                                    		<input class="styled" id="singleCheckbox1" value="option1" aria-label="Single checkbox One" type="checkbox">
                                    		<label>Visitar para tazacion de inmueble</label>
                                    	</div>
                                    </a>
                                    <div class="pull-left task-edit">
                                    	<a class="icon icon-edit" data-toggle="modal" data-target="#editarTarea"></a>
                                        <a class="icon icon-trash"></a>
                                    </div>
                                </header>
                                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                    	<p class="date">Ayer. 15:30hs</p>
                                    	<div class="row panel-subtitle">
                                    		<h4 class="col-md-6"><small>Operación:</small> Compra inmueble</h4>
                                    		<h5 class="col-md-6 text-right">Inversión: <strong>$18.000.000</strong></h5>
                                    		<div class="status ac"></div>
                                    	</div>
                                    </div>
                                </div>
                              </article>
                              <article class="task panel">
                                <header class="panel-heading" role="tab" id="headingTwo">
                                    <a role="button" class="pull-left"data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    	<div class="checkbox">
                                    		<input class="styled" id="singleCheckbox2" value="option2" aria-label="Single checkbox Two" type="checkbox">
                                    		<label>Visitar para tazacion de inmueble</label>
                                    	</div>
                                    </a>
                                    <div class="pull-left task-edit">
                                    	<a class="icon icon-edit" data-toggle="modal" data-target="#editarTarea"></a>
                                        <a class="icon icon-trash"></a>
                                    </div>
                                </header>
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                    	<p class="date">Ayer. 15:30hs</p>
                                    	<div class="row panel-subtitle">
                                    		<h4 class="col-md-6"><small>Operación:</small> Compra inmueble</h4>
                                    		<h5 class="col-md-6 text-right">Inversión: <strong>$18.000.000</strong></h5>
                                    		<div class="status ac"></div>
                                    	</div>
                                    </div>
                                </div>
                              </article>
                              <article class="task panel">
                                <header class="panel-heading" role="tab" id="headingThree">
                                    <a role="button" class="pull-left"data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    	<div class="checkbox">
                                    		<input class="styled" id="singleCheckbox3" value="option3" aria-label="Single checkbox Three" type="checkbox">
                                    		<label>Visitar para tazacion de inmueble</label>
                                    	</div>
                                    </a>
                                    <div class="pull-left task-edit">
                                    	<a class="icon icon-edit" data-toggle="modal" data-target="#editarTarea"></a>
                                        <a class="icon icon-trash"></a>
                                    </div>
                                </header>
                                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                    <div class="panel-body">
                                    	<p class="date">Ayer. 15:30hs</p>
                                    	<div class="row panel-subtitle">
                                    		<h4 class="col-md-6"><small>Operación:</small> Compra inmueble</h4>
                                    		<h5 class="col-md-6 text-right">Inversión: <strong>$18.000.000</strong></h5>
                                    		<div class="status ac"></div>
                                    	</div>
                                    </div>
                                </div>
                              </article>
                            </div>
                        </div>
                    </div>
                    <section class="tabs">

                      <!-- Nav tabs -->
                      <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#actividades" aria-controls="home" role="tab" data-toggle="tab">Actividades</a></li>
                        <li role="presentation"><a href="#operaciones" aria-controls="profile" role="tab" data-toggle="tab">Operaciones</a></li>
                      </ul>
                    
                      <!-- Tab panes -->
                      <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="actividades">
                        	<article class="timeline">
                            	<header>
                                    <h4>Historial de actividades</h4>
                                </header>
                                <div class="task-history">
                                    <ul>
                                        <li><article><p><small>15/10/2015 - 15:30hs</small></p><h5>Llamar por teléfono. Ofrecerle propiedad de Mitre 345.</h5></article></li>
                                        <li><article><p><small>15/10/2015 - 15:30hs</small></p><h5>Llamar por teléfono. Ofrecerle propiedad de Mitre 345.</h5></article></li>
                                        <li><article><p><small>15/10/2015 - 15:30hs</small></p><h5>Llamar por teléfono. Ofrecerle propiedad de Mitre 345.</h5></article></li>
                                        <li><article><p><small>15/10/2015 - 15:30hs</small></p><h5>Llamar por teléfono. Ofrecerle propiedad de Mitre 345.</h5></article></li>
                                        <li><article><p><small>15/10/2015 - 15:30hs</small></p><h5>Llamar por teléfono. Ofrecerle propiedad de Mitre 345.</h5></article></li>
                                    </ul>
                                </div>
                            </article>
                        </div>
                        
                        <div role="tabpanel" class="tab-pane" id="operaciones">
                        	<article class="timeline">
                            	<header>
                                    <h4>Operaciones</h4>
                                </header>
                                <div class="task-history">
                                    <ul>
                                        <li><article><p><small>15/10/2010 - 25/05/2012</small></p><h5>Compra departamento Olavarria 432 5C. Quilmes. <strong>$500.000</strong></h5></article></li>
                                        <li><article><p><small>15/10/2010 - 25/05/2012</small></p><h5>Compra departamento Olavarria 432 5C. Quilmes. <strong>$500.000</strong></h5></article></li>
                                        <li><article><p><small>15/10/2010 - 25/05/2012</small></p><h5>Compra departamento Olavarria 432 5C. Quilmes. <strong>$500.000</strong></h5></article></li>
                                        <li><article><p><small>15/10/2010 - 25/05/2012</small></p><h5>Compra departamento Olavarria 432 5C. Quilmes. <strong>$500.000</strong></h5></article></li>
                                        <li><article><p><small>15/10/2010 - 25/05/2012</small></p><h5>Compra departamento Olavarria 432 5C. Quilmes. <strong>$500.000</strong></h5></article></li>
                                    </ul>
                                </div>
                            </article>
                        </div>
                      </div>
                    </section>
            	</div>
            </section>
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
                	<form>
                        	<div class="form-group">
                        		<label class="control-label">Acción</label>
								<textarea class="form-control" rows="2"></textarea>
                        	</div>
                        	
                        	<div class="form-group">
                        		<label class="control-label">Asignar fecha</label>
                        		<div class="input-group">
                        			<span class="input-group-addon">
                        				<i class="icon icon-calendar"></i>
                        			</span>
                        			<input type="text" data-plugin-datepicker="" class="form-control">
                        		</div>
                        	</div>
                            
                        	<div class="form-group">
                        		<label class="control-label">Asignar hora</label>
                        		<div class="input-group">
                        			<span class="input-group-addon">
                        				<i class="icon icon-watch"></i>
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
                        		<label class="control-label">Vincular con Operación</label>
                        		<select data-plugin-selectTwo class="form-control populate">
                        			<option value="ej1">Compra inmueble Monroe 2345. $500.000</option>
                        			<option value="ej2">Compra inmueble Monroe 2345. $500.000</option>
                                    <option value="ej2">Compra inmueble Monroe 2345. $500.000</option>
                        		</select>
                                <br/>
                                <a href="" class="btn btn-default btn-xs pull-right" data-toggle="modal" data-target="#nuevaOperacion">Nueva operación</a>
                        	</div>
                        	<div class="form-group">
                        		<label class="control-label">Comentarios</label>
                        		<textarea class="form-control" rows="3"></textarea>
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
        
        <!-- Modal editar tarea -->
        <div class="modal fade" id="editarTarea" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Editar tarea</h4>
              </div>
              <div class="modal-body">
              	<div class="row">
                <div class="col-md-10 col-md-offset-1">
                	<form>
                        	<div class="form-group">
                        		<label class="control-label">Acción</label>
								<textarea class="form-control" rows="2"></textarea>
                        	</div>
                        	
                        	<div class="form-group">
                        		<label class="control-label">Asignar fecha</label>
                        		<div class="input-group">
                        			<span class="input-group-addon">
                        				<i class="icon icon-calendar"></i>
                        			</span>
                        			<input type="text" data-plugin-datepicker="" class="form-control">
                        		</div>
                        	</div>
                            
                        	<div class="form-group">
                        		<label class="control-label">Asignar hora</label>
                        		<div class="input-group">
                        			<span class="input-group-addon">
                        				<i class="icon icon-watch"></i>
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
                        		<label class="control-label">Vincular con Operación</label>
                        		<select data-plugin-selectTwo class="form-control populate">
                        			<option value="ej1">Compra inmueble Monroe 2345. $500.000</option>
                        			<option value="ej2">Compra inmueble Monroe 2345. $500.000</option>
                                    <option value="ej2">Compra inmueble Monroe 2345. $500.000</option>
                        		</select>
                                <br/>
                                <a href="" class="btn btn-default btn-xs pull-right">Nueva operación</a>
                        	</div>
                        	<div class="form-group">
                        		<label class="control-label">Comentarios</label>
                        		<textarea class="form-control" rows="3"></textarea>
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
        
        <!-- Modal nueva operacion -->
        <div class="modal fade" id="nuevaOperacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="icon icon-delete"></span></button>
                <h4 class="modal-title" id="myModalLabel">Nueva Operación</h4>
              </div>
              <div class="modal-body">
              	<div class="row">
                <div class="col-md-10 col-md-offset-1">
                	<form>
                        	<div class="form-group">
                        		<label class="control-label">Operación</label>
								<select data-plugin-selectTwo class="form-control populate">
                        			<option value="ej1">Compra</option>
                        			<option value="ej2">Venta</option>
                                    <option value="ej2">Alquiler</option>
                                    <option value="ej2">Alquiler temporario</option>
                        		</select>
                        	</div>
                            <div class="form-group">
                        		<label class="control-label">Vincular con Inmueble</label>
                        		<select data-plugin-selectTwo class="form-control populate">
                        			<option value="ej1">inmueble 1</option>
                        			<option value="ej2">inmueble 2</option>
                                    <option value="ej2">inmueble 3</option>
                        		</select>
                                <br/>
                                <a href="" class="btn btn-default btn-xs pull-right">Nuevo Inmueble *</a>
                                <p><em>* Este registro no se almacenará en el abm.</em></p>
                        	</div>
                            
                        	<div class="form-group">
                        		<label class="control-label">Monto estimado:</label>
								<input type="text" class="form-control" placeholder="Ingrese el monto estimado de inversión">
                        	</div>
                            
                            <div class="form-group">
                        		<label class="control-label">Ganancia estimada:</label>
								<input type="text" class="form-control" placeholder="Ingrese el monto estimado de ganancia">
                        	</div>
                        	
                        	<div class="form-group">
                        		<label class="control-label">Ejecutivo asignado</label>
                        		<select data-plugin-selectTwo class="form-control populate">
                        			<option value="ej1">Ejecutivo 1</option>
                        			<option value="ej2">Ejecutivo 2</option>
                        		</select>
                        	</div>
                            
                        	<div class="form-group">
                        		<label class="control-label">Comentarios</label>
                        		<textarea class="form-control" rows="3"></textarea>
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