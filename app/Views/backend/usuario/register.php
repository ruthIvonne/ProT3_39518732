<div class="container mt-0 mb-0">
  <div class="row d-flex justify-content-center">
    <div class="card col-lg-6 w-75">

      <div class="card-header">
        <h4 class="text-center">Suscríbete aquí</h4>
      </div>

      <div class="card-body">
        <?php $validation = \Config\Services::validation(); ?>
        <form method="post" action="<?php echo base_url('/enviarform'); ?>" class="needs-validation" novalidate>
          <?= csrf_field(); ?>
          
          <?php if (!empty(session()->getFlashdata('fail'))): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
          <?php endif ?>

          <?php if (!empty(session()->getFlashdata('success'))): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
          <?php endif ?>

          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input name="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre" required>
            <?php if ($validation->getError('nombre')): ?>
              <div class="alert alert-danger mt-2">
                <?= $validation->getError('nombre'); ?>
              </div>
            <?php endif ?>
          </div>

          <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input name="apellido" type="text" class="form-control" id="apellido" placeholder="Apellido" required>
            <?php if ($validation->getError('apellido')) { ?>
              <div class="alert alert-danger mt-2">
                <?= $validation->getError('apellido'); ?>
              </div>
            <?php } ?>
          </div>

          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <div class="input-group">
              <span class="input-group-text">@</span>
              <input name="username" type="text" class="form-control" id="usuario" placeholder="Elija un nombre para la cuenta" required>
              <?php if ($validation->getError('username')) { ?>
                <div class="alert alert-danger mt-2">
                  <?= $validation->getError('username'); ?>
                </div>
              <?php } ?>
              <div class="invalid-feedback">
                Por favor, elija un nombre para la cuenta.
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input name="email" type="email" class="form-control" id="email" placeholder="Escriba un email" required>
            <?php if ($validation->getError('email')) { ?>
              <div class="alert alert-danger mt-2">
                <?= $validation->getError('email'); ?>
              </div>
            <?php } ?>
            <div class="invalid-feedback">
              Por favor, escriba un email válido.
            </div>
          </div>

          <div class="mb-3">
            <label for="pass" class="form-label">Contraseña</label>
            <input name="pass" type="password" class="form-control" id="pass" placeholder="Ingrese una contraseña" required>
            <?php if ($validation->getError('pass')) { ?>
              <div class="alert alert-danger mt-2">
                <?= $validation->getError('pass'); ?>
              </div>
            <?php } ?>
          </div>

          <div class="mb-3">
            <label for="ciudad" class="form-label">Ciudad</label>
            <input name="ciudad" type="text" class="form-control" id="ciudad" placeholder="Ciudad" required>
            <?php if ($validation->getError('ciudad')) { ?>
              <div class="alert alert-danger mt-2">
                <?= $validation->getError('ciudad'); ?>
              </div>
            <?php } ?>
            <div class="invalid-feedback">
              Por favor, elija una ciudad válida.
            </div>
          </div>

          <div class="mb-3">
            <label for="pais" class="form-label">País</label>
            <input name="pais" type="text" class="form-control" id="pais" placeholder="País" required>
            <?php if ($validation->getError('pais')) { ?>
              <div class="alert alert-danger mt-2">
                <?= $validation->getError('pais'); ?>
              </div>
            <?php } ?>
            <div class="invalid-feedback">
              Por favor, elija un país válido.
            </div>
          </div>

          <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="invalidCheck" required>
            <label class="form-check-label" for="invalidCheck">
              Usted está de acuerdo con los términos y condiciones
            </label>
            <div class="invalid-feedback">
              Debe estar de acuerdo con los términos y condiciones.
            </div>
          </div>

          <button type="submit" class="btn btn-success">Suscribirse</button>
          <button type="reset" class="btn btn-danger">Cancelar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  (function () {
    'use strict';
    window.addEventListener('load', function () {
      var forms = document.getElementsByClassName('needs-validation');
      Array.prototype.filter.call(forms, function (form) {
        form.addEventListener('submit', function (event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();
</script>
