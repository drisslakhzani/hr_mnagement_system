<div class="box">
  <form action="<?php echo site_url('users/edit/'.$user->id); ?>" method="post">
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
            <input type="text" name="prenom" class="form-control" required value="<?php echo $user->prenom; ?>">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Nom</label>
            <input type="text" name="nom" class="form-control" required value="<?php echo $user->nom; ?>">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Login</label>
            <input type="text" class="form-control" value="<?php echo $user->login; ?>" disabled>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Mot de Passe</label>
            <input type="password" name="mot_de_passe" class="form-control">
            <small class="text-muted">Laissez vide pour garder le mot de passe actuel</small>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label>Rôle</label>
        <select name="role" class="form-control" required>
          <option value="Admin" <?php echo $user->role === 'Admin' ? 'selected' : ''; ?>>Admin</option>
          <option value="User" <?php echo $user->role === 'User' ? 'selected' : ''; ?>>Utilisateur</option>
        </select>
      </div>
    </div>

    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Mettre à jour</button>
      <a href="<?php echo site_url('users'); ?>" class="btn btn-default">Annuler</a>
    </div>
  </form>
</div>
