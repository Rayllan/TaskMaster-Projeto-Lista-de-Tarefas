<!DOCTYPE html>
<html lang="ptbr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login </title>
    <!-- Inclua os links para os arquivos CSS do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Login
                    </div>
                    <div class="card-body">

                        <form method="POST" action="{{ route('auth.user') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="">
                                @error('email')
                                    <div class="alert alert-danger">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Senha</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    value="">
                                @error('password')
                                    <div class="alert alert-danger">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>

                            <div class="d-flex flex-column align-items-center mt-3">
                                <button type="submit" class="btn btn-primary mb-3">Entrar</button>
                                <a href="{{ route('site.index') }}" class="btn btn-secondary">Voltar</a>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Inclua os links para os arquivos JavaScript do Bootstrap, se necessário -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
