<template>

	<div class="modal fade" id="editModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" style="font-weight:bold;">Edit Record</h4>
				</div>
				<div class="modal-body">
					<label for="name">Edit Item</label>
					<p class="alert alert-success" v-if="success.length > 0">{{ success }}</p>
					<textarea name="name" id="name" class="form-control" v-model="rec.name"></textarea>
					<ul v-if="error.name" class="list-unstyled">
						<li v-for="err of error.name" class="alert alert-danger">{{ err }</li>
					</ul>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" @click="clearModal" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-success" @click="updateRecord">Update Item</button>
				</div>
			</div>
		</div>
	</div>

</template>

<script type="text/javascript">
	export default{
		props:['rec'], //for edit
		data(){
			return{
			 success:'',
			 error:[],
            
			}
		},
		methods:{
		 updateRecord(){
          	axios.post("http://127.0.0.1:8000/tasks/"+this.rec.id,{
          		'name': this.rec.name,
          		'_method': 'PUT'
          	})
          	.then(data => {
          		this.$emit('recordUpdated',data);
          		this.success="Task updated successfully";
          		
          	})
          	/*.catch(error => this.error = error.response.data.errors)
          	 this.record=''; //For doing form value empty after submit*/
          },
          clearModal(){
          	this.error=[];
          	this.success='';
          }
		},
		created(){

		}
	}
</script>
<style type="text/css" scoped></style>