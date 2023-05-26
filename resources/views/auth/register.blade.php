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

		<form method="post" action="{{route('user.store')}}">
			@csrf

			<div class="mb-3">
				<label for="nome" class="form-label">Nome</label>
				<input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome" name="nome" value="{{old('nome')}}">
				@error('nome')
					<div class="invalid-feedback">
						{{$message}}
					</div>
				@enderror
			</div>

			<div class="mb-3">
				<label for="contato" class="form-label">Contato</label>
				<input type="text" class="form-control @error('contato') is-invalid @enderror" id="contato" name="contato" maxlength="9" value="{{old('contato')}}">
				@error('contato')
					<div class="invalid-feedback">
						{{$message}}
					</div>
				@enderror
			</div>

			<div class="mb-3">
				<label for="email" class="form-label">Email</label>
				<input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" aria-describedby="email" value="{{old('email')}}">
				@error('email')
					<div class="invalid-feedback">
						{{$message}}
					</div>
				@enderror
			</div>
			
			<div class="mb-3">
				<label for="password" class="form-label">Password</label>
				<input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" aria-describedby="password" value="">
				@error('password')
					<div class="invalid-feedback">
						{{$message}}
					</div>
				@enderror
			</div>

			<div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirme sua senha</label>
        <input type="password" class="form-control" id="password_confirmation"  name="password_confirmation" aria-describedby="password_confirmation">
      </div>

			<div class="my-5 d-flex justify-content-end w-100">
				<button type="submit" class="btn btn-primary" alt="Salvar" title="Salvar"><i class="far fa-save"></i> Salvar</button>
			</div>
		</form>
	</main>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>