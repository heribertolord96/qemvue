<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Storeblog | @yield('titulo')
  </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
 <link rel="stylesheet" href="{{asset ("assets/$theme/dist/css/adminlte.min.css")}}">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  @yield('styles')
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-boxed">
    <!--Inicio-nav-->
    @include("theme/$theme/nav")
    <!--fin-nav-->
    <!--inicio-aside-->
    @include("theme/$theme/aside")
    <!--finaside-->
    @section("styles")
<link href="{{asset("assets/js/jquery-nestable/jquery.nestable.css")}}" rel="stylesheet" type="text/css" />
@endsection

@section("scriptsPlugins")
<script src="{{asset("assets/js/jquery-nestable/jquery.nestable.js")}}" type="text/javascript"></script>
@endsection

@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/menu/index.js")}}" type="text/javascript"></script>
@endsection



        <div class="wrapper">
                <div class="content-wrapper">
                        <section class="content">
                            @if (session('info'))
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 col-sm-6 col-md-offset-2">
                                        <div class="alert alert-success">
                                            {{ session('info') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                
                        @if(count($errors))            
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 col-sm-6 col-md-offset-2">
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                                @yield('contenido')
                                <br>
                                
                                
                                  
                              </section>
                    </div>
        </div>
        <!--inicio-footer-->
        @include("theme/lte/footer")
        <!--fin-footer-->
</body>
</html>