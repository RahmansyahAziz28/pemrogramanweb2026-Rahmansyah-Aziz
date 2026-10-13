async function muatDaftarInvestigators() {
    const tbody = document.querySelector(".table-responsive table tbody");
    const loading = document.getElementById("loading-indicator");
    if (!tbody) return;

    if (loading) loading.style.display = "block";
    tbody.innerHTML = "";

    try {
        await new Promise((resolve) => setTimeout(resolve, 600));

        const res = await fetch("../data/investigators.json");
        if (!res.ok) {
            throw new Error("Gagal mengambil data (status " + res.status + ")");
        }
        const daftarInvestigators = await res.json();

        daftarInvestigators.forEach(function (investigator) {
            const tr = document.createElement("tr");
            tr.innerHTML =
                "<td><span class=\"badge-gold\">" + investigator.badge_number + "</span></td>" +
                "<td><strong>" + investigator.full_name + "</strong></td>" +
                "<td><span class=\"badge-tag\">" + investigator.rank + "</span></td>" +
                "<td>" + investigator.department + "</td>" +
                "<td>" + (investigator.phone || "-") + "</td>" +
                "<td>" + (investigator.email || "-") + "</td>" +
                "<td>" +
                "<div class=\"action-buttons\">" +
                "<button type=\"button\" class=\"btn-action\">Edit</button>" +
                "<button type=\"button\" class=\"btn-hapus\">Hapus</button>" +
                "</div>" +
                "</td>";
            tbody.appendChild(tr);
        });
    } catch (err) {
        tbody.innerHTML =
            "<tr><td colspan=\"7\">Gagal memuat arsip data: " + err.message + "</td></tr>";
    } finally {
        if (loading) loading.style.display = "none";
    }
}

document.addEventListener("DOMContentLoaded", function () {
    muatDaftarInvestigators();

    const btnReload = document.getElementById("btn-reload");
    if (btnReload) {
        btnReload.addEventListener("click", function () {
            muatDaftarInvestigators();
        });
    }
});
