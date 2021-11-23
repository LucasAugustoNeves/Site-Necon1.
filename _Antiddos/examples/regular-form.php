<?php
 
    session_start();

	require('../src/captcha-session.class.php');
    require('../src/captcha.class.php');

    IconCaptcha::setIconsFolderPath('../assets/icons/');


    IconCaptcha::setIconNoiseEnabled(true);

    if(!empty($_POST)) {
        if(IconCaptcha::validateSubmission($_POST)) {
            // Colocar o Link Aqui dentro para que o Capcha retorne a pagina
            $captchaMessage = 'correto';
            echo "<meta http-equiv='refresh' content='3;URL=../cokie.html'>";
        } else {
            $captchaMessage = json_decode(IconCaptcha::getErrorMessage())->error;
        }
    }
?>
<!DOCTYPE HTML>
<html>
    <head>
    <script>
    function get_current_url() {
      document.write(window.location.href);
      return null;
    }

  </script>

        <title>NEcon Segurança</title>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=9" />
        <meta name="author" content="Fabian Wennink © <?= date('Y') ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../assets/demo.css" rel="stylesheet" type="text/css"-->
        <link href="../assets/estilo.css" rel="stylesheet" type="text/css">
        <!-- Include IconCaptcha stylesheet -->
        <link href="../assets/css/icon-captcha.min.css" rel="stylesheet" type="text/css">
        <style>
             .spinner3{
                display: flex;
                .circle{
                width: 1rem;
                height: 1rem;
                background-color: #FF0000;
                border-radius:50%;
                margin:0.1rem;
                animation: up 0.3s linear 0s infinite alternate;
                &.one{
                    animation-delay:0s;
                }
                &.two{
                    animation-delay:0.2s;
                }
                &.three{
                    animation-delay:0.4s;
                }
                }
        </style>
    </head>
    <body>
        <div class="container">


            <div class="section">

                <!-- Just a basic HTML form, captcha should ALWAYS be placed WITHIN the <form> element -->
                <img src="../../_img/NEconLogo1.png">
                <h4>🔒Esse é um Sitema de Proteção anti robos🔒</h4>
                <h4>Faça o Captcha e sera redirecionado em alguns segundos para o site</h4>
                    <div class="spinner3">
                    <div class="circle one"></div>
                    <div class="circle two"></div>
                    <div class="circle three"></div>
                    </div>
                <br>
                <form action="" method="post">

                    <!-- Element that we use to create the IconCaptcha with -->
                    <div class="captcha-holder"></div>

                    <!-- Submit button to test your IconCaptcha input -->
                    <input type="submit" value="Entrar" class="btn" >
                </form>
            </div>

          

        


        <!-- Include Google Font - Just for demo page -->
        <link href="//fonts.googleapis.com/css?family=Poppins:400,700" rel="stylesheet">

        <!-- Include jQuery Library -->
        <!--[if lt IE 9]>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
        <![endif]-->

        <!--[if (gte IE 9) | (!IE)]><!-->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <!--<![endif]-->

        <!-- Include IconCaptcha script -->
        <script src="../assets/js/icon-captcha.min.js" type="text/javascript"></script>

        <!-- Initialize the IconCaptcha -->
        <script async type="text/javascript">
            $(window).ready(function() {
                $('.captcha-holder').iconCaptcha({
                    theme: ['light', 'dark'], // Selecione o (s) tema (s) do (s) Captcha (s).Disponível: claro, escuro
                    fontFamily: '', // Altere a família da fonte do captcha.Deixá-lo em branco adicionará a fonte padrão ao final do <body> tag.
                    clickDelay: 500, // O atraso durante o qual o usuário não consegue selecionar uma imagem.
                    invalidResetDelay: 1000, // Depois de quantos milissegundos o captcha deve ser redefinido após uma seleção de ícone incorreta.
                    requestIconsDelay: 800, // Quanto tempo o script deve esperar antes de solicitar os hashes e ícones? (to prevent a high(er) CPU usage during a DDoS attack)
                    loadingAnimationDelay: 500, // Por quanto tempo a animação falsa de carregamento deve ser reproduzida.
                    hoverDetection: true, // Ative ou desative a detecção de passagem do cursor.
                    showCredits: 'show', // Mostre, oculte ou desative o elemento de créditos.Valores válidos: 'show', 'hide', 'disabled' (por favor deixe habilitado).
                    enableLoadingAnimation: true, // Ative ou desative a animação de carregamento falso.Na verdade, não faz nada além de ter uma boa aparência.
                    validationPath: '../src/captcha-request.php', // O caminho para o arquivo de validação Captcha.
                    messages: { // Você pode colocar a mensagem que quiser no captcha.
                        header: "Selecione a imagem que não pertence à linha",
                        correct: {
                            top: "Valido",
                            bottom: "Clique em Entrar e Aguarde alguns segundos e voltara ao site"
                        },
                        incorrect: {
                            top: "Oops!",
                            bottom: "Você selecionou a imagem errada."
                        }
                    }
                })
                    .bind('init.iconCaptcha', function(e, id) { // You can bind to custom events, in case you want to execute some custom code.
                        console.log('Event: Captcha initialized', id);
                    }).bind('selected.iconCaptcha', function(e, id) {
                    console.log('Event: Icon selected', id);
                }).bind('refreshed.iconCaptcha', function(e, id) {
                    console.log('Event: Captcha refreshed', id);
                }).bind('success.iconCaptcha', function(e, id) {
                    console.log('Event: Correct input', id);
                }).bind('error.iconCaptcha', function(e, id) {
                    console.log('Event: Wrong input', id);
                });
            });
        </script>
    </body>
</html>