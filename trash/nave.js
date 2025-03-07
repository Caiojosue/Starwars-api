document.addEventListener("DOMContentLoaded", async () => {
    const params = new URLSearchParams(window.location.search);
    const search = params.get("search");
    const table = document.getElementById("customers");
    
    const urls = [
        "https://swapi.dev/api/starships/",
        "https://swapi.dev/api/starships/?page=2",
        "https://swapi.dev/api/starships/?page=3",
        "https://swapi.dev/api/starships/?page=4"
    ];
    
    let starships = [];
    
    for (const url of urls) {
        try {
            const response = await fetch(url);
            const data = await response.json();
            starships = starships.concat(data.results);
        } catch (error) {
            console.error("Erro ao buscar dados da API:", error);
        }
    }
    
    const ship = starships.find(nave => nave.name.toLowerCase() === search?.toLowerCase());
    
    if (ship) {
        table.innerHTML = `
            <tr><th>Nome</th><td>${ship.name}</td></tr>
            <tr><th>Modelo</th><td>${ship.model}</td></tr>
            <tr><th>Classe</th><td>${ship.starship_class}</td></tr>
            <tr><th>Marca</th><td>${ship.manufacturer}</td></tr>
            <tr><th>Tamanho</th><td>${ship.length}m</td></tr>
            <tr><th>Passageiros</th><td>${ship.passengers}</td></tr>
            <tr><th>Velocidade Máxima</th><td>${ship.max_atmosphering_speed || "Desconhecida"} km/h</td></tr>
        `;
    } else {
        table.innerHTML = `<center><br><br><br><h2>Infelizmente não encontramos a nave procurada :/</h2><h4>Procure novamente!</h4></center><br><br>`;
    }
});
