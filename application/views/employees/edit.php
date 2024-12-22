<div class="box">
	<form action="<?php echo site_url('employees/edit/' . $employee->id); ?>" method="post">
		<div class="box-body">
			<?php if (validation_errors()): ?>
				<div class="alert alert-danger">
					<?php echo validation_errors(); ?>
				</div>
			<?php endif; ?>

			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Prénom</label>
						<input type="text" name="firstname" class="form-control" required value="<?php echo set_value('firstname', $employee->prenom); ?>">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Nom</label>
						<input type="text" name="lastname" class="form-control" required value="<?php echo set_value('lastname', $employee->nom); ?>">
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Email</label>
						<input type="email" name="email" class="form-control" required value="<?php echo set_value('email', $employee->email); ?>">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Téléphone</label>
						<input type="text" name="phone" class="form-control" value="<?php echo set_value('phone', $employee->telephone); ?>">
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Adresse</label>
						<input type="text" name="adress" class="form-control" value="<?php echo set_value('adress', $employee->adresse); ?>">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Poste</label>
						<select name="position" class="form-control" required>
							<option value="">Sélectionner le Poste</option>
							<option value="Gérant" <?php echo set_select('position', 'Gérant', $employee->poste === 'Gérant'); ?>>Gérant</option>
							<option value="Livreur" <?php echo set_select('position', 'Livreur', $employee->poste === 'Livreur'); ?>>Livreur</option>
							<option value="Cuisinier" <?php echo set_select('position', 'Cuisinier', $employee->poste === 'Cuisinier'); ?>>Cuisinier</option>
						</select>
					</div>
				</div>
			</div>

		</div>

		<div class="box-footer">
			<button type="submit" class="btn btn-primary">Mettre à jour</button>
			<a href="<?php echo site_url('employees'); ?>" class="btn btn-default">Annuler</a>
		</div>
	</form>
</div>
