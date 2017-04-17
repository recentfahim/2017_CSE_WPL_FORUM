<?php
//session_start();
include_once 'blade/view.searchDiscussion.blade.php';
include_once '/../../common/class.common.php';
include_once 'header.php';

$Discussion1 = $Discussion; 

?>

<?php
/*if($_SERVER['REQUEST_METHOD'] == 'POST')
{

}*/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>searchDiscussion CRUD Operations</title>
		<link rel="stylesheet" href="style.css" type="text/css" />
	</head>

<body bgcolor=" #33FFDA">
	<center>

	<div id="header">
		<label>By : Kazi Masudul Alam</a></label>
		<form action="" method="post">
		<table width="100%" border="1" cellpadding="15" bgcolor="#4EAFAF">	
			<tr>
					<td><label>Search</label></td>
					<td><input type="text" name="txtSearch" placeholder="Search Tag"</td>
			
				<button type="submit" name="search">Search</button>
			</tr>

	</table>
	</form>
	<table width="100%" border="1" cellpadding="15" bgcolor="#4EAFAF">	
		
	</div>


	<div id="form">
		<form method="post">
			<?php
				$tag = null;
				
				if(isset($_GET["tag"]))
				{
					$tag = $_GET["tag"];
				}
			?>
			<?php
			//var_dump($tag);
			if(!isset($tag)){
			//if(!$_GET["tag"]){
				$id = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
				$Catagory2 = substr($id, -38);
				?>
	<div>			
		<table width="100%" border="1" cellpadding="15" bgcolor="#4EAFAF">		
	
	<?php
		$Result2 = $_searchDiscussionBAO->readCategorywiseDiscussion($Catagory2);
			    	if($Result2->getIsSuccess()){

								$DiscussionList = $Result2->getResultObject();
							?> 
								<tr>
									<td>Questions</td>
									<td>Category</td>
									<td>Tags</td>
								</tr>
								<?php
								for($i = 0; $i < sizeof($DiscussionList); $i++) {
									$Discussion = $DiscussionList[$i];
									?>
								    <tr>
								    <td><a href="view.comment.php?view=<?php echo $Discussion->getID(); ?>" onclick="return ; " >
								    <?php echo $Discussion->getName(); ?></a></td>
									    <td><?php $id = $Discussion->getCategory();
									    	$Result2 = $_searchDiscussionBAO->getNameFromCatagoryID($id);
									    	if ($Result2->getIsSuccess()) {
									    		$DiscussionCategory = $Result2->getResultObject();

									    		echo $DiscussionCategory->getName();
									    	}
									    	//echo $_DiscussionBAO->getNameFromCatagoryID($id); ?></td>
									    <td><?php echo $Discussion->getTag(); ?></td>
									    
									    
								    </tr>
							    <?php

								}

							}
							else{

								echo $Result->getResultObject(); //giving failure message
							}
			    	?>
	</div>
	
	
	</table>

	<div>
	<?php } ?>
	<?php
	if(isset($tag)){
		//var_dump($tag);
		 $Result2 = $_searchDiscussionBAO->readTagwiseDiscussion($tag);
			    	if($Result2->getIsSuccess()){

								$DiscussionList = $Result2->getResultObject();
							?> 
		 
								<tr>
									<td>Questions</td>
									<td>Category</td>
									<td>Tags</td>
								</tr>
								<?php
								for($i = 0; $i < sizeof($DiscussionList); $i++) {
									$Discussion = $DiscussionList[$i];
									?>
								    <tr>
								    <td><a href="view.comment.php?view=<?php echo $Discussion->getID(); ?>" onclick="return ; " >
								    <?php echo $Discussion->getName(); ?></a></td>
									    <td><?php $id = $Discussion->getCategory();
									    	$Result2 = $_searchDiscussionBAO->getNameFromCatagoryID($id);
									    	if ($Result2->getIsSuccess()) {
									    		$DiscussionCategory = $Result2->getResultObject();

									    		echo $DiscussionCategory->getName();
									    	}
									    	//echo $_DiscussionBAO->getNameFromCatagoryID($id); ?></td>
									    <td><?php echo $Discussion->getTag(); ?></td>
									    
									   
								    </tr>
							    <?php

								}

							}
							else{

								echo $Result->getResultObject(); //giving failure message
							}
			    	?>
	
	</table>
	<?php  } ?>

	
	</div>
</center>


</body>
</html>