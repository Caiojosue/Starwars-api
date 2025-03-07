document.addEventListener("DOMContentLoaded", () => {
    const tabela = document.getElementById("tabela-especies");

    async function carregarEspecies() {
        let pagina = 1;
        let urlBase = "https://swapi.dev/api/species/?page=";

        try {
            while (pagina <= 4) {
                let resposta = await fetch(urlBase + pagina);
                let dados = await resposta.json();

                dados.results.forEach(especie => {
                    let linha = document.createElement("tr");
                    linha.innerHTML = `
                        <td>${especie.name}</td>
                        <td>${especie.classification}</td>
                        <td>${especie.average_lifespan}</td>
                        <td>${especie.language}</td>
                    `;
                    tabela.appendChild(linha);
                });

                pagina++;
            }
        } catch (erro) {
            console.error("Erro ao carregar espécies:", erro);
        }
    }

    carregarEspecies();
});
