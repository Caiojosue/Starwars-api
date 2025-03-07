document.addEventListener("DOMContentLoaded", function () {
    const urlParams = new URLSearchParams(window.location.search);
    const search = urlParams.get("search");
    const speciesTable = document.getElementById("species-data");

    fetch("https://swapi.dev/api/species/")
        .then(response => response.json())
        .then(data => {
            let found = false;
            
            data.results.forEach(species => {
                if (species.name.toLowerCase() === search.toLowerCase()) {
                    found = true;
                    speciesTable.innerHTML = `
                        <tr>
                            <th>Nome</th>
                            <td>${species.name}</td>
                        </tr>
                        <tr>
                            <th>Classificação</th>
                            <td>${species.classification}</td>
                        </tr>
                        <tr>
                            <th>Tempo de vida médio</th>
                            <td>${species.average_lifespan}</td>
                        </tr>
                        <tr>
                            <th>Idioma</th>
                            <td>${species.language}</td>
                        </tr>
                    `;
                }
            });
            
            if (!found) {
                speciesTable.innerHTML = `
                    <tr>
                        <td colspan="2" style="text-align: center; padding: 20px;">
                            <h2>Infelizmente não encontramos a espécie procurada :/</h2>
                            <h4>Procure novamente!</h4>
                        </td>
                    </tr>
                `;
            }
        })
        .catch(error => {
            console.error("Erro ao buscar dados da API:", error);
            speciesTable.innerHTML = `
                <tr>
                    <td colspan="2" style="text-align: center; padding: 20px;">
                        <h2>Erro ao carregar os dados.</h2>
                        <h4>Tente novamente mais tarde.</h4>
                    </td>
                </tr>
            `;
        });
});
