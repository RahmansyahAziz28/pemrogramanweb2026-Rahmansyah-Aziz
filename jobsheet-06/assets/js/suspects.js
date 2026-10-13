async function muatDaftarSuspects() {
    const tbody = document.querySelector(".table-responsive table tbody");
    const loading = document.getElementById("loading-indicator");
    if (!tbody) return;

    if (loading) loading.style.display = "block";
    tbody.innerHTML = "";

    try {
        await new Promise((resolve) => setTimeout(resolve, 600));

        const res = await fetch("../data/suspects.json");
        if (!res.ok) {
            throw new Error("Gagal mengambil data (status " + res.status + ")");
        }
        const daftarSuspects = await res.json();

        daftarSuspects.forEach(function (suspect) {
            const tr = document.createElement("tr");
            tr.innerHTML =
                "<td><span class=\"badge-id\">" + (suspect.identification_number || "-") + "</span></td>" +
                "<td><strong>" + suspect.full_name + "</strong></td>" +
                "<td>" + (suspect.date_of_birth || "-") + "</td>" +
                "<td><span class=\"badge-tag\">" + (suspect.gender || "-") + "</span></td>" +
                "<td>" + (suspect.address || "-") + "</td>" +
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
            "<tr><td colspan=\"6\">Gagal memuat arsip data: " + err.message + "</td></tr>";
    } finally {
        if (loading) loading.style.display = "none";
    }
}

document.addEventListener("DOMContentLoaded", function () {
    muatDaftarSuspects();

    const btnReload = document.getElementById("btn-reload");
    if (btnReload) {
        btnReload.addEventListener("click", function () {
            muatDaftarSuspects();
        });
    }
});
