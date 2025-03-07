document.addEventListener("DOMContentLoaded", async () => {
    const urlParams = new URLSearchParams(window.location.search);
    const search = urlParams.get("search");
    const table = document.getElementById("customers");

    if (!search) {
        table.innerHTML = "<center><br><br><br><h2>Informe um veículo para buscar!</h2></center>";
        return;
    }

    let vehicles = [];
    let page = 1;
    let found = false;

    while (true) {
        const response = await fetch(`https://swapi.dev/api/vehicles/?page=${page}`);
        const data = await response.json();

        if (!data.results.length) break;

        vehicles = vehicles.concat(data.results);
        page++;
    }

    vehicles.forEach(veiculo => {
        if (veiculo.name.toLowerCase() === search.toLowerCase()) {
            found = true;
            table.innerHTML = `
                <tr><th>Nome</th><td>${veiculo.name}</td></tr>
                <tr><th>Modelo</th><td>${veiculo.model}</td></tr>
                <tr><th>Classe</th><td>${veiculo.vehicle_class}</td></tr>
                <tr><th>Tamanho</th><td>${veiculo.length}m</td></tr>
                <tr><th>Passageiros</th><td>${veiculo.passengers}</td></tr>
                <tr><th>Carga Máx.</th><td>${veiculo.cargo_capacity}</td></tr>
            `;
        }
    });

    if (!found) {
        table.innerHTML = "<center><br><br><br><h2>Infelizmente não encontramos o veículo procurado! :/<h2><h4>Procure novamente!</h4></center>";
    }
});
