@extends("theme/lte/layout")

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div id="app">
                        @yield('vuecontainer')
                        </div>
                    <h1>:(</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
