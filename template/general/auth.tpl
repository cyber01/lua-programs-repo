	<div class="row">
		<div class="col-lg-4 col-lg-offset-4">
			<div class="page-header">
				<h1 id="forms">Авторизация</h1>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-4 col-lg-offset-4">
			<div class="well bs-component">
	<div class="form-group">
		<form method="post">
		<label class="control-label" for="login">Ваш логин</label>
		<input class="form-control" id="login" name="login" type="text" value="" data-cip-id="focusedInput">
		<b><?=$err[0]?></b>
		<label class="control-label" for="password">Ваш пароль</label>
		<input class="form-control" id="password" name="password" type="password" value="">
			<b><?=$err[1]?></b>
		<input class="form-control" type="submit" value="Войти" />
				<b><?=$err[2]?></b>
		</form>
	</div>
	</div>
	</div>
	</div>