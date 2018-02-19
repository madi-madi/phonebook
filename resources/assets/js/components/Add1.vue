<template>

<div class="modal " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header alert-success">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title " id="exampleModalLabel">Add New </h4>
      </div>
      <div class="modal-body">
 
          <div class="form-group">
            <label for="recipient-name" class="control-label"> Name</label>
            <input type="text" class="form-control" :class="{'input-danger':errors.name}" id="recipient-name" placeholder="Naame Example :Fprsan " v-model="list.name">
            <small v-if="errors.name" class="text-danger">{{errors.name[0]}}</small>
          </div>

          <div class="form-group">
            <label for="recipient-name" class="control-label"> Phone </label>
            <input type="number" class="form-control" :class="{'input-danger':errors.phone}" id="recipient-name" placeholder="Phone Example : +970597866994 " v-model="list.phone">
            <small v-if="errors.phone" class="text-danger">{{errors.phone[0]}}</small>
          </div>

          <div class="form-group">
            <label for="recipient-name" class="control-label"> Email </label>
            <input type="email" class="form-control" :class="{'input-danger':errors.email}" id="recipient-name" placeholder="Email Example :ibrahim@forsan.com " v-model="list.email">
            <small v-if="errors.email" class="text-danger">{{errors.email[0]}}</small>
          </div>
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary"  @click="save" data-dismiss="isActive" > Add </button>
      </div>
    </div>
  </div>
</div>
</template>

<script>
    export default {

        data(){

          return{

            list:{

            name:'',
            phone:'',
            email:''
            },
          errors:{},
          isActive:''
          }



        },
        methods: {

            close(){

             // this.$emit('closeRequest')
             this.isActive='model'
            },
            save(){
          axios.post('/phonebook',this.$data.list).then((response)=>console.log(response))
                .catch((error) => this.errors = error.response.data.errors)
                this.data=''
 


            }
        }
    }
</script>