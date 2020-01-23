<template>
<div>
<template v-if="listado==1">
  
    <div class="content">
      <div class="panel panel-default-success">
        <div class="card-header with-border">
          <h3 class="card-title">Explorar comercios</h3>
        </div>
      </div>
      <div class="container-fluid">
        <div class="row" v-for="commerce in arrayCommerce" :key="commerce.id" max-height="10">
          <div class="col-xl-12 col-md-6">
            <div class="card card-stats">
              <!---->
              <!---->
              <div class="card-body">
                <div class="row">
                  <div class="col-5">
                    <div class="icon-big text-center">
                      <a href="#">
                        <div class="icon-warning">
                          <img
                            src="https://picsum.photos/510/300?random"
                            aspect-ratio="1.7"
                            height="70"
                            v-border="10"
                            border-radius="5"
                            border-color="success"
                          />

                          <!--i class="nc-icon nc-chart text-warning"></i-->
                        </div>
                      </a>
                    </div>
                  </div>
                  <div class="col-7">
                    <div class="numbers">
                      <div class="card-header-success">
                        <a href="#">
                          <h4  class="card-header-success href" type="href"
                  @click="abrirModal('commerce','ver',commerce)"
                          v-text="commerce.nombre">
                            
                  </h4>
                  </a>
                  </div>
                        <p class="card-category">Restaurant</p>En
                        <p v-text="commerce.ubicacion_id">
                          <a href></a>
                        </p>
                        <tr>
                          <th>Abierto de:</th>
                          <th>a:</th>
                        </tr>
                        <tr>
                          <td>
                            <span class="badge badge-success" v-text="commerce.hora_apertura"></span>
                          </td>

                          <td>
                            <span class="badge badge-warning" v-text="commerce.hora_cierre"></span>
                          </td>
                        </tr>

                        <!--commerce.type-->
                      
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <hr />
                <div class="stats">
                  <div>
                    <i class="fa fa-refresh"></i>
                    <p class="card-body" v-text="commerce.descripcion"></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--infinite-loading @distance="1" @infinite="infiniteHandler">
                <div slot="no-more">--</div>
                <div slot="spinner">Cargando...</div>
                <div slot="no-results">Sin resultados</div>
            </infinite-loading-->
      </div>
    </div>
  
