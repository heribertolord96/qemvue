<template>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3 mt-3" v-for="product in arrayProduct" :key="product.id">
                <a class="card_header" v-bind:href="item.slug" v-text="item.name"></a>
                <router-link class="card-header" :to="{name: 'post', params: {slug: item.slug}}" v-text="item.title"></router-link>

                <div class="card-body">
                    <p class="card-text" v-text="item.body"></p>
                </div>
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
        data() {
            return {
                
                product_id:0,
                slug:'',
                name:'',
                codigo:'',
                descripcion:'',
                stock:'',
                file:'',
                presentacion:'',
                precio_venta:'',
                category_id:0,
                condition:'',
                //paginate method{},
                criterio:'name',
                buscar:'',
                arrayProduct :[],
                arrayCategory:[]


            }
            
        },
        methods: {
            infiniteHandler($state) {
                this.page++
                let url = 'http://advancedqemv1.test/products?page='+this.page
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
        }
    }
</script>