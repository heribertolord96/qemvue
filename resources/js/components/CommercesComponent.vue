<template>
  <div class="main-panel">
    <div class="content">
      <div class="panel panel-default-success">
        <div class="card-header with-border">
          <h3 class="card-title">Explorar comercios</h3>
        </div>
        <!--button type="button" @click="abrirModal('commerce','registrar')" class="btn btn-secondary">
          <i class="icon-plus"></i>&nbsp;Nuevo
        </button-->
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
                      <div>
                        <a href="#">
                          <h4 class="card-title" v-text="commerce.nombre"></h4>
                        </a>
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
      </div>
    </div>
   
  </div>

</template>

<script>
export default {
  data() {
    return {
      

      commerce_id: 0,
      user_id: 0,
      id: 0,
      nombre: "",
      slug: "",
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
    
    };
  },
  methods: {
    my_commerces() {
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
     
    infiniteHandler($state) {
      this.page++;
      let url = "commerces?page=" + this.page;
      axios
        .get(url)
        .then(response => {
          let arrayCommerce = response.data.data;
          if (this.arrayCommerce.length) {
            this.arrayCommerce = this.arrayCommerce.concat(arrayCommerce);
            $state.loaded();
          } else {
            $state.complete();
          }
        })
        .catch(function(error) {
          console.table(error);
        });
    }
  },
  mounted() {
    this.my_commerces();
  }
};
</script>
