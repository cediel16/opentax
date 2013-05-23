<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <?php echo link_tag("assets/css/style.css") ?>
        <?php echo link_tag("assets/css/bootstrap.css") ?>
        <?php echo link_tag("assets/css/bootstrap-responsive.css") ?>
        <title>Opentax</title>
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
                        <?php echo anchor('.', 'Inicio', 'class="brand"') ?>
                        <div class="nav-collapse collapse navbar-responsive-collapse">
                            <ul class="nav">
                                <li class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="javascript:void(0);">Contribuyentes <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><?php echo anchor('contribuyentes', 'Busqueda') ?></li>
                                        <li><?php echo anchor('contribuyentes/registro', 'Nuevo registro') ?></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="javascript:void(0);">Patentes <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><?php echo anchor('patentes', 'Busqueda') ?></li>
                                        <li><?php echo anchor('patentes/registro', 'Nuevo registro') ?></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="javascript:void(0);">Vehículos <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><?php echo anchor('vehiculos', 'Busqueda') ?></li>
                                        <li><?php echo anchor('vehiculos/registro', 'Nuevo registro') ?></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="javascript:void(0);">Inmuebles <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><?php echo anchor('inmuebles', 'Busqueda') ?></li>
                                        <li><?php echo anchor('inmuebles/registro', 'Nuevo registro') ?></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="javascript:void(0);">Recaudaciones <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><?php echo anchor('caja', 'Caja') ?></li>
                                        <li><?php echo anchor('patentes/recaudar', 'Patente de Industria y Comercio') ?></li>
                                        <li><?php echo anchor('retenciones/recaudar', 'Agentes de Retención') ?></li>
                                        <li><?php echo anchor('vehiculos/recaudar', 'Patente de Vehiculos') ?></li>
                                        <li><?php echo anchor('tasas/recaudar', 'Tasas') ?></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">Liquidaciones<b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><?php echo anchor('patentes/liquidar', 'Patente de Industria y Comercio') ?></li>
                                        <li><?php echo anchor('retenciones/liquidar', 'Agentes de Retención') ?></li>
                                        <li><?php echo anchor('vehiculos/liquidar', 'Patente de Vehiculos') ?></li>
                                        <li><?php echo anchor('inmuebles/liquidar', 'Inmuebles Urbanos') ?></li>
                                        <li class="divider"></li>
                                        <li><?php echo anchor('tasas/liquidar', 'Tasas') ?></li>
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
                <?php echo $title ?>
            </div>
            <div class="main-content">
                <?php echo $template ?>
            </div>
        </section>
        <footer>
            Pie de pagina
        </footer>
        <?php echo script_tag("assets/js/jquery.js") ?>
        <?php echo script_tag("assets/js/bootstrap.js") ?>
        <?php echo $script ?>
    </body>
</html>
