document.addEventListener("click", function (e) {
    if (e.target.closest(".btn-reservas")) {

        const id = e.target.closest(".btn-reservas").dataset.id;

        const modal = new bootstrap.Modal(document.getElementById("modalReservas"));
        document.getElementById("reservas-content").innerHTML = 
            <div class="text-center py-4">
                <div class="spinner-border text-primary"></div>
            </div>
        ;
        modal.show();

        // AJAX
        fetch("backend/ver_reservas.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: "id_customer=" + id
        })
        .then(res => res.text())
        .then(html => {
            document.getElementById("reservas-content").innerHTML = html;
        })
        .catch(err => {
            document.getElementById("reservas-content").innerHTML =
                "<p class='text-danger'>Error al cargar reservas.</p>";
        });
    }
});