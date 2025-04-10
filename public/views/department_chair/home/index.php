<?php ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Jefes de Departamento</title>
  <link rel="icon" type="image/png" href="/views/assets/img/UNAH-escudo.png" />
  <link rel="stylesheet" href="/views/css/styles.css" />
  <link rel="stylesheet" href="/views/css/departmentChairStyles.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <script src="https://kit.fontawesome.com/6130fb0810.js" crossorigin="anonymous"></script>
</head>
<body>
  <header>
    <navbar-unah></navbar-unah>
    <div class="top-bar">
      <div>
        <nav class="navbar bg-body-tertiary" id="header-bar">
          <div class="container-fluid">
            <h1 class="navbar-brand">Jefes de Departamento</h1>
          </div>
        </nav>
      </div>
    </div>
  </header>
  <main>
    <div class="container text-center" style="background-color: white">
      <div class="row">
        <div class="col-sm-3 sidebar pb-4">
          <div class="sidebar-hd">
            <header id="left-bar-h">
              <h1>UNAH</h1>
            </header>
          </div>
          <div id="sidebarMain" class="sidebar-mn">
            <div class="list-group">
              <a href="/views/department_chair/home/index.php"class="list-group-item list-group-item-action bg-warning" aria-disabled="true">
                <i class="fa-solid fa-user"></i></i> Perfil de Jefe
              </a>
              <a href="/views/department_chair/academic_load/academicLoad.php" class="list-group-item list-group-item-action" aria-disabled="true">
                <i class="fa-regular fa-rectangle-list"></i> Planificación académica
              </a>
              <a class="list-group-item list-group-item-action disabled" aria-disabled="true">
                <i class="fa-solid fa-table-list"></i> Matrícula
              </a>
              <a href="/views/department_chair/records/studentRecord.php" class="list-group-item list-group-item-action">
                <i class="fa-regular fa-address-card"></i> Historial Estudiantes
              </a>
              <a class="list-group-item list-group-item-action disabled" aria-disabled="true">
                <i class="fa-regular fa-clipboard"></i> Reiniciar clave de Docente
              </a>
              <a class="list-group-item list-group-item-action disabled" aria-disabled="true">
                <i class="fa-solid fa-book-open"></i> Biblioteca Virtual
              </a>
              <a href="/views/docentes.php" class="list-group-item list-group-item-action">
                <i class="fa-solid fa-chalkboard-user"></i> Perfil de Docente
              </a>
            </div>
          </div>
          <div class="sidebar-ft mt-3">
            <log-out></log-out>
          </div>
        </div>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-8 col-sm-6">
              <header id="profile-bar-h">
                <h3>Perfil de Jefe de Departamento</h3>
              </header>
              <section class="border-bottom border-dark py-3">
                <aside id="welcome-msg">
                  <h4>Bienvenido Jefe!</h4>
                </aside>
                <img src="/views/assets/img/default-profile.png" class="profile-pic mx-auto d-block" alt="..." style="background-color: black" />
              </section>
              <section>
                <div class="info-card">
                  <div class="info-header">
                    <span>Información Personal</span>
                  </div>
                  <hr />
                  <div class="info-row info-labels">
                    <span>Número de Empleado</span>
                    <span>Nombre Completo</span>
                    <span>Correo</span>
                    <span>Teléfono</span>
                  </div>
                  <div class="info-row">
                    <span id="employeeNumber">123456</span>
                    <span id="name">Nombre de ejemplo</span>
                    <span id="email">ejemplo@correo.com</span>
                    <span id="phone">00000000</span>
                  </div>
                </div>
              </section>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- Modal de Alumnos -->
  <div class="modal fade" id="alumnosModal" tabindex="-1" aria-labelledby="alumnosModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="alumnosModalLabel">Lista de Alumnos: <span class="titleSuffix"></span></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
          <div class="table-responsive">
            <table class="table table-light table-hover" id="tablaAlumnos">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">#Cuenta</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Apellido</th>
                  <th scope="col">Email</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button id="downloadStudentTableBtn" class="btn btn-success">Descargar Excel</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal para Subir Video -->
  <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <!-- Se actualiza el título para mostrar la clase seleccionada -->
          <h5 class="modal-title" id="videoModalLabel">Subir Video a Clase: <span class="titleSuffix"></span></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
          <div id="videoUrlContainer" class="mb-3">
            <label for="videoUrl" class="form-label">URL del Video:</label>
            <input type="text" class="form-control" id="videoUrl" placeholder="Ingresa la URL del video" />
            <div id="videoUrlInfo"></div>
          </div>
          <div id="videoPreview" class="mb-3">
            <div id="videoWrapper"class="ratio ratio-16x9 bg-light d-flex justify-content-center align-items-center text-secondary">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button id="deleteVideoBtn" type="button" class="btn btn-danger">Borrar Video</button>
          <button id="uploadVideoBtn" type="button" class="btn btn-primary">Subir Video</button>
        </div>
      </div>
    </div>
  </div>

  <pop-up
        id="popUp"
        imgsource="/views/assets/img/crossmark.png"
        popupclass=""
        message="">
    </pop-up>

  <!-- Ventana modal -->
  <reviewer-modal tag-id="reviewer" application="loginRevisorSolicitudesAd.php" exam="./admissions/uploadExamResults/login.php"></reviewer-modal>
<!--Footer de la página-->
<footer-unah></footer-unah>
</body>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>
  <script src="/views/js/components/navbar.js"></script>
  <script src="/views/js/components/footer.js"></script>
  <script src="/views/js/components/pop-up.js"></script>
  <script src="/views/js/components/log-out.js"></script>
  <script src="/views/js/components/reviewerModal.js"></script>
  <script src="../js/home.js"></script>
</html>