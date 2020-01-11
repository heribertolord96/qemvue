<template>
    <div class="card card-success">
    <div class="panel panel-default-success">
        <div class="card-header with-border ">
            <h3 class="card-title">Articulos</h3>
        </div>
    </div>
    <div class="card-body row-md-12">
            <div class="card mb-3 mt-3" v-for="product in arrayProduct" :key="product.id">
                <a class="card_header" v-bind:href="item.slug" v-text="item.name"></a>
                <router-link class="card-header" :to="{name: 'post', params: {slug: item.slug}}" v-text="item.title"></router-link>

                 <div class="card card-default col-md-3  float-left">
            <div class="card-header with-border ">
                <div class="card-tools pull-right">
                 left-tools
                </div>
            </div>
             <br>
                <h3 class="card-title" v-text="product.name"></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <img style="max-width:300px, max-height:200px" class="d-block w-100" v-src="product.pfile" height="100" width="100" alt="src-file">
            </div>
            -- <!-- /.card-body -->
            <div class="card-footer no-padding">
                <tr>
                    <p><b>Descripción: </b></p>
                    <p v-text="product.pdescripcion"></p>
                </tr>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td><b>Precio:</b></td>
                            <td v-text="product.precio_venta"></td>
                        </tr>
                        <tr>
                            <td><b>Presentacion</b></td>
                            <td v-text="product.ppresentacion"></td>
                        </tr>
                        <tr>
                            <td><b>De venta en: </b></td>
                            <td v-text="ptoduct.cname">
                                
                                <a v-bind:href="product.slug" class="">
                                       <p v-text="product.cnombre"></p>
                                      </a></td>
                        </tr>
                    </tbody>
                </table>

            </div>
            <!-- /.footer -->
            </div>
            <infinite-loading @distance="1" @infinite="infiniteHandler">
                <div slot="no-more">--</div>
                <div slot="spinner">Cargando...</div>
                <div slot="no-results">Sin resultados</div>
            </infinite-loading>
        
    </div>
    </div>
</template>

<script>
    export default {
        props : ['ruta'],   
        data() {
            return {
                product_id: 0,
                pslug:  '',
                slug: '',
                pname: '',
                pcode: '',
                pdescripcion: '',
                stock: '',
                 pfile: '',
                presentacion: '',
                precio_venta: '',
                category_id: 0,
                condition: '',
                //paginate method{},
                criterio: 'name',
                buscar: '',
                arrayProduct : [],
                arrayCategory: []


            }
            
        },
        methods:  {
             listarProductos (page,buscar,criterio){
                let me=this;
                var url='/products?page=' + page;
                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    me.arrayProduct = respuesta.products.data;
                    me.pagination= respuesta.pagination;
                })
                .catch(function (error) {
                    console.log(error);
                });
             },
            infiniteHandler($state) {
                this.page++
                let url = 'products?page='+this.page
                axios.get(url)
                .then(response => {
                    let arrayProduct = response.data.data
                    if(this.arrayProduct.length){
                        this.arrayProduct = this.arrayProduct.concat(arrayProduct)
                        $state.loaded()
                    }else{
                        $state.complete()
                    }
                })
                .catch(function (error) {
                  console.table(error);
               });
            }
        },
         mounted() {
            this.listarProductos(1,this.buscar,this.criterio);
        }
        }
    
        
</script>