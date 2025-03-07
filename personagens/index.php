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
    <title>SWAPI - Personagens</title>
</head>
<body>

<!-- Formulário para filtrar por gênero -->
<form method="GET" action="" style="display: flex; justify-content: flex-end; margin: 1%;">
    <label for="genero" style="margin-right: 5px;">Filtrar por gênero:</label>
    <select name="genero" id="genero" style="margin-right: 5px;">
        <option value="">Todos</option>
        <option value="male">Masculino</option>
        <option value="female">Feminino</option>
        <option value="n/a">Desconhecido</option>
    </select>
    <button type="submit">Filtrar</button>
</form>

<table id="customers">
    <tr>
        <th>Nome</th>
        <th>Peso</th>
        <th>Altura</th>
    </tr>
<?php
    $paginas = [1,2,3,4,5,6,7,8,9];
    $filtro_genero = isset($_GET['genero']) ? $_GET['genero'] : '';

    foreach($paginas as $pagina) {
        $url = "https://swapi.dev/api/people/?page=" . $pagina;
        $resultado = json_decode(file_get_contents($url));

        foreach($resultado->results as $personagem){
            // Aplica o filtro de gênero
            if ($filtro_genero && $personagem->gender !== $filtro_genero) {
                continue;
            }

            echo "
            <tr>
                <td>
                    <a href='./personagem/index.php?search=" . urlencode($personagem->name) . "'>
                        $personagem->name
                    </a>
                </td>

                <td>
                    $personagem->mass kg 
                </td>

                <td>
                    $personagem->height cm
                </td> 
            </tr>
            ";
        }
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
