<?php

include_once '/../../../util/class.util.php';
include_once '/../../../bao/class.searchDiscussionbao.php';

$_searchDiscussionBAO = new searchDiscussionBAO();
$_DB = DBUtil::getInstance();
$Discussion = new Discussion();

if(isset($_POST['search']))
{
	 
     $Discussion->setTag($_DB->secureInput($_POST['txtSearch']));

     //$_searchDiscussionBAO->readTagwiseDiscussion($Discussion);
     $tag = $Discussion->getTag();

     header("Location: view.searchDiscussion.php?tag=".$tag);

}


//echo '<br> log:: exit blade.searchDiscussion.php';

?>