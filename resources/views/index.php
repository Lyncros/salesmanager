<!doctype html>
<html>
<head>
    <title>Buen cafe - Sales manager</title>
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/buencafe.css">
    <link rel="stylesheet" href="css/simple-sidebar.css">
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

    <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <div class="sidebar">
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
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper"> 
            <div class="container-fluid">
                <div class="col-sm-12 col-md-12 main">
                    <div class="row relative">
                        <aside class="contact-list col-sm-12 col-md-6 col-lg-4 infinite-scroll">
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

                        <section class="col-sm-12 col-md-8 col-lg-8 panel contact-detail pull-right" ng-show="vm.showContactDetails()">
                            <div class="col-sm-12 col-md-6" style="padding-left: 0px">
                                <div class="col-sm-12 col-md-12 panel">
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
                                                <span class="glyphicon glyphicon-pencil"></span>
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
                                            <a href="#address" data-toggle="collapse" class="btn">Direccion
                                                <span class="glyphicon glyphicon-plus"></span></a>
                                            <div id="address" class="collapse">
                                                <p>{{vm.contactSelected.address}}</p>
                                                <p>{{vm.contactSelected.city}}</p>
                                                <p>{{vm.contactSelected.country}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 panel">
                                    <header class="panel-title">
                                        <div class="panel-title pull-left">
                                            <h5>segmentacion</h5>
                                        </div>
                                        <div class="panel-actions text-right pull-right">
                                            <a href="#segmentation" data-toggle="collapse" class="btn">
                                                <span class="glyphicon glyphicon-plus"></span>
                                            </a>
                                        </div>
                                    </header>
                                    <div id="segmentation" class="collapse">
                                        <p>Interes #</p>
                                        <p>Interes #</p>
                                        <p>Interes #</p>
                                        <p>Interes #</p>
                                        <p>Interes #</p>
                                        <p>Interes #</p>
                                        <p>Interes #</p>
                                        <p>Interes #</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 panel">
                                <header class="panel-title">
                                    <h5>intereses</h5>
                                </header>
                                <div>
                                    <p>Interes #</p>
                                    <p>Interes #</p>
                                    <p>Interes #</p>
                                    <p>Interes #</p>
                                    <p>Interes #</p>
                                    <p>Interes #</p>
                                    <p>Interes #</p>
                                    <p>Interes #</p>
                                </div>
                            </div>
                            <div class="col-md-12 panel">
                                <header class="panel-title">
                                    <header class="panel-title">
                                        <div class="panel-title pull-left">
                                            <h5>informacion adicional</h5>
                                        </div>
                                        <div class="panel-actions text-right pull-right">
                                            <a href="#additional-information" data-toggle="collapse" class="btn" style="float:right">
                                                <span class="glyphicon glyphicon-plus"></span>
                                            </a>
                                        </div>
                                    </header>
                                </header>
                                <div id="additional-information" class="collapse">
                                    <p>Interes #</p>
                                    <p>Interes #</p>
                                    <p>Interes #</p>
                                    <p>Interes #</p>
                                    <p>Interes #</p>
                                    <p>Interes #</p>
                                    <p>Interes #</p>
                                    <p>Interes #</p>
                                </div>
                            </div>
                        </section>
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
<script type="text/javascript" src="bower_components/jquery/dist/jquery.min.js"></script> 
<script type="text/javascript" src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script> 

<!-- Application Scripts -->
<script type="text/javascript" src="scripts/app.js"></script>
<script type="text/javascript" src="scripts/controllers/Contacts.js"></script>
</html>