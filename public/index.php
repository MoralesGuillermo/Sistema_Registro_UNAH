<?php ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistema de Registro</title>
  <link rel="icon" type="image/png" href="views/assets/img/UNAH-escudo.png">
  <link rel="stylesheet" href="views/css/styles.css">
  <link rel="stylesheet" href="views/css/indexStyles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/6130fb0810.js" crossorigin="anonymous"></script>
</head>

<body>
  <header>
    <navbar-unah logo="views/assets/img/logo-unah.png"
      home-href="index.php"
      estudiantes-href="views/loginEstudiantes.php"
      docentes-href="views/loginDocentes.php"
      matricula-href="views/login.php"
      admisiones-href="views/admisiones.php"
      biblioteca-href="views/library/login/libraryLogin.php"></navbar-unah>
    <div class="top-bar">
      <div>
        <nav class="navbar bg-body-tertiary" id="header-bar">
          <div class="container-fluid">
            <h1 class="navbar-brand">
              Sistema de Registro
            </h1>
          </div>
        </nav>
      </div>
  </header>
  <main>
    <div class="banner-container">
      <img src="views/assets/img/1.jpg" alt="Descripción" class="img-fluid">
    </div>
    </div>
    <section class="box">
      <nav class="user-selection">
        <div class="row w-100">
          <div class="col">
            <a href="views/loginEstudiantes.php">
              <div><i class="fa-solid fa-user"></i></div>
              <strong>Estudiantes</strong><br>Ingresa como estudiante
            </a>
          </div>
          <div class="col">
            <a href="views/loginDocentes.php">
              <div><i class="fa-solid fa-user-tie"></i></div>
              <strong>Docentes</strong><br>Ingresa como docente
            </a>
          </div>
          <div class="col">
            <a href="views/admisiones.php">
              <div><i class="fa-solid fa-file"></i></i></div>
              <strong>Admisiones</strong><br>Ingresa a admisiones
            </a>
          </div>
        </div>
      </nav>
      <div class="aside-container">
        <aside class="image-container">
          <img src="views/assets/img/2.jpg" alt="Imagen ilustrativa">
        </aside>
        <aside class="content">
          <div class="line">
            <h2>Biblioteca Virtual</h2>
          </div>
          <p>
            Brinda acceso a bases de datos a texto completo de revistas académicas científicas
            sin importar el lugar o el momento en que el usuario los desee consultar.
          </p>
          <button id="library-btn">Ingresar</button>
        </aside>
      </div>
    </section>
  </main>
  <footer-unah></footer-unah>

  <!-- Ventana modal -->
  <reviewer-modal tag-id="reviewer" application="views/loginRevisorSolicitudesAd.php" exam="./views/admissions/uploadExamResults/login.php"></reviewer-modal>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  <script src="views/js/components/navbar.js"></script>
  <script src="views/js/components/footer.js"></script>
  <script src="views/js/components/reviewerModal.js"></script>
  <script>
    document.getElementById("library-btn").addEventListener("click", function() {
      window.location.href = "views/library/login/libraryLogin.php";
    });
  </script>

</body>

</html>