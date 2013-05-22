<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <link href="assets/css/bootstrap-responsive.css" rel="stylesheet"> 
        <link href="assets/css/style.css" rel="stylesheet">
        <title></title>
    </head>
    <body>
        <header>
            <div class="navbar navbar-fixed-top">
                <div class="container-fluid banner">
                    <div class="row-fluid">
                        <div class="pull-left">
                            12 de enero de 2013
                        </div>
                        <div class="pull-right">
                            Johel Cediel
                        </div>
                    </div>
                </div>
                <div class="navbar-inner">
                    <div class="container">
                        <a data-target=".navbar-responsive-collapse" data-toggle="collapse" class="btn btn-navbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </a>
                        <a href="#" class="brand">Inicio</a>
                        <div class="nav-collapse collapse navbar-responsive-collapse">
                            <ul class="nav">
                                <li><a href="#">Contribuyentes</a></li>
                                <li><a href="#">Patentes</a></li>
                                <li class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">Recaudaciones <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Patente de Industria y Comercio</a></li>
                                        <li><a href="#">Agentes de Retención</a></li>
                                        <li><a href="#">Patente de Vehículos</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Tasas</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">Liquidaciones<b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Patente de Industria y Comercio</a></li>
                                        <li><a href="#">Agentes de Retención</a></li>
                                        <li><a href="#">Patente de Vehículos</a></li>
                                        <li><a href="#">Inmuebles Urbanos</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Tasas</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav pull-right">
                                <li class="divider-vertical"></li>
                                <li class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">Caja <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div><!-- /.nav-collapse -->
                    </div>
                </div><!-- /navbar-inner -->
            </div>
        </header>
        <section class="container main-container">
            <div class="main-title">
                Paginado
            </div>
            <div class="main-content">
                <div class="input-prepend pull-right">
                    <button class="btn" type="button">Buscar</button>
                    <input class="span3" id="prependedInputButton" type="text">
                </div>
                <table class="table table-bordered table-condensed table-hover table-thead-center">
                    <thead>
                        <tr>
                            <th class="span1">N</th>
                            <th class="span1">patente</th>
                            <th class="span1">RIF</th>
                            <th class="span4">Razón Social</th>
                            <th>Domicilio Fiscal</th>
                            <th class="span2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="text-align:center;">99</td>
                            <td style="text-align:center;">99999999</td>
                            <td style="text-align:center;">X999999999</td>
                            <td>XXX XXXXXXXX XXXXX XXXXXXX</td>
                            <td>XXXXXXXXXXXXXXXXXX XXXXXXXXXXXXX XXXXXXX XXXXXXXXXX</td>
                            <td style="text-align:center;">XXXXXXXX</td>
                        </tr>
                    </tbody>
                </table>
                <div class="pagination pagination-right">
                    <ul>
                        <li class="disabled"><a href="#">«</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">»</a></li>
                    </ul>
                    <div class="pull-left">Mostrando 9 de 99 registros asd asdas dasd </div>
                </div>
            </div>
        </section>
        <footer>
        </footer>
        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/bootstrap.js"></script>
    </body>
</html>
