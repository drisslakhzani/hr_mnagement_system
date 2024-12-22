<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Liste des utilisateurs</h3>
    <div class="box-tools pull-right">
      <a href="<?php echo site_url('users/create'); ?>" class="btn btn-primary btn-sm">
        <i class="fa fa-plus"></i> Ajouter un nouvel utilisateur
      </a>
    </div>
  </div>

  <!-- Search form -->
  <div class="box-body">
    <form action="<?php echo site_url('users/index'); ?>" method="get">
      <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Rechercher par nom, prénom, login ou rôle" value="<?php echo isset($search) ? $search : ''; ?>">
        <span class="input-group-btn">
          <button class="btn btn-default" type="submit">
            <i class="fa fa-search"></i> Rechercher
          </button>
        </span>
      </div>
    </form>
  </div>

  <!-- Table for users -->
  <div class="box-body">
    <table id="users-table" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Nom</th>
          <th>Login</th>
          <th>Rôle</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($users as $user): ?>
        <tr>
          <td><?php echo $user->prenom . ' ' . $user->nom; ?></td>
          <td><?php echo $user->login; ?></td>
          <td><span class="label label-<?php echo $user->role === 'Admin' ? 'danger' : 'primary'; ?>"><?php echo $user->role; ?></span></td>
          <td>
            <a href="<?php echo site_url('users/edit/'.$user->id); ?>" class="btn btn-warning btn-xs">
              <i class="fa fa-edit"></i> Modifier
            </a>
            <?php if($user->id != $this->session->userdata('user_id')): ?>
            <a href="<?php echo site_url('users/delete/'.$user->id); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">
              <i class="fa fa-trash"></i> Supprimer
            </a>
            <?php endif; ?>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<script>
$(document).ready(function() {
    $('#users-table').DataTable();
});
</script>
