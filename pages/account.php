<?php
	if (!defined('INITIALIZED'))
		exit;

	if (!$logged) {
		if ($action == "logout") {
			Header ("Location: ../?page=account");
		} else {
			$main_content .= '
			<div class="container">
				<div class="row">';
					if (isset($isTryingToLogin)) {
						$main_content .= '
						<div class="col-sm-12">
							<div class="alert alert-danger fade in">
								<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
								<label><span class="glyphicon glyphicon-exclamation-sign"></span> Os seguintes erros ocorreram:</label>
								<div>';
									switch (Visitor::getLoginState()) {
										case Visitor::LOGINSTATE_NO_ACCOUNT:
											$main_content .= 'Esta conta não existe.';
										break;
										case Visitor::LOGINSTATE_WRONG_PASSWORD:
											$main_content .= 'Senha incorreta.';
										break;
										default:
											$main_content .= 'Preencha o formulário.';
									}
								$main_content .= '
								</div>
							</div>
						</div>';
					}
			
					$main_content .= '
					<form action="?page=account" method="post">
						<div class="col-sm-12">
							<div class="panel-group">
								<div class="panel">
									<div class="panel-heading">
							     		<div>Acesse sua conta</div>
							 		</div>
									<div class="panel-body">
										<div class="form-row text-center">
											<div class="form-group col-md-6">
												<label for="account_email"><i class="fas fa-envelope"></i> Endereço de e-mail:</label>
												<input type="account_email" class="form-control" id="account_email" name="account_email">
											</div>
											<div class="form-group col-md-6">
										    	<label for="password_login"><i class="fas fa-key"></i> Senha:</label>
										    	<input type="password_login" class="form-control" id="password_login" name="password_login">
											</div>
										</div>
								 	</div>
								</div>
							</div>
						</div>
						<div class="col-sm-3"></div>
						<div class="col-sm-3">
							<div class="btn-box"><input type="submit" class="btn btn-success btn-block" value="Entrar"></div>
						</div>
						<div class="col-sm-3">
							<div class="btn-box"><a href="?page=register" class="btn btn-primary btn-block" role="button"/>Registre-se</a></div>
						</div>
						<div class="col-sm-3"></div>
					</form>
				</div>
			</div>';
		}
	} else {
		if ($action == "") {
			$main_content .= '
			<div class="container">
				<div class="row">
					<div class="btn-box"><a href="?page=account&action=logout" class="btn btn-danger btn-block" role="button"/>Sair</a></div>
				</div>
			</div>';
		}
	}
?>