async function buscarFilme() {
    const searchInput = document.getElementById("search").value.toLowerCase();
    const url = "https://swapi.dev/api/films/";
    const response = await fetch(url);
    const data = await response.json();
    
    const filmes = data.results;
    let encontrado = false;
    let tabelaHTML = "";
    
    filmes.forEach(filme => {
        if (filme.title.toLowerCase() === searchInput) {
            encontrado = true;
            const dataLancamento = formatarData(filme.release_date);
            
            tabelaHTML += `
                <tr><th>Título</th><td>${filme.title}</td></tr>
                <tr><th>Número do Filme</th><td>${filme.episode_id}</td></tr>
                <tr><th>Tela de abertura</th><td>${filme.opening_crawl}</td></tr>
                <tr><th>Diretor</th><td>${filme.director}</td></tr>
                <tr><th>Produtor</th><td>${filme.producer}</td></tr>
                <tr><th>Data</th><td>${dataLancamento}</td></tr>
            `;
        }
    });
    
    if (!encontrado) {
        tabelaHTML = "<center><br><br><br><h2>Infelizmente não encontramos o filme procurado :/<h2><h4>Procure novamente!</h4></center><br><br>";
    }
    
    document.getElementById("customers").innerHTML = tabelaHTML;
}

function formatarData(dataStr) {
    const meses = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"];
    const [ano, mes, dia] = dataStr.split("-");
    return `${dia} de ${meses[parseInt(mes) - 1]} de ${ano}`;
}