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
              <p> {{ list.name}} </p>
          </div>

          <div class="form-group">
            <label for="recipient-name" class="control-label"> Phone </label>
            <p> {{ list.phone}} </p>
          </div>

          <div class="form-group">
            <label for="recipient-name" class="control-label"> Email </label>
            <p> {{ list.email}} </p>
          </div>
            </slot>
          </div>

          <div class="modal-footer">
            <slot name="footer">      


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


		}

		}

</script>