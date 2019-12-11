<footer class="main-footer">
        <div class="float-right d-none d-sm-block">
          <b>Version</b> 3.0.0-beta.1
        </div>
        <strong>Copyright &copy; 2014-2018 <a href="http://quickemart.store">QEM Abtract</a>.</strong> All rights
        reserved.
</footer>
    
<!-- jQuery -->
<script src="{{asset ("assets/lte/plugins/jquery/jquery.min.js")}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset ("assets/lte/plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<!-- FastClick -->
<script src="{{asset ("assets/lte/plugins/fastclick/fastclick.js")}}"></script>
<!-- AdminLTE App -->
<script src="{{asset ("assets/lte/dist/js/adminlte.min.js")}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset ("assets/lte/dist/js/demo.js")}}"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


@yield("scriptsPlugins")
<!--Plugins de validation-->
<script src="{{asset("assets/js/jqery-validation/core.js")}}"></script>
    <script src="{{asset("assets/js/jqery-validation/localization/messages_es.js")}}"></script>
    
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script src="{{asset("assets/js/scripts.js")}}"></script>
    <script src="{{asset("assets/js/funciones.js")}}"></script>
    <!--Plugins de validation-->


@yield('scripts')
      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>

