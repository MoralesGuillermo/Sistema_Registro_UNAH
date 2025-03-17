// Abre la modal y muestra el código de la clase seleccionado
function openModal(codigoClase) {
  document.getElementById("claseCodigo").textContent = codigoClase;
  // Aquí se podría actualizar la lista de alumnos según la clase.
  var alumnosModal = new bootstrap.Modal(
    document.getElementById("alumnosModal")
  );
  alumnosModal.show();
}

function openNotasModal(codigoClase) {
  // Actualiza el título del modal para indicar a qué clase se subirán las notas
  document.getElementById("notasModalLabel").textContent =
    "Subir Notas - " + codigoClase;
  //
  var notasModal = new bootstrap.Modal(document.getElementById("notasModal"));
  notasModal.show();
}

// Función para exportar la tabla de alumnos a CSV (simulación de descarga Excel)
function exportTableToCSV(filename) {
  var csv = [];
  var rows = document.querySelectorAll("#tablaAlumnos tr");

  for (var i = 0; i < rows.length; i++) {
    var row = [],
      cols = rows[i].querySelectorAll("td, th");
    for (var j = 0; j < cols.length; j++) {
      row.push('"' + cols[j].innerText + '"');
    }
    csv.push(row.join(","));
  }

  // Crea un Blob y genera el enlace de descarga
  var csvFile = new Blob([csv.join("\n")], { type: "text/csv" });
  var downloadLink = document.createElement("a");
  downloadLink.download = filename;
  downloadLink.href = window.URL.createObjectURL(csvFile);
  downloadLink.style.display = "none";
  document.body.appendChild(downloadLink);
  downloadLink.click();
  document.body.removeChild(downloadLink);
}

// Variable global para almacenar la URL actual del video
let currentVideoUrl = "";
let selectedVideoClass = "";

f; // Funciones para manejo del video
function openVideoClassModal() {
  var videoClassModal = new bootstrap.Modal(
    document.getElementById("videoClassModal")
  );
  videoClassModal.show();
}

function selectVideoClass(classCode) {
  selectedVideoClass = classCode;
  document.getElementById("videoClassCode").textContent = classCode;
  // Cerrar la modal de selección de clase
  var videoClassModalEl = document.getElementById("videoClassModal");
  var videoClassModal = bootstrap.Modal.getInstance(videoClassModalEl);
  videoClassModal.hide();
  // Abrir la modal de video
  var videoModal = new bootstrap.Modal(document.getElementById("videoModal"));
  videoModal.show();
}

function uploadVideo() {
  const url = document.getElementById("videoUrl").value.trim();
  if (url) {
    currentVideoUrl = url;
    document.getElementById("videoIframe").src = currentVideoUrl;
    document.getElementById("videoPreview").style.display = "block";
    alert("Video subido exitosamente para la clase " + selectedVideoClass);
  } else {
    alert("Por favor ingresa una URL válida");
  }
}

function updateVideo() {
  if (!currentVideoUrl) {
    alert("No hay un video subido para actualizar. Usa 'Subir Video' primero.");
    return;
  }
  const url = document.getElementById("videoUrl").value.trim();
  if (url) {
    currentVideoUrl = url;
    document.getElementById("videoIframe").src = currentVideoUrl;
    alert("Video actualizado exitosamente para la clase " + selectedVideoClass);
  } else {
    alert("Por favor ingresa una URL válida para actualizar");
  }
}

function deleteVideo() {
  if (!currentVideoUrl) {
    alert("No hay video para borrar");
    return;
  }
  currentVideoUrl = "";
  document.getElementById("videoUrl").value = "";
  document.getElementById("videoIframe").src = "";
  document.getElementById("videoPreview").style.display = "none";
  alert("Video borrado exitosamente para la clase " + selectedVideoClass);
}

function uploadCSV() {
  const fileInput = document.getElementById("csvFile");
  if (fileInput.files.length === 0) {
    alert("Por favor selecciona un archivo CSV");
    return;
  }
  // Simulación de subida de CSV
  alert("Archivo CSV subido exitosamente");
  fileInput.value = "";
}