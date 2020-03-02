<script>

$(document).ready(function(){
	$('body').removeAttr("style");
});

</script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/v4-shims.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/v4-shims.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <style>
.header-main{
		background-color:blue !important;"
}
#footer6-a{
 position: fixed;
    height: 50px;
    background-color: black;
    bottom: 0px;
    left: 0px;
    right: 0px;
    margin-bottom: 0px;
		
}

.hide_btn {display:none;}
</style>
<br>
<br>
<br>
<br>
<br>
<div class="task-manager-div col-md-12 row" style="">
		<div class="col-md-4 col-lg-4">
			<div class="panel panel-default panel-warning">
				<div class="panel-heading">Pending Task</div>
				<div class="panel-body">
				<div class="col-md-12">
					<textarea  class="form-control" id="task" name="task"  rows="2"></textarea>
					<button class="btn btn-primary pull-right add_task">Add</button>
					<button class="btn btn-primary pull-right update_task hide_btn" >Update</button>
					<br>
					<br>
					 <hr>
				
				
				
				<ul class="list-group pending-task-list">
				<?php foreach($pending_tasks as $task){   ?>
					<li class="list-group-item draggable" data-task_list_id="<?php echo $task['id']; ?>"><?php echo $task['title']; ?> <div class="pull-right"><span class="edit_task glyphicon glyphicon-edit" data-task-id="<?php echo $task['id']; ?>" data-task="<?php echo $task['title']; ?>"></span>&nbsp;<span class="delete_task glyphicon glyphicon-trash" data-delete_task_id="<?php echo $task['id']; ?>"></span></div></li>
					<br>
				<?php }?>
				  
				</ul>
				</div>
				</div>
			  </div>
		</div>
		<div class="col-md-4 col-lg-4">
			<div class="panel panel-default panel-primary">
				<div class="panel-heading">In Progress Task</div>
				<div class="panel-body">Panel Content</div>
			  </div>
		</div>
		<div class="col-md-4 col-lg-4">
			<div class="panel panel-default panel-success">
				<div class="panel-heading">Completed Task</div>
				<div class="panel-body">Panel Content</div>
			  </div>
		</div>
</div>

<script>

$(document).ready(function(){
	$(document).on('click','.add_task',function(){
		var task = $('#task').val();
		$('.text_error').remove();
		if(task.length<=0){
			$('#task').after('<p class="text_error" style="color:red;">Task field can not add Empty!!.</p>');
			return false;
		}
		$.ajax({
			url:'<?php echo site_url('task_manager/add_task'); ?>',
			data:{task:task,status:'pending'},
			type:'post',
			 dataType:'json', 
			success:function(response){
				var added_task_html = '<li class="list-group-item">'+response.title+' <div class="pull-right"><span class="edit_task glyphicon glyphicon-edit" data-task-id="'+response.task_id+'" data-task="'+response.title+'" ></span>&nbsp;<span class="delete_task glyphicon glyphicon-trash" data-task-id="'+response.task_id+'"></span></div></li><br>';
					$('.pending-task-list').append(added_task_html);
					$('#task').val('');
			}
		})
	});
	$(document).on('click','.edit_task',function(){
		var task_id = $(this).data('task-id');
		var task  = $(this).data('task');
		$('#task').val(task);
		$('.add_task').addClass('hide_btn');
		$('.update_task').removeClass('hide_btn');
		$('.update_task').attr('data-update_task_id',task_id);
	});
	$(document).on('click','.update_task',function(){
		var task = $('#task').val();
		var update_task_id = $('.update_task').attr('data-update_task_id');
		$('.text_error').remove();
		if(task.length<=0){
			$('#task').after('<p class="text_error" style="color:red;">Task field can not add Empty!!.</p>');
			return false;
		}
		$.ajax({
			url:'<?php echo site_url('task_manager/update_task'); ?>',
			data:{task:task,task_id:update_task_id,status:'pending'},
			type:'post',
			 dataType:'json', 
			success:function(response){
				var updated_task_html = response.title+'<div class="pull-right"><span class="edit_task glyphicon glyphicon-edit" data-task_id="'+response.task_id+'" data-task="'+response.title+'"></span>&nbsp;<span class="delete_task glyphicon glyphicon-trash" data-task_id="'+response.task_id+'"></span></div>';
					$("[data-task_list_id='"+response.task_id+"']").html(updated_task_html);
					$('#task').val('');
					$('.add_task').removeClass('hide_btn');
					$('.update_task').addClass('hide_btn');
					$('.update_task').removeAttr('data-update_task_id');
			}
		})
	});
	$(document).on('click','.delete_task',function(){
		var task = $('#task').val();
		 var delete_task_id = $(this).data('delete_task_id');
		$('.text_error').remove();
		$.ajax({
			url:'<?php echo site_url('task_manager/delete_task'); ?>',
			data:{delete_task_id:delete_task_id},
			type:'post',
			 dataType:'json', 
			success:function(response){
				$("[data-task_list_id='"+response.delete_task_id+"']").remove(); 
			}
		})
	});
	
	
});




</script>