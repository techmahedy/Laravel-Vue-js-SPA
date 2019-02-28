<template>

	<div class="modal fade" id="addModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" style="font-weight:bold;">Add New Record</h4>
				</div>
				<div class="modal-body">
					<label for="name">Add New Item</label>
					<p class="alert alert-success" v-if="success.length > 0">{{ success }}</p>
					<textarea name="name" id="name" class="form-control" v-model="record"></textarea>
					<ul v-if="error.name" class="list-unstyled">
						<li v-for="err of error.name" class="alert alert-danger">{{ err }</li>
					</ul>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" @click="clearModal" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-success" @click="addRecord">Add Item</button>
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
             record:'',
			}
		},
		methods:{
         addRecord(){
          	axios.post("127.0.0.1:8000/tasks",{
          		'name': this.record,
          	})
          	.then(data => {
          		this.$emit('recordadded',data);
          		this.success="Task added successfully";
          		this.record='';
          	})
          	/*
          	.catch(error => this.error = error.response.data.errors)
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