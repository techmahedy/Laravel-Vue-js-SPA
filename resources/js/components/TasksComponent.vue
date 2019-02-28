<template>
	  <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

					<div class="panel panel-primary">
					  <div class="panel-heading">
					    <h3 class="panel-title">Todo List<span style="float:right"><a class="btn btn-primary" data-toggle="modal" href='#addModal'>Add Task</a></span></h3>
					  </div>

					  <div class="panel-body">
					  	<!--Ekhane .data with tasks for pagination -->
					    <ul class="list-gorup" v-for="task in tasks.data">
                        	<li class="list-group-item">{{ task.name }}
                              <span style="float:right"><a class="btn btn-success btn-xs" data-toggle="modal" href="#viewModal">View</a> | <a class="btn btn-info btn-xs" @click="getRecord(task.id)" data-toggle="modal" href="#editModal">Edit</a>| <button class="btn btn-danger btn-xs">Delete</button></span>
                        	</li>
                        </ul>

                  <pagination :data="tasks" @pagination-change-page="getResults"></pagination>

					  </div>
					</div>

                </div>
            </div>
        </div>

        <div id="modal">
        	<addtask @recordadded="refreshRecord"> </addtask>
        	<edittask :rec="editRec" @recordUpdated="refreshRecord"></edittask>
        </div>
    </div>
</template>

<script type="text/javascript">

import addModalComponent from './addModalComponent.vue';
Vue.component('addtask', addModalComponent);

import editModalComponent from './editModalComponent.vue';
Vue.component('edittask', editModalComponent);

Vue.component('pagination', require('laravel-vue-pagination'));

	export default{
		data(){
			return{
              tasks:{},
              records:{},
              editRec:{},
              errors:[],
			}
		},
		methods:{
            getResults(page) {
            	if (typeof page === 'undefined') {
                     page = 1;
            	}
			    axios.get('http://127.0.0.1:8000/tasks?page=' + page)
				.then(response => {
				this.tasks = response.data;
				});
		  },
		    refreshRecord(record){
            this.tasks = record.data;
		  },
		  getRecord(id){
		  	axios.get('http://127.0.0.1:8000/tasks/'+id+'/edit')
			.then((response) => this.editRec = response.data)
			//.catch(error => this.errors = error.response.data.errors);
		  }
		 },
		   created(){

			axios.get('http://127.0.0.1:8000/tasks')
			.then((response) => this.tasks = response.data)
			.catch((error) => console.log(error));

            this.getResults();
            console.log('Todo component loaded');
		}
	}
</script>
<style type="text/css" scoped> </style>