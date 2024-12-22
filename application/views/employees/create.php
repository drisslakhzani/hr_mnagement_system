<div class="box">
	<form action="<?php echo site_url('employees/create'); ?>" method="post">
		<div class="box-body">
			<?php if (validation_errors()): ?>
				<div class="alert alert-danger">
					<?php echo validation_errors(); ?>
				</div>
			<?php endif; ?>

			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>First Name</label>
						<input type="text" name="firstname" class="form-control" required value="<?php echo set_value('firstname'); ?>">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Last Name</label>
						<input type="text" name="lastname" class="form-control" required value="<?php echo set_value('lastname'); ?>">
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Email</label>
						<input type="email" name="email" class="form-control" required value="<?php echo set_value('email'); ?>">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Phone</label>
						<input type="text" name="phone" class="form-control" value="<?php echo set_value('phone'); ?>">
					</div>
				</div>
			</div>

			<div class="row">
			<div class="col-md-6">
					<div class="form-group">
						<label>adresse</label>
						<input type="text" name="adress" class="form-control" value="<?php echo set_value('adresse'); ?>">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Poste</label>
						<select name="position" class="form-control" required>
							<option value="">Select Position</option>
							<option value="Gérant" <?php echo set_select('position', 'Gérant'); ?>>Gérant</option>
							<option value="Livreur" <?php echo set_select('position', 'Livreur'); ?>>Livreur</option>
							<option value="Cuisinier" <?php echo set_select('position', 'Cuisinier'); ?>>Cuisinier</option>
						</select>
					</div>
				</div>
			</div>



		</div>

		<div class="box-footer">
			<button type="submit" class="btn btn-primary">Save</button>
			<a href="<?php echo site_url('employees'); ?>" class="btn btn-default">Cancel</a>
		</div>
	</form>
</div>
