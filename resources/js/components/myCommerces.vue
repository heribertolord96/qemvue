
<template>
  <li class="nav-item has-treeview">
    <a href="#" class="nav-link">
      <i class="nav-icon fas fa-list-alt"></i>
      <p>
        Mis comercios
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>

    <ul class="nav nav-treeview">
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
          <p v-text="commerce.nombre" class="overflow-x: auto;" width="100%"></p>
          <p>
            <span class="right badge badge-primary">
              <i class="right fas fa-cogs"></i>
              <i class="right fas fa-angle-left"></i>
            </span>
          </p>
        </a>
        <ul class="nav nav-treeview bg-primary row" id="menu">
          <li>
            <span class="top-left badge badge-success">
              <p v-text="commerce.role_name"></p>
            </span>
          </li>
          <li class="nav-item has-treeview col-md-3">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-list-alt"></i>
              <p >Ajustes</p>
              <p>
                <span class="right badge badge-primary">
                  <i class="right fas fa-cogs"></i>
                  <i class="right fas fa-angle-left"></i>
                </span>
              </p>
            </a>
            <ul class="nav nav-treeview bg-primary" id="menu">
                         <li>
                <button @click="menu=5" type="button" class="btn btn-info far fa-eye">Ver</button>
              </li>
              <li>
                <button
                  type="button"  class="btn btn-success fas fa-edit"
                  @click="abrirModal('commerce','actualizar',commerce)"
                >EDITAR</button>
              </li>
              <li>
                <button type="button" class="btn btn-danger far fa-trash-alt">Eliminar</button>
              </li>
              </br>
              <li>
                <button type="button" class="btn btn-success ">                 
                    <i class="fas fa-users-cog"></i> Administrar usuarios</button>
              </li>
            </ul>
          </li>
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-store-alt"></i>
              <p class="overflow-x: auto;" width="100%">Mis articulos</p>
              <p>
                <span class="right badge badge-primary">
                  <i class="right fas fa-cogs"></i>
                  <i class="right fas fa-angle-left"></i>
                </span>
              </p>
            </a>
            <ul class="nav nav-treeview bg-danger " id="menu">              
              <li>
                <button type="button" class="btn btn-success ">
                  <i class="fas fa-dolly"></i>Productos</button>
              </li>
              <li>
                <button type="button" class="btn btn-success ">
                  <i class="fas fa-people-carry"></i>Servicios</button>
              </li>
              </br>
              <li>
                <button type="button" class="btn btn-success ">
                  <i class="fas fa-bahai"></i>Promociones</button>
              </li>
              <li>
                <button type="button" class="btn btn-success ">
                  <i class="fas fa-birthday-cake"></i>Eventos</button>
              </li>
              <li>
                <button type="button" class="btn btn-success ">
                  <i class="fas fa-camera"></i>Galeria</button>
              </li>
              </br>
              <li>
                <button type="button" class="btn btn-success ">
                  <i class="fas fa-ad"></i>Anuncios</button>
              </li>
              <li>
                <button type="button" class="btn btn-success "><i class="fas fa-chart-area"></i>
                Graficas</button>
              </li>
            </ul>
          </li>
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
          <div class="modal-header-SUCCESS">
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
                  <input
                    type="text"
                    v-model="nombre"
                    class="form-control"
                    id="nombre"
                    placeholder="Nombre "
                  />
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 form-control-label" for="text-input">Slug</label>
                <div class="col-md-9">
                  <input
                    type="text"
                    v-model="commerce_slug"
                    class="form-control"
                    id="slug"
                    placeholder="Slug "
                    required
                  />
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 form-control-label" for="email-input">Descripción</label>
                <div class="col-md-9">
                  <textarea
                    required
                    rows="5"
                    maxlength="900"
                    v-model="descripcion"
                    class="form-control"
                    placeholder="Ingrese descripción"
                  ></textarea>
                  <a href="https://wordtohtml.net/">Word to html online editor</a>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group bootstrap-timepicker">
                    <label for>Apertura</label>
                    <input type="timepicker" v-model="hora_apertura" />
                  </div>
                </div>
                <div class="col">
                  <div class="form-group bootstrap-timepicker">
                    <label for>Cierre</label>
                    <input type="timepicker" v-model="hora_cierre" />
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for>Telefono</label>
                    <input type="text" v-model="num_telefono" />
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label for>Email</label>
                    <input type="email" v-model="email" />
                  </div>
                </div>
              </div>
              <div class="row">
                <p>Direccion</p>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="inputEmail" class="control-label">Pais</label>
                    <input
                      v-model="country"
                      class="form-control"
                      name="lon"
                      type="text"
                      required
                      placeholder="Mexico"
                    />
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="control-label">Estado</label>
                    <input
                      v-model="state"
                      class="form-control"
                      name="lon"
                      type="text"
                      required
                      placeholder="Jalisco"
                    />
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="control-label">Ciudad</label>
                    <input
                      v-model="city"
                      class="form-control"
                      name="lon"
                      type="text"
                      required
                      placeholder="Yahualica"
                    />
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="control-label">Calle</label>
                    <input class="form-control" name="lon" type="numeric" v-model="calle" />
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="control-label">N.Ext.</label>
                    <input class="form-control" name="lon" type="numeric" v-model="numero_exterior" />
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="control-label">N. Interior</label>
                    <input class="form-control" name="lon" type="numeric" v-model="numero_interior" />
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="control-label">Lon</label>
                    <input class="form-control" name="lon" type="coords" />
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="control-label">Lat</label>
                    <input class="form-control" name="lat" type="coords" />
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="control-label">Imagen</label>
                    <input class="form-control" name="imagen" id="imagen" type="file" required />
                  </div>
                </div>
                <div class="col-md-7">
                  <div
                    class
                    style="border:1px solid; width:100%;height:100%;background-color:rgb(108, 42, 208);"
                  ></div>
                </div>
              </div>

              <div v-show="errorCommerce" class="form-group row div-error">
                <div class="text-center text-error bg-danger">
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
              class="btn btn-primary"
              @click="registrarCommerce()"
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

      ubicacion_id: 0,
      commerce_id: 0,
      user_id: 0,
      role_id: 0,
      nombre: "",
      role_slug: "",
      commerce_slug: "",
      descripcion: "",
      hora_apertura: "",
      hora_cierre: "",
      num_telefono: "",
      email: "",
      file: "",
      condition: 1,
      ubicacion_id: "",
      arrayLocations: [],
      arrayCommerce: [],
      arrayLocations: [],
      arrayCommerceUser: [],
      arrayCommerceRole: [],
      arrayCommerceRoleUser: [],
      errorCommerce: "",
      errorMostrarMsjCommerce: [],
      modal: 0,
      tituloModal: "",
      tipoAccion: 0
    };
  },
  methods: {
    my_commerces() {
      //const axios = require("axios");
      let me = this;
      var url = "/my_commerces";
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
      //this.selectCommerceRole();
      switch (modelo) {
        case "commerce": {
          switch (accion) {
            case "registrar": {
              this.modal = 1;
              this.tituloModal = "Publicar comercio";
              //ids
              this.role_id = 1;
              this.nombre = "";
              this.commerce_slug = "";
              this.descripcion = "";
              this.hora_apertura = "";
              this.hora_cierre = "";
              this.num_telefono = "";
              this.email = "";
              this.ubicacion_id = "";
              this.calle = "";
              this.numero_interior = "";
              this.numero_exterior = "";
              this.city = "";
              this.state = "";
              this.country = "";
              this.latitude = "";
              this.longitude = "";

              this.tipoAccion = 1;
              break;
            }
            case "actualizar": {
              //console.log(data);
              this.commerce_id = data["commerce_id"];
              this.modal = 2;
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
   
    registrarCommerce() {
      if (this.validarCommerce()) {
        return;
      }

      let me = this;
      axios
        .post("/commerce/store", {
          nombre: this.nombre,
          descripcion: this.descripcion,
          commerce_slug: this.commerce_slug,
          hora_apertura: this.hora_apertura,
          hora_cierre: this.hora_cierre,
          num_telefono: this.num_telefono,
          email: this.email,
          file: this.file,
          condition: 1,

          calle: this.calle,
          numero_interior: this.numero_interior,
          numero_exterior: this.numero_exterior,
          city: this.city,
          state: this.state,
          country: this.country,
          longitude: this.longitude,
          latitude: this.latitude
        })
        .then(function(response) {
          me.cerrarModal();
          me.my_commerces(1, "", "nombre");
        })
        .catch(function(error) {
          console.table(error);
        });
    },
    actualizarCommerce() {
      if (this.validarCommerce()) {
        return;
      }

      let me = this;

      axios
        .put("/commerce/update", {
          nombre: this.nombre,
          descripcion: this.descripcion,
          commerce_slug: this.commerce_slug,
          hora_apertura: this.hora_apertura,
          hora_cierre: this.hora_cierre,
          num_telefono: this.num_telefono,
          email: this.email,
          file: this.file,
          condition: 1,
          calle: this.calle,
          numero_interior: this.numero_interior,
          numero_exterior: this.numero_exterior,
          city: this.city,
          state: this.state,
          country: this.country,
          longitude: this.longitude,
          latitude: this.latitude,
          commerce_id: this.commerce_id,
          ubicacion_id: this.ubicacion_id
        })
        .then(function(response) {
          me.cerrarModal();
          me.my_commerces();
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
    },
    validarCommerce() {
      this.errorCommerce = 0;
      this.errorMostrarMsjCommerce = [];

      if (!this.nombre)
        this.errorMostrarMsjCommerce.push(
          "El El campo nombre no puede estar vacío."
        );
      if (!this.descripcion)
        this.errorMostrarMsjCommerce.push(
          "El nombre de usuario no puede estar vacío."
        );
      if (!this.hora_apertura || !this.hora_cierre)
        this.errorMostrarMsjCommerce.push("Debe llenar los campos de horario");
      if (!this.city || !this.country || !this.state)
        this.errorMostrarMsjCommerce.push(
          "Debe llenar los campos de ubicacion basicos (pais, estado,ciudad)"
        );

      if (this.errorMostrarMsjCommerce.length) this.errorCommerce = 1;

      return this.errorCommerce;
    }

   
  },
  mounted() {
    this.my_commerces();
  }
};
$(document).ready(function() {
  $("#nombre, #slug").stringToSlug({
    callback: function(text) {
      $("#slug").val(text);
    }
  });
});
</script>
<style> 
ul#menu li {
  display: inline;
    flex-wrap: wrap;
     margin:  auto,auto,auto,auto;
 
}

.modal-content {
  width: 100% !important;
  position: fixed !important;
  overflow-y: visible;
  margin-top: 10%;
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