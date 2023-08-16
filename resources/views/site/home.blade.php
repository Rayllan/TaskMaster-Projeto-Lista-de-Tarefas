@extends('/site/master')
@section('title', 'home')
    
@section('navbar-links')
    @if(auth()->check())
        <a href="{{ route('site.logout') }}" class="btn btn-danger me-2">Logout</a>
    @else
        <a href="{{ route('site.login') }}" class="btn btn-primary me-2">Login</a>
        <a href="{{ route('create.user') }}" class="btn btn-success">Cadastro</a>
    @endif
@endsection

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    @if(auth()->check())
                        <h2 class="mb-12"> Bem-vindo, {{ auth()->user()->firstName }}! </h2>
                    @endif
                    
                    <a href="{{ route('tasks.index') }}" class="btn btn-success">Tarefas</a>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
