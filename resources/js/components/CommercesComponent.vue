<template>
  <div>
    <template v-if="listado==1">
      <div class="content">
        <div class="panel panel-default-success">
          <div class="panel-header border-dark">
            <h3 class="card-title">Explorar comercios</h3>
          </div>
        </div>
        <div class="row">
          <div
            class="card card-for col-md-6"
            v-for="commerce in arrayCommerce"
            :key="commerce.commerce_id"
            max-height="300px"
          >
            <div class="card-header bg-success">
              <a href="#">
                <h4
                  class="card-header-success href"
                  type="href"
                  @click="abrirModal('commerce','ver',commerce, commerce_d)"
                  v-text="commerce.nombre"
                ></h4>
              </a>
              <!--router-link class="card-header" 
               :to="{name: 'commerce', params: {commerce_slug: commerce.commerce_slug}}" v-text="commerce.nombre">
              </router-link-->
            </div>

            <div class="col-xl-12 col-md-6">
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
                      <a href>
                        <p class="card-category">Restaurant</p>
                      </a>
                      En
                      <a href>
                        <p v-text="commerce.city"></p>
                      </a>
                      <a href>
                        <p v-text="commerce.state"></p>
                      </a>
                      <a href>
                        <p v-text="commerce.country"></p>
                      </a>
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
              <div class="card-footer row">
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
          <!--infinite-loading @distance="1" @infinite="infiniteHandler">
                  <div slot="no-more">--</div>
                  <div slot="spinner">Cargando...</div>
                  <div slot="no-results">Sin resultados</div>
                  Esta madre no jala. no mover a menos que todo haya sido terminado
          </infinite-loading-->
        </div>
      </div>
      <nav>
        <ul class="pagination">
          <li class="page-item" v-if="pagination.current_page > 1">
            <a
              class="page-link"
              href="#"
              @click.prevent="cambiarPagina(pagination.current_page - 1,buscar,criterio)"
            >Ant</a>
          </li>
          <li
            class="page-item"
            v-for="page in pagesNumber"
            :key="page"
            :class="[page == isActived ? 'active' : '']"
          >
            <a
              class="page-link"
              href="#"
              @click.prevent="cambiarPagina(page,buscar,criterio)"
              v-text="page"
            ></a>
          </li>
          <li class="page-item" v-if="pagination.current_page < pagination.last_page">
            <a
              class="page-link"
              href="#"
              @click.prevent="cambiarPagina(pagination.current_page + 1,buscar,criterio)"
            >Sig</a>
          </li>
        </ul>
      </nav>
    </template>

    <template v-if="listado==0">
      <div class="container">
        <div class="card card-default">
          <a href="#">
            <button class="btn-circle warning fa-left" @click="volverCommerces()">Volver a commerces</button>
          </a>
          <h4 class="card-title bg-warning">Ver Commerce</h4>
          <div class="card-header success with-border">
            <h2 class="card-title success" v-text="nombre"></h2>
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
            <strong>
              <p v-text="descripcion"></p>
            </strong>

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
                </tr>
                <tr>
                  <td>
                    <p v-text="calle"></p>
                    <p v-text="numero_exterior"></p>
                    <p v-text="numero_interior"></p>
                    <p v-text="city"></p>
                    <p v-text="state"></p>
                    <p v-text="country"></p>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <!----------->
        <div class="card card-default">
          <div class="card-header success with-border">
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <th>Departamentos</th>
                  <th>Categorias</th>
                </tr>
                <tr>
                  <td>
                    <div class="form-group">
                      <div class="btn-group">
                        <i class="fas fa-plus-circle">
                        <button
                          class="btn btn-success "
                          @click="abrirModalDep('department','registrar')"
                        >
                          Crear departamento</button> </i>

                        <button
                          class="btn btn-success fas fa-plus-circle"
                          @click="abrirModalDep('department','listar')"
                        >Listar departamentos</button>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="btn-group">
                      <button
                        type="button"
                        class="btn btn-info"
                        @click="abrirModalCat('category','registrar')"
                      >Categorias</button>
                      <button
                        type="button"
                        class="btn btn-success fas fa-plus-circlet"
                        @click="abrirModalCat('category','listar')"
                      >Listar categorias</button>
                     
                    </div>
                  </td>
                  <td>
                    <div class="btn-group">
                      <button
                        type="button"
                        class="btn btn-info"
                        @click="abrirModalProd('products','registrar')"
                      >Agregar producto</button>
                      <button
                        type="button"
                        class="btn btn-success fas fa-plus-circlet"
                        @click="abrirModalProd('product','listar')"
                      >Listar productos</button>
                     
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
            <div class="box-body">
              <!-- Split button -->
              <h2>Articulos</h2>

              <!-- flat split buttons -->
              <p>Publicidad:</p>

              <div class="margin">
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-flat">Eventos</button>
                  <button
                    type="button"
                    class="btn btn-default btn-flat dropdown-toggle"
                    data-toggle="dropdown"
                  >
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu">
                    <li>
                      <a href="#">Listar</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                      <a href="#">Agregar</a>
                    </li>
                  </ul>
                </div>
                <div class="btn-group">
                  <button type="button" class="btn btn-info btn-flat">Promociones</button>
                  <button
                    type="button"
                    class="btn btn-info btn-flat dropdown-toggle"
                    data-toggle="dropdown"
                  >
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu">
                    <li>
                      <a href="#">Listar</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                      <a href="#">Agregar</a>
                    </li>
                  </ul>
                </div>
                <div class="btn-group">
                  <button type="button" class="btn btn-danger btn-flat">Posts</button>
                  <button
                    type="button"
                    class="btn btn-danger btn-flat dropdown-toggle"
                    data-toggle="dropdown"
                  >
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu">
                    <li>
                      <a href="#">Listar</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                      <a href="#">Agregar</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <h2 class="card-title success">Ver catalogo</h2>
            <div class="form-group" style=" display: flex;
    flex-wrap: wrap;
    float:center;">
              <div class="form-group col-md-3">
                <label class="form-control-label" for="text-input">Departamento</label>
                <select class="form-control" @change="department" v-model="changestate.department">
                  <option value="0" disabled>Seleccione</option>
                  <option
                    v-for="department in arrayDepartment"
                    :key="department.department_id"
                    :value="department.department_id"
                    v-text="department.name"
                  ></option>
                </select>
              </div>
              <div class="col-md-3">
                <label class="form-control-label" for="text-input">Categoria</label>
                <select class="form-control" @change="category" v-model="changestate.category">
                  <option value="0" disabled>Seleccione</option>
                  <option
                    v-for="category in arrayCategory"
                    :key="category.category_id"
                    :value="category.category_id"
                    v-text="category.category_name"
                  ></option>
                </select>
              </div>
              <div class="col-md-3">
                <label class="col form-control-label" for="text-input">Articulo</label>
                <input class="form-control" type="text" />
              </div>
            </div>
            <div class="card-tools pull-right bg-warning">
              <button type="button" class="btn btn-card-tool" data-widget="collapse">
                <i class="fa fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body col-md-12">
            <div class="row">
              <div
                @change="product"
                class="card card-for col-md-3"
                v-for="product in arrayProduct"
                :key="product.product_id"
                :value="product.product_id"
                max-height="300px"
              >
                <div class="card-header">
                  <div class="card-tools pull-right">
                    <select class="form-control btn-dropdown" type="btn-dropdown">
                      <span class="right badge badge-primary">
                        <i class="right fas fa-cogs"></i>
                        <i class="right fas fa-angle-left"></i>
                      </span>
                      <option type="button" class="btn btn-success fas fa-eye">Ver</option>
                      <option type="button" class="btn btn-success fas fa-shopping-cart">Comprar</option>
                      <option type="button" class="btn btn-danger fas fa-pen-alt">Editar</option>
                      <option type="button" class="btn btn-danger fas fa-trash-alt">Eliminar</option>

                      <!--$4moreinfo_go_to_gmybuissiness$$-->
                    </select>
                  </div>
                </div>
                <div class="card-body">
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
                <div class="card-footer">
                  <b v-text="product.product_name"></b>
                  <p class="text-primary" v-text="product.product_presentation"></p>
                  <p class="text-danger" v-text="product.precio_venta"></p>
                  <p v-text="product.product_description"></p>
                  <p>De venta en:</p>
                  <a href>
                    <p v-text="product.commerce_product"></p>
                  </a>
                </div>
              </div>
            </div>
            <nav>
              <ul class="pagination">
                <li class="page-item" v-if="pagination.current_page > 1">
                  <a
                    class="page-link"
                    href="#"
                    @click.prevent="cambiarPagina(pagination.current_page - 1,buscar,criterio)"
                  >Ant</a>
                </li>
                <li
                  class="page-item"
                  v-for="page in pagesNumber"
                  :key="page"
                  :class="[page == isActived ? 'active' : '']"
                >
                  <a
                    class="page-link"
                    href="#"
                    @click.prevent="cambiarPagina(page,buscar,criterio)"
                    v-text="page"
                  ></a>
                </li>
                <li class="page-item" v-if="pagination.current_page < pagination.last_page">
                  <a
                    class="page-link"
                    href="#"
                    @click.prevent="cambiarPagina(pagination.current_page + 1,buscar,criterio)"
                  >Sig</a>
                </li>
              </ul>
            </nav>
          </div>

          <!-- /.row --
          <!- ---- ----->
        </div>
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

      <!--Inicio del modaldepartments agregar/actualizar-->
      <div
        v-if="modal==1"
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
              <button type="button" class="close" @click="cerrarModalDep()" aria-label="Close">
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
                      v-model="department_name"
                      class="form-control"
                      id="department_name"
                      placeholder="Alimentos organicos"
                    />
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-md-3 form-control-label" for="text-input">Slug</label>
                  <div class="col-md-9">
                    <input
                      type="text"
                      v-model="department_slug"
                      class="form-control"
                      id="department_slug"
                      placeholder="alimentos-organicos"
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
                      v-model="department_body"
                      class="form-control"
                      id="department_body"
                      placeholder="Ingrese descripción"
                    ></textarea>
                  </div>
                </div>

                <div v-show="errorDepartment" class="form-group row div-error">
                  <div class="text-center text-error bg-danger">
                    <div v-for="error in errorMostrarMsjDepartment" :key="error" v-text="error"></div>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary close" @click="cerrarModalDep()">Cerrar</button>
              <button
                type="button"
                v-if="tipoAccion==1"
                class="btn btn-success fas fa-save"
                @click="registrarDepartment()"
              >Guardar</button>
              <button
                type="button"
                v-if="tipoAccion==2"
                class="btn btn-success fas fa-save"
                @click="actualizarDepartment()"
              >Actualizar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!--Fin del modal-->

      <!--====================================================-->

      <!--Inicio del modalcategoriess agregar/actualizar-->
      <div
        v-if="modal==2"
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
              <button type="button" class="close" @click="cerrarModalCat()" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <form action method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="form-group row">
                  <label class="form-control-label" for="text-input">Departamento</label>

                  <div class="col-md-9">
                    <select
                      class="form-control"
                      id="department"
                      @change="department"
                      v-model="changestate.department"
                    >
                      <option value="0" disabled>Seleccione</option>
                      <option
                        v-for="department in arrayDepartment"
                        :key="department.department_id"
                        :value="department.department_id"
                        v-text="department.name"
                      ></option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-md-3 form-control-label" for="text-input">Nombre</label>

                  <div class="col-md-9">
                    <input
                      type="text"
                      v-model="category_name"
                      class="form-control"
                      id="category_name"
                      placeholder="frutas de temporada"
                    />
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-md-3 form-control-label" for="text-input">Slug</label>
                  <div class="col-md-9">
                    <input
                      type="text"
                      v-model="category_slug"
                      class="form-control"
                      id="category_slug"
                      placeholder="frutas-de-temporada"
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
                      v-model="category_body"
                      class="form-control"
                      id="category_body"
                      placeholder="Ingrese descripción"
                    ></textarea>
                  </div>
                </div>

                <div v-show="errorCategory" class="form-group row div-error">
                  <div class="text-center text-error bg-danger">
                    <div v-for="error in errorMostrarMsjCategory" :key="error" v-text="error"></div>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" @click="cerrarModalCat()">Cerrar</button>
              <button
                type="button"
                v-if="tipoAccion==3"
                class="btn btn-success far fa-save"
                @click="registrarCategory()"
              >Guardar</button>
              <button
                type="button"
                v-if="tipoAccion==4"
                class="btn btn-primary"
                @click="actualizarCategory()"
              >Actualizar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!--Fin del modal categories-->
      <!--Inicio del modalproducts agregar/actualizar-->
      <div
        v-if="modal==3"
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
              <button type="button" class="close" @click="cerrarModalProd()" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <form action method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="form-group col-md-3">
                  <label class="form-control-label" for="text-input">Departamento</label>
                  <select
                    class="form-control"
                    @change="department"
                    v-model="changestate.department"
                  >
                    <option value="0" disabled>Seleccione</option>
                    <option
                      v-for="department in arrayDepartment"
                      :key="department.department_id"
                      :value="department.department_id"
                      v-text="department.name"
                    ></option>
                  </select>
                </div>
                <div class="col-md-3">
                  <label class="form-control-label" for="text-input">Categoria</label>
                  <select class="form-control" @change="category" v-model="changestate.category">
                    <option value="0" disabled>Seleccione</option>
                    <option
                      v-for="category in arrayCategory"
                      :key="category.category_id"
                      :value="category.category_id"
                      v-text="category.category_name"
                    ></option>
                  </select>
                </div>
                <div class="form-group row">
                  <label class="col-md-3 form-control-label" for="text-input">Nombre</label>
                  <div class="col-md-9">
                    <input
                      type="text"
                      v-model="product_name"
                      class="form-control"
                      id="product_name"
                      placeholder="American Green Apples"
                    />
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-md-3 form-control-label" for="text-input">Slug</label>
                  <div class="col-md-9">
                    <input
                      type="text"
                      v-model="product_slug"
                      class="form-control"
                      id="product_slug"
                      placeholder="american-green-apples"
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
                      v-model="product_body"
                      class="form-control"
                      id="product_body"
                      placeholder="Ingrese descripción"
                    ></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-md-3 form-control-label" for="email-input">Stock</label>
                  <div class="col-md-9">
                    <input
                      type="numeric"
                      v-model="product_stock"
                      class="form-control"
                      id="product_stock"
                      placeholder="900"
                    />
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-md-3 form-control-label" for="email-input">Presentacion</label>
                  <div class="col-md-9">
                    <input
                      type="text"
                      v-model="product_presentation"
                      class="form-control"
                      id="product_presentation"
                      placeholder="Box 5 lbs"
                    />
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-md-3 form-control-label" for="email-input">Precio venta</label>
                  <div class="col-md-9">
                    <input
                      type="numeric"
                      v-model="product_precio"
                      class="form-control"
                      id="product_precio"
                      placeholder="$900"
                    />
                  </div>
                </div>
                <div v-show="errorProduct" class="form-group row div-error">
                  <div class="text-center text-error bg-danger">
                    <div v-for="error in errorMostrarMsjProduct" :key="error" v-text="error"></div>
                  </div>
                </div>
              </form>
            </div>

            <div class="modal-footer row">
              <button
                type="button"
                v-if="tipoAccion==5"
                class="btn btn-success fas fa-save"
                @click="registrarProduct()"
              >Guardar</button>
              <button
                type="button"
                v-if="tipoAccion==6"
                class="btn btn-success fas fa-save"
                @click="actualizarProduct()"
              >Actualizar</button>
              <button
                type="button"
                class="btn btn-success fas fa-close"
                @click="cerrarModalProd()"
              >Cerrar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!--Fin del modal-->
      <!--=================DepartmentModal=====-->
      <!--Inicio del modal listardepartments agregar/actualizar-->
      <div
        v-if="modal==7"
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
              <button type="button" class="close" @click="cerrarModalDep()" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <div style="overflow-x:auto; border:solid ; min-width:80%">
                <table class="table table-bordered table-striped table-sm">
                  <thead>
                    <tr>
                      <th>Opciones</th>
                      <th>Nombre</th>
                      <th>Descripcion</th>
                      <th>Estado</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="department in arrayDepartment" :key="department.id">
                      <td>
                        <button
                          type="button"
                          @click="abrirModalDep('department','actualizar',department)"
                          class="btn btn-warning btn-sm"
                        >
                          <i class="icon-pencil"></i>
                        </button> &nbsp;
                        <!--
                               <button type="button" class="btn btn-danger btn-sm" @click="eliminarDepartment(department.id)">
                                 <i class="icon-trash"></i>
                        </button>&nbsp;-->
                        <template v-if="department.condicion">
                          <button
                            type="button"
                            class="btn btn-secondary btn-sm"
                            @click="desactivarDepartment(department.id)"
                          >
                            <i class="icon-close"></i>
                          </button>
                        </template>
                        <template v-else>
                          <button
                            type="button"
                            class="btn btn-info btn-sm"
                            @click="activarDepartment(department.id)"
                          >
                            <i class="icon-check"></i>
                          </button>
                        </template>
                      </td>
                      <td v-text="department.name"></td>
                      <td v-text="department.body"></td>
                      <td>
                        <div v-if="department.condition">
                          <span class="badge badge-success">Activo</span>
                        </div>
                        <div v-else>
                          <span class="badge badge-danger">Desactivado</span>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <nav>
                <ul class="pagination">
                  <li class="page-item" v-if="pagination.current_page > 1">
                    <a
                      class="page-link"
                      href="#"
                      @click.prevent="cambiarPagina(pagination.current_page - 1,buscar,criterio)"
                    >Ant</a>
                  </li>
                  <li
                    class="page-item"
                    v-for="page in pagesNumber"
                    :key="page"
                    :class="[page == isActived ? 'active' : '']"
                  >
                    <a
                      class="page-link"
                      href="#"
                      @click.prevent="cambiarPagina(page,buscar,criterio)"
                      v-text="page"
                    ></a>
                  </li>
                  <li class="page-item" v-if="pagination.current_page < pagination.last_page">
                    <a
                      class="page-link"
                      href="#"
                      @click.prevent="cambiarPagina(pagination.current_page + 1,buscar,criterio)"
                    >Sig</a>
                  </li>
                </ul>
              </nav>
            </div>

            <div class="modal-footer row">
              <button
                type="button"
                v-if="tipoAccion==5"
                class="btn btn-success fas fa-save"
                @click="registrarProduct()"
              >Guardar</button>
              <button
                type="button"
                v-if="tipoAccion==6"
                class="btn btn-success fas fa-save"
                @click="actualizarProduct()"
              >Actualizar</button>
              <button
                type="button"
                class="btn btn-success fas fa-close"
                @click="cerrarModalProd()"
              >Cerrar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!--Fin del modal-->
    </template>

    <template v-if="listado==4">
      <div class="card-body">
        <!--productos-->
      </div>
    </template>
    <template v-if="listado==5">
      <div class="card-body">
        <!--departamentos-->
      </div>
    </template>
    <template v-if="listado==6">
      <div class="card-body">
        <!--categorias-->
      </div>
    </template>
    <template v-if="listado==7">
      <div class="card-body">
        <!--promos-->
      </div>
    </template>
  </div>
