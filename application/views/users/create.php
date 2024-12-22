<div class="box">
  <form action="<?php echo site_url('users/create'); ?>" method="post">
    <div class="box-body">
      <?php if(validation_errors()): ?>
        <div class="alert alert-danger">
          <?php echo validation_errors(); ?>
        </div>
      <?php endif; ?>
      
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Prénom</label>
            <input type="text" name="prenom" class="form-control" required value="<?php echo set_value('prenom'); ?>">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Nom</label>
            <input type="text" name="nom" class="form-control" required value="<?php echo set_value('nom'); ?>">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Login</label>
            <input type="text" name="login" class="form-control" required value="<?php echo set_value('login'); ?>">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Mot de Passe</label>
            <input type="password" name="mot_de_passe" class="form-control" required>
            <small class="text-muted">Minimum 6 caractères</small>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label>Rôle</label>
        <select name="role" class="form-control" required>
          <option value="">Sélectionner un rôle</option>
          <option value="Admin" <?php echo set_select('role', 'Admin'); ?>>Admin</option>
          <option value="User" <?php echo set_select('role', 'User'); ?>>Utilisateur</option>
        </select>
      </div>
    </div>

    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Enregistrer</button>
      <a href="<?php echo site_url('users'); ?>" class="btn btn-default">Annuler</a>
    </div>
  </form>
</div>
