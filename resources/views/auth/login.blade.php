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

          <div class="d-flex justify-content-center w-100">
            <h1>Contacts Manager</h1>
          </div>
        </div>
    </header>

    <div class="d-flex justify-content-center">
      <div class="card w-50 p-5">
        <h3 class="text-center">Login</h3>
        <form method="post" action="{{route('auth.access')}}">
          @csrf
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required>
            @error('email')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
            @error('password')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="text-center">
            <a type="button" href="{{route('user.index')}}" class="btn btn-secondary" alt="Contatos" title="Contatos">
              <i class="fas fa-address-book"></i> Contatos
            </a>
            <a type="button" href="{{route('auth.formRegister')}}" class="btn btn-secondary" alt="Catastre-se" title="Catastre-se">
              <i class="fas fa-plus"></i> Catastre-se
            </a>
            <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Login</button>
          </div>
        </form>
      </div>
    </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>