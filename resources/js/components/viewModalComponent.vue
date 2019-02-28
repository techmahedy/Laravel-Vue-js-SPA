<template>

	<div class="modal fade" id="viewModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" style="font-weight:bold;">Show Record</h4>
				</div>
				<div class="modal-body">
					<label for="name">Show Item</label>
				
					<p name="name" id="name" class="form-control" v-model="rec.name"></p>
				
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default"  data-dismiss="modal">Close</button>
					
				</div>
			</div>
		</div>
	</div>

</template>

<script type="text/javascript">
	export default{
		props:['rec'], //for view
		
	}
</script>
<style type="text/css" scoped></style>