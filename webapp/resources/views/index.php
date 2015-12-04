<!doctype html>
<html>
<head>
    <title>Buen cafe - Sales manager</title>
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/buencafe.css">
    <link rel="stylesheet" href="css/simple-sidebar.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="bower_components/angular-chart.js/dist/angular-chart.css">
</head>

<body class="home" ng-app="salesManager" ng-controller="ContactsController as vm">
<nav class="navbar navbar-fixed-top">
    <div class="container-fluid nopadding">
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
            <form class="navbar-form pull-right" ng-submit="vm.updateSearchKey(searchText); searchText = null;">
                <input type="text" class="form-control" ng-model="searchText" placeholder="Busqueda rapida...">
            </form>
            <a ng-click="vm.newContact()" class="btn-add-contact" data-toggle="tooltip" data-placement="left" title="Nuevo contacto"
                ng-hide="vm.isContactEditionVisible()">
                <span class="glyphicon glyphicon-plus glyphicon"></span>
            </a>
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
                    <li ng-repeat="type in vm.contactTypeFilters">
                        <a ng-click="vm.updateFilterContactType(type)"><span class="glyphicon glyphicon-remove"></span></a>
                        {{type.description}}
                    </li>
                    <li ng-repeat="ga in vm.groupAreaFilters">
                        <a ng-click="vm.updateFilterGroupArea(ga)"><span class="glyphicon glyphicon-remove"></span></a>
                        {{ga.description}}
                    </li>
                </ul>
            </div>
            <form class="navbar-form">
                <ul class="filters">
                    <li>
                        <a class="btn" href="#contactTypeFilterList" data-toggle="collapse">Tipo de socio</a>
                        <ul id="contactTypeFilterList"  class="nav nav-sidebar collapse in">
                            <li class="checkbox" ng-repeat="type in vm.contactTypes">
                                <a ng-click="vm.updateFilterContactType(type)">{{type.description}}</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="btn" href="#groupAreaFilterList" data-toggle="collapse">Area agrupada</a>
                        <ul id="groupAreaFilterList" class="nav nav-sidebar collapse in">
                            <li class="checkbox" ng-repeat="area in vm.groupAreas">
                                <a ng-click="vm.updateFilterGroupArea(area)">{{area.description}}</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </form>
        </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper"> 
        <div class="container main">
            <div class="row">
                <aside class="contact-list col-sm-12 col-md-5 col-lg-5">
                    <article class="contact-list-actions text-right">
                        <a href="" class="btn btn-default {{vm.getCssClassOrderByAZ()}}" title="Ordenar A-Z" ng-click="vm.orderByAZ()">
                            <span class="glyphicon glyphicon-sort-by-alphabet"></span>
                        </a>
                        <a href="" class="btn btn-default {{vm.getCssClassOrderByZA()}}" title="Ordenar Z-A" ng-click="vm.orderByZA()">
                            <span class="glyphicon glyphicon-sort-by-alphabet-alt"></span>
                        </a>
                        <a href="" class="btn btn-default {{vm.getCssClassOrderByRecent()}}" title="Ordenar m&aacute;s reciente" 
                            ng-click="vm.orderByRecent()">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </a>
                    </article>
                    <article class="task panel" ng-repeat="contact in vm.contacts | contacts:vm | orderBy:vm.orderByField:vm.orderByReverse">
                        <a href="#" ng-click="vm.showContactDetails(contact)">
                            <header class="panel-heading">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <h4></span>{{contact.firstname}} {{contact.lastname}}</h4>
                                    </div>
                                    <div class="col-sm-12 col-md-6 panel-subtitle">
                                        <h4>{{contact.company_name}}</h4>
                                    </div>
                                </div>
                            </header>
                        </a>
                    </article>
                </aside>

                <div class="col-sm-12 col-md-7 col-lg-7 contact-section">
                    <!-- Display contact section -->
                    <section class="panel contact-detail" ng-show="vm.isContactDetailsVisible()">
                        <div class="col-sm-12 col-md-12 nopadding">
                            <header class="panel-heading">
                                <div class="col-sm-6 col-md-6 col-lg-6 panel-title">
                                    <h3>
                                        <span>
                                            {{vm.contactSelected.honorific.description}} {{vm.contactSelected.firstname}} {{vm.contactSelected.lastname}}
                                        </span>
                                        <a ng-show="vm.contactSelected.linkedin_profile" target="_blank" 
                                            href="{{vm.contactSelected.linkedin_profile}}">
                                            <span class="icon-linkedin" title="Perfil en Linked-In"></span>
                                        </a>
                                    </h3>
                                </div>
                                <div class="col-sm-5 col-md-5 col-lg-5 panel-actions">
                                    <div class="progress" ng-if="vm.isContactDetailsVisible()">
                                        <div class="progress-bar progress-bar-success" 
                                            style="width: {{vm.completenessPercentage}}%" title="{{vm.completenessPercentage}}%">
                                            <span>{{vm.completenessPercentage}}%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-1 col-md-1 col-lg-1 panel-actions">
                                    <a ng-click="vm.showContactEdition()" data-toggle="tooltip" title="Editar contacto">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a>
                                </div>
                            </header>
                            <div class="panel-body">
                                <div class="col-sm-12 col-md-12 col-lg-12 panel-data">
                                    <div class="col-sm-12 col-md-7 col-lg-7 panel-data pull-left">
                                        <p>
                                            <strong ng-show="vm.contactSelected.position">{{vm.contactSelected.position}} en</strong>
                                            <strong>{{vm.contactSelected.company_name}}</strong>
                                        </p>
                                        <p>
                                            <span class="icon icon-email"></span>
                                            <a class="mailto" href="mailto:{{vm.contactSelected.email}}">{{vm.contactSelected.email}}</a>
                                        </p>
                                        <p><span class="icon icon-phone"></span>{{vm.contactSelected.phone}}</p>
                                        <p><span class="icon icon-skype"></span>{{vm.contactSelected.skype}}</p>
                                    </div>
                                    <div class="col-sm-12 col-md-5 col-lg-5 panel-data pull-right text-right">
                                        <p><span class="contact-type">{{vm.contactSelected.contact_type.description}}</span></p>
                                        <p><strong>{{[vm.contactSelected.market.name, vm.contactSelected.language.description].join(' | ')}}</strong></p>
                                        <p><strong>{{vm.contactSelected.sap_code}}</strong></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 nopadding">
                            <header class="subpanel-heading">
                                <h5>
                                    <span>direccion
                                        <a href="#address" data-toggle="collapse">
                                            <span>M&aacute;s</span>
                                        </a>
                                    </span>
                                </h5>
                            </header>
                            <div id="address" class="collapse panel-data">
                                <p>{{vm.contactSelected.street}}</p>
                                <p>
                                    {{vm.contactSelected.city}}<span ng-if="vm.contactSelected.city && vm.contactSelected.region">,&nbsp;</span>{{vm.contactSelected.region}}
                                    <span ng-if="vm.contactSelected.postal_code">({{vm.contactSelected.postal_code}})</span>
                                </p>
                                <p>{{vm.contactSelected.country.name}}</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 nopadding">
                            <header class="subpanel-heading">
                                <h5>
                                    <span>segmentacion
                                        <a href="#segmentation" data-toggle="collapse">
                                            <span>M&aacute;s</span>
                                        </a>
                                    </span>
                                </h5>
                            </header>
                            <div id="segmentation" class="collapse panel-data">
                                <p>
                                    <strong>A-B-C:&nbsp;</strong>
                                    {{vm.contactSelected.segmentation_ABC.description}}
                                </p>
                                <p>
                                    <strong>Tipo Cliente:&nbsp;</strong>
                                    {{vm.contactSelected.segmentation_client_type.description}}
                                </p>
                                <p>
                                    <strong>Tipo Producto:&nbsp;</strong>
                                    {{vm.contactSelected.segmentation_product_type.description}}
                                </p>
                                <p>
                                    <strong>Relaci&oacute;n FNC:&nbsp;</strong>
                                    {{vm.contactSelected.segmentation_FNC_relation.description}}
                                </p>
                                <p>
                                    <strong>Potencial a Futuro:&nbsp;</strong>
                                    {{vm.contactSelected.segmentation_potential.description}}
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 nopadding">
                            <header class="subpanel-heading">
                                <h5>
                                    <span>intereses
                                        <a href="#intereses" data-toggle="collapse">
                                            <span>M&aacute;s</span>
                                        </a>
                                    </span>
                                </h5>
                            </header>
                            <div id="intereses" class="collapse">
                                <p><strong>&Aacute;rea Agrupada:&nbsp;</strong>{{vm.contactSelected.group_area.description}}</p>
                                <p><strong>Perfil:&nbsp;</strong>{{vm.contactSelected.profile.description}}</p>
                                <canvas ng-if="vm.contactInterestsData && vm.contactInterestsLabels" 
                                    id="pie" class="chart chart-pie" chart-legend="true" 
                                    chart-data="vm.contactInterestsData" chart-labels="vm.contactInterestsLabels">
                                </canvas> 
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 nopadding">
                            <header class="subpanel-heading">
                                <h5>
                                    <span>informacion adicional
                                        <a href="#additional-information" data-toggle="collapse">
                                            <span>M&aacute;s</span>
                                        </a>
                                    </span>
                                </h5>
                            </header>
                            <div id="additional-information" class="collapse panel-data">
                                <div class="col-md-6 nopadding">
                                    <p><strong>&Aacute;rea dentro de la empresa:&nbsp;</strong>{{vm.contactSelected.company_area}}</p>
                                    <p><strong>El negocio proviene de:&nbsp;</strong>{{vm.contactSelected.business_origin.description}}</p>
                                    <p><strong>Cliente hace:&nbsp;</strong>{{vm.contactSelected.customer_since.description}}</p>
                                    <p><strong>Profesi&oacute;n:&nbsp;</strong>{{vm.contactSelected.career}}</p>
                                    <p><strong>Edad:&nbsp;</strong>{{vm.contactSelected.age_range.description}}</p>
                                    <p><strong>Nivel de educaci&oacute;n:&nbsp;</strong>{{vm.contactSelected.education_level.description}}</p>
                                    <p><strong>Talla:&nbsp;</strong>{{vm.contactSelected.size.description}}</p>
                                </div>
                                <div class="col-md-6 nopadding">
                                    <p>
                                        Nos interesa realizar alguna acci&oacute;n&nbsp;
                                        <booleanicon value="vm.contactSelected.action"></booleanicon>
                                    </p>
                                    <p>
                                        Newsletter&nbsp;
                                        <booleanicon value="vm.contactSelected.newsletter"></booleanicon>
                                    </p>
                                    <p>
                                        Bolet&iacute;n FNC&nbsp;
                                        <booleanicon value="vm.contactSelected.bulletinFNC"></booleanicon>
                                    </p>
                                    <p>
                                        Tarjetas de navidad&nbsp;
                                        <booleanicon value="vm.contactSelected.christmas_cards"></booleanicon>
                                    </p>
                                    <p>
                                        Regalos de navidad&nbsp;
                                        <booleanicon value="vm.contactSelected.christmas_presents"></booleanicon>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Edit contact section -->
                    <section class="panel contact-edit" ng-show="vm.isContactEditionVisible()">
                        <header class="panel-heading">
                            <div class="col-sm-12 col-md-12 nopadding">
                                <div class="col-sm-6 col-md-6 col-lg-6 panel-title">
                                    <h5>{{ vm.contactSelected.id ? 'Editar' : 'Nuevo' }} contacto</h5>
                                    <h3>{{vm.contactSelected.firstname}} {{vm.contactSelected.lastname}}</h3>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6 panel-actions">
                                    <div class="progress" ng-if="vm.isContactEditionVisible()">
                                        <div class="progress-bar progress-bar-success" 
                                            style="width: {{vm.completenessPercentage}}%" title="{{vm.completenessPercentage}}%">
                                            <span>{{vm.completenessPercentage}}%</span>
                                        </div>
                                        <div class="progress-bar progress-bar-warning progress-bar-striped" 
                                            style="width: {{vm.nextEmptyPropertyPercentage}}%;" title="{{vm.nextEmptyPropertyPercentage}}%">
                                            <span class="sr-only">{{vm.nextEmptyPropertyPercentage}}%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </header>
                        <form name="contactFormCtlr">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input type="hidden" name="id" ng-model="vm.contactSelected.id" />
                            <tabs>
                                <pane title="principal">
                                    <div class="form-group">
                                        <label for="firstname">Nombre</label>
                                        <div class="row">
                                            <div class="col-xs-3 honorific-container">
                                                <select ng-model="vm.contactSelected.honorific" class="form-control" name="honorific"
                                                    ng-options="h as h.description for h in vm.honorifics track by h.id">
                                                </select>
                                            </div>
                                            <div class="col-xs-9 firstname-container {{vm.getInputCssError(contactFormCtlr.firstname)}}">
                                                <input ng-model="vm.contactSelected.firstname" type="text" class="form-control" 
                                                    id="firstname" name="firstname" placeholder="Nombre" required="">
                                                <span class="form-control-feedback" aria-hidden="true">*</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group {{vm.getInputCssError(contactFormCtlr.lastname)}}">
                                        <label for="lastname">Apellido</label>
                                        <input ng-model="vm.contactSelected.lastname" type="text" class="form-control" 
                                            id="lastname" name="lastname" placeholder="Apellido" required="">
                                        <span class="form-control-feedback" aria-hidden="true">*</span>
                                    </div>
                                    <div class="form-group {{vm.getInputCssError(contactFormCtlr.email)}}">
                                        <label for="email">e-mail</label>
                                        <input ng-model="vm.contactSelected.email" type="text" class="form-control" 
                                            id="email" name="email" placeholder="e-mail" required="">
                                        <span class="form-control-feedback" aria-hidden="true">*</span>
                                    </div>
                                    <div class="form-group {{vm.getInputCssError(contactFormCtlr.position)}}">
                                        <label for="position">Cargo</label>
                                        <input ng-model="vm.contactSelected.position" type="text" class="form-control" 
                                            id="position" name="position" placeholder="Cargo" required="">
                                        <span class="form-control-feedback" aria-hidden="true">*</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="company_area">&Aacute;rea</label>
                                        <input ng-model="vm.contactSelected.company_area" type="text" class="form-control" 
                                            id="company_area" name="company_area" placeholder="&Aacute;rea">
                                    </div>
                                    <div class="form-group {{vm.getInputCssError(contactFormCtlr.company_name)}}">
                                        <label for="company_name">Empresa</label>
                                        <input ng-model="vm.contactSelected.company_name" type="text" class="form-control" 
                                            id="company_name" name="company_name" placeholder="Empresa" required="">
                                        <span class="form-control-feedback" aria-hidden="true">*</span>
                                    </div>
                                    <div class="form-group {{vm.getInputCssError(contactFormCtlr.market)}}">
                                        <label for="market">Mercado</label>
                                        <select ng-model="vm.contactSelected.market" class="form-control" name="market" 
                                            ng-options="mkt as mkt.name for mkt in vm.markets track by mkt.id" required="">
                                        </select>
                                        <span class="form-control-feedback" aria-hidden="true">*</span>
                                    </div>
                                    <div class="form-group {{vm.getInputCssError(contactFormCtlr.language)}}">
                                        <label for="language">Idioma</label>
                                        <select ng-model="vm.contactSelected.language" class="form-control" name="language"
                                            ng-options="l as l.description for l in vm.languages track by l.id" required="">
                                        </select>
                                        <span class="form-control-feedback" aria-hidden="true">*</span>
                                    </div>
                                    <div class="form-group {{vm.getInputCssError(contactFormCtlr.group_area)}}">
                                        <label for="group_area">Area agrupada</label>
                                        <select ng-model="vm.contactSelected.group_area" class="form-control" name="group_area"
                                            ng-options="ga as ga.description for ga in vm.groupAreas track by ga.id" required="">
                                        </select>
                                        <span class="form-control-feedback" aria-hidden="true">*</span>
                                    </div>
                                    <div ng-hide="contactFormCtlr.$valid" class="error-legend">
                                        <span>* Campos obligatorios</span>
                                    </div>
                                </pane>
                                <pane title="adicional">
                                    <div class="form-group">
                                        <label for="contact_type">Tipo de socio</label>
                                        <select ng-model="vm.contactSelected.contact_type" class="form-control" name="contact_type"
                                            ng-options="ct as ct.description for ct in vm.contactTypes track by ct.id">
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="sap_code">C&oacute;digo SAP</label>
                                        <input ng-model="vm.contactSelected.sap_code" type="text" class="form-control" 
                                            id="sap_code" name="sap_code" placeholder="C&oacute;digo SAP">
                                    </div>
                                    <div class="form-group">
                                        <label for="skype">Skype</label>
                                        <input ng-model="vm.contactSelected.skype" type="text" class="form-control" 
                                            id="skype" name="skype" placeholder="Skype">
                                    </div>
                                    <div class="form-group">
                                        <label for="linkedin_profile">Linked-In</label>
                                        <input ng-model="vm.contactSelected.linkedin_profile" type="text" class="form-control" 
                                            id="linkedin_profile" name="linkedin_profile" placeholder="Linked-In">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Tel&eacute;fono oficina</label>
                                        <input ng-model="vm.contactSelected.phone" type="text" class="form-control" 
                                            id="phone" name="phone" placeholder="Telefono">
                                    </div>
                                    <div class="form-group">
                                        <label for="career">Profesi&oacute;n</label>
                                        <input ng-model="vm.contactSelected.career" type="text" class="form-control" 
                                            id="career" name="career" placeholder="Profesi&oacute;n">
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Sexo</label>
                                        <select ng-model="vm.contactSelected.gender" class="form-control" name="gender"
                                            ng-options="it as it.description for it in vm.genders track by it.id">
                                        </select>
                                    </div>
                                </pane>
                                <pane title="segmentaci&oacute;n">
                                    <div class="form-group">
                                        <label for="position">Segmentaci&oacute;n A-B-C</label>
                                        <select ng-model="vm.contactSelected.segmentation_ABC" class="form-control" name="segmentation_ABC"
                                            ng-options="seg as seg.description for seg in vm.segmentationsABC track by seg.id">
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="position">Segmentaci&oacute;n Tipo Cliente</label>
                                        <select ng-model="vm.contactSelected.segmentation_client_type" class="form-control" name="segmentation_client_type"
                                            ng-options="seg as seg.description for seg in vm.segmentationsClientType track by seg.id">
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="position">Segmentaci&oacute;n Tipo Producto</label>
                                        <select ng-model="vm.contactSelected.segmentation_product_type" class="form-control" name="segmentation_product_type"
                                            ng-options="seg as seg.description for seg in vm.segmentationsProductType track by seg.id">
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="position">Segmentaci&oacute;n Relaci&oacute;n FNC</label>
                                        <select ng-model="vm.contactSelected.segmentation_FNC_relation" class="form-control" name="segmentation_FNC_relation"
                                            ng-options="seg as seg.description for seg in vm.segmentationsFNCRelation track by seg.id">
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="position">Segmentaci&oacute;n Potencial a Futuro</label>
                                        <select ng-model="vm.contactSelected.segmentation_potential" class="form-control" name="segmentation_potential" 
                                            ng-options="seg as seg.description for seg in vm.segmentationsPotential track by seg.id">
                                        </select>
                                    </div>
                                </pane>
                                <pane title="direcci&oacute;n">
                                    <div class="form-group">
                                        <label for="street">Calle</label>
                                        <input ng-model="vm.contactSelected.street" type="text" class="form-control" 
                                            id="street" name="street" placeholder="Calle">
                                    </div>
                                    <div class="form-group">
                                        <label for="city">Ciudad</label>
                                        <input ng-model="vm.contactSelected.city" type="text" class="form-control" 
                                            id="city" name="city" placeholder="Ciudad">
                                    </div>
                                    <div class="form-group">
                                        <label for="region">Regi&oacute;n / Estado</label>
                                        <input ng-model="vm.contactSelected.region" type="text" class="form-control" 
                                            id="region" name="region" placeholder="Regi&oacute;n / Estado">
                                    </div>
                                    <div class="form-group">
                                        <label for="postal_code">C&oacute;digo postal</label>
                                        <input ng-model="vm.contactSelected.postal_code" type="text" class="form-control" 
                                            id="postal_code" name="postal_code" placeholder="C&oacute;digo Postal">
                                    </div>
                                    <div class="form-group">
                                        <label for="country">Pa&iacute;s</label>
                                        <select ng-model="vm.contactSelected.country" class="form-control" name="country"
                                            ng-options="c as c.name for c in vm.countries track by c.id">
                                        </select>
                                    </div>
                                </pane>
                                <pane title="otros">
                                    <div class="form-group">
                                        <label for="business_origin">De d&oacute;nde proviene el negocio</label>
                                        <select ng-model="vm.contactSelected.business_origin" class="form-control" name="business_origin"
                                            ng-options="b as b.description for b in vm.businessOrigins track by b.id">
                                        </select>
                                    </div>
                                    <div class="checkbox">
                                        <label for="action">
                                            <input ng-model="vm.contactSelected.action" type="checkbox" id="action" name="action">
                                            Nos interesa realizar alguna acci&oacute;n
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="customer_since">Desde cu&aacute;ndo es cliente</label>
                                        <select ng-model="vm.contactSelected.customer_since" class="form-control" name="customer_since"
                                            ng-options="it as it.description for it in vm.customerSince track by it.id">
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="age_range">Rango de edad</label>
                                        <select ng-model="vm.contactSelected.age_range" class="form-control" name="age_range"
                                            ng-options="it as it.description for it in vm.ageRanges track by it.id">
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="education_level">Nivel educaci&oacute;n</label>
                                        <select ng-model="vm.contactSelected.education_level" class="form-control" name="education_level"
                                            ng-options="it as it.description for it in vm.educationLevels track by it.id">
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="size">Talla</label>
                                        <select ng-model="vm.contactSelected.size" class="form-control" name="size"
                                            ng-options="it as it.description for it in vm.sizes track by it.id">
                                        </select>
                                    </div>
                                    <div class="checkbox">
                                        <label for="newsletter">
                                            <input ng-model="vm.contactSelected.newsletter" type="checkbox" id="newsletter" name="newsletter">
                                            Newsletter
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label for="bulletinFNC">
                                        <input ng-model="vm.contactSelected.bulletinFNC" type="checkbox" id="bulletinFNC" name="bulletinFNC">
                                            Bolet&iacute;n FNC
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label for="christmas_cards">
                                            <input ng-model="vm.contactSelected.christmas_cards" 
                                                type="checkbox" id="christmas_cards" name="christmas_cards">
                                            Tarjetas de Navidad
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label for="christmas_presents">
                                            <input ng-model="vm.contactSelected.christmas_presents" 
                                                type="checkbox" id="christmas_presents" name="christmas_presents">
                                            Regalos de Navidad
                                        </label>
                                    </div>
                                </pane>
                            </tabs>
                        </form>
                        <footer class="pull-right">
                            <a class="btn btn-primary" ng-click="vm.saveContactEdition(contactFormCtlr)">Guardar</a>
                            <a class="btn btn-default" ng-click="vm.cancelContactEdition()">Cancelar</a>
                        </footer>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

