<?php
$ci = $_GET["ci"];
$db = mysqli_connect('localhost', 'root', '', 'sitio');
$resultado = mysqli_query($db, 'SELECT * FROM persona WHERE ci=' . intval($ci));
$fila = mysqli_fetch_array($resultado);
?>
<!DOCTYPE html>
<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Fondo gradiente */
    body {
      background: linear-gradient(135deg, #b3e5fc, #e3f2fd);
      font-family: 'Segoe UI', sans-serif;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0;
    }

    /* Caja del formulario */
    .form-box {
      width: 100%;
      max-width: 500px;
      background: #ffffff;
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.15);
      transition: transform 0.2s ease;
    }
    .form-box:hover {
      transform: translateY(-5px);
    }

    /* Título con gradiente */
    .form-box h2 {
      text-align: center;
      margin-bottom: 30px;
      background: linear-gradient(135deg, #82b1ff, #b388ff);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      font-weight: bold;
    }

    /* Botones con gradiente morado-azul */
    .btn-gradient {
      flex: 1;
      min-width: 120px;
      padding: 10px 0;
      border: none;
      border-radius: 8px;
      color: white;
      font-weight: bold;
      cursor: pointer;
      background: linear-gradient(135deg, #82b1ff, #b388ff);
      transition: transform 0.2s ease, filter 0.2s ease;
    }

    .btn-gradient:hover {
      transform: translateY(-2px);
      filter: brightness(1.1);
    }

    /* Botones agrupados */
    .btn-group {
      display: flex;
      justify-content: space-between;
      gap: 10px;
    }
  </style>
</head>
<body>
  <div class="form-box">
    <h2>Modificar Persona</h2>
    <form method="GET" action="gmodificar.php">
      <input type="hidden" name="ci" value="<?php echo $fila["ci"]; ?>" />

      <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control" value="<?php echo $fila["nombre"]; ?>" required />
      </div>

      <div class="mb-3">
        <label class="form-label">Apellido</label>
        <input type="text" name="apellido" class="form-control" value="<?php echo $fila["apellido"]; ?>" required />
      </div>

      <div class="btn-group">
        <input type="submit" name="Aceptar" value="Aceptar" class="btn-gradient" />
        <input type="submit" name="Cancelar" value="Cancelar" class="btn-gradient" />
      </div>
    </form>
  </div>
</body>
</html>
