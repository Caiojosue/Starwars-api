document.addEventListener("DOMContentLoaded", async () => {
    const tabelaPersonagens = document.getElementById("tabela-personagens");
    const searchParams = new URLSearchParams(window.location.search);
    const searchQuery = searchParams.get("search")?.toLowerCase() || "";

    let personagens = [];
    let page = 1;
    let hasMorePages = true;

    while (hasMorePages) {
        const response = await fetch(`https://swapi.dev/api/people/?page=${page}`);
        const data = await response.json();
        if (data.results.length > 0) {
            personagens = personagens.concat(data.results);
            page++;
        } else {
            hasMorePages = false;
        }
    }

    const personagemEncontrado = personagens.find(personagem => personagem.name.toLowerCase() === searchQuery);

    if (personagemEncontrado) {
        const tr = document.createElement("tr");
        tr.innerHTML = `
            <td>${personagemEncontrado.name}</td>
            <td>${personagemEncontrado.height} cm</td>
            <td>${personagemEncontrado.mass} kg</td>
            <td>${personagemEncontrado.birth_year}</td>
            <td>${personagemEncontrado.gender}</td>
        `;
        tabelaPersonagens.appendChild(tr);
    } else {
        tabelaPersonagens.innerHTML = `
            <tr>
                <td colspan="5" style="text-align: center; padding: 20px;">Infelizmente não encontramos o personagem procurado :/<br>Procure novamente!</td>
            </tr>
        `;
    }
});
