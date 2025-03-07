document.addEventListener("DOMContentLoaded", async () => {
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
    
    starships.forEach(ship => {
        const row = document.createElement("tr");
        row.innerHTML = `
            <td>${ship.name}</td>
            <td>${ship.model}</td>
            <td>${ship.starship_class}</td>
            <td>${ship.max_atmosphering_speed || "Desconhecida"}</td>
            <td>${ship.cargo_capacity || "Desconhecida"}</td>
            <td>${ship.passengers || "Desconhecido"}</td>
        `;
        table.appendChild(row);
    });
});
