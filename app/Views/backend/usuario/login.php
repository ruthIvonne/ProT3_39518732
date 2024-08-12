<div class="formsesion">
  
  <?php if (session()->getFlashdata("msg")): ?>
    <div class="alert alert-warning">
      <?= session()->getFlashdata("msg"); ?>
    </div>
  <?php endif; ?>

  <form method="post" action="<?php echo base_url('/enviarlogin') ?>">
    <div class="form-group">
      <label for="exampleInputEmail1">Ingresa tu correo electrónico</label>
      <input name="email" type="text" class="form-control"  aria-describedby="emailHelp"
        placeholder="correo electronico">
      <small id="emailHelp" class="form-text text-muted">Nunca compartiremos tu información con terceros</small>
    </div>

    <div class="form-group">
      <label for="exampleInputPassword1">Ingresa tu contraseña</label>
      <input name="pass" type="password" class="form-control"  placeholder="contraseña">
    </div>

    <div class="form-group form-check">
      <input type="checkbox" class="form-check-input" >
      <label class="form-check-label" for="exampleCheck1">Permanecer conectado</label>
    </div>
    
    <input type="submit" value="Ingresar" class="btn btn-success">
    <a href="<?php echo base_url('login'); ?>" class="btn btn-danger">Cancelar</a>
    <br><span>Aún no se registro?<a href="<?php echo base_url('/suscribirse'); ?>">Suscribete aquí</a></span>
  </form>
</div>