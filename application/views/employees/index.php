<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Liste des Employés</h3>
        <div class="box-tools pull-right">
            <a href="<?php echo site_url('employees/create'); ?>" class="btn btn-primary btn-sm">
                <i class="fa fa-plus"></i> Ajouter un nouvel employé
            </a>
        </div>
    </div>
    <div class="box-body">
        <!-- Search form -->
        <form action="<?php echo site_url('employees/index'); ?>" method="get">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Rechercher par nom, prénom, email, téléphone, adresse ou poste" value="<?php echo isset($search) ? $search : ''; ?>">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">
                        <i class="fa fa-search"></i> Rechercher
                    </button>
                </span>
            </div>
        </form>
        <br>

        <!-- Search Indication (optional) -->
        <?php if (isset($search) && $search): ?>
            <div>
                <strong>Résultats pour: </strong> "<?php echo $search; ?>"
            </div>
        <?php endif; ?>

        <!-- Table for employees -->
        <table id="employees-table" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nom Complet</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Adresse</th>
                    <th>Poste</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($employees as $employee): ?>
                <tr>
                    <td><?php echo $employee->prenom . ' ' . $employee->nom; ?></td>
                    <td><?php echo $employee->email; ?></td>
                    <td><?php echo $employee->telephone; ?></td>
                    <td><?php echo $employee->adresse; ?></td>
                    <td><?php echo $employee->poste; ?></td>
                    <td>
                        <a href="<?php echo site_url('employees/edit/' . $employee->id); ?>" class="btn btn-warning btn-xs">
                            <i class="fa fa-edit"></i> Modifier
                        </a>
                        <a href="<?php echo site_url('employees/delete/' . $employee->id); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet employé ?');">
                            <i class="fa fa-trash"></i> Supprimer
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Initialize DataTable
        $('#employees-table').DataTable({
            language: {
                search: "Recherche:",
                lengthMenu: "Afficher _MENU_ entrées",
                info: "Affichage de _START_ à _END_ sur _TOTAL_ entrées",
                paginate: {
                    previous: "Précédent",
                    next: "Suivant"
                }
            }
        });
    });
</script>
