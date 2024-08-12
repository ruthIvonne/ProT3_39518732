<?php
$session = session();
$nombre = $session->get('nombre');
$perfil = $session->get('perfil_id');
?>

<nav id="navbar" class="navbar navbar-expand-lg bg-body-green">
  <div class="container-fluid">
    <a class="navbar-brand text-white">Mundo Libros</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="index">Principal</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="quienes_somos">Quienes somos</a>
        </li>
        <?php if ($perfil == 1): ?>
          <li class="nav-item">
            <a class="nav-link text-white" href="suscribirse">Suscríbete</a>
          </li>

        <?php endif; ?>

        <li class="nav-item">
          <?php if ($perfil == 2): ?>
          <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="index">Principal</a>
          </li>
          <a class="nav-link text-white" href="<?php echo base_url('/logout'); ?>">Cerrar Sesión</a>
          <li class="nav-item">
            <a class="nav-link text-white" href="quienes_somos">Quienes somos</a>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link text-white" href="suscribirse">Suscríbete</a>
          </li>
          <a class="nav-link text-white" href="iniciar_sesion">Iniciar sesión</a>
        <?php endif; ?>
        </li>
      </ul>
      <?php if ($perfil): ?>
        <div class="btn btn-<?php echo $perfil == 1 ? 'secondary' : 'info'; ?> active btnUser btn-sm">
          <a href="#" class="text-white"><?php echo $perfil == 1 ? 'ADMIN' : 'CLIENTE'; ?>: <?php echo $nombre; ?></a>
        </div>
      <?php endif; ?>
      <form class="d-flex" role="buscar">
        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
      </form>
    </div>
  </div>
</nav>