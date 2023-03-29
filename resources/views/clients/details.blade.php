<!DOCTYPE html>
<html lang="pl">
<head>
    @include('header-template')
    <title>Dane klienta</title>

</head>
<body>
    @include('navbar')
    <div class="container mt-5">
        <div class="my-5">
            <a href="{{ route('clients.index') }}" class="btn btn-secondary">Powrót</a>
        </div>
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">{{ $client->fName . ' ' . $client->lName }}</h1>
            </div>
            <div class="card-body">
                <ul class="card-text">
                    <li>Adres: {{ $client->address }}</li>
                    <li>Email: {{ $client->email }}</li>
                </ul>
            </div>
        </div>
    </div>
    
    @include('footer-template')
</body>
</html>