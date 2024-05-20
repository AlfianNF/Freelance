// Ambil elemen-elemen yang diperlukan
var modal = document.getElementById("modal");
var openModalBtn = document.getElementById("openModalBtn");
var closeModalBtn = document.getElementById("closeModalBtn");
var editButtons = document.querySelectorAll(".btn_edit");

// Fungsi untuk membuka modal
function openModal() {
    modal.style.display = "block";
}

// Fungsi untuk menutup modal
function closeModal() {
    modal.style.display = "none";
}

// Event listener untuk membuka modal
openModalBtn.addEventListener("click", openModal);

// Event listener untuk menutup modal saat tombol close ditekan
closeModalBtn.addEventListener("click", closeModal);

// Event listener untuk menutup modal saat overlay (latar belakang gelap) ditekan
window.addEventListener("click", function (event) {
    if (event.target == modal) {
        closeModal();
    }
});

// Event listener untuk menutup modal saat tombol escape ditekan
document.addEventListener("keydown", function (event) {
    if (event.key === "Escape") {
        closeModal();
    }
});

// Loop melalui setiap tombol "Edit"
editButtons.forEach(function (button) {
    // Tambahkan event listener untuk setiap tombol
    button.addEventListener("click", function () {
        // Ambil ID modal dari atribut data-modal-id
        var modalId = button.getAttribute("data-modal-id");
        // Tampilkan modal dengan ID yang sesuai
        var modal = document.getElementById(modalId);
        modal.style.display = "block";
    });
});
