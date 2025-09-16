<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <style>
    /* === Estilos generales con gradiente === */
    body {
      background: linear-gradient(135deg, #b3e5fc, #e3f2fd);
      min-height: 100vh;
      margin: 0;
      color: #333;
      font-family: 'Segoe UI', sans-serif;
    }

    /* === Navbar con gradiente === */
    .navbar-gradient {
      background: linear-gradient(135deg, #b388ff, #82b1ff, #b3e5fc);
    }
    .navbar-brand, .nav-link {
      font-weight: bold;
      color: #fff !important;
      transition: transform 0.2s ease, opacity 0.2s ease;
    }
    .nav-link:hover {
      transform: scale(1.05);
      opacity: 0.85;
    }

    /* === Card mejorada === */
    .card {
      border-radius: 15px;
      box-shadow: 0 8px 16px rgba(0,0,0,0.15);
      transition: transform 0.2s ease;
    }
    .card:hover {
      transform: translateY(-5px);
    }
    .card-header {
      background: linear-gradient(135deg, #82b1ff, #b388ff);
      color: white;
      font-size: 1.8rem;
      text-align: center;
      padding: 25px;
      border-top-left-radius: 15px;
      border-top-right-radius: 15px;
    }

    /* === Tabla estilizada === */
    .table th {
      background-color: #f8f9fa;
      font-weight: 600;
      text-align: center;
    }
    .table td {
      text-align: center;
      vertical-align: middle;
    }
    .btn {
      min-width: 100px;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-gradient">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">UMSA</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="#">Inicio</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Listado</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Administrador</a></li>
      </ul>
    </div>
  </div>
</nav>

<?php
$db = mysqli_connect('localhost', 'root', '', 'sitio');
$resultado = mysqli_query($db, 'SELECT DISTINCT ci, nombre, apellido FROM persona');
?>

<div class="container mt-5">
  <div class="card">
    <div class="card-header">
      Registro de Personas
    </div>
    <div class="card-body">
      <table class="table table-bordered table-hover align-middle">
        <thead>
          <tr>
            <th>CI</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Operaciones</th>
          </tr>
        </thead>
        <tbody>
        <?php
        while($fila = mysqli_fetch_array($resultado)) {
          echo "<tr>";
          echo "<td>{$fila['ci']}</td>";
          echo "<td>{$fila['nombre']}</td>";
          echo "<td>{$fila['apellido']}</td>";
          echo "<td>";
          echo "<a href='modificar.php?ci={$fila['ci']}' class='btn btn-outline-primary btn-sm me-2'>Modificar</a>";
          echo "<a href='eliminar.php?ci={$fila['ci']}' class='btn btn-outline-danger btn-sm'>Eliminar</a>";
          echo "</td>";
          echo "</tr>";
        }
        ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

</body>
</html>
