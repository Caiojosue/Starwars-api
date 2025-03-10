<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/reset.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../css/table.css">
    <link rel="shortcut icon" href="https://swapi.dev/static/favicon.ico">
    <link href="../css/footer.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200&family=Odibee+Sans&display=swap" rel="stylesheet">
    <link href="../css/font.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="https://swapi.dev/static/favicon.ico">
    <title>SWAPI - Planetas</title>
</head>
<body>
<table id='customers'>
<?php
    $search = $_GET['search'];
    $array_name = [];
    $array_diameter = [];
    $array_population = [];
    $array_climate = [];
    $array_surface_water = [];

    $url = "https://swapi.dev/api/planets/";
    $resultado = json_decode(file_get_contents($url));

    foreach($resultado->results as $planeta){
        array_push($array_name, $planeta->name);
        array_push($array_diameter, $planeta->diameter);
        array_push($array_population, $planeta->population);
        array_push($array_climate, $planeta->climate);
        array_push($array_surface_water, $planeta->surface_water);
    }

    $url = "https://swapi.dev/api/planets/?page=2";
    $resultado = json_decode(file_get_contents($url));

    foreach($resultado->results as $planeta){
        array_push($array_name, $planeta->name);
        array_push($array_diameter, $planeta->diameter);
        array_push($array_population, $planeta->population);
        array_push($array_climate, $planeta->climate);
        array_push($array_surface_water, $planeta->surface_water);
    }

    $url = "https://swapi.dev/api/planets/?page=3";
    $resultado = json_decode(file_get_contents($url));

    foreach($resultado->results as $planeta){
        array_push($array_name, $planeta->name);
        array_push($array_diameter, $planeta->diameter);
        array_push($array_population, $planeta->population);
        array_push($array_climate, $planeta->climate);
        array_push($array_surface_water, $planeta->surface_water);
    }

    $url = "https://swapi.dev/api/planets/?page=4";
    $resultado = json_decode(file_get_contents($url));

    foreach($resultado->results as $planeta){
        array_push($array_name, $planeta->name);
        array_push($array_diameter, $planeta->diameter);
        array_push($array_population, $planeta->population);
        array_push($array_climate, $planeta->climate);
        array_push($array_surface_water, $planeta->surface_water);
    }

    $url = "https://swapi.dev/api/planets/?page=5";
    $resultado = json_decode(file_get_contents($url));

    foreach($resultado->results as $planeta){
        array_push($array_name, $planeta->name);
        array_push($array_diameter, $planeta->diameter);
        array_push($array_population, $planeta->population);
        array_push($array_climate, $planeta->climate);
        array_push($array_surface_water, $planeta->surface_water);
    }

    $url = "https://swapi.dev/api/planets/?page=6";
    $resultado = json_decode(file_get_contents($url));

    foreach($resultado->results as $planeta){
        array_push($array_name, $planeta->name);
        array_push($array_diameter, $planeta->diameter);
        array_push($array_population, $planeta->population);
        array_push($array_climate, $planeta->climate);
        array_push($array_surface_water, $planeta->surface_water);
    }

    $verificado = false;

    for($a = 0; $a != sizeof($array_name); $a++){
        if($search == $array_name[$a]){
            if($array_surface_water[$a] != "unknown"){
                $water = 100 - (int)$array_surface_water[$a];
            }else{
                $water = "unknown";
            }

            $verificado = true;

            echo "
                <tr>
                    <th>Nome</th>
                    <td>$array_name[$a]</td>
                </tr>

                <tr>
                    <th>Diâmetro</th>
                    <td>$array_diameter[$a]</td>
                </tr>
                
                <tr>
                    <th>População</th>
                    <td>$array_population[$a]</td>
                </tr>

                <tr>
                    <th>Clima</th>
                    <td>$array_climate[$a]</td>
                </tr>

                <tr>
                    <th>Terra</th>
                    <td>$array_surface_water[$a]</td>
                </tr>

                <tr>
                    <th>Água</th>
                    <td>$water</td>
                </tr>
            ";
        }
    }
    if(!$verificado){
        echo "<center><br><br><br><h2>Infelizmente não encontramos o planeta procurado :/<h2><h4>Procure novamente!</h4></center><br><br>";
    }
?>
</table>
<center>
<br><br><br><br><br>
    <a href="../index.php" class="link">
        <i class="fa fa-arrow-left"></i>
        <br><br>Voltar à página inicial!
    </a>
</center>

<div class="footer-basic" style="margin-top: 120px">
    <footer>
        <div class="social">
            <a href="https://github.com/Caiojosue/"><i class="icon ion-social-github"></i></a>
            <a href="https://www.linkedin.com/in/caio-sando-14ba1a2b5/"><i class="icon ion-social-linkedin"></i></a>
        </div>
    </footer>
</div>
</body>
</html>