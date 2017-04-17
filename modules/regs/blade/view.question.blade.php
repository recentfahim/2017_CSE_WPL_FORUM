<?php

include_once '/../../../util/class.util.php';
include_once '/../../../bao/class.questionbao.php';
include_once '/../../../bao/class.discussionbao.php';

$_QuestionBAO = new QuestionBAO();
$_DiscussionBAO = new DiscussionBAO();
$_DB = DBUtil::getInstance();

/* saving a new Question account*/
if(isset($_POST['save']))
{
	 $Question = new Question();	
	 $Question->setID(Util::getGUID());
     $Question->setName($_DB->secureInput($_POST['txtQuestion']));
     $Question->setCategoryID($_DB->secureInput($_POST['txtCat']));
     $Question->setTag($_DB->secureInput($_POST['txtTag']));
     $Question->setDescription($_DB->secureInput($_POST['txtDes']));

    /* if(isset($_POST['txtCat'])){ 

			$Discussion = new DiscussionCategory();
			$Discussion->setID($_POST['txtCat']);
	
		$Question->setDiscussions($Discussions);
	}*/

	 $_QuestionBAO->createQuestion($Question);		 
}


/* deleting an existing Question */
if(isset($_GET['del']))
{

	$Question = new Question();	
	$Question->setID($_GET['del']);	
	$_QuestionBAO->deleteQuestion($Question); //reading the Question object from the result object

	header("Location: view.question.php");
}


/* reading an existing Question information */
if(isset($_GET['edit']))
{
	$Question = new Question();	
	$Question->setID($_GET['edit']);	
	$getROW = $_QuestionBAO->readQuestion($Question)->getResultObject(); //reading the Question object from the result object
}

/*updating an existing Question information*/
if(isset($_POST['update']))
{
	$Question = new Question();	

    $Question->setID ($_GET['edit']);
    $Question->setName( $_POST['txtQuestion'] );
    $Question->setCategoryID($_POST['txtCat']);
    $Question->setTag($_POST['txtTag']);
    $Question->setDescription($_POST['txtDes']);
	
	$_QuestionBAO->updateQuestion($Question);

	header("Location: view.question.php");
}



echo '<br> log:: exit blade.question.php';

?>