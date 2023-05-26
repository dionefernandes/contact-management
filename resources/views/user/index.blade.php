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
					@if (Auth::check())
					<form action="{{route('auth.logout')}}" method="post">
							@csrf
							<button type="submit" class="btn btn-link" alt="Sair" title="Sair"><i class="fas fa-sign-out-alt"></i> Sair</button>
					</form>
					@else
					<a type="button" href="{{route('auth.login')}}" class="btn btn-link" alt="Login" title="Login"><i class="fas fa-sign-in-alt"></i> Login</a>
					@endif

				</div>

				<div class="d-flex justify-content-center w-100">
					<h1>Contatos</h1>
				</div>
			</div>
		</header>

		@if (Auth::check())
		<div class="my-3 d-flex justify-content-end">
			<a type="button" href="{{route('user.create')}}" class="btn btn-primary me-3" alt="Novo contato" title="Novo contato">
			<i class="fas fa-plus"></i> Novo
			</a>
		</div>
		@endif

		<table class="table">
			<thead>
				<tr>
					<th scope="col">id</th>
					<th scope="col">Name</th>
					<th scope="col">Contato</th>
					<th scope="col">Email</th>
					@if (Auth::check())
					<th scope="col" colspan="3">Ações</th>
					@endif
				</tr>
			</thead>
			<tbody>
			@foreach($users as $user)
				<tr>
					<td scope="row">{{$user->id}}</th>
					<td>{{$user->nome}}</td>
					<td>{{$user->contato}}</td>
					<td>{{$user->email}}</td>
					@if (Auth::check())
					<td>
						<a href="{{route('user.show', $user->id)}}" type="button" class="btn btn-success" alt="Visualizar" title="Visualizar"><i class="fas fa-eye"></i></a>
					</td>
					<td>
						<a href="{{route('user.edit', $user->id)}}" type="button" class="btn btn-info" alt="Editar" title="Editar"><i class="fas fa-pencil-alt"></i></a>
					</td>
					<td>
						<div class="modal fade" id="excluirModal{{$user->id}}" tabindex="-1" aria-labelledby="excluirModalLabel{{$user->id}}" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="excluirModalLabel{{$user->id}}">Exclusão de contato</h5>
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

						<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#excluirModal{{$user->id}}" alt="Excluir" title="Excluir">
							<i class="fas fa-trash-alt"></i>
						</button>
					</td>
					@endif
				</tr>
				@endforeach
			</tbody>
		</table>
	</main>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>