</template>
    
   <template v-if="listado==0">
 <div class="container">
    <div class="card card-default">
      <h4 class="card-title bg-warning">Ver Commerce</h4>
      <div class="card-header success with-border">
        <h2 class="card-title success" v-text="calle"></h2>
        <div class="card-tools pull-right">
          <button type="button" class="btn btn-card-tool" data-widget="collapse">
            <i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <img class="d-block w-100" height="100" width="150" alt="src-file" />
      </div>
      <div class="card-footer">
        <p>
          <strong>
            Descripción:
            <br />
          </strong>
        </p>
        <p v-text="descripcion"></p>

        <table class="table table-bordered">
          <tbody>
            <tr>
              <td>
                <b>Abrimos a:</b>
              </td>
              <td v-text="hora_apertura"></td>
            </tr>
            <tr>
              <td>
                <b>Cerramos a:</b>
              </td>
              <td v-text="hora_cierre"></td>
            </tr>
            <tr>
              <td>
                <b>Tel.:</b>
              </td>
              <td v-text="num_telefono"></td>
            </tr>
            <tr>
              <td>
                <b>Direccion:</b>
              </td>
              <td>
                <tr>
                  <td v-text="commerce_id"></td>
                </tr>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <!----------->

    <div class="row">
      <div class="col-lg-2 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3>150</h3>
            <p>Departamentos</p>
          </div>
          <div class="icon">
            <i class="fa fa-shopping-bag"></i>
          </div>
          <!--mostrar Departamentos de una commerce-->
          <a href class="small-box-footer">
            Ver...
            <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-2 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>150</h3>
            <p>Categorias</p>
          </div>
          <div class="icon">
            <i class="fa fa-shopping-bag"></i>
          </div>
          <!--mostrar categories de una commerce-->
          <a href class="small-box-footer">
            Ver...
            <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
      <!-- ./col -->

      <div class="col-lg-2 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-blue">
          <div class="inner">
            <h3>150</h3>
            <p>Articulos</p>
          </div>
          <div class="icon">
            <i class="fa fa-shopping-bag"></i>
          </div>
          <!--mostrar articulos de una commerce
          @if (Auth::user()->id == $commerce->u_id)-->
          <a href class="small-box-footer">
            Ver...
            <i class="fa fa-arrow-circle-right"></i>
          </a>

          <a href class="small-box-footer">
            Ver...
            <i class="fa fa-arrow-circle-right"></i>
          </a>
          <!-- @endif-->
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-2 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3>
              53
              <!--sup style="font-size: 20px">%</sup-->
            </h3>
            <p>Promociones</p>
          </div>
          <div class="icon">
            <i class="fa fa-cart-arrow-down"></i>
          </div>
          <a href="#" class="small-box-footer">
            Ver...
            <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-2 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>44</h3>
            <p>Eventos</p>
          </div>
          <div class="icon">
            <i class="fa fa-birthday-cake"></i>
          </div>
          <a href="#" class="small-box-footer">
            Ver...
            <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
      <div class="col-lg-2 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>44</h3>
            <p>Galería</p>
          </div>
          <div class="icon">
            <i class="fa fa-camera"></i>
          </div>
          <a href="#" class="small-box-footer">
            Ver...
            <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
    </div>
    <!-- /.row --
    <!- ---- ----->
    <div class="row">
      <!-- checkbox -->

      <div class="col-md-6">
        <div>
          <input type="radio" class="fa fa-thumbs-up" name="likes" value />
          like
        </div>
        <!-- todo text -->
        <span class="text">168</span>
      </div>
      <div class="col-md-6">
        <div>
          <input type="radio" class="fa fa-thumbs-down" name="likes" value />
          dislike
        </div>
        <!-- todo text -->
        <span class="text">16</span>
      </div>
    </div>
  </div>
</template>
</div>
</template>

<script>
export default {
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
      arrayCommerce: [],
    page: 0,
    listado:1
    };
  },
  methods: {
    listar_commerces() {
      const axios = require("axios");
      let me = this;
      var url = "/commerces";
      axios
        .get(url)
        .then(function(response) {
          var respuesta = response.data;
          me.arrayCommerce = respuesta;
          //console.log(response);
        })
        .catch(function(error) {
          console.table(error);
        });
    },
      abrirModal(modelo, accion, data = []) {
      //this.selectCommerceRole();
      switch (modelo) {
        case "commerce": {
          switch (accion) {
           
            case "ver": {
              //console.log(data);
              this.listado = 0;
              this.commerce_id = data["commerce_id"];
              this.tituloModal = "Actualizar comercio";
              this.tipoAccion = 2;
              this.nombre = data["nombre"];
              this.descripcion = data["descripcion"];
              this.commerce_slug = data["commerce_slug"];
              this.hora_apertura = data["hora_apertura"];
              this.hora_cierre = data["hora_cierre"];
              this.num_telefono = data["num_telefono"];
              this.email = data["email"];
              this.ubicacion_id = data["ubicacion_id"];
              this.calle = data["calle"];
              this.numero_interior = data["numero_interior"];
              this.numero_exterior = data["numero_exterior"];
              this.city = data["city"];
              this.state = data["state"];
              this.country = data["country"];
              this.latitude = data["latitude"];
              this.longitude = data["longitude"];

              break;
            }
          }
        }
      }
    },
    infiniteHandler($state) {
                 let me = this;
      var url = "/commerces";
               axios .then(response => {
                    var respuesta = response.data;
          me.arrayCommerce = respuesta;

                    if(commerces.length){
                        this.arrayCommerce = this.arrayCommerce.concat(commerces)
                        $state.loaded()
                    }else{
                        $state.complete()
                    }
                })
            }
  },
  mounted() {
    this.listar_commerces();
  }
};
</script>