
<template>

<table class="table table-bordered table-striped table-sm" v-max-height="100">
                    
                     <tbody class="card-success" v-for="commerce in arrayCommerce" :key="commerce.id">
                          
                        <tr   >
                            
                           <td v-text="commerce.nombre" ></td>                                               
                           <td> 
                              <div v-if="commerce.condition">
                                 <span class="badge badge-success">A</span>
                              </div>
                              <div v-else>
                                 <span class="badge badge-danger">D</span>
                              </div>
                           </td> 
                           
                           
                       
                        </tr>
                       <tr>
                         <td>
                            <!--span class="badge badge-success" v-text="commerces.role"></span-->
                         </td>
                           <td class="form-group">
                  <!--label>Select</label-->
                  <select class="form-control">
                      <option><i class="nav-icon fas fa-eye-alt"></i>ver</option>
                    <option>Editar                        
                    </option>
                    <option><i class="nav-icon fas fa-trash-alt"></i>Eliminar</option>
                    <option><i class="nav-icon fas fa-users-alt"></i>Invitar usuario</option>
                    
                  </select>
                </td>
                       </tr>
                     </tbody>
                  </table>
            
               
        
</template>

<script>
    export default {
        data() {
            return {
                 //isOpen: false,//DROPDOWN

                commerce_id:0,
                user_id:0,
                id:0,
                nombre: '',
                slug:'',
                descripcion:'',
                hora_apertura: '',
                hora_cierre:'',
                num_telefono: '',
                email:'',
                file:'',
                condition: 1,
                ubicacion_id: '',
                role:'',
                arrayCommerce:[]
                }
            
        },
        methods:  {
             my_commerces(){
                 const axios = require('axios');
               let me=this;
               var url=  '/admin/my_commerces';
               axios.get(url).then(function (response) {
                   var respuesta= response.data;
                   me.arrayCommerce = respuesta;
                  //console.log(response);
               })
               .catch(function (error) {
                  console.table(error);
               });
             },
            infiniteHandler($state) {
                this.page++
                let url = 'commerces?page='+this.page
                axios.get(url)
                .then(response => {
                    let arrayCommerce = response.data.data
                    if(this.arrayCommerce.length){
                        this.arrayCommerce = this.arrayCommerce.concat(arrayCommerce)
                        $state.loaded()
                    }else{
                        $state.complete()
                    }
                })
                .catch(function (error) {
                  console.table(error);
               });
            },
            //DROPDOWN METHODS
            toggleDropDown () {
        this.isOpen = !this.isOpen
        this.$emit('change', this.isOpen)
      },
      closeDropDown () {
        this.isOpen = false
        this.$emit('change', this.isOpen)
      }
        },
         mounted() {
            this.my_commerces();
        }
        }
    
        
</script>