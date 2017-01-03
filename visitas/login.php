    <?php
// Evitar los warnings the variables no definidas!!!
$err = isset($_GET['error']) ? $_GET['error'] : null;
?>
<!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]-->

    <!-- Mirrored from altair_html.tzdthemes.com/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 07 Aug 2016 23:12:03 GMT -->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Remove Tap Highlight on Windows Phone IE -->
        <meta name="msapplication-tap-highlight" content="no"/>

        <!--<link rel="icon" type="image/png" href="assets/img/favicon-16x16.png" sizes="16x16">
        <link rel="icon" type="image/png" href="assets/img/favicon-32x32.png" sizes="32x32">-->

        <title>Visitas a Funcionarios - Login</title>

        <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500' rel='stylesheet' type='text/css'>

        <!-- uikit -->
        <link rel="stylesheet" href="../css/bower_components/uikit/css/uikit.almost-flat.min.css"/>

        <!-- altair admin login page -->
        <link rel="stylesheet" href="../css/assets/css/login_page.min.css" />

    </head>
    <body class="login_page">

        <div class="login_page_wrapper">
            <div class="md-card" id="login_card">
                <div class="md-card-content large-padding" id="login_form">
                    <div class="login_heading">
                        <div class="user_avatar"></div>
                    </div>
                    <form name="user" action="session_init.php" method="post">
                        <?php
                        if ($err == 1) {
                            echo "Usuario o Contraseña Erróneos <br />";
                        }
                        if ($err == 2) {
                            echo "Debe iniciar sesion para poder acceder el sitio. <br />";
                        }
                        ?>
                        <div class="uk-form-row">
                            <label for="login_username">Usuario</label>
                            <input class="md-input" type="text" id="login_username" name="login_username" />
                        </div>
                        <div class="uk-form-row">
                            <label for="login_password">Contraseña</label>
                            <input class="md-input" type="password" id="login_password" name="login_password" />
                        </div>
                        <div class="uk-margin-medium-top">
                            <input type="submit" class="md-btn md-btn-primary md-btn-block md-btn-large" value="Iniciar Sesion"/>
                        </div>
                        <div class="uk-grid uk-grid-width-1-3 uk-grid-small uk-margin-top">
                            <div><a href="#" class="md-btn md-btn-block md-btn-facebook" data-uk-tooltip="{pos:'bottom'}" title="Sign in with Facebook"><i class="uk-icon-facebook uk-margin-remove"></i></a></div>
                            <div><a href="#" class="md-btn md-btn-block md-btn-twitter" data-uk-tooltip="{pos:'bottom'}" title="Sign in with Twitter"><i class="uk-icon-twitter uk-margin-remove"></i></a></div>
                            <div><a href="#" class="md-btn md-btn-block md-btn-gplus" data-uk-tooltip="{pos:'bottom'}" title="Sign in with Google+"><i class="uk-icon-google-plus uk-margin-remove"></i></a></div>
                        </div>
                        <div class="uk-margin-top">
                            <a href="#" id="login_help_show" class="uk-float-right">¿Olvido su clave?</a>
                            <span class="icheck-inline">
                                <input type="checkbox" name="login_page_stay_signed" id="login_page_stay_signed" data-md-icheck />
                                <label for="login_page_stay_signed" class="inline-label">Mantener la Sesion</label>
                            </span>
                        </div>
                    </form>
                </div>
                <div class="md-card-content large-padding uk-position-relative" id="login_help" style="display: none">
                    <button type="button" class="uk-position-top-right uk-close uk-margin-right uk-margin-top back_to_login"></button>
                    <h2 class="heading_b uk-text-success">¿No puede Iniciar Sesion?</h2>
                    <p>Esta informacion le ayudara a volver a su cuenta tan pronto como sea posible.</p>
                    <p>Antes que nada verifica que su usuario y contraseña esten correctamente escritos, vuelva a intertarlo</p>
                    <p>Si aun no logra poder iniciar sesion, al parecer es hora de <a href="#" id="password_reset_show">solicitar sus datos</a> el cual llegaran a su cuenta institucional.</p>
                </div>
                <div class="md-card-content large-padding" id="login_password_reset" style="display: none">
                    <button type="button" class="uk-position-top-right uk-close uk-margin-right uk-margin-top back_to_login"></button>
                    <h2 class="heading_a uk-margin-large-bottom">Solicitar Datos</h2>
                    <form>
                        <div class="uk-form-row">
                            <label for="login_email_reset">Tu cuenta institucional</label>
                            <input class="md-input" type="text" id="login_email_reset" name="login_email_reset" />
                        </div>
                        <div class="uk-margin-medium-top">
                            <a href="index-2.html" class="md-btn md-btn-primary md-btn-block">Solcito Datos</a>
                        </div>
                    </form>
                </div>

            </div>
            <div class="uk-margin-top uk-text-center">
                <a href="./#/ver_visitas">Regresar donde estaba antes</a>
            </div>
        </div>

        <!-- common functions -->
        <script src="../css/assets/js/common.min.js"></script>
        <!-- uikit functions -->
        <script src="../css/assets/js/uikit_custom.min.js"></script>
        <!-- altair core functions -->
        <script src="../css/assets/js/altair_admin_common.min.js"></script>

        <!-- altair login page functions -->
        <script src="../css/assets/js/pages/login.min.js"></script>

        <script>
            // check for theme
            if (typeof (Storage) !== "undefined") {
                var root = document.getElementsByTagName('html')[0],
                        theme = localStorage.getItem("altair_theme");
                if (theme == 'app_theme_dark' || root.classList.contains('app_theme_dark')) {
                    root.className += ' app_theme_dark';
                }
            }
        </script>

        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '../www.google-analytics.com/analytics.js', 'ga');
            ga('create', 'UA-65191727-1', 'auto');
            ga('send', 'pageview');
        </script>
    </body>

    <!-- Mirrored from altair_html.tzdthemes.com/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 07 Aug 2016 23:12:05 GMT -->
</html>