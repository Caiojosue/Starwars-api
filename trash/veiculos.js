document.addEventListener("DOMContentLoaded", async function() {
    const table = document.getElementById("customers");

    async function fetchVehicles(page = 1) {
        try {
            const response = await fetch(`https://swapi.dev/api/vehicles/?page=${page}`);
            if (!response.ok) throw new Error("Erro ao buscar os veículos.");
            const data = await response.json();

            data.results.forEach(veiculo => {
                const row = document.createElement("tr");
                row.innerHTML = `
                    <td>${veiculo.name}</td>
                    <td>${veiculo.model}</td>
                    <td>${veiculo.vehicle_class}</td>
                    <td>${veiculo.manufacturer}</td>
                    <td>${veiculo.max_atmosphering_speed} km/h</td>
                    <td>${veiculo.length} m</td>
                    <td>${veiculo.passengers}</td>
                    <td>${veiculo.cargo_capacity} kg</td>
                `;
                table.appendChild(row);
            });

            if (data.next) {
                fetchVehicles(page + 1);
            }
        } catch (error) {
            console.error(error);
        }
    }

    fetchVehicles();
});
