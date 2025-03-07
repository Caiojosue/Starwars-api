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
    <title>SWAPI - Filmes</title>
</head>
<body>

<form method="GET" action="">
    <div class="center-select">
        <div class="center-order">
            <label for="ordem">Escolha a ordem para assistir:</label>
            <select name="ordem" id="ordem">
                <option value="lancamento">Ordem de Lançamento</option>
                <option value="cronologica">Ordem Cronológica</option>
            </select>
            <button type="submit">Filtrar</button>
        </div>
    
        <div class="center-filter">
            <label for="personagem">Filtrar por personagem:</label>
            <input type="text" name="personagem" id="personagem" placeholder="Digite um nome">
            <button type="submit">Filtrar</button>
        </div>
    </div>

</form>

<table id="customers">
    <tr>
        <th>Título</th>
        <th>Diretor</th>
        <th>Produtor</th>
        <th>Texto de abertura</th>
    </tr>
<?php
    $url = "https://swapi.dev/api/films/";
    $resultado = json_decode(file_get_contents($url));

    // Captura os filtros escolhidos
    $ordem = isset($_GET['ordem']) ? $_GET['ordem'] : 'lancamento';
    $personagem_nome = isset($_GET['personagem']) ? trim($_GET['personagem']) : '';

    // Definição das ordens de exibição
    if ($ordem === 'cronologica') {
        usort($resultado->results, function($a, $b) {
            return $a->episode_id - $b->episode_id;
        });
    } else {
        usort($resultado->results, function($a, $b) {
            return strtotime($a->release_date) - strtotime($b->release_date);
        });
    }

    foreach ($resultado->results as $filme) {
        if (!empty($personagem_nome)) {
            $personagem_encontrado = false;
            foreach ($filme->characters as $url_personagem) {
                $dados_personagem = json_decode(file_get_contents($url_personagem));
                if (stripos($dados_personagem->name, $personagem_nome) !== false) {
                    $personagem_encontrado = true;
                    break;
                }
            }
            if (!$personagem_encontrado) {
                continue;
            }
        }

        echo "
        <tr>
            <td>
                $filme->title
            </td>

            <td>
                $filme->director
            </td>
        
            <td>
                $filme->producer
            </td>

            <td>
                $filme->opening_crawl
            </td>
        </tr>
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
