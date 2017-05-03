@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-14">
            <div class="panel panel-default">
                <div class="panel-heading">Blagajna Pregled</div>
                @include('menus.menuBlagajna')

                <div class="panel-body">

                <div class="container">
                        <table class="table table-hover table-responsive table-bordered">
                        <thead>
                        <tr>
                        <th>ID</th>
                        <th>Osiguranje</th>
                        <th>Operater</th>
                        <th>Iznos</th>
                        
                        </tr>
                        </thead>
                        <tbody>
                       @foreach ($blagajnas as $blagajna)
                        <tr>
                          <td>{{ $blagajna->id }}</td>
                          <td>{{ $blagajna->osiguranje }}</td>
                          <td>{{ $blagajna->operater }}</td>                          
                          <td>{{ $blagajna->iznos }}</td>                          
                          
                        </tr>
                          
                        @endforeach
                        </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
