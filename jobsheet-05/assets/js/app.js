function initNavToggle() {
    const toggleBtn = document.getElementById("nav-toggle-btn");
    const nav = document.querySelector("header nav");
    if (!toggleBtn || !nav) return;

    toggleBtn.addEventListener("click", function () {
        nav.classList.toggle("nav-open");
    });
}

function initHapusConfirm() {
    const buttons = document.querySelectorAll(".btn-hapus");
    buttons.forEach(function (btn) {
        btn.addEventListener("click", function () {
            const row = btn.closest("tr");
            const nama = row ? (row.querySelector("strong")?.textContent || row.querySelector("td")?.textContent) : "entri ini";
            const yakin = confirm("Yakin ingin menghapus arsip data \"" + nama + "\"?");
            if (yakin && row) {
                row.remove();
            }
        });
    });
}

function initTableFilter() {
    const input = document.getElementById("search-input");
    const table = document.querySelector(".table-responsive table");
    if (!input || !table) return;

    input.addEventListener("keyup", function () {
        const keyword = input.value.toLowerCase();
        const rows = table.querySelectorAll("tbody tr");
        rows.forEach(function (row) {
            const teks = row.textContent.toLowerCase();
            row.style.display = teks.includes(keyword) ? "" : "none";
        });
    });
}

function tampilkanError(input, pesan) {
    hapusError(input);
    const span = document.createElement("span");
    span.className = "error";
    span.textContent = pesan;
    input.insertAdjacentElement("afterend", span);
}

function hapusError(input) {
    const next = input.nextElementSibling;
    if (next && next.classList.contains("error")) {
        next.remove();
    }
}

function initValidasiForm() {
    const form = document.getElementById("form-tambah");
    if (!form) return;

    form.addEventListener("submit", function (e) {
        let valid = true;

        const idNumber = form.querySelector("[name='identification_number']");
        if (idNumber && idNumber.value.trim() === "") {
            tampilkanError(idNumber, "Nomor identitas berkas tersangka wajib diisi.");
            valid = false;
        } else if (idNumber) {
            hapusError(idNumber);
        }

        const fullName = form.querySelector("[name='full_name']");
        if (fullName && fullName.value.trim() === "") {
            tampilkanError(fullName, "Nama lengkap tersangka wajib diisi.");
            valid = false;
        } else if (fullName) {
            hapusError(fullName);
        }

        if (!valid) {
            e.preventDefault();
        }
    });
}

document.addEventListener("DOMContentLoaded", function () {
    initNavToggle();
    initHapusConfirm();
    initTableFilter();
    initValidasiForm();
});
