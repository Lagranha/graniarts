<?php
	if (!defined('INITIALIZED'))
		exit;

	if (!$logged) {
		if (isset($_POST['step']) && $_POST['step'] == 'docreate') {
			$email = isset($_POST['email']) ? $_POST['email'] : '';
			$password1 = isset($_POST['password1']) ? $_POST['password1'] : '';
			$password2 = isset($_POST['password2']) ? $_POST['password2'] : '';
			$error = array();

			/* Email errors */
			if ($email == '')
				$error['email'] = 'Digite o endereço de e-mail.';
			elseif (strlen($email) > 49)
				$error['email'] = 'O endereço de e-mail é muito longo. Use um endereço de e-mail com menos de 50 caracteres.';
			elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))
				$error['email'] = 'Este endereço de e-mail possui um fomarto inválido.';
			else {
				$accMailCheck = new Account($email, Account::LOADTYPE_MAIL);
				if($accMailCheck->isLoaded())
					$error['email'] = 'Este endereço de e-mail já está em uso.';
			}
		
			/* Password errors */
			if (empty($password2))
				$error['pass'] = 'Digite a senha novamente.';
			elseif ($password1 != $password2)
				$error['pass'] = 'As duas senhas não são iguais.';
			else {
				if (strlen($password1) < 8 || strlen($password1) > 30)
					$error['pass']  = 'A senha deve possuir pelo menos 8 caracteres e no máximo 30.';
				if (!ctype_alnum($password1))
					$error['pass']  = 'A senha possui letras inválidas.';
				elseif (!preg_match('/[a-zA-Z]/', $password1))
					$error['pass']  = 'A senha deve possuir pelo menos uma letra minúscula ou maiúscula.';
				elseif (!preg_match('/[0-9]/', $password1))
					$error['pass']  = 'A senha deve possuir pelo menos um número de 0-9.';
		
					
				if (count($err) != 0) {
					$error['pass'] = '';
					for ($i = 0; $i < count($err); $i++)
						$error['pass'] .= ($i == 0 ? '' : '<br/>').$err[$i];
				}
			}

			if (!isset($_POST['agreeagreements']) || empty($_POST['agreeagreements']))
				$error['rules'] = 'Você não aceitou as regras do '.$config['server']['serverName'].'.';

			if (count($error) != 0){
				$main_content .= '
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<div class="alert alert-danger fade in">
								<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
								<label><span class="glyphicon glyphicon-exclamation-sign"></span> Os seguintes erros ocorreram:</label>';
								foreach($error as $errors)
									$main_content .= '<div>'.$errors.'</div>';
							$main_content .= '
				      		</div>
						</div>
						<div class="col-sm-12">
							<form action="?page=register" method="post">
								<div class="panel-group">
									<div class="panel">
										<div class="panel-heading">
											<div>Dados da conta</div>
										</div>
										<div class="panel-body">
											<div class="form-group">
												<label for="email">Endereço de e-mail</label>
												<input type="text" class="form-control" id="email" name="email" value="'.(isset($_POST['email']) ? htmlspecialchars(substr($_POST['email'], 0, 50)) : '').'">
											</div>
											<div class="form-group">
												<label for="password1">Senha</label>
												<input type="password" class="form-control" id="password1" name="password1">
											</div>
											<div class="form-group">
												<label for="password2">Confirmação da senha</label>
												<input type="password" class="form-control" id="password2" name="password2">
											</div>
										</div>
									</div>
								</div>
								<div class="panel-group">
									<div class="panel">
										<div class="panel-heading">
											<div>Regras</div>
										</div>
										<div class="panel-body">
											<div class="col-sm-12">
												<div class="form-box">
													<input type="checkbox" name="agreeagreements" value="true" '.($_POST['agreeagreements'] == 'true' ? 'checked="checked"' : '').'/> Eu li, concordo e aceito as <a href="?page=rules" target="_blank" >regras</a> do '.$config['server']['serverName'].'.</td>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="btn-box">
									<input type="hidden" name="step" value="docreate">
									<input class="btn btn-success btn-block" type="submit" value="Finalizar">
								</div>
							</form>
						</div>
					</div>
				</div>';
			} else {
				$register_account = new Account();
				$register_account->setEMail($_POST['email']);
				$register_account->setPassword($_POST['password1']);
				$register_account->setCreateDate(time());
				$register_account->setCreateIP(Visitor::getIP());
				$register_account->save();

				Visitor::setAccount($_POST['account_name']);
				Visitor::setPassword($_POST['password1']);
				
				$main_content .= '
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<div class="alert alert-success">
								<div>Bem-vindo à Artilheiro, agora você já pode começar a navegar por nossos produtos!</strong></div>
							</div>
							<div class="btn-box"><a href="?page=home" class="btn btn-primary btn-block" role="button">Produtos</a></div>
						</div>
					</div>
				</div>';
			}
		} else {
			$main_content .= '
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<form action="?page=register" method="post">
							<div class="panel-group">
								<div class="panel">
									<div class="panel-heading">
										<div>Dados da conta</div>
									</div>
									<div class="panel-body">
										<div class="form-group">
											<label for="email">Endereço de e-mail</label>
											<input type="text" class="form-control" id="email" name="email" value="'.(isset($_POST['email']) ? htmlspecialchars(substr($_POST['email'], 0, 50)) : '').'">
										</div>
										<div class="form-group">
											<label for="password1">Senha</label>
											<input type="password" class="form-control" id="password1" name="password1">
										</div>
										<div class="form-group">
											<label for="password2">Confirmação da senha</label>
											<input type="password" class="form-control" id="password2" name="password2">
										</div>
									</div>
								</div>
							</div>
							<div class="panel-group">
								<div class="panel">
									<div class="panel-heading">
										<div>Regras</div>
									</div>
									<div class="panel-body">
										<div class="col-sm-12">
											<div class="form-box">
												<input type="checkbox" name="agreeagreements" value="true" '.($_POST['agreeagreements'] == 'true' ? 'checked="checked"' : '').'/> Eu li, concordo e aceito as <a href="?page=rules" target="_blank" >regras</a> do '.$config['server']['serverName'].'.</td>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="btn-box">
								<input type="hidden" name="step" value="docreate">
								<input class="btn btn-success btn-block" type="submit" value="Finalizar">
							</div>
						</form>
					</div>
				</div>
			</div>';
		}
	} else header("Location: ./?page=account");