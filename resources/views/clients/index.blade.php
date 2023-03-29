<!DOCTYPE html>
<html lang="pl">
<head>
    @include('header-template')
    {{-- <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> --}}
    
    <title>Klienci</title>
</head>
<body>
    @include('navbar')
    <div class="container py-3">
        <h1>Klienci</h1>
        @if( session('success') )
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    
        @if( session('error') )
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="py-3">
            <a href="{{ route('clients.create') }}" class="btn btn-success d-inline">Dodaj klienta</a>
        </div>
        <table class=" table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Imię</th>
                    <th>Nazwisko</th>
                    <th>Adres</th>
                    <th>Email</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                    <tr>
                        <td>{{ $client->id }}</td>
                        <td>{{ $client->fName }}</td>
                        <td>{{ $client->lName }}</td>
                        <td>{{ $client->address }}</td>
                        <td>{{ $client->email }}</td>
                        <td><form method="POST"  action="{{ route('clients.destroy', $client->id) }}">
                            @csrf
                            @method('DELETE')<button type="submit" class=" btn btn-danger d-inline mt-2">Usuń klienta </button>
                            <a class="btn mt-2 btn-primary d-inline" href="{{ route('clients.edit', $client->id) }}"> Zaktualizuj klienta</a> <a class="btn btn-secondary d-inline mt-2" href="{{ route('clients.show', $client->id) }}"> Wyświetl szczegóły</a>
                        </form> 
                      </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
   
    @include('footer-template')
    {{-- <script src="{{ asset('js/main.js') }}"></script> --}}
</body>
</html>