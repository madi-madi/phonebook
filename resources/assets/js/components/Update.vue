<template>
<transition name="modal" v-if="openModal">
    <div class="modal-mask">
      <div class="modal-wrapper">
        <div class="modal-container col-md-4 col-md-offset-2">

          <div class="modal-header">
            <slot name="header">
              <h3  class="alert alert-success">default header {{list.name}}'s Details</span></h3>

            </slot>
          </div>

          <div class="modal-body">
            <slot name="body">

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
            </slot>
          </div>

          <div class="modal-footer">
            <slot name="footer">      

              <button class="modal-default-button btn btn-success" @click="update" >
                Update
              </button>
              <button class="modal-default-button btn btn-danger" @click="close">
                Cancle
              </button>
            </slot>
          </div>
        </div>
      </div>
    </div>
  </transition>


</template>


<script>

		export default{

		props:['openModal'],

        data(){

          return{

            list:{},
          errors:{},
          
          }
        },
	

		methods:{

        close(){

         this.$emit('closeModal')
        },

            update(){
          axios.patch(`/phonebook/${this.list.id}`,this.$data.list).then((response)=>this.close())
                .catch((error) => this.errors = error.response.data.errors)
                
 


            }

		}

		}

</script>