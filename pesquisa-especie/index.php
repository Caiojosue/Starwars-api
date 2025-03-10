<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../css/table.css">
    <link rel="shortcut icon" href="https://swapi.dev/static/favicon.ico">
    <link href="../css/footer.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200&family=Odibee+Sans&display=swap" rel="stylesheet">
    <link href="../css/font.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="https://swapi.dev/static/favicon.ico">
    <title>SWAPI - Filme</title>
</head>
<body>
<table id='customers'>
<?php
    $search = $_GET['search'];
    $array_name = [];
    $array_classification = [];
    $array_average_lifespan = [];
    $array_language = [];

    $url = "https://swapi.dev/api/species/";
    $resultado = json_decode(file_get_contents($url));

    foreach($resultado->results as $especie){
        array_push($array_name, $especie->name);
        array_push($array_classification, $especie->classification);
        array_push($array_average_lifespan, $especie->average_lifespan);
        array_push($array_language, $especie->language);
    }

    $verificado = false;

    for($a = 0; $a != sizeof($array_name); $a++){
        if($search == $array_name[$a]){
            $verificado = true;
            echo "
                <tr>
                    <th>Nome</th>
                    <td>$array_name[$a]</td>
                </tr>

                <tr>
                    <th>Classificação</th>
                    <td>$array_classification[$a]</td>
                </tr>
                
                <tr>
                    <th>Tempo de vida médio</th>
                    <td>$array_average_lifespan[$a]</td>
                </tr>

                <tr>
                    <th>Idioma</th>
                    <td>$array_language[$a]</td>
                </tr>
            ";
        }
    }
    if(!$verificado){
        echo "<center><br><br><br><h2>Infelizmente não encontramos a espécie procurada :/<h2><h4>Procure novamente!</h4></center><br><br>";
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

<div class="footer-basic" style="margin-top: 140px">
    <footer>
        <div class="social">
            <a href="https://github.com/Caiojosue/"><i class="icon ion-social-github"></i></a>
            <a href="https://www.linkedin.com/in/caio-sando-14ba1a2b5/"><i class="icon ion-social-linkedin"></i></a>
        </div>
        <p class="copyright">Caio Sando</p>
    </footer>
</div>
</body>
</html>