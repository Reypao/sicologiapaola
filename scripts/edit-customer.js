document.addEventListener("click", function(e) {
    if (e.target.closest(".btn-editar")) {

        let btn = e.target.closest(".btn-editar");

        // Tomar los datos del botón
        let id = btn.getAttribute("data-id");
        let nombre = btn.getAttribute("data-nombre");
        let email = btn.getAttribute("data-email");
        let telefono = btn.getAttribute("data-telefono");

        // Insertarlos en el modal
        document.getElementById("edit-id").value = id;
        document.getElementById("edit-nombre").value = nombre;
        document.getElementById("edit-email").value = email;
        document.getElementById("edit-telefono").value = telefono;
    }
});