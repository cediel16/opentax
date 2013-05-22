<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <?php echo link_tag('assets/css/bootstrap.css') ?>
        <?php echo link_tag('assets/css/bootstrap-response.css') ?>
        <style>
            form{
                padding: 0px;
                margin: 0px;
            }
        </style>
        <title>Mi sitio web</title>
    </head>
    <body>
        <br>
        <section class="container">
            <div class="row-fluid">
                <div class="well well-small">
                </div>
            </div>
            <div class="row-fluid">
                <div class="span7">
                    <div class="well well-small">
                        <h4>asd</h4>
                    </div>
                </div>
                <div class="span5">
                    <div class="login-form well well-small span">
                        <form action="">
                            <div class=" clearfix">
                                <input class="span12" type="text" placeholder="Username" />
                            </div>
                            <div class="clearfix">
                                <input class="span12" type="password" placeholder="Password" />
                            </div>
                            <button class="btn primary" type="submit">Sign in</button>
                        </form>
                    </div>
                </div>
            </div>
        </section> <!-- /container -->
        <?php echo link_tag('assets/css/bootstrap-response.css') ?>

    </body>    
</html>