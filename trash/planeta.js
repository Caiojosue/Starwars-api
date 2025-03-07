async function fetchPlanets() {
    let allPlanets = [];
    let url = "https://swapi.dev/api/planets/";
    
    try {
        while (url) {
            const response = await fetch(url);
            const data = await response.json();
            allPlanets = allPlanets.concat(data.results);
            url = data.next;
        }
        return allPlanets;
    } catch (error) {
        console.error("Erro ao buscar os planetas:", error);
        return [];
    }
}

async function buscarPlaneta() {
    const search = document.getElementById('searchInput').value.toLowerCase();
    const tabela = document.getElementById('customers');
    tabela.innerHTML = "";

    const planetas = await fetchPlanets();
    const planetaEncontrado = planetas.find(p => p.name.toLowerCase() === search);

    if (planetaEncontrado) {
        const agua = planetaEncontrado.surface_water !== "unknown" ? 100 - parseInt(planetaEncontrado.surface_water) : "Desconhecido";

        tabela.innerHTML = `
            <tr><th>Nome</th><td>${planetaEncontrado.name}</td></tr>
            <tr><th>Diâmetro</th><td>${planetaEncontrado.diameter}</td></tr>
            <tr><th>População</th><td>${planetaEncontrado.population}</td></tr>
            <tr><th>Clima</th><td>${planetaEncontrado.climate}</td></tr>
            <tr><th>Superfície coberta por água</th><td>${planetaEncontrado.surface_water}</td></tr>
            <tr><th>Terra</th><td>${agua}</td></tr>
        `;
    } else {
        tabela.innerHTML = `
            <center>
                <br><br><br>
                <h2>Infelizmente não encontramos o planeta procurado :/</h2>
                <h4>Procure novamente!</h4>
            </center>
        `;
    }
}
