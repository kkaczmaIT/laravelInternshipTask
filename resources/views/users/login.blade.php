<!DOCTYPE html>
<html lang="pl">
<head>
    @include('header-template')
    <title>Logowanie</title>
</head>
<body>
    @include('navbar')
    <div class="container mt-5">
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
    <form action="{{ route('login.process') }}"  method="post">
        @csrf
        <div id="app">

            <login-form></login-form>
        </div>
    </form>

        {{-- <form action="{{ route('login.process') }}"  method="post">
            @csrf
            <div>
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div>
                <label for="password" class="form-label">Hasło</label>
                <input type="password" class="form-control" name="password">
            </div> 
            <button type="submit" class="btn btn-primary mt-4">Zaloguj się</button>
        </form> --}}
    
    </div>
    
    @include('footer-template')
</body>
</html>