<template>
     <div class="card card-success">
        <div class="panel panel-default-success">
          <div class="card-header with-border">
            <h3 class="card-title success">
              Departamentos de:
              <p v-text="nombre"></p>
            </h3>
          </div>
          <div class="card-header" v-text="nombre"></div>
        </div>
        <!-- SEARCH FORM Here-->
        <div class="card-body row-md-12">
          <div
            class="card card-default col-md-6 col-md-offset-2 float-left"
            v-for="department in arrayDepartment"
            :key="department.id"
          >
            <div class="card-header with-border">
              <!--div class="card-tools pull-right">
                <button type="button" class="btn btn-card-tool">
                    <a href="{{ route('departments.show', $department->id) }}">
                        <i class="fa fa-fw fa-eye 10px"></i>
                    </a>
                </button>
                <button type="button" class="btn btn-card-tool">
                    <a href="{{ route('departments.edit', $department->id) }}">
                        <i class="fa fa-fw fa-pen 50px"></i>
                    </a>
                </button>
                <button type="" class="btn btn-card-tool">
                    {!! Form::open(['route' => ['departments.destroy', $department->id], 'method' => 'DELETE']) !!}
                    <button class="btn-danger">
                        <i class="fa fa-fw fa-trash "></i>
                    </button>
                    {!! Form::close() !!}
                </button>
                <button type="button" class="btn btn-card-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-card-tool" data-widget="remove">
                    <i class="fa fa-times"></i></button>
              </div-->
              <br />
              <h3 class="card-title" v-text="department.name">}}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <img
                style="max-width:300px, max-height:200px"
                class="d-block w-100"
                v-src="department.file"
                height="100"
                width="100"
                alt="src-file"
              />
            </div>
            <!-- /.card-body -->
            <div class="card-footer no-padding">
              <tr>
                <p>
                  <b>
                    Descripción:
                    <br />
                  </b>
                </p>
                <p v-text="department.body"></p>
              </tr>
              <table class="table table-bordered">
                <tbody>
                  <tr>
                    <td>
                      <b>Articulos:</b>
                    </td>
                    <td>20</td>
                  </tr>
                  <tr>
                    <td>
                      <b>Promociones:</b>
                    </td>
                    <td>10</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- /.footer -->
          </div>
        </div>
      </div>
</template>
<script>
export default {
  props: ["commerce_slug"],
  data() {
    return {
     commerce_id: 0,
      // user_id: 0,
      nombre: "",
      commerce_slug: "",
      descripcion: "",
      hora_apertura: "",
      hora_cierre: "",
      num_telefono: "",
      email: "",
      file: "",
      city: "",
      condition: 1,
      ubicacion_id: "",
      arrayDepartment: [],
      listado: 3,
        name:"",
        body:''
    };
  },
  
  created() {
    let me = this;
      var url =   +commerce_slug +
                "/departments";
    axios.get(url).then(response => {
      this.commerce = response.data;
    });
  }
};
</script>