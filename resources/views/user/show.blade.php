<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
	
	<title>Contact Manager</title>
</head>

<body class="antialiased">
	<main class="container">
	<header>
			<div id="header">
				<div class="my-5 d-flex justify-content-end w-100">
					<form action="{{route('auth.logout')}}" method="post">
							@csrf
							<button type="submit" class="btn btn-link" alt="Sair" title="Sair"><i class="fas fa-sign-out-alt"></i> Sair</button>
					</form>
				</div>

				<div class="d-flex justify-content-center w-100">
					<h1>Contatos</h1>
				</div>
			</div>
		</header>

		<div class="my-3 d-flex justify-content-end">
			<a type="button" href="{{route('user.index')}}" class="btn btn-primary me-3" alt="Voltar" title="Voltar">
			<i class="fas fa-arrow-left"></i> Voltar
			</a>
		</div>

		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title mt-2 mb-5 d-flex justify-content-center">Detalhes do contato</h5>
							<p class="card-text"><strong>Nome:</strong> {{ $user->nome }}</p>
							<p class="card-text"><strong>Contato:</strong> {{ $user->contato }}</p>
							<p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
							
							<div class="d-flex justify-content-evenly mt-5 mb-3">
								<a href="{{route('user.edit', $user->id)}}" type="button" class="btn btn-info" alt="Editar" title="Editar"><i class="fas fa-pencil-alt"></i></a>

								<div class="modal fade" id="excluirModal" tabindex="-1" aria-labelledby="excluirModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="excluirModalLabel">Exclusão de contato</h5>
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
											<div class="modal-body">
												Você realmente deseja excluir este contato?
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
												
												<form action="{{route('user.destroy', $user->id)}}" method="post">
													@method('delete')
													@csrf

													<button type="submit" class="btn btn-danger" alt="Excluir" title="Excluir"><i class="fas fa-trash-alt"></i> Excluir</button>
												</form>
											</div>
										</div>
									</div>
								</div>

								<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#excluirModal" alt="Excluir" title="Excluir">
									<i class="fas fa-trash-alt"></i>
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>