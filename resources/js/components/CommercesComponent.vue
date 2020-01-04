<template>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3 mt-3" v-for="item in list">
                <a class="card_header" v-bind:href="item.slug" v-text="item.nombre"></a>
                <router-link class="card-header" :to="{nombre: 'post', params: {slug: item.slug}}" v-text="item.nombre"></router-link>

                <div class="card-body">
                    <p class="card-text" v-text="item.descripcion"></p>
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
                list: [],
                page: 0
            }
        },
        methods: {
            infiniteHandler($state) {
                this.page++
                let url = 'http://advancedqemv1.test/commerces?page='+this.page
                axios.get(url)
                .then(response => {
                    let commerces = response.data.data
                    if(commerces.length){
                        this.list = this.list.concat(commerces)
                        $state.loaded()
                    }else{
                        $state.complete()
                    }
                })
            }
        }
    }
</script>