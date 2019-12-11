@extends("theme/lte/layout")

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged !
                    <h1>:) (y)</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection