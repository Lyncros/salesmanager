<!doctype html>
<html>
<head>
    <title>Buen cafe - Sales manager</title>
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/buencafe.css">
</head>

<body class="home" ng-app="salesManager" ng-controller="Contacts as vm">
    <nav class="navbar navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="icon icon-menu"></span>
                </button>
                <a class="navbar-brand" href="/">Buen cafe</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Contactos</a></li>
                </ul>
                <form class="navbar-form pull-right">
                    <input type="text" class="form-control" placeholder="Busqueda rapida...">
                </form>
                <a href="nuevo-contacto.php" class="btn-fix" data-toggle="tooltip" data-placement="left" title="Nuevo contacto">Nuevo contacto</a>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2 col-md-2 sidebar">
                <form class="navbar-form">
                    <ul class="filters">
                        <li>
                            <a class="btn" data-toggle="collapse"><span class="icon icon-tie"></span>Tipo de socio</a>
                            <div class="collapse in" id="contactType">
                                <ul class="nav nav-sidebar">
                                    <li class="checkbox" ng-repeat="type in vm.contactTypes">
                                        <input class="styled" type="checkbox">
                                        <label>{{type}}</label>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a class="btn" data-toggle="collapse"><span class="icon icon-boy"></span>Area agrupada</a>
                            <div class="collapse in" id="groupArea">
                                <ul class="nav nav-sidebar" ng-repeat="area in vm.groupAreas">
                                    <li class="checkbox">
                                        <input class="styled" type="checkbox"><label>{{area}}</label>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </form>
            </div> 
            <!--filtros-->
            <div class="col-sm-10 col-sm-offset-2 col-md-10 col-md-offset-2 main">
                <div class="row relative">
                    <aside class="task-list col-sm-6 col-md-6 col-lg-6 infinite-scroll">
                        <article class="task panel" ng-repeat="contact in vm.contacts">
                            <a href="#" ng-click="vm.selectContact(contact)">
                                <header class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h4><span class="icon icon-star"></span>{{contact.firstname}} {{contact.lastname}}</h4>
                                        </div>
                                    </div>
                                </header>
                                <div class="panel-body">
                                    <div class="row panel-subtitle">
                                        <h4 class="col-md-6">{{contact.company}}</h4>
                                    </div>
                                </div>
                            </a>
                        </article>
                    </aside>

                    <section class="col-sm-6 col-md-6 col-lg-6 panel contact-detail" ng-show="vm.showContactDetails()">
                        <header class="panel-heading">
                            <div class="panel-title pull-left">
                                <h3>
                                    <span class="icon icon-star"></span>
                                    <a href="#" data-toggle="tooltip" title="Tooltip on top">
                                        {{vm.contactSelected.honorific}} {{vm.contactSelected.firstname}} {{vm.contactSelected.lastname}}
                                    </a>
                                </h3>
                            </div>
                            <div class="panel-actions text-right pull-right">
                                <a href="#" data-toggle="tooltip" title="Editar contacto">
                                    <span class="icon icon-edit">Editar</span>
                                </a>
                            </div>
                        </header>
                        <div class="panel-body">
                            <div class="col-sm-12 col-md-12 col-lg-12 panel-data">
                                <div class="col-sm-6 col-md-6 col-lg-6 panel-data pull-left">
                                    <p><strong>{{vm.contactSelected.position}}</strong></p>
                                    <p><strong>{{vm.contactSelected.company}}</strong></p>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6 panel-data pull-right text-right">
                                    <p><strong>{{vm.contactSelected.sapCode}}</strong></p>
                                    <p><strong>{{vm.contactSelected.market}}</strong></p>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 panel-data v-card pull-left">
                                <p><span class="icon icon-email"></span>{{vm.contactSelected.email}}</p>
                                <p><span class="icon icon-phone"></span>{{vm.contactSelected.phone}}</p>
                                <p><span class="icon icon-skype"></span>{{vm.contactSelected.skype}}</p>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 panel-data pull-left">
                                <p>{{vm.contactSelected.address}}</p>
                                <p>{{vm.contactSelected.city}}</p>
                                <p>{{vm.contactSelected.country}}</p>
                            </div>
                        </div>
                    </section>
                </div>


                <!-- Modal nuevo tarea -->
                <div class="modal fade" id="nuevaTarea" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header dark_bg">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Nueva tarea</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <form>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-btn">
                                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tarea <span class="caret"></span></button>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="#">Llamar</a></li>
                                                            <li><a href="#">Visitar</a></li>
                                                            <li><a href="#">Tasar</a></li>
                                                            <li><a href="#">Mantenimiento</a></li>
                                                        </ul>
                                                    </div><!-- /btn-group -->
                                                    <input type="text" class="form-control" aria-label="">
                                                </div><!-- /input-group -->
                                            </div><!-- /.row -->

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
                                                <label class="control-label">Vincular con Operación</label>
                                                <select data-plugin-selectTwo class="form-control populate">
                                                    <option value="ej1">Compra inmueble Monroe 2345. $500.000</option>
                                                    <option value="ej2">Compra inmueble Monroe 2345. $500.000</option>
                                                    <option value="ej2">Compra inmueble Monroe 2345. $500.000</option>
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
                                <button type="button" class="btn btn-primary dark_bg">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal editar tarea -->
                <div class="modal fade" id="editarTarea" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header dark_bg">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Editar tarea</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <form>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-btn">
                                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tarea <span class="caret"></span></button>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="#">Llamar</a></li>
                                                            <li><a href="#">Visitar</a></li>
                                                            <li><a href="#">Tasar</a></li>
                                                            <li><a href="#">Mantenimiento</a></li>
                                                        </ul>
                                                    </div><!-- /btn-group -->
                                                    <input type="text" class="form-control" aria-label="">
                                                </div><!-- /input-group -->
                                            </div><!-- /.row -->

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
                                                <label class="control-label">Vincular con Operación</label>
                                                <select data-plugin-selectTwo class="form-control populate">
                                                    <option value="ej1">Compra inmueble Monroe 2345. $500.000</option>
                                                    <option value="ej2">Compra inmueble Monroe 2345. $500.000</option>
                                                    <option value="ej2">Compra inmueble Monroe 2345. $500.000</option>
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
                                <button type="button" class="btn btn-primary dark_bg">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal nueva operacion -->
                <div class="modal fade" id="nuevaOperacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header dark_bg">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="icon icon-delete"></span></button>
                                <h4 class="modal-title" id="myModalLabel">Nueva Operación prevista</h4>
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
                                                <input type="text" class="form-control" placeholder="Ingrese el ID de la propiedad">
                                                <br/>
                                                <a href="" class="btn btn-default btn-xs pull-right" target="_blank">Ir al abm</a>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Estado</label>
                                                <select data-plugin-selectTwo class="form-control populate">
                                                    <option value="ej1">10%</option>
                                                    <option value="ej2">25%</option>
                                                    <option value="ej2">50%</option>
                                                    <option value="ej2">75%</option>
                                                    <option value="ej2">90%</option>
                                                    <option value="ej2">Cerrada</option>
                                                    <option value="ej2">Perdida</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Monto estimado:</label>
                                                <input type="text" class="form-control" placeholder="Ingrese el monto estimado de inversión">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Fecha estimada de cierre</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="icon icon-calendar"></i>
                                                    </span>
                                                    <input type="text" data-plugin-datepicker="" class="form-control">
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
                                                <label class="control-label">Comentarios</label>
                                                <textarea class="form-control" rows="3"></textarea>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary dark_bg">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal editar operacion -->
                <div class="modal fade" id="editarOperacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header dark_bg">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="icon icon-delete"></span></button>
                                <h4 class="modal-title" id="myModalLabel">Editar Operación prevista</h4>
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
                                                <input type="text" class="form-control" placeholder="Ingrese el ID de la propiedad">
                                                <br/>
                                                <a href="" class="btn btn-default btn-xs pull-right" target="_blank">Ir al abm</a>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Estado</label>
                                                <select data-plugin-selectTwo class="form-control populate">
                                                    <option value="ej1">10%</option>
                                                    <option value="ej2">25%</option>
                                                    <option value="ej2">50%</option>
                                                    <option value="ej2">75%</option>
                                                    <option value="ej2">90%</option>
                                                    <option value="ej2">Cerrada</option>
                                                    <option value="ej2">Perdida</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Monto estimado:</label>
                                                <input type="text" class="form-control" placeholder="Ingrese el monto estimado de inversión">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Fecha estimada de cierre</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="icon icon-calendar"></i>
                                                    </span>
                                                    <input type="text" data-plugin-datepicker="" class="form-control">
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
                                                <label class="control-label">Comentarios</label>
                                                <textarea class="form-control" rows="3"></textarea>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary dark_bg">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<!-- Application Dependencies -->
<script type="text/javascript" src="bower_components/angular/angular.js"></script>
<script type="text/javascript" src="bower_components/angular-bootstrap/ui-bootstrap-tpls.js"></script>
<script type="text/javascript" src="bower_components/angular-resource/angular-resource.js"></script>

<!-- Application Scripts -->
<script type="text/javascript" src="scripts/app.js"></script>
<script type="text/javascript" src="scripts/controllers/Contacts.js"></script>
</html>