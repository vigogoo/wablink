
<head>
 
 
  
  <script type="text/javascript" src="whizzywig.js"></script>
</head>
<body onload="whizzywig()">
<h1 style="text-align: center">Add new <?php echo str_replace("_", " ", $category); ?></h1>
<div class="col-md-6 col-md-offset-3" style="text-align:center">
<form action="" method="post">
<h1 style="color:red"><?php
if(isset($_REQUEST['title'],$_REQUEST['comment'],$_REQUEST['video_id'])){
	$title=$user->clean_data($_REQUEST['title']);
	$video_id=$user->clean_data($_REQUEST['video_id']);
	$comment=$_REQUEST['comment'];
	$time=time();
	if($title && $comment && $video_id){
    $sql3="INSERT INTO photo set title='$title',comment='$comment',update_time='$time',video_id='$video_id', category='$category'";
    $conn = $user->database_connect();
    $results = $conn->query($sql3);
    


		
		echo "Content added successfuly";
		}
}

?></h1>

<p>Title:<br/><input type="text" class="form-control" name="title" value="<?php echo isset($_POST['title'])?$_POST['title']:'';  ?>"></p>
<?php if($category!=" "){ ?>
<p>Description:<br/><textarea style="width:100%; height:150px" class="form-control" type="text" name="comment" cols="50" rows="10"><?php echo isset($_POST['comment'])?$_POST['comment']:'';  ?></textarea></p>
<?php }else{ ?>
<p>Comment:<br/><input class="form-control" type="text" name="comment" maxlength="100" value="<?php echo isset($_POST['comment'])?$_POST['comment']:'';  ?>"></p>
<?php }?>
<?php if($category=="projects" || $category=="works" || $category=="ways_to_give" ){ ?>
<p title="More Info">Title<br/><input class="form-control" type="text" name="video_id" maxlength="100" value="<?php echo isset($_POST['video_id'])?$_POST['video_id']:'';  ?>"></p>
<?php }else{ ?>
<p><input type="hidden" name="video_id" value="<?php echo isset($_POST['video_id'])?$_POST['video_id']:'none';  ?>"></p>
<?php }?>


<p><input type="submit" style="font-size:large; background-color:red; padding:10px; color:#FFF; border:1px solid #CCC" value="Save Item" /></p>
</form>
</div>


</body>