<!-- Application Dependencies -->
<script type="text/javascript" src="bower_components/jquery/dist/jquery.min.js"></script> 
<script type="text/javascript" src="bower_components/angular/angular.js"></script>
<script type="text/javascript" src="bower_components/angular-bootstrap/ui-bootstrap-tpls.js"></script>
<script type="text/javascript" src="bower_components/angular-resource/angular-resource.min.js"></script>
<script type="text/javascript" src="bower_components/angular-animate/angular-animate.min.js"></script>
<script type="text/javascript" src="bower_components/angular-ui-router/release/angular-ui-router.min.js"></script>
<script type="text/javascript" src="bower_components/Chart.js/Chart.js"></script>
<script type="text/javascript" src="bower_components/angular-chart.js/angular-chart.js"></script>
<script type="text/javascript" src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script> 

<!-- Application Scripts -->
<script type="text/javascript" src="scripts/app.js"></script>
<script type="text/javascript" src="scripts/filters/contactsFilter.js"></script>
<script type="text/javascript" src="scripts/services/commonService.js"></script>
<script type="text/javascript" src="scripts/services/ContactsService.js"></script>
<script type="text/javascript" src="scripts/services/EntitiesService.js"></script>
<script type="text/javascript" src="scripts/controllers/directives.js"></script>
<script type="text/javascript" src="scripts/controllers/ContactsController.js"></script>
<script type="text/javascript" src="scripts/controllers/LoginController.js"></script>
</html>