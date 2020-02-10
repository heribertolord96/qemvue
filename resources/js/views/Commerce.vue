<template>
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
<script>
export default {
  props: ["commerce_slug"],
  data() {
    return {
   commerce:{}
    };
  },
  created () {
        	 let me = this;
      var url = 'commerce/'+this.slug
        	axios.get(url)
        	.then(response => {
        		this.commerce = response.data
          })
           .catch(function(error) {
          console.table(error);
        });
        }
};
</script>
<style>
input.hidden {
  display: none;
}
</style>