<!DOCTYPE html>
<html lang="pl">
<head>
    @include('header-template')
    <title>Edytuj dane klienta</title>
</head>
<body>
    @include('navbar')
    <div class="container mt-5">
        <div class="my-5">
            <a href="{{ route('clients.index') }}" class="btn btn-secondary">Powrót</a>
        </div>
        <h1>Edycja klienta</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('clients.update', $client->id) }}"  method="post">
            @csrf
            @method('PATCH')
            <div>
                <label for="fName" class="form-label">Imię</label>
                <input class="form-control" type="text" value={{ $client->fName }} name="fName">
            </div>
            <div>
                <label for="lName" class="form-label">Nazwisko</label>
                <input class="form-control" type="text" value={{ $client->lName }} name="lName">
            </div>
            <div>
                <label class="form-label" for="address">Adres</label>
                <input class="form-control" value={{ $client->address }} type="text" name="address">
            </div>
            <div>
                <label class="form-label" for="email">Email</label>
                <input class="form-control" value={{ $client->email }} type="email" name="email">
            </div>     
            <button type="submit" class="btn btn-primary mt-4">Edytuj klienta</button>
        </form>
    </div>
    
    @include('footer-template')
</html>