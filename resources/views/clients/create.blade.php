<!DOCTYPE html>
<html lang="pl">
<head>
    @include('header-template')
    <title>Dodaj Klienta</title>
</head>
<body>
    @include('navbar')
    <div class="container mt-5">
        <div class="my-5">
            <a href="{{ route('clients.index') }}" class="btn btn-secondary">Powrót</a>
        </div>
        <h1>Dodawanie klienta</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('clients.store') }}"  method="post">
            @csrf
            <div>
                <label for="fName" class="form-label">Imię</label>
                <input type="text" class="form-control" name="fName">
            </div>
            <div>
                <label for="lName" class="form-label">Nazwisko</label>
                <input type="text" class="form-control" name="lName">
            </div>
            <div>
                <label for="address" class="form-label">Adres</label>
                <input type="text" class="form-control" name="address">
            </div>
            <div>
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email">
            </div>     
            <button type="submit" class="btn btn-primary mt-4">Dodaj klienta</button>
        </form>
    
    </div>
    
    @include('footer-template')
</body>
</html>