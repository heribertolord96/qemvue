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
      <div class="container-fluid col-md-12">
        <div class="rowcontent col-md-6" v-for="commerce in arrayCommerce" :key="commerce.id" 
       >
            <div class="card card-stats">
              <!---->
              <!---->
              <div class="card-header bg-success">
                <router-link class="card-title" :to="{name: 'commerce', params: {slug: commerce.slug}}" v-text="commerce.nombre">
                            </router-link>
              </div>
              <div class="card-body" style="max-height:200px; overflow-y:auto;">
                <div class="row">
                  <div class="col-md-6">
                    <div class="icon-big text-center">
                      <a href="#">
                        <div class="icon-warning">
                          <img
                            src="https://picsum.photos/300/300?random"
                            aspect-ratio="1.7"
                            height="100px"
                            v-border="10"
                            border-radius="5"
                            border-color="success"
                          />

                          <!--i class="nc-icon nc-chart text-warning"></i-->
                        </div>
                      </a>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div>
                      
                        
                      
                           afa
                                    <div class="card-body">                  
                        <p class="card-category">Restaurant</p>En
                        
                          <p v-text="commerce.city"> </p>
                          ,<p v-text="commerce.state" ></p>,<p v-text="commerce.country"></p></a>
                       
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
                    <div class="card-footer" style="border-shadow:5px; border-radius:5;">
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

<style >
.container-fluid{
 display: flex;
    flex-wrap: wrap;
    float:center;
    background-color: #ddfff1;
       margin:  0%,0%,0%,0%;
    }
    .rowcontent >div {
    border-radius: 9px;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
       transition: 0.3s;
     margin:  auto,auto,auto,auto;
    text-align: center;
    }
    .rowcontent > div:hover{
      box-shadow: 9px 8px 16px 10px rgba(0,2,0,0.2);
    }
</style>