</template>
</div>
</template>

<script>
//import InfiniteLoading from "vue-infinite-loading";
export default {
  data() {
    return {
      //Commerce data
      commerce_id: 0,
      user_id: 0,
      nombre: "",
      commerce_slug: "",
      descripcion: "",
      hora_apertura: "",
      hora_cierre: "",
      num_telefono: "",
      numero_exterior: "",
      numero_interior: "",
      calle: "",
      country: "",
      state: "",
      email: "",
      file: "",
      city: "",
      condition: 1,
      ubicacion_id: "",
      arrayCommerce: [],
      arrayLocations: [],
      //departments data
      department_id: 0,
      commerce_d: "",
      name: "",
      body: "",
      slug: "",
      condition: "",
      errorDepartment: "",
      errorMostrarMsjDepartment: [],
      modal: 0,
      tituloModal: "",
      tipoAccion: 0,
      arrayDepartment: [],
      //categories data
      arrayCategory: [],
      errorCategory: "",
      errorMostrarMsjCategory: [],
      category_id: 0,
      category_name: "",
      //product data
      product_name: "",
      product_body: "",
      errorProduct: "",
      errorMostrarMsjProduct: [],
      arrayProduct: [],
      product_id: 0,
      pagination: {
        total: 0,
        current_page: 0,
        per_page: 0,
        last_page: 0,
        from: 0,
        to: 0
      },
      changestate: {
        commerce: "",
        department: "",
        category: "",
        product: ""
      },
      offset: 3,
      criterio: "nombre",
      buscar: "",
      listado: 1
    };
  },
  computed: {
    isActived: function() {
      return this.pagination.current_page;
    },
    //Calcula los elementos de la paginación
    pagesNumber: function() {
      if (!this.pagination.to) {
        return [];
      }

      var from = this.pagination.current_page - this.offset;
      if (from < 1) {
        from = 1;
      }

      var to = from + this.offset * 2;
      if (to >= this.pagination.last_page) {
        to = this.pagination.last_page;
      }

      var pagesArray = [];
      while (from <= to) {
        pagesArray.push(from);
        from++;
      }
      return pagesArray;
    }
  },

  methods: {
    infiniteHandler($state) {
      this.page++;
      let url = "http://advancedqemv1.test/commerces?page=" + page;
      axios.get(url).then(response => {
        let commerces = response.data.data;
        if (commerces.length) {
          this.arrayCommerce = this.arrayCommerce.concat(commerces);
          $state.loaded();
        } else {
          $state.complete();
        }
      });
    },

    listar_commerces(page, buscar, criterio) {
      //const axios = require("axios");

      let me = this;
      var url =
        "/commerces?page=" +
        page +
        "&buscar=" +
        buscar +
        "&criterio=" +
        criterio;
      axios
        .get(url)
        .then(function(response) {
          var respuesta = response.data;
          me.arrayCommerce = respuesta.commerces.data;
          me.pagination = respuesta.pagination;
          //console.table(response);
        })
        .catch(function(error) {
          console.table(error);
        });
    },
    cambiarPagina(page, buscar, criterio) {
      let me = this;
      //Actualiza la página actual
      me.pagination.current_page = page;
      //Envia la petición para visualizar la data de esa página
      me.listar_commerces(page, buscar, criterio);
    },
    volverCommerces() {
      this.listado = 1;
      me.listar_commerces();
    },
    departments() {
      let me = this;
      axios
        .post("chained/department", {
          commerce_d: this.commerce_slug
        })
        .then(function(response) {
          axios.get("chained/department").then(response => {
            me.arrayDepartment = response.data;
          });
        })
        .catch(function(error) {
          console.table(error);
        });
    },
    department() {
      this.changestate.category = "";
      // set params
      const params = {
        department: this.changestate.department
      };
      // url /location/category?department=xxx
      axios
        .get("chained/category", { params })
        .then(response => {
          this.arrayCategory = response.data;
        })
        .catch(error => console.table(error));
    },
    category() {
      this.changestate.product = "";
      // set params
      const params = {
        category: this.changestate.category
      };
      axios
        .get("chained/product", { params })
        .then(response => {
          this.arrayProduct = response.data;
        })
        .catch(error => console.table(error));
    },
    abrirModalDep(modelo, accion, data = []) {
      switch (modelo) {
        case "department":
          {
            switch (accion) {
              case "registrar": {
                this.modal = 1;
                this.tipoAccion = 1;
                this.tituloModal = "Agregar departamento";
                this.department_name = "";
                this.department_slug = "";
                this.department_body = "";
                this.department_condition = "";

                break;
              }
              case "actualizar": {
                //console.log(data);
                this.department_id = data["department_id"];
                this.modal = 1;
                this.tituloModal = "Editar departamento";
                this.tipoAccion = 2;
                this.name = data["name"];
                this.department_body = data["department_body"];
                this.department_slug = data["department_slug"];
                break;
              }
            }
          }
          break;
      }
    },
    abrirModalCat(modelo, accion, data = []) {
      switch (modelo) {
        case "category":
          {
            switch (accion) {
              case "listar": {
                this.modal = 7;

                //const axios = require("axios");

                let me = this;
                var url = "/departments/listar";
                axios
                  .get(url)
                  .then(function(response) {
                    var respuesta = response.data;
                    me.arrayDepartment = respuesta.departments.data;
                    me.pagination = respuesta.pagination;
                    //console.table(response);
                  })
                  .catch(function(error) {
                    console.table(error);
                  });
                this.tipoAccion = 3;
                break;
              }
              case "registrar": {
                this.modal = 2;
                this.tituloModal = "Agregar categoria ";
                this.department_id = 0;
                this.category_name = "";
                this.category_slug = "";
                this.category_body = "";
                this.category_condition = "";
                this.tipoAccion = 3;
                break;
              }
              case "actualizar": {
                //console.log(data);
                this.department_id = data["department_id"];
                this.modal = 2;
                this.tituloModal = "Editar categoria ";
                this.tipoAccion = 4;
                this.category_name = data["category_name"];
                this.category_body = data["category_body"];
                this.category_slug = data["category_slug"];
                break;
              }
            }
          }
          break;
      }
    },
    abrirModalProd(modelo, accion, data = []) {
      switch (modelo) {
        case "product":
          {
            switch (accion) {
              case "registrar": {
                this.modal = 3;
                this.department_id = 0;
                this.category_id = 0;
                this.tituloModal = "Agregar producto";
                this.product_name = "";
                this.product_slug = "";
                this.product_body = "";
                this.product_condition = "";
                this.tipoAccion = 5;
                break;
              }
              case "actualizar": {
                this.category_id = data["category_id"];
                this.department_id = data["department_id"];
                this.product_id = data["product_id"];
                this.modal = 3;
                this.tituloModal = "Editar producto";
                this.tipoAccion = 6;
                this.name = data["name"];
                this.product_body = data["product_body"];
                this.product_slug = data["product_slug"];
                break;
              }
              case "eliminar": {
                break;
              }
            }
          }
          break;
      }
    },
    abrirModal(modelo, accion, data = []) {
      //this.selectCommerceRole();
      switch (modelo) {
        case "commerce":
          {
            switch (accion) {
              case "ver": {
                //console.log(data);
                this.listado = 0;
                this.changestate.department = data["commerce_id"];
                this.commerce_id = data["commerce_id"];
                //this.tituloModal = "Actualizar comercio";
                //this.tipoAccion = 2;
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
                let me = this;
                me.departments();
                break;
              }
            }
          }
          break;
      }
    },

    registrarDepartment() {
      if (this.validarDepartment()) {
        return;
      }
      let me = this;
      axios
        .post("/department/store", {
          commerce_id: this.commerce_id,
          name: this.department_name,
          body: this.department_body,
          slug: this.department_slug,
          condition: 1
        })
        .then(function(response) {
          me.cerrarModalDep();
        })
        .catch(function(error) {
          console.table(error);
        });
    },
    actualizarDepartment() {
      if (this.validarDepartment()) {
        return;
      }

      let me = this;

      axios
        .put("/department/update", {
          name: this.department_name,
          body: this.department_body,
          slug: this.department_slug,
          condition: 1,
          department_id: this.department_id
        })
        .then(function(response) {
          me.cerrarModalDep();
        })
        .catch(function(error) {
          console.table(error);
        });
    },
    registrarCategory() {
      if (this.validarCategory()) {
        return;
      }
      let me = this;
      axios
        .post("/category/store", {
          department_id: this.changestate.department,
          name: this.category_name,
          body: this.category_body,
          slug: this.category_slug,
          condition: 1
        })
        .then(function(response) {
          me.cerrarModalCat();
        })
        .catch(function(error) {
          console.table(error);
        });
    },
    actualizarCategory() {
      if (this.validarCategory()) {
        return;
      }

      let me = this;

      axios
        .put("/category/update", {
          department_id: this.changestate.department,
          name: this.category_name,
          body: this.category_body,
          slug: this.category_slug,
          condition: 1,
          category_id: this.category_id
        })
        .then(function(response) {
          me.cerrarModalCat();
        })
        .catch(function(error) {
          console.table(error);
        });
    },
    registrarProduct() {
      if (this.validarProduct()) {
        return;
      }
      let me = this;
      axios
        .post("/product/store", {
          category_id: this.changestate.category,
          name: this.product_name,
          descripcion: this.product_body,
          stock: this.product_stock,
          codigo: this.product_codigo,
          file: this.product_file,
          presentacion: this.product_presentacion,
          precio_venta: this.precio_venta,
          slug: this.product_slug,
          condition: 1
        })
        .then(function(response) {
          me.cerrarModalProd();
        })
        .catch(function(error) {
          console.table(error);
        });
    },
    actualizarProduct() {
      if (this.validarProduct()) {
        return;
      }

      let me = this;

      axios
        .put("/product/update", {
          category_id: this.changestate.category,
          name: this.product_name,
          body: this.product_body,
          slug: this.product_slug,
          condition: 1,
          product_id: this.product_id
        })
        .then(function(response) {
          me.cerrarModalProd();
        })
        .catch(function(error) {
          console.table(error);
        });
    },
    cerrarModalDep() {
      this.modal = 0;
      this.department_name = "";
      this.department_slug = "";
      this.department_body = "";
      this.department_condition = "";
    },
    cerrarModalCat() {
      this.modal = 0;
      this.category_departmentid = "";
      this.category_name = "";
      this.category_slug = "";
      this.category_body = "";
      this.category_condition = "";
    },
    cerrarModalProd() {
      this.modal = 0;
      this.product_categoryid = "";
      this.product_name = "";
      this.product_slug = "";
      this.product_body = "";
      this.product_stock = "";
      this.product_presentation = "";
      this.product_precio = "";
      this.product_condition = "";
    },
    validarDepartment() {
      this.errorDepartment = 0;
      this.errorMostrarMsjDepartment = [];

      if (!this.department_name)
        this.errorMostrarMsjDepartment.push(
          "El campo nombre no puede estar vacío."
        );
      if (!this.department_body)
        this.errorMostrarMsjDepartment.push("Agregue una breve descripcion !");
      if (this.errorMostrarMsjDepartment.length) this.errorDepartment = 1;

      return this.errorDepartment;
    },
    validarCategory() {
      this.errorCategory = 0;
      this.errorMostrarMsjCategory = [];

      if (!this.category_name)
        this.errorMostrarMsjCategory.push(
          "El campo nombre no puede estar vacío."
        );
      if (!this.changestate.department)
        this.errorMostrarMsjCategory.push("Seleccione un departamento.");
      if (!this.category_body)
        this.errorMostrarMsjCategory.push("Agregue una breve descripcion !");
      if (this.errorMostrarMsjCategory.length) this.errorCategory = 1;

      return this.errorCategory;
    },
    validarProduct() {
      this.errorProduct = 0;
      this.errorMostrarMsjProduct = [];
      if (!this.changestate.department)
        this.errorMostrarMsjCategory.push("Seleccione un departamento.");
      if (!this.changestate.category)
        this.errorMostrarMsjCategory.push("Seleccione una categoria.");
      if (!this.product_name)
        this.errorMostrarMsjProduct.push(
          "El campo nombre no puede estar vacío."
        );

      if (!this.product_body)
        this.errorMostrarMsjProduct.push("Agregue una breve descripcion !");
      if (this.errorMostrarMsjProduct.length) this.errorProduct = 1;

      return this.errorProduct;
    }
  },

  mounted() {
    this.listar_commerces(1, this.buscar, this.criterio);
  }
};
</script>