@extends("theme/lte/layout")

@section('contenido')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                   
                    <div id="app">
                      
                        <div id="app-body">
                            <products></products>
                        </div>
                    <h1>:(</h1>
                </div>
            </div>
            
        </div>
    </div>
</div>
<script src="{{asset('js/app.js')}}"></script>
@endsection
