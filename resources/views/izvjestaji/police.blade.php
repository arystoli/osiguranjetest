@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Izvještaji</div>
                @include('menus.mainMenu')

                <div class="panel-body">
                
                <ul class="nav nav-tabs">
                  <li role="presentation"><a href="{{ url('/izvjestaji/promet') }}">Promet</a></li>
                  <li role="presentation" class="active"><a href="{{ url('/izvjestaji/police') }}">
                  Police</a></li>
                  <li role="presentation"><a href="{{ url('/izvjestaji/radnici') }}">Radnici</a></li>
                </ul>

                                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
