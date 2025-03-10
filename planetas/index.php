<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/reset.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link href="../css/footer.css" rel="stylesheet">
    <link href="../css/table.css" rel="stylesheet">
    <link rel="shortcut icon" href="https://swapi.dev/static/favicon.ico">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200&family=Odibee+Sans&display=swap" rel="stylesheet">
    <link href="../css/font.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="https://swapi.dev/static/favicon.ico">
    <title>SWAPI - Planetas</title>
</head>
<body>
    <table id="customers">
        <tr>
            <th>Nome</th>
            <th>Diâmetro</th>
            <th>Clima</th>
            <th>Gravidade</th>
            <th>Terra</th>
            <th>Água</th>
        </tr>
<?php
    $url = "https://swapi.dev/api/planets/";
    $resultado = json_decode(file_get_contents($url));

    foreach($resultado->results as $planeta){
        if($planeta->surface_water != "unknown"){
            $water = 100 - (int)$planeta->surface_water;
        }else{
            $water = "unknown";
        }
        echo "
        <tr>
            <td>
                $planeta->name
            </td>

            <td>
                $planeta->diameter
            </td>

            <td>
                $planeta->climate
            </td>
        
            <td>
                $planeta->gravity 
            </td>

            <td>
                $planeta->surface_water%
            </td>

            <td>
                $water% 
            </td> 
        ";
    }

    $url = "https://swapi.dev/api/planets/?page=2";
    $resultado = json_decode(file_get_contents($url));

    foreach($resultado->results as $planeta){
        if($planeta->surface_water != "unknow"){
            $water = 100 - (int)$planeta->surface_water;
        }else{
            $water = "unknow ";
        }
        echo "
        <tr>
            <td>
                $planeta->name
            </td>

            <td>
                $planeta->diameter
            </td>

            <td>
                $planeta->climate
            </td>
        
            <td>
                $planeta->gravity 
            </td>

            <td>
                $planeta->surface_water%
            </td>

            <td>
                $water% 
            </td> 
        ";
    }

    $url = "https://swapi.dev/api/planets/?page=3";
    $resultado = json_decode(file_get_contents($url));

    foreach($resultado->results as $planeta){
        if($planeta->surface_water != "unknow"){
            $water = 100 - (int)$planeta->surface_water;
        }else{
            $water = "unknow ";
        }
        echo "
        <tr>
            <td>
                $planeta->name
            </td>

            <td>
                $planeta->diameter
            </td>

            <td>
                $planeta->climate
            </td>
        
            <td>
                $planeta->gravity 
            </td>

            <td>
                $planeta->surface_water%
            </td>

            <td>
                $water% 
            </td> 
        ";
    }

    $url = "https://swapi.dev/api/planets/?page=4";
    $resultado = json_decode(file_get_contents($url));

    foreach($resultado->results as $planeta){
        if($planeta->surface_water != "unknow"){
            $water = 100 - (int)$planeta->surface_water;
        }else{
            $water = "unknow ";
        }
        echo "
        <tr>
            <td>
                $planeta->name
            </td>

            <td>
                $planeta->diameter
            </td>

            <td>
                $planeta->climate
            </td>
        
            <td>
                $planeta->gravity 
            </td>

            <td>
                $planeta->surface_water%
            </td>

            <td>
                $water% 
            </td> 
        ";
    }

    $url = "https://swapi.dev/api/planets/?page=5";
    $resultado = json_decode(file_get_contents($url));

    foreach($resultado->results as $planeta){
        if($planeta->surface_water != "unknow"){
            $water = 100 - (int)$planeta->surface_water;
        }else{
            $water = "unknow ";
        }
        echo "
        <tr>
            <td>
                $planeta->name
            </td>

            <td>
                $planeta->diameter
            </td>

            <td>
                $planeta->climate
            </td>
        
            <td>
                $planeta->gravity 
            </td>

            <td>
                $planeta->surface_water%
            </td>

            <td>
                $water% 
            </td> 
        ";
    }

    $url = "https://swapi.dev/api/planets/?page=6";
    $resultado = json_decode(file_get_contents($url));

    foreach($resultado->results as $planeta){
        if($planeta->surface_water != "unknow"){
            $water = 100 - (int)$planeta->surface_water;
        }else{
            $water = "unknow ";
        }
        echo "
        <tr>
            <td>
                $planeta->name
            </td>

            <td>
                $planeta->diameter
            </td>

            <td>
                $planeta->climate
            </td>
        
            <td>
                $planeta->gravity 
            </td>

            <td>
                $planeta->surface_water%
            </td>

            <td>
                $water% 
            </td> 
        ";
    }
?>
</table>
<br>
<center>
    <a href="../index.php" class="link">
        <i class="fa fa-arrow-left"></i>
        <br><br>Voltar à página inicial!
    </a>
</center>

<div class="footer-basic" style="margin-top: 24px">
    <footer>
        <div class="social">
            <a href="https://github.com/Caiojosue/"><i class="icon ion-social-github"></i></a>
            <a href="https://www.linkedin.com/in/caio-sando-14ba1a2b5/"><i class="icon ion-social-linkedin"></i></a>
        </div>
    </footer>
</div>
</body>
</html>