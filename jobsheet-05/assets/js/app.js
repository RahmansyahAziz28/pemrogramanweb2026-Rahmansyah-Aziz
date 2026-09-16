// ===== Hamburger menu (JS-driven, menggantikan checkbox hack) =====
function initNavToggle() {
    const toggleBtn = document.getElementById("nav-toggle-btn");
    const nav = document.querySelector("header nav");
    if (!toggleBtn || !nav) return;

    toggleBtn.addEventListener("click", function () {
        nav.classList.toggle("nav-open");
    });
}

// ===== Hitung dan tampilkan jumlah baris aktif (Ide Latihan Lanjutan) =====
function updateTableCounter() {
    const counter = document.getElementById("table-counter");
    const table = document.querySelector(".table-responsive table");
    if (!counter || !table) return;

    const allRows = table.querySelectorAll("tbody tr");
    const total = allRows.length;
    let visible = 0;

    allRows.forEach(function (row) {
        if (row.style.display !== "none") {
            visible++;
        }
    });

    counter.textContent = "Menampilkan " + visible + " dari " + total + " data";
}

// ===== Konfirmasi hapus (front-end only, belum ke server) =====
function initHapusConfirm() {
    document.querySelectorAll(".btn-hapus").forEach(function (btn) {
        btn.addEventListener("click", function () {
            const row = btn.closest("tr");
            const nama = row ? row.querySelector("td")?.textContent : "data ini";
            const yakin = confirm("Yakin ingin menghapus \"" + nama + "\"?");
            if (yakin && row) {
                row.remove();
                updateTableCounter();
            }
        });
    });
}

// ===== Filter/pencarian tabel real-time =====
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
        updateTableCounter();
    });

    updateTableCounter();
}

// ===== Validasi form (client-side) =====
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

    // Konfigurasi field wajib (Refactor dengan array, Ide Latihan Lanjutan)
    const requiredFields = [
        { selector: "[name='judul']", label: "Judul" },
        { selector: "[name='nama']", label: "Nama" },
        { selector: "[name='pengarang']", label: "Pengarang" },
        { selector: "[name='no_anggota']", label: "No. Anggota" }
    ];

    form.addEventListener("submit", function (e) {
        let valid = true;

        // Validasi field wajib
        requiredFields.forEach(function (f) {
            const el = form.querySelector(f.selector);
            if (el) {
                if (el.value.trim() === "") {
                    tampilkanError(el, f.label + " wajib diisi.");
                    valid = false;
                } else {
                    hapusError(el);
                }
            }
        });

        // Validasi tahun
        const tahun = form.querySelector("[name='tahun']");
        if (tahun && tahun.value.trim() !== "") {
            const nilai = parseInt(tahun.value, 10);
            if (isNaN(nilai) || nilai < 1900 || nilai > 2026) {
                tampilkanError(tahun, "Tahun harus di antara 1900-2026.");
                valid = false;
            } else {
                hapusError(tahun);
            }
        }

        // Validasi stok
        const stok = form.querySelector("[name='stok']");
        if (stok && stok.value.trim() !== "") {
            const nilai = parseInt(stok.value, 10);
            if (isNaN(nilai) || nilai < 0) {
                tampilkanError(stok, "Stok tidak boleh negatif.");
                valid = false;
            } else {
                hapusError(stok);
            }
        }

        // Validasi ISBN (Hanya angka dan tanda hubung, Ide Latihan Lanjutan)
        const isbn = form.querySelector("[name='isbn']");
        if (isbn && isbn.value.trim() !== "") {
            const regexIsbn = /^[0-9-]+$/;
            if (!regexIsbn.test(isbn.value.trim())) {
                tampilkanError(isbn, "ISBN hanya boleh berisi angka dan tanda hubung (-).");
                valid = false;
            } else {
                hapusError(isbn);
            }
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
