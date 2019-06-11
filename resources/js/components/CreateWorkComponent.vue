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
      	<form>
	        <div class="form-group">
			    <label>Work</label>
			    <input type="text" class="form-control" placeholder="Type the work title">
		  	</div>
		  	<div class="form-group">
			    <label>Picture</label>
			    <input type="text" class="form-control" placeholder="Add the url of an image" >
		  	</div>
		  	<button type="submit" class="btn btn-primary">Create</button>
	  	</form>
      </div>
    </div>
  </div>
</div>
</template>


<script>
export default {

}
</script>

<style>

</style>
