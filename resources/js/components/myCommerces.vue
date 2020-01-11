
<template>
  <li class="nav-item has-treeview" >
    <a href="#" class="nav-link">
      <i class="nav-icon fas fa-list-alt"></i>
      <p>
        Mis comercios
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>

    <ul class="nav nav-treeview" >
      <li
        class="nav-item btn btn-block btn-success btn-sm"
        @click="abrirModal('commerce','registrar')"
        type="button"
      >
        <!--button type="button" @click="abrirModal('commerce','registrar')" class="btn btn-secondary">
          <i class="icon-plus"></i>&nbsp;Nuevo
        </button-->
        <a href="#" class>
          <i class="fa fa-fw fa-plus-circle"></i> Agregar commerce
        </a>
      </li>
      <li class="nav-item" v-for="commerce in arrayCommerce" :key="commerce.id">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-list-alt"></i>
          <p v-text="commerce.nombre" class="overflow-x: auto;" width="100%"> 
          </p>
          <p>
            <span class="right badge badge-primary">
            <i class="right fas fa-cogs"></i>
            <i class="right fas fa-angle-left"></i>
            </span>           
          </p>
          
          
         
        </a>
         
        <ul class="nav nav-treeview bg-primary" id="menu" >
             <p>
            <span class="top-left badge badge-success">admin</span>
          </p>
  <li>
                    <button type="button" class="btn btn-info  far fa-eye">Ver</button>
                  </li>
  <li>
    <button type="button" class="btn btn-success  fas fa-pen" @click="abrirModal('commerce','actualizar',commerce)">EDITAR</button>
  </li>
  <li> <button type="button" class="btn btn-danger  far fa-trash-alt">Eliminar</button></li>
 
        </ul>
      </li>
    </ul>
    <!--Inicio del modal agregar/actualizar-->
    <div
      class="modal fade"
      tabindex="-1"
      :class="{'mostrar' : modal}"
      role="dialog"
      aria-labelledby="myModalLabel"
      style="display: none; overflow-y:auto;"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-primary modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" v-text="tituloModal"></h4>
            <button type="button" class="close" @click="cerrarModal()" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <form action method="post" enctype="multipart/form-data" class="form-horizontal">
              <div class="form-group row">
                <label class="col-md-3 form-control-label" for="text-input">Nombre</label>
                <div class="col-md-9">
                  <input type="text" v-model="nombre" class="form-control" placeholder="Nombre " />
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 form-control-label" for="email-input">Descripción</label>
                <div class="col-md-9">
                  <textarea
                    rows="5"
                    maxlength="900"
                    v-model="descripcion"
                    class="form-control"
                    placeholder="Ingrese descripción"
                  ></textarea>
                  <a href="https://wordtohtml.net/">Word to html online editor</a>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 form-control-label" for="text-input">Dirección</label>
                <div class="col-md-9">
                  <input
                    type="text"
                    v-model="direccion"
                    class="form-control"
                    placeholder="Enrique Segoviano #800"
                  />
                </div>
              </div>
              <div v-show="errorCommerce" class="form-group row div-error">
                <div class="text-center text-error">
                  <div v-for="error in errorMostrarMsjCommerce" :key="error" v-text="error"></div>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
            <button
              type="button"
              v-if="tipoAccion==1"
              class="btn btn-primary"  @click="registrarCommerce()"
            >Guardar</button>
            <button
              type="button"
              v-if="tipoAccion==2"
              class="btn btn-primary"
              @click="actualizarCommerce()"
            >Actualizar</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!--Fin del modal-->
  </li>
</template>

<script>
export default {
  data() {
    return {
      //isOpen: false,//DROPDOWN

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
      condition: 1,
      ubicacion_id: "",
      role: "",
      arrayCommerce: [],
      modal: 0,
      tituloModal: "",
      tipoAccion: 0
    };
  },
  methods: {
    my_commerces() {
      //const axios = require("axios");
      let me = this;
      var url = "/admin/my_commerces";
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
    detalles() {
      let me = this;
      var url = "/admin/my_commerces/{slug}";
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
    cerrarModal() {
      this.modal = 0;
      this.tituloModal = "";
      this.nombre = "";
      this.descripcion = "";
    },
    abrirModal(modelo, accion, data = []) {
      switch (modelo) {
        case "commerce": {
          switch (accion) {
            case "registrar": {
              this.modal = 1;
              this.tituloModal = "Publicar comercio";
              /* this.nombre= '';
                                this.descripcion = '';
                                this.tipoAccion = 1;*/
              break;
            }
            case "actualizar": {
              //console.log(data);
              this.modal = 1;
              this.tituloModal = "Actualizar comercio";
              /*this.tipoAccion=2;
                                this.categoria_id=data['id'];
                                this.nombre = data['nombre'];
                                this.descripcion= data['descripcion'];*/
              break;
            }
          }
        }
      }
    },
    registrarCommerce() {
      if (this.validarCommerce()) {
        return;
      }

      let me = this;

      axios
        .post(this.ruta + "/categoria/registrar", {
          nombre: this.nombre,
          descripcion: this.descripcion,
          direccion: this.direccion
        })
        .then(function(response) {
          me.cerrarModal();
          me.listarCommerce(1, "", "nombre");
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    actualizarCommerce() {
      if (this.validarCommerce()) {
        return;
      }

      let me = this;

      axios
        .put(this.ruta + "/categoria/actualizar", {
          nombre: this.nombre,
          descripcion: this.descripcion,
          direccion: this.direccion,
          id: this.categoria_id
        })
        .then(function(response) {
          me.cerrarModal();
          me.listarCommerce(1, "", "nombre");
        })
        .catch(function(error) {
          console.log(error);
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

    //DROPDOWN METHODS
    /* toggleDropDown() {
      this.isOpen = !this.isOpen;
      this.$emit("change", this.isOpen);
    },
    closeDropDown() {
      this.isOpen = false;
      this.$emit("change", this.isOpen);
    }*/
  },
  mounted() {
    this.my_commerces();
  }
};
</script>
<style>
ul#menu li {
  display:inline;
}
.modal-content {
  width: 100% !important;
  position: fixed !important;
  overflow-y: visible;
}
.mostrar {
  display: list-item !important;
  opacity: 1 !important;
  position: fixed !important;
  background-color: #3c29297a !important;
}
.div-error {
  display: flex;
  justify-content: center;
}
.text-error {
  color: red !important;
  font-weight: bold;
}
</style>