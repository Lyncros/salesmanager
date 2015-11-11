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
                    <li><a href="#">Contactos</a></li>
                </ul>
                <form class="navbar-form" ng-submit="vm.updateSearchKey(searchText)">
                    <input type="text" class="form-control" ng-model="searchText" placeholder="Busqueda rapida...">
                </form>
                <a href="nuevo-contacto.php" class="btn-fix" data-toggle="tooltip" data-placement="left" title="Nuevo contacto">Nuevo contacto</a>
            </div>
        </div>
    </nav>

    <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <div class="sidebar">
                <div class="active-filters">
                    <h5 ng-show="vm.hasFilters()">Filtrado por:</h5>
                    <ul ng-show="vm.hasSearchKeyFilters()">
                        <li>
                            <a ng-click="vm.resetSearchKey()"><span class="glyphicon glyphicon-remove"></span></a>
                            {{vm.searchKeys.join(' ')}}
                        </li>
                    </ul>
                    <ul>
                        <li ng-repeat="type in vm.filterContactType">
                            <a ng-click="vm.updateFilterContactType(type)"><span class="glyphicon glyphicon-remove"></span></a>
                            {{type.description}}
                        </li>
                        <li ng-repeat="ga in vm.filterGroupArea">
                            <a ng-click="vm.updateFilterGroupArea(ga)"><span class="glyphicon glyphicon-remove"></span></a>
                            {{ga.description}}
                        </li>
                    </ul>
                </div>
                <form class="navbar-form">
                    <ul class="filters">
                        <li>
                            <a class="btn" ng-click="vm.doFilter()"><span class="glyphicon glyphicon-chevron-up"></span>Tipo de socio</a>
                            <div class="" id="contactType">
                                <ul class="nav nav-sidebar">
                                    <li class="checkbox" ng-repeat="type in vm.contactTypes">
                                        <a ng-click="vm.updateFilterContactType(type)">{{type.description}}</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a class="btn" data-toggle=""><span class="glyphicon glyphicon-chevron-up"></span>Area agrupada</a>
                            <div class=" in" id="groupArea">
                                <ul class="nav nav-sidebar">
                                    <li class="checkbox" ng-repeat="area in vm.groupAreas">
                                        <a ng-click="vm.updateFilterGroupArea(area)">{{area.description}}</a>
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
                            <article class="task panel" ng-repeat="contact in vm.contacts  | filter:vm.doFilter">
                                <a href="#" ng-click="vm.selectContact(contact)">
                                    <header class="panel-heading">
                                        <div class="col-md-8">
                                            <h4><span class="icon icon-star"></span>{{contact.firstname}} {{contact.lastname}}</h4>
                                        </div>
                                        <div class="row panel-subtitle">
                                            <h4 class="col-md-4">{{contact.company}}</h4>
                                        </div>
                                    </header>
                                </a>
                            </article>
                        </aside>

                        <section class="col-sm-12 col-md-8 col-lg-8 panel contact-detail pull-right" ng-show="vm.showContactDetails()">
                            <div class="col-sm-12 col-md-6" style="padding-left: 0px">
                                <div class="col-sm-12 col-md-12 panel">
                                    <header class="panel-heading">
                                        <div class="panel-title pull-left">
                                            <h3>
                                                <span>
                                                    {{vm.contactSelected.honorific}} {{vm.contactSelected.firstname}} {{vm.contactSelected.lastname}}
                                                </span>
                                                <a ng-show="vm.contactSelected.linkedin" href="{{vm.contactSelected.linkedinProfile}}">
                                                    <span class="icon-linkedin"></span>
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
                                            <div class="col-sm-12 col-md-7 col-lg-7 panel-data pull-left">
                                                <p>
                                                    <strong ng-show="vm.contactSelected.position">{{vm.contactSelected.position}} en</strong>
                                                    <strong>{{vm.contactSelected.company}}</strong>
                                                </p>
                                                <p><strong>{{vm.contactSelected.consolidatedCode}}</strong></p>
                                                <p><strong>{{vm.contactSelected.market}}</strong></p>
                                            </div>
                                            <div class="col-sm-12 col-md-5 col-lg-5 panel-data pull-right text-right">
                                                <p><span class="contact-type">{{vm.contactSelected.contactType.description}}</span></p>
                                                <div class="progress" ng-if="vm.contactSelected">
                                                    <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" 
                                                        aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" 
                                                        style="width: {{vm.calculateCompletenessPercentage(vm.contactSelected)}}">
                                                        {{vm.calculateCompletenessPercentage(vm.contactSelected)}}
                                                    </div>
                                                </div>
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
                                                <p>{{vm.contactSelected.street}}</p>
                                                <p>{{vm.contactSelected.city}} {{vm.contactSelected.postalCode}}</p>
                                                <p>{{vm.contactSelected.country}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 panel">
                                    <header class="panel-title">
                                        <div class="panel-title">
                                            <h5>segmentacion</h5>
                                            <a href="#segmentation" data-toggle="collapse" class="btn pull-right">
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
                                        <div class="panel-title">
                                            <h5>informacion adicional</h5>
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