<?php
require './controller/alarmController.php';
$AlarmWk = new AlarmController();
$cent =  $AlarmWk->updateHolidays();
$holiday = $AlarmWk->checkIfTodayIsHoliday();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>TAJ - Online Security</title>
    <meta name="viewport" content="width=device-width, initial-scale=0.86, maximum-scale=3.0, minimum-scale=0.86">
    <title>Login materialize (full page+responsive)</title>
    <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css'>
    <link rel="stylesheet" href="./view/style/css/login-materialize.css">
    <link rel="stylesheet" href="./view/style/css/step.css">


</head>
<style>
    @media screen and (max-width:1000px;

    ) {
        body {
            background-color: pink;
            background: url("./img/fundo.jpeg");
            overflow: hidden;
        }
    }
</style>

<body>
    <!-- partial:index.partial.html -->
    <div class="main-container login-container login-parent">
        <div class="login-in-middle full-width">
            <div class="container login-child z-depth-3 white">
                <div class="row no-padding">
                    <div class="col l6 m6 s12 no-padding">
                        <ul class="tabs tabs-fixed-width" name="tabs">
                            <li class="tab col s6 ">
                                <a class="active" href="#login-tab">Entrar</a>
                            </li>
                            <li class="tab col s6 ">
                                <a href="#singup-tab">
                                    Cadastrar
                                </a>
                            </li>
                        </ul>
                        <div id="login-tab" class="col s12 white login-content no-selectable">
                            <!-- Login form -->
                            <form name="login" method="post" class="col s10 m10 l8 xl6 offset-s1 offset-m1 offset-l2 offset-xl3 " novalidate>
                                <div class="row">
                                    <div class="section"></div>
                                    <main>
                                        <div class='row'>
                                            <div class="input-field">
                                                <i class="material-icons prefix">account_circle</i>
                                                <input class="validate" id="email" type="email" name="email">
                                                <label for="email" data-error="wrong" data-success="right">E-mail</label>
                                            </div>
                                        </div>
                                        <div class='row'>
                                            <div class='input-field '>
                                                <i class="material-icons prefix">password</i>
                                                <input id="password" type="password" name="password">
                                                <label for="password">Senha</label>
                                            </div>
                                        </div>
                                    </main>
                                </div>
                                <div class="row center-align">

                                    <button name="submitLogin" class="btn waves-effect waves-light blue darken-3" type="submit">
                                        Acessar
                                        <i class="material-icons right">keyboard_arrow_right</i>
                                    </button>
                                </div>
                                <div class="row center-align">
                                    <a name="recuperar-password" href="#" data-action="olvidaste-tu-contrasena">Esqueceu
                                        sua senha?</a>
                                </div>
                            </form>
                        </div>

                        <div id="singup-tab" class="col s12 white login-content no-selectable">
                            <!-- Singup form -->
                            <?php include './view/create.php'; ?>
                        </div>
                    </div>
                    <div class="col l6 m6 s12 login-right-image no-padding hide-on-small-only"></div>
                </div>
                <div class="login-footer center-align blue darken-3">
                    <a href="#">
                        <img src="./view/style/img/taj.svg" height="60" alt="Logotipo" />
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
    <script src='https://code.jquery.com/jquery-3.4.1.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js'></script>
    <!--JavaScript at end of body for optimized loading-->
    <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="node_modules/materialize-css/dist/js/materialize.min.js"></script>

    <script src="./view/style/CSS/login.css"></script>
    <script src="./view/style/JS/step.js"></script>
    <script src="./view/style/JS/api-cep.js"></script>

</body>
<script>
    $(document).ready(function() {
        $("ul[name=tabs]").tabs({
            swipeable: true
        });
        $('.datepicker').datepicker();
    });
</script>

</html>