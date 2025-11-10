document.addEventListener("DOMContentLoaded", () => {

  /* ✅ 1. CONFIGURACIÓN DE HORARIOS Y DÍAS */
  const agenda = [
    {
      dia: "Miércoles",
      fecha: "Oct 8",
      horarios: ["9:00 AM", "10:00 AM", "11:30 AM"]
    },
    {
      dia: "Domingo",
      fecha: "Oct 12",
      horarios: ["8:00 AM", "4:00 PM"]
    },
    {
      dia: "Miércoles",
      fecha: "Oct 15",
      horarios: ["12:00 PM", "1:30 PM"]
    },
    {
      dia: "Domingo",
      fecha: "Oct 29",
      horarios: ["7:00 AM", "3:00 PM"]
    }
  ];

  /* ✅ 2. REFERENCIAS A LA TABLA */
  const headerRow = document.getElementById("tablaFechasHeader");
  const bodyTable = document.getElementById("tablaHorariosBody");

  /* ✅ 3. CREAR HEADERS (días) */
  headerRow.innerHTML = `<th></th>`; // Columna vacía para horas

  agenda.forEach(col => {
    headerRow.innerHTML += `
      <th>
        <div class="fw-bold">${col.dia}</div>
        <div class="text-muted small">${col.fecha}</div>
      </th>`;
  });

  /* ✅ 4. OBTENER LISTA ÚNICA DE HORARIOS */
  const todosLosHorarios = [...new Set(agenda.flatMap(col => col.horarios))];

  /* ✅ 5. CREAR FILAS */
  todosLosHorarios.forEach(hora => {
    let rowHTML = `<tr><th class="table-light">${hora}</th>`;

    agenda.forEach(col => {
      if (col.horarios.includes(hora)) {
        rowHTML += `<td class="horario-cell selectable" data-dia="${col.dia}" data-fecha="${col.fecha}" data-hora="${hora}">
            ✅ Disponible
          </td>`;
      } else {
        rowHTML += `<td class="table-secondary">—</td>`;
      }
    });

    rowHTML += "</tr>";
    bodyTable.innerHTML += rowHTML;
  });

  /* ✅ 6. MOSTRAR FORMULARIO AL SELECCIONAR HORARIO */
  const formContainer = document.getElementById("bookingFormContainer");
  const fechaInput = document.getElementById("fecha");
  const horaInput = document.getElementById("hora");

  document.querySelectorAll(".selectable").forEach(cell => {
    cell.addEventListener("click", () => {
      const dia = cell.dataset.dia;
      const fecha = cell.dataset.fecha;
      const hora = cell.dataset.hora;

      // Rellenar campos
      fechaInput.value = `${dia} ${fecha}`;
      horaInput.value = hora;

      // Mostrar formulario
      formContainer.style.display = "block";
      formContainer.scrollIntoView({ behavior: "smooth", block: "start" });
    });
  });

  /* ✅ 7. ENVÍO DEL FORMULARIO (igual que antes) */
  const bookingForm = document.getElementById("bookingForm");

  bookingForm.addEventListener("submit", async (e) => {
    e.preventDefault();

    const formData = new FormData(bookingForm);
    const submitBtn = bookingForm.querySelector("button[type='submit']");
    submitBtn.disabled = true;
    submitBtn.textContent = "Enviando...";

    try {
      const resp = await fetch(bookingForm.action, {
        method: "POST",
        body: formData
      });

      const result = await resp.json();

      if (resp.ok) {
        alert("✅ ¡Reserva enviada correctamente!");
        bookingForm.reset();
        formContainer.style.display = "none";
      } else {
        alert("❌ Error: " + (result.message || "Intenta nuevamente."));
      }
    } catch {
      alert("⚠️ No se pudo enviar el formulario. Verifica tu conexión.");
    } finally {
      submitBtn.disabled = false;
      submitBtn.textContent = "Confirmar Reserva";
    }
  });
});