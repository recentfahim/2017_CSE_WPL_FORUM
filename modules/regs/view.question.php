<?php

include_once 'blade/view.question.blade.php';
include_once '/../../common/class.common.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Discussion CRUD Operations</title>
		<link rel="stylesheet" href="style.css" type="text/css" />
	</head>

<body>
<center>
	<div id="header">
		<label>By : Kazi Masudul Alam</a></label>
	</div>

	<div id="form">
		<form method="post">
			<table width="100%" border="1" cellpadding="15">
				<tr>
					<td><label>Question : </label></td>
					<td><input type="text" name="txtQuestion" placeholder="Question Title" value="<?php 
					if(isset($_GET['edit'])) echo $getROW->getName();  ?>" /></td>
				</tr>

				<tr>
					<td><label>Category Name : </label></td>
					<td>  
				

						    <?php
						    // this block of code prints the list box of roles with current assigned  roles

						    $var = '<select name="txtCat" id="select-from-cat">';
							$Result = $_DiscussionBAO->getAllDiscussions();
								//if DAO access is successful to load all the Roles then show them one by one
							if($Result->getIsSuccess()){

								$Discussions = $Result->getResultObject();
							
						       for ($i=0; $i < sizeof($Discussions); $i++) { 
						       		
						       		$Discussion = $Discussions[$i];
						    
						    		$var = $var. '<option value="'.$Discussion->getID().'"';   			

						          	$var = $var.'>'.$Discussion->getName().'</option>';
					
								}

								$var = $var.'</select>';
							}
							echo $var;
							?>	
					</td>
				</tr>
				<tr>
					<td><label>Tag : </label></td>
					<td><input type="text" name="txtTag" placeholder="Tag" value="<?php 
					if(isset($_GET['edit'])) echo $getROW->getName();  ?>" /></td>
				</tr>
				<tr>
					<td><label>Description : </label></td>
					<td><textarea rows="10" cols="50" name="txtDes" placeholder="Description" value="<?php 
					if(isset($_GET['edit'])) echo $getROW->getName();  ?>" ></textarea></td>
				</tr>
				</table>
				<table width="100%" border="1" cellpadding="15">
				<tr>
					<td>
						<?php
						if(isset($_GET['edit']))
						{
							?>
							<button type="submit" name="update">update</button>
							<?php
						}
						else
						{
							?>
							<button type="submit" name="save">save</button>
							<?php
						}
						?>
					</td>
				</tr>
			</table>
		</form>

<br />

	<table width="100%" border="1" cellpadding="15" align="center">
	<?php
	
	
	$Result = $_QuestionBAO->getAllQuestions();

	//if DAO access is successful to load all the Terms then show them one by one
	if($Result->getIsSuccess()){

		$QuestionList = $Result->getResultObject();
	?> 
		<tr>
			<td>Questions</td>
			<td>Category</td>
			<td>Tags</td>
		</tr>
		<?php
		for($i = 0; $i < sizeof($QuestionList); $i++) {
			$Question = $QuestionList[$i];
			?>
		    <tr>
			    <td><a href = "view.discussion.php"><?php echo $Question->getName(); ?></a></td>
			    <td><?php echo $Question->getCategoryID(); ?></td>
			    <td><?php echo $Question->getTag(); ?></td>
			    <td><a href="?edit=<?php echo $Question->getID(); ?>" onclick="return confirm('sure to edit !'); " >edit</a></td>
			    <td><a href="?del=<?php echo $Question->getID(); ?>" onclick="return confirm('sure to delete !'); " >delete</a></td>
		    </tr>
	    <?php

		}

	}
	else{

		echo $Result->getResultObject(); //giving failure message
	}

	?>
	</table>
	</div>
</center>
</body>
</html>