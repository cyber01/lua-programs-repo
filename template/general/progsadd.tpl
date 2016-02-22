<div class="center-block">
	<div class="overflow">
		<div class="form">
			<div class="bs-docs-section">
				<div class="row">
					<div class="col-lg-6 col-lg-offset-4">
						<div class="page-header">
							<h1 id="forms">Добавление программы</h1>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12"><div class="col-lg-4">
							<div class="well bs-component">
								<div class="page-header">
									<h3 id="forms">Правила заполнения полей:</h3>
									<ul>
										<li><b>Название:</b> <u>обязательное</u>, не более 50 символов</li>
										<li><b>Версия:</b> <u>обязательное</u>, не более 15 символов</li>
										<li><b>Категория:</b> <u>обязательное</u></li>
										<li><b>Код на Pastebin:</b> необязательное, только номер пасты</li>
										<li><b>Код на Github:</b> необязательное, полная ссылка к файлу</li>
										<li><u>Должно быть заполнено <b>хотя бы 1 поле</b> (Pastebin или Github)</u></li>
										<li><b>Ссылка на форум:</b> <u>обязательное</u>, ссылка на тему форума</li>
										<li><b>Зависимости:</b> необязательно, ID программ через запятую</li>
										<li><b>Краткое описание:</b> <u>обязательнее</u>, не более 60 символов</li>
										<li><b>Полное описание:</b> <u>обязательнее</u>, не более 250 символов</li>
										<li><b>Теги:</b> <u>обязательное</u>, теги через запятую, минимум один тег</li>
									</ul>
								</div>
							</div>
						</div>
					<div class="col-lg-6">
						<div class="well bs-component">
							<div class="alert alert-success hidden" id="success-alert">
								<h2>Успех</h2>
								<div>Ваши данные были успешно отправлены.</div>
							</div>

							<form method="post" id="form" role="form" class="form-horizontal">
								<fieldset>
									<div class="form-group has-feedback">
										<label for="name" class="col-lg-2 control-label">Название</label>
										<div class="col-lg-10">
											<div class="input-group">
												<span class="input-group-addon"><i class="glyphicon glyphicon-header"></i></span>
												<input type="text" class="form-control" required="required" name="name" id="name" placeholder="Название вашей программы" pattern="[а-яА-ЯA-Za-z0-9-\()\/,.\s]{1,50}">
											</div>
											<span class="glyphicon form-control-feedback"></span>
											</div>
									</div>
									<div class="form-group has-feedback">
										<label for="version" class="col-lg-2 control-label">Версия</label>
										<div class="col-lg-10">
											<div class="input-group">
												<span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
											<input type="text" class="form-control" required="required" name="version" id="version" placeholder="Версия вашей программы" pattern="[а-яА-ЯA-Za-z0-9-.\s]{1,15}">
											</div>
											<span class="glyphicon form-control-feedback"></span>
											</div>
									</div>
									<div class="form-group has-feedback">
										<label for="category" class="col-lg-2 control-label">Категория</label>
										<div class="col-lg-10">
											<div class="input-group">
												<span class="input-group-addon"><i class="glyphicon glyphicon-folder-open"></i></span>
											<select class="form-control" required="required" name="category" id="category" pattern="[0-9]{1}">
												<? foreach ($cats as $arr) {
												echo "<option value='".$arr['id']."'>".$arr['name']."</option>";
												}
												?>
											</select>
											</div>
											<span style="right: 25px;" class="glyphicon form-control-feedback"></span>
										</div>
									</div>
									<div class="form-group has-feedback">
										<label for="paste" class="col-lg-2 control-label">Код на Pastebin</label>
										<div class="col-lg-10">
											<div class="input-group">
												<span class="input-group-addon"><i class="glyphicon glyphicon-download-alt"></i></span>
											<input type="text" class="form-control" maxlength="8" name="paste" id="paste" placeholder="Например qf1vnCsq">
											</div>
											<span class="glyphicon form-control-feedback"></span>
											</div>
									</div>
									<div class="form-group has-feedback">
										<label for="git" class="col-lg-2 control-label">Код на Github/Gist</label>
										<div class="col-lg-10">
											<div class="input-group">
												<span class="input-group-addon"><i class="glyphicon glyphicon-download-alt"></i></span>
											<input type="url" class="form-control" name="git" id="git" placeholder="Например https://github.com/MightyPirates/OpenComputers/blob/master-MC1.7.10/src/main/resources/assets/opencomputers/lua/machine.lua">
											</div>
											<span class="glyphicon form-control-feedback"></span>
											</div>
									</div>
									<div class="form-group has-feedback">
										<label for="forum" class="col-lg-2 control-label">Ссылка на форуме</label>
										<div class="col-lg-10">
											<div class="input-group">
												<span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
											<input type="url" class="form-control" required="required" name="forum" id="forum" placeholder="Ссылка на программу на форуме"">
											</div>
											<span class="glyphicon form-control-feedback"></span>
											</div>
									</div>
									<div class="form-group has-feedback">
										<label for="deps" class="col-lg-2 control-label">Зависимости</label>
										<div class="col-lg-10">
											<div class="input-group">
												<span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
											<input type="text" class="form-control" name="deps" id="deps" placeholder="ID зависимостей, через запятую"">
											</div>
											<span class="glyphicon form-control-feedback"></span>
											</div>
									</div>
									<div class="form-group has-feedback">
										<label for="sdesc" class="col-lg-2 control-label">Краткое описание</label>
										<div class="col-lg-10">
											<div class="input-group">
												<span class="input-group-addon"><i class="glyphicon glyphicon-question-sign"></i></span>
											<textarea style="resize: none" required="required" maxlength="60" class="form-control" rows="2" id="sdesc" name="sdesc" placeholder="Краткое описание программы, не более 60 символов" pattern="[а-яА-ЯA-Za-z0-9-\()\/,.\s]{1,60}"></textarea>
											</div>
											<span class="glyphicon form-control-feedback"></span>
											</div>
									</div>
									<div class="form-group has-feedback">
										<label for="ldesc" class="col-lg-2 control-label">Полное описание</label>
										<div class="col-lg-10">
											<div class="input-group">
												<span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
											<textarea style="resize: none" required="required" maxlength="250" class="form-control" rows="3" id="ldesc" name="ldesc" placeholder="Полное описание программы, не более 255 символов" pattern="[а-яА-ЯA-Za-z0-9-\()\/,.\s]{1,250}"></textarea>
											</div>
											<span class="glyphicon form-control-feedback"></span>
											</div>
									</div>
									<div class="form-group has-feedback">
										<label for="tags" class="col-lg-2 control-label">Теги</label>
										<div class="col-lg-10">
											<div class="input-group">
												<span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
												<input type="text" class="form-control" required="required" name="tags" id="tags" placeholder="Введите теги через запятую, минимум один тег"" pattern="[а-яА-ЯA-Za-z0-9-,\s]{1,250}">
											</div>
											<span class="glyphicon form-control-feedback"></span>
										</div>
									</div>
									<div class="form-group has-feedback">
										<div class="col-lg-10 col-lg-offset-2">
											<button type="reset" class="btn btn-default">Очистить</button>
											<button id="save" value="1" name="submit" class="btn btn-primary">Добавить</button>
										</div>
									</div>
								</fieldset>
							</form>
						</div>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div></div>