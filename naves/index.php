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
    <title>SWAPI - Espécies</title>
</head>
<body>
    <table id="customers">
        <tr>
            <th>Nome</th>
            <th>Modelo</th>
            <th>Classe</th>
            <th>Máx. Velocidade</th>
            <th>Máx. Peso</th>
            <th>Passageiros</th>
        </tr>

<?php
    $url = "https://swapi.dev/api/starships/";
    $todas_naves = [];

    while ($url) {
        $resultado = json_decode(file_get_contents($url));
        $todas_naves = array_merge($todas_naves, $resultado->results);
        $url = $resultado->next; 
    }


    usort($todas_naves, function ($a, $b) {
        return intval($a->passengers) - intval($b->passengers);
    });

    foreach ($todas_naves as $nave) {
        echo "<tr>
                <td>{$nave->name}</td>
                <td>{$nave->model}</td>
                <td>{$nave->starship_class}</td>
                <td>{$nave->max_atmosphering_speed}</td>
                <td>{$nave->cargo_capacity}</td>
                <td>{$nave->passengers}</td>
              </tr>";
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