document.addEventListener("DOMContentLoaded", async function () {
    const tabela = document.getElementById("customers");

    async function carregarPersonagens() {
        let pagina = 1;
        let urlBase = "https://swapi.dev/api/people/";
        
        while (urlBase) {
            try {
                const resposta = await fetch(urlBase);
                const dados = await resposta.json();
                urlBase = dados.next;

                dados.results.forEach(personagem => {
                    const linha = document.createElement("tr");
                    linha.innerHTML = `
                        <td>${personagem.name}</td>
                        <td>${personagem.birth_year}</td>
                        <td>${personagem.eye_color}</td>
                        <td>${personagem.gender}</td>
                        <td>${personagem.hair_color}</td>
                        <td>${personagem.height} cm</td>
                        <td>${personagem.mass} kg</td>
                    `;
                    tabela.appendChild(linha);
                });
            } catch (error) {
                console.error("Erro ao carregar os personagens:", error);
                break;
            }
        }
    }

    await carregarPersonagens();
});
