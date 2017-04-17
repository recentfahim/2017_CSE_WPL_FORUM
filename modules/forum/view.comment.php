<?php
//session_start();
include_once 'blade/view.comment.blade.php';
include_once '/../../common/class.common.php';
include_once 'header.php';

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Comment CRUD Operations</title>
		<link rel="stylesheet" href="style.css" type="text/css" />
		<style>
			/* unvisited link */
			
		</style>
	</head>

<body  bgcolor=" #33FFDA">
	<center>
	<div id="header">
		<label>By : Kazi Masudul Alam</a></label>
	</div>

	<div id="form">
		<form method="post">
			<table width="100%" border="1" cellpadding="15" align="center"  bgcolor=" #61B6B9">
			
			<?php
				$id = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
				$Discussion2 = substr($id, -38);
				
				$Result1 = $_CommentBAO->readDiscussion($Discussion2);
				//if DAO access is successful to load all the comments then show them one by one
				if($Result1->getIsSuccess()){

					$Question = $Result1->getResultObject();
				?> 
					<div >
						<tr >
							<td>Question</td>
						    <td ><h2><?php echo $Question->getName(); ?></h2>
						    	<?php $id = $Question->getCreator();
						    		$Result3 = $_CommentBAO->readDiscussionCreator($id);
						    		if ($Result3->getIsSuccess()) {
						    		$creator = $Result3->getResultObject();
						    		?>
					    			<i><?php echo $creator->getFirstName();?></i>
					    			<?php
					    		}
						    	 ?>	
						    		
						    </td>
						</tr>
					</div>
					
						<tr><td>Category : </td>
						    <td>
						    <?php 
							    $id= $Question->getCategory();
							    $Result2 = $_DiscussionBAO->getNameFromCatagoryID($id);
						    	if ($Result2->getIsSuccess()) {
						    		$DiscussionCategory = $Result2->getResultObject();

					    		echo $DiscussionCategory->getName();
					    		} 

				    		?>
			    		
			    			</td>
					    </tr>
					    <tr><td>Tag : </td>
						    <td><?php echo $Question->getTag(); ?></td>
						</tr>
						
						<tr><td>Description : </td>
						    <td><?php echo $Question->getDescription(); ?></td>
						</tr>
						
				    <?php

					

				}
				else{

					echo $Result->getResultObject(); //giving failure message
				}

				?>
				</table>
				<br>
				<div id="header">
					<label>Answers</a></label>
				</div>
				<br>
				<?php
				$id = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
				//$Discussion2 =  $Discussion1->getID();
				//echo $Discussion2;
				$Discussion2 = substr($id, -38);
				//session_start();

				//$globalUser=$_SESSION["globalUser"]->getID ();
				//print_r($globalUser);
			
				//$Discussion2 =  $Discussion1->getID();
				//echo $Discussion1;
				$Result1 = $_CommentBAO->readComment($Discussion2);

				//if DAO access is successful to load all the comments then show them one by one
				if($Result1->getIsSuccess()){

					$CommentList = $Result1->getResultObject();
						?> 
						<table width="100%" border="1" cellpadding="15" align="center" bgcolor=" #8280CA">
							<?php
							for($i = 0; $i < sizeof($CommentList); $i++) {
								$Comment = $CommentList[$i];
								?>
							    <tr>
							    <tr>
							    	<td>
								    <?php 
									    $id= $Comment->getCreator();
									    $Result5 = $_CommentBAO->readCreator($id);
								    	if ($Result2->getIsSuccess()) {
								    		$user = $Result5->getResultObject();
								    		?>
							    			<i> <?php echo $user->getFirstName(); ?></i>
							    			<?php
							    		} 

						    		?>
					    		
					    			</td>
							    
								    <td><?php echo $Comment->getComment(); ?></td>

							    </tr>
						    <?php

							}

				}
				else{

					echo $Result->getResultObject(); //giving failure message
				}

				?>
				</table>
				<br/>
			<table width="100%" border="1" cellpadding="15" bgcolor=" #8AA6AA">
				
				<tr>
					<td><label>Answer : </label></td>
					<td><textarea rows="10" cols="40" name="txtAns" placeholder="Answer" value="<?php 
					if(isset($_GET['edit'])) echo $getROW->getComment();  ?>" ></textarea></td>
				</tr>
				</table>
				<input type='text' name ="txtComment" value="<?php echo $Discussion2 ; ?>" placeholder="<?php echo $Discussion2 ; ?>" style="display: none"/>
				<table width="100%" border="1" cellpadding="15" bgcolor=" #8AA6AA">
				<tr>
					<td>
						<?php
						if(isset($_GET['edit']))
						{
							?>
							<button type="submit" name="update">Update</button>
							<?php
						}
						else
						{
							?>
							<button type="submit" name="save">Submit</button>
							<?php
						}
						
						?>
					</td>
				</tr>
			</table>
		</form>

<br />

	
	</div>
</center>


</body>
</html>