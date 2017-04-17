<?php

include_once 'blade/view.answered.blade.php';
include_once '/../../common/class.common.php';
include_once 'header.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Answered Discussion CRUD Operations</title>
		<link rel="stylesheet" href="style.css" type="text/css" />
		<style>
			body{
				    background-color: #33FFDA;
				  }
			#middle{
				width:1200px;
				height: 400px
				background-color: red; 
				float:left;
			}
			#side{
				width: 100px;
				height: 200px
				background-color: blue;
				float:right;
			}


		</style>
	</head>

<body>
<center>
	<div id="header">
		<label>By : Kazi Masudul Alam</a></label>

	<div id = "middle">
	<table width="100%" border="1" cellpadding="15" bgcolor="#4EAFAF">
	<?php
	
	
	$Result = $_AnsweredBAO->getAllDiscussions();

	//if DAO access is successful to load all the Terms then show them one by one
	if($Result->getIsSuccess()){

		$DiscussionList = $Result->getResultObject();
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
			    	$Result2 = $_AnsweredBAO->getNameFromCatagoryID($id);
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
	</div>
	<div id="side">
	
		<table width="100%" border="1" cellpadding="15" bgcolor=" #d9b3ff">
			<tr><td>Category</td></tr>
			<tr><?php
				$Result = $_AnsweredBAO->getAllDiscussionCategorys();
									//if DAO access is successful to load all the Roles then show them one by one
				if($Result->getIsSuccess())
				{

					$DiscussionCategorys = $Result->getResultObject();
								
			        for ($i=0; $i < sizeof($DiscussionCategorys); $i++) 
					{ 
						$DiscussionCategory = $DiscussionCategorys[$i];?>
						<tr><td><a href="view.searchDiscussion.php?Category=<?php echo $DiscussionCategory->getID(); ?>" onclick="return; "> <?php echo $DiscussionCategory->getName() ?> </a></td></tr>
					<?php
					}
				}

				?>
			</tr>
		</table>
	
	</div>
	</div>
</center>
</body>
</html>