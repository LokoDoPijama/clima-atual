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
</head>
<body>
    
    <h1 class="text-center mt-3">Clima em <?php echo $dadosClimaticos->cidade ?></h1>

    <div class="container text-center mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 border-end">

                <div class="row justify-content-end">

                    <div class="col-md-4">
                        <p>Temperatura Atual</p>
                        <?php echo "<h1>" . round($dadosClimaticos->temperatura, 1) . "°C</h1>" ?>
                    </div>

                    <div class="col-md-4">
                        <p>Sensação Térmica</p>
                        <?php echo "<h1>" . round($dadosClimaticos->sensacaoTermica, 1) . "°C</h1>" ?>
                    </div>
                </div>

                <div class="row justify-content-end mt-3">

                    <div class="col-md-8">
                        <p class="text-secondary">Min | Max</p>
                    </div>
                </div>

                <div class="row justify-content-end">

                    <div class="col-md-4 justify-content-end">
                        <?php echo "<h3 class='text-end'>" . round($dadosClimaticos->temperaturaMinima, 1) . "°C</h3>" ?>
                    </div>

                    <div class="col-md-4 justify-content-start">
                        <?php echo "<h3 class='text-start'>" . round($dadosClimaticos->temperaturaMaxima, 1) . "°C</h3>" ?>
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        <p class="mb-0"><?php echo $dadosClimaticos->descricao ?></p>
                        <img src="https://openweathermap.org/img/wn/<?php echo $dadosClimaticos->icone ?>@2x.png">
                    </div>
                    <div class="col-md-4">
                        <p class="text-secondary">Vento: <i class="fa fa-location-arrow" style="transform: rotate(<?php echo -45 + $dadosClimaticos->direcaoDoVento ?>deg)"></i> <?php echo $dadosClimaticos->velocidadeDoVento ?> km/h</p>
                        <p class="mb-0 text-secondary">Nascer do Sol: <?php echo $dadosClimaticos->formatarNascerDoSol() ?></p>
                        <p class="mb-0 text-secondary">Por do Sol: <?php echo $dadosClimaticos->formatarPorDoSol() ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <p class="mb-0 text-secondary"><i class="fa-solid fa-droplet"></i> Umidade: <?php echo $dadosClimaticos->humidade ?>%</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>