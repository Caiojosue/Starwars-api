document.addEventListener("DOMContentLoaded", function () {
    const url = "https://swapi.dev/api/films/";
    const filmTableBody = document.getElementById("filmTableBody");

    fetch(url)
        .then(response => response.json())
        .then(data => {
            data.results.forEach(filme => {
                const row = document.createElement("tr");

                row.innerHTML = `
                    <td>${filme.title}</td>
                    <td>${filme.director}</td>
                    <td>${filme.producer}</td>
                    <td>${filme.opening_crawl}</td>
                `;

                filmTableBody.appendChild(row);
            });
        })
        .catch(error => console.error("Erro ao buscar filmes:", error));
});
