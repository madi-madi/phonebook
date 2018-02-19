<template>

<div>
<div class="panel panel-info">
  <!-- Default panel contents -->
  <div class="panel-heading">Vuejs Phonebook
<button type="button" class="btn btn-success" @click="openAdd">Add New</button>
<span class="pull-right" v-if="loading"><i class="fa fa-cog fa-spin fa-2x fa-fw"></i>
<span class="sr-only">Loading...</span></span>
  </div>
  <br>
    <div class="col-lg-12">
    <div class="input-group">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">Go!</button>
      </span>
      <input type="text" class="form-control" placeholder="Search for..." v-model="searchQuery">
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
  <!-- Table -->
<table class="table" > 
<thead>
 <tr> 
 <th>#</th> 
 <th>Item</th>
  <th>Delete</th>
   <th>Edit</th>
   <th>View</th> 
   </tr>
    </thead>
     <tbody v-for="item,key in temp">
      <tr>
       <th scope="row">{{key+1}}</th>
        <td>{{item.name}}</td>
         <td> <i class="fa fa-trash fa-lg alert alert-danger" aria-hidden="true" @click="del(key,item.id)"></i></td>
          <td> <i class="fa fa-edit fa-lg alert alert-success" aria-hidden="true" @click="openUpdate(key)"></i></td>
           <td> <i class="fa fa-eye fa-lg alert alert-info" aria-hidden="true" @click="openShow(key)"></i></td>
           </tr> 
             </tbody>
              </table>
</div>

<Add :openModal="showModal" @closeModal="close">

    <h3 slot="header" class="alert alert-success">custom Modal
              <span class="pull-right" v-if="loading"><i class="fa fa-cog fa-spin fa-1x fa-fw"></i>
<span class="sr-only">Loading...</span></span>
    </h3>
</Add>
<Show :openModal="showView" @closeModal="close"> </Show>
<Update :openModal="showUpdate" @closeModal="close"> </Update>

</div>

</template>


<script>

let Add = require('./Add.vue');
let Show = require('./Show.vue');
let Update = require('./Update.vue');
    export default {
    	components:{Add,Show,Update},
      data(){

        return{

          lists:{},
          temp:"",
          errors:{},
          showModal: false,
          showView:false,
          showUpdate:false,
          loading:false,
          searchQuery:''
          
        }
      },


      watch:{

        searchQuery(){

          //console.log(this.searchQuery)
          if(this.searchQuery.length > 0){

          this.temp = this.lists.filter((item)=>{


            return item.name.toLowerCase().indexOf(this.searchQuery.toLowerCase())>-1

          });

        }else{

              this.temp = this.lists

        }


      }

},
      methods:{

        openAdd(){

            this.showModal=true

        },
        openShow(key){

            this.$children[1].list=this.lists[key] // children Show = 1
            this.showView=true

        },

        openUpdate(key){

          this.$children[2].list= this.lists[key] // children Update = 2 
          this.showUpdate = true

        },

        del(key ,id){

          this.loading = !this.loading

         // console.log(`${key}`, `${id}`)
         if(confirm("Are You sure !!!")){}
         axios.delete(`/phonebook/${id}`).then((response)=>{

            this.lists.splice(key,1);
            this.loading = !this.loading;

         })
        .catch((error) => this.errors = error.response.data.errors)
        },
        close(){

          this.showModal = this.showView = this.showUpdate = false
        },

        showLoading(){


          this.loading= true
        }

      },

      mounted(){

                  axios.post('/getData').then((response)=>this.lists = this.temp = response.data)
                .catch((error) => this.errors = error.response.data.errors)
               
      }
    }
</script>