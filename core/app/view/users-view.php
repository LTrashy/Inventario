<div class="row">
	<div class="col-md-12">
		<h1>Lista de Usuarios</h1>
	<a href="index.php?view=newuser" class="btn btn-secondary "><i class='bi bi-user'></i> Nuevo Usuario</a>
	<br><br>
		<?php
		
		?>
<div class="card">
	<div class="card-header">USUARIOS
	</div>
		<div class="card-body">


		<?php

		$users = UserData::getAll();
		if(count($users)>0){
			// si hay usuarios
			?>
			<table class="table table-bordered table-hover">
			<thead>
			<th>Nombre completo</th>
			<th>Nombre de usuario</th>
			<th>Email</th>
			<th>Activo</th>
			<th>Admin</th>
			<th></th>
			</thead>
			<?php
			foreach($users as $user){
				?>
				<tr>
				<td><?php echo $user->name." ".$user->lastname; ?></td>
				<td><?php echo $user->username; ?></td>
				<td><?php echo $user->email; ?></td>
				<td>
					<?php if($user->is_active):?>
						<i class="glyphicon glyphicon-ok"></i>i
					<?php endif; ?>
				</td>
				<td>
					<?php if($user->is_admin):?>
						<i class="glyphicon glyphicon-ok"></i>i
					<?php endif; ?>
				</td>
				<td style="width:30px;"><a href="index.php?view=edituser&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs">Editar</a></td>
				</tr>
				<?php

			}
 echo "</table>";


		}else{
			// no hay usuarios
		}


		?>
		</div>
</div>


	</div>
</div>