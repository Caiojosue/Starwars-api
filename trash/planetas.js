document.addEventListener("DOMContentLoaded", () => {
    const tableBody = document.getElementById("planets-table");
    const baseURL = "https://swapi.dev/api/planets/";

    async function fetchPlanets(url) {
        try {
            let nextPage = url;
            while (nextPage) {
                const response = await fetch(nextPage);
                const data = await response.json();
                populateTable(data.results);
                nextPage = data.next;
            }
        } catch (error) {
            console.error("Erro ao buscar os planetas:", error);
        }
    }

    function populateTable(planets) {
        planets.forEach(planet => {
            const waterPercentage = planet.surface_water !== "unknown" 
                ? `${100 - parseInt(planet.surface_water)}%` 
                : "Desconhecido";

            const row = `
                <tr>
                    <td>${planet.name}</td>
                    <td>${planet.diameter}</td>
                    <td>${planet.climate}</td>
                    <td>${planet.gravity}</td>
                    <td>${planet.surface_water}%</td>
                    <td>${waterPercentage}</td>
                </tr>
            `;
            tableBody.innerHTML += row;
        });
    }

    fetchPlanets(baseURL);
});
