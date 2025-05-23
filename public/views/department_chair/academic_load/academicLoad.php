<?php ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Carga Académica</title>
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
              <a href="/views/department_chair/home/index.php"class="list-group-item list-group-item-action" aria-disabled="true">
                <i class="fa-solid fa-user"></i></i> Perfil de Jefe
              </a>
              <a class="list-group-item list-group-item-action bg-warning" aria-disabled="true">
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
                <h3>Planificación Académica</h3>
                <p>En esta sección puedes planificar la carga académica para el siguiente periodo académico. Selecciona la carrera y luego planifica las clases del siguiente periodo.</p>
              </header>
              <section id="studentRecord" class="text-start p-4">
                <div>
                  <div class="mt-3">
                    <div class="text-center">
                      <h1>Carga Académica <span id="academicLoadMajor"></span></h1>
                    </div>
                    <div class="d-flex justify-content-end gap-3 mb-2">
                      <div class="w-25">
                        <label for="departmentMajor">Carrera</label>
                        <select id="departmentMajor" name="departmentMajor"class="form-select">
                        </select>
                      </div>
                      <div class="w-25">
                        <label for="academicLoadFilter">Filtrar</label>
                        <div class="input-group">
                          <input id="academicLoadFilter" name="academicLoadFilter"  type="text" class="form-control" placeholder="Filtrado" disabled>
                          <span id="academicLoadFilterSearchBtn" class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></span>
                        </div>
                      </div>
                    </div>
                    <div class="table-responsive table-overflow">
                      <table id="academicLoadTable" class="table table-dark table-striped mb-0" style="width: 150%">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Código de Clase</th>
                            <th scope="col">Clase</th>
                            <th scope="col">UV</th>
                            <th scope="col">Docente</th>
                            <th scope="col">Hora Inicial</th>
                            <th scope="col">Hora Final</th>
                            <th scope="col">Dias de clase</th>
                            <th scope="col">Edificio</th>
                            <th scope="col">Aula</th>
                            <th scope="col">Cupos</th>
                            <th scope="col">Periodo Académico</th>
                            <th scope="col">Acciones</th>
                          </tr>
                        </thead>
                        <tbody id="studentRecords">
                        </tbody>
                      </table>
                    </div>
                    <div id="table-info" class="text-secondary text-center my-1">
                      No se ha seleccionado una carrera
                    </div>
                    <div>
                      <button id="excelImportBtn" class="btn btn-success float-end ms-2" disabled>Exportar a Excel</button>
                      <button id="newSectionBtn" class="btn btn-primary float-end" disabled>Nueva sección</button>
                    </div>
                  </div>
                </div>
              </section>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <div class="d-none">
    <table id="exportTable">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Código de Clase</th>
          <th scope="col">Clase</th>
          <th scope="col">UV</th>
          <th scope="col">Docente</th>
          <th scope="col">Hora Inicial</th>
          <th scope="col">Hora Final</th>
          <th scope="col">Dias de clase</th>
          <th scope="col">Edificio</th>
          <th scope="col">Aula</th>
          <th scope="col">Cupos</th>
          <th scope="col">Periodo Académico</th>
        </tr>
      </thead>
      <tbody id="exportTableBody">
      </tbody>
    </table>
  </div>
  <!-- Modal de Nueva Sección -->
  <div class="modal fade" id="newSectionModal" tabindex="-1" aria-labelledby="alumnosModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="alumnosModalLabel">Nueva sección de <span class="titleSuffix"></span></h5>
          <button id="closeNewSectionModal" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body load-form">
          <div class="mt-3">
            <label for="class">Clase</label>
            <select id="class" type="text" class="form-select">
            </select>
          </div>
          <div class="mt-3">
            <label for="teacher">Docente</label>
            <select id="teacher" name="teacher" type="text" class="form-select">
            </select>
          </div>
          <div class="mt-3">
            <p>Dias de Clase:</p>
            <div class="btn-group" role="group" aria-label="Class days selection radio button">
              <input type="radio" class="btn-check" name="classDays" id="btnradio1" autocomplete="off" value="WEEK" checked>
              <label class="btn btn-outline-warning" for="btnradio1">Dias de Semana</label>

              <input type="radio" class="btn-check" name="classDays" id="btnradio2" autocomplete="off" value="SAT">
              <label class="btn btn-outline-warning" for="btnradio2">Sábados</label>
          </div>
          </div>
          <div class="mt-3">
            <label for="start_time">Hora Inicial</label>
            <select type="text" id="start-time" class="form-select">
              <option value="">Seleccione una hora inicial...</option>
              <option value="700">0700</option>
              <option value="800">0800</option>
              <option value="900">0900</option>
              <option value="1000">1000</option>
              <option value="1100">1100</option>
              <option value="1200">1200</option>
              <option value="1300">1300</option>
              <option value="1400">1400</option>
              <option value="1500">1500</option>
              <option value="1600" class="weekday-only">1600</option>
              <option value="1700" class="weekday-only">1700</option>
              <option value="1800" class="weekday-only">1800</option>
              <option value="1900" class="weekday-only">1900</option>
              <option value="2000" class="weekday-only">2000</option>
            </select>
          </div>
          <div class="mt-3">
            <label for="edificio">Hora Final</label>
            <div>
              <small class="text-secondary">Tiene que seleccionar la clase, los días de clase y la hora inicial para obtener la hora final</small>
            </div>
            <select type="text" id="end-time" class="form-control" disabled></select>
          </div>
          <div class="mt-3">
            <label for="building">Edificio</label>
            <select type="text" id="building" class="form-select"></select>
          </div>
          <div class="mt-3">
            <label for="classroom">Aula</label>
            <select type="text" id="classroom" class="form-select" disabled ></select>
          </div>
          <div class="mt-3">
            <label for="quota">Cupos</label>
            <input type="number" id="quota" class="form-control">
            <div class="text-red" id="quota-info"></div>
          </div>
        </div>
        <div class="modal-footer">
          <button id="submit" class="btn btn-primary" disabled>Crear Sección</button>
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
  <script type="module" src="../js/academicLoad.js"></script>
</html>
