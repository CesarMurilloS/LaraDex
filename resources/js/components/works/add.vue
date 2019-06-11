<template>
<div class="modal fade" id="addWork" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Work</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form @submit.prevent="saveWork">
	        <div class="form-group">
			    <label>Work</label>
			    <input type="text" class="form-control" placeholder="Type the work name" v-model="name">
		  	</div>
		  	<div class="form-group">
			    <label>Picture</label>
			    <input type="text" class="form-control" placeholder="Add the url of an image" v-model="picture">
		  	</div>
		  	<button type="submit" class="btn btn-primary">Create</button>
	  	</form>
      </div>
    </div>
  </div>
</div>
</template>


<script>
import EventBus from '../../event-bus';
export default {
    data(){
        return {
            name: null,
            picture: null
        }
    },
    methods: {
        saveWork: function(){
            axios.post('http://127.0.0.1:8000/works', {
                name: this.name,
                picture: this.picture
            })
            .then(function(res){
                console.log(res)
                $('#addWork').modal('hide')
                EventBus.$emit('work-added', res.data.work)
                console.log(res.data.work)//The response res brings a key work in its data attribute
            })
            .catch(function(err){
                console.log(err)
            });
            //console.log(this.name)
            //console.log(this.picture)
        }
    }
}
</script>

<style>

</style>
