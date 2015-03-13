<?php include 'tpl/header.html' ?>
	<article>
		<form action="">
			<div class="form-group">
				<input type="text" name="fullname" class="form-control" placeholder="Nombre completo">
			</div>
			<div class="form-group">
				<input type="text" name="email" class="form-control" placeholder="Correo electrónico">
			</div>
			<div class="form-group">
				<textarea name="message" class="form-control" rows="5" placeholder="Escriba su mensaje..."></textarea>
			</div>
			<div class="form-group">
				<button class="btn btn-link btn-cha">ENVIAR</button>
			</div>
		</form>
	</article>
<?php include 'tpl/footer.html' ?>