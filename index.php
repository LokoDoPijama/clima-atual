<?php

require './vendor/autoload.php';
require 'Classes/OpenWeather.php';

$o = new OpenWeather();

$dadosClimaticos = $o->getTempoAtual();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clima em <?php echo $dadosClimaticos->cidade ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        #divCidade {
            border-bottom: 1px solid rgb(210, 210, 210);
        }

        #aOpenWeather  {
            text-decoration: none;
        }

        #aOpenWeather:hover {
            text-decoration: underline;
        }

        #h1Temperatura {
            font-size: 7.2em;
        }

        #divDescricao {
            height: 8.4em;
        }

        #divIcone {
            min-width: 69px;
            margin-left: -2%;
        }

        @media screen and (max-width: 1290px) {
            #divDescricao {
                margin-left: 2%;
            }
        }

        @media screen and (max-width: 1220px) and (min-width: 1165px) {
            #divDescricao {
                margin-left: 6%;
            }
        }

        @media screen and (max-width: 1164px) {
            #colDescricao {
                display: flex;
                justify-content: center;
            }
        }

        #imgIcone {
            height: 125%;
        }

        #pDescricao {
            font-size: 1.2em;
        }
    </style>
</head>
<body>

    <div id="divCidade" class="container-fluid py-3 d-flex justify-content-center align-items-center">
            <div class="w-75 d-flex justify-content-between align-items-center">
                <h2 class="">Clima em <?= $dadosClimaticos->cidade ?></h2>
                <p class="m-0 text-secondary">Powered by <a id="aOpenWeather" href="https://openweathermap.org/" target="_blank" class="text-secondary">OpenWeather</a>©</p> 
            </div>
        </div>
    </div>

    <br>

    <div id="divPrincipal" class="container-fluid w-75 border border-2 my-5 pt-5">
        <div class="row mt-4 pt-5">
            <div class="col-4 offset-1">
                <h2 class="">Temperatura Atual</h2>
            </div>
        </div>
        <div class="row pb-2">
            <div class="col-3 offset-1 d-flex align-items-center">
                <h1 id="h1Temperatura" class=""><?= round($dadosClimaticos->temperatura) ?>°C</h1>
            </div>
            <div id="colDescricao" class="col">
                <div id="divDescricao" class="d-flex flex-column justify-content-center">
                    <div id="divIcone" class="h-75">
                        <img id="imgIcone" class="" src="https://openweathermap.org/img/wn/<?= $dadosClimaticos->icone ?>@2x.png">
                    </div>
                    <p id="pDescricao" class="text-secondary m-0 ms-3"><?= $dadosClimaticos->descricao ?></p>
                </div>
            </div>
        </div>
        <div class="row mt-5 pt-5">
            <div class="divInfo col-3 offset-1 px-3 border-end border-secondary" style="--bs-border-opacity: .5;">
                <div class="pt-1 pb-1">
                    <span class="h5 d-block">Máxima</span>
                    <span class="spanInfo h2"><?= round($dadosClimaticos->temperaturaMaxima) ?>°C <i class="fa fa-temperature-arrow-up h4 align-middle text-danger"></i></span>
                </div>
            </div>
            <div class="divInfo col-3 px-3" style="--bs-border-opacity: .5;">
                <div class="pt-1 pb-1">
                    <span class="h5 d-block">Mínima</span>
                    <span class="spanInfo h2"><?= round($dadosClimaticos->temperaturaMinima) ?>°C <i class="fa fa-temperature-arrow-down h4 align-middle text-primary"></i></span>
                </div>
            </div>
        </div>
        <div class="row my-5 py-5">
            <div class="divInfo col-3 offset-1 px-3" style="--bs-border-opacity: .5;">
                <div class="pt-1 pb-1">
                    <span class="h5 d-block">Sensação Térmica</span>
                    <span class="spanInfo h2"><?= round($dadosClimaticos->sensacaoTermica) ?>°C <i class="fa fa-temperature-high h4 align-middle"></i></span>
                </div>
            </div>
            <div class="divInfo col-3 px-3 border-start border-secondary" style="--bs-border-opacity: .5;">
                <div class="pt-1 pb-1">
                    <span class="h5 d-block">Umidade</span>
                    <span class="spanInfo h2"><?= $dadosClimaticos->humidade ?>% <i class="fa fa-droplet h4 align-middle"></i></span>
                </div>
            </div>
            <div class="divInfo col-4 px-3 border-start border-secondary" style="--bs-border-opacity: .5;">
                <div class="pt-1 pb-1">
                    <span class="h5 d-block">Velocidade/Direção do Vento</span>
                    <span class="spanInfo h2"><?= $dadosClimaticos->velocidadeDoVento ?> km/h <i class="fa fa-location-arrow h4 align-middle" style="transform: rotate(<?= $dadosClimaticos->direcaoDoVento - 45 ?>deg)"></i></span>
                </div>
            </div>
        </div>
        <div class="row my-5 py-5">
            <div class="divInfo col-3 offset-1 px-3" style="--bs-border-opacity: .5;">
                <div class="pt-1 pb-1">
                    <span class="h5 d-block">Nascer do Sol</span>
                    <span class="spanInfo h2"><?= $dadosClimaticos->formatarNascerDoSol() ?> <i class="fa fa-sun h4 align-middle"></i></span>
                </div>
            </div>
            <div class="divInfo col-3 px-3 border-start border-secondary" style="--bs-border-opacity: .5;">
                <div class="pt-1 pb-1">
                    <span class="h5 d-block">Pôr do Sol</span>
                    <span class="spanInfo h2"><?= $dadosClimaticos->formatarPorDoSol() ?> <i class="fa fa-mountain-sun h4 align-middle"></i></span>
                </div>
            </div>
        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        /*const divsInfo = [...document.querySelectorAll(".divInfo")];
        const spansInfo = [...document.querySelectorAll(".spanInfo")];

        divsInfo.forEach((divInfo, index) => {
            var widthSpan = spansInfo[index].getBoundingClientRect().width;
            var divPaddingLeft = parseInt(window.getComputedStyle(divInfo, null).getPropertyValue('padding-left'));

            divInfo.style.width = widthSpan + 2 + divPaddingLeft*2 + 'px';
        });*/
    </script>
</body>
</html>