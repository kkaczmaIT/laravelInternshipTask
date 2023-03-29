<!DOCTYPE html>
<html lang="pl">
<head>
    @include('header-template')
    <title>Rejestracja</title>
</head>
<body>
    @include('navbar')
    <div class="container mt-5">
        <h1>Rejestracja użytkownika</h1>
        @if( session('success') )
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('users.store') }}"  method="post">
            @csrf
            <div id="app">
                <register-form></register-form>
            </div>
            {{-- <div>
                <label for="name" class="form-label">Imię</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div>
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div>
                <label for="password" class="form-label">Hasło</label>
                <input type="password" class="form-control" name="password">
            </div> 
            <button type="submit" class="btn btn-primary mt-4">Zarejestruj się</button> --}}
        </form>
    
    </div>
    
    @include('footer-template')
</body>
</html>