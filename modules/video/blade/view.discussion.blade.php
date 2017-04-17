<?php

include_once '/../../../util/class.util.php';
include_once '/../../../bao/class.discussionbao.php';


$_DiscussionBAO = new DiscussionBAO();
$_DB = DBUtil::getInstance();

/* saving a new Discussion account*/
if(isset($_POST['save']))
{
	 $Discussion = new Discussion();	
	 $Discussion->setID(Util::getGUID());
     $Discussion->setName($_DB->secureInput($_POST['txtName']));
	 $_DiscussionBAO->createDiscussion($Discussion);		 
}


/* deleting an existing Discussion */
if(isset($_GET['del']))
{

	$Discussion = new Discussion();	
	$Discussion->setID($_GET['del']);	
	$_DiscussionBAO->deleteDiscussion($Discussion); //reading the Discussion object from the result object

	header("Location: view.discussion.php");
}


/* reading an existing Discussion information */
if(isset($_GET['edit']))
{
	$Discussion = new Discussion();	
	$Discussion->setID($_GET['edit']);	
	$getROW = $_DiscussionBAO->readDiscussion($Discussion)->getResultObject(); //reading the Discussion object from the result object
}

/*updating an existing Discussion information*/
if(isset($_POST['update']))
{
	$Discussion = new Discussion();	

    $Discussion->setID ($_GET['edit']);
    $Discussion->setName( $_POST['txtName'] );
	
	$_DiscussionBAO->updateDiscussion($Discussion);

	header("Location: view.discussion.php");
}



echo '<br> log:: exit blade.discussion.php';

?>