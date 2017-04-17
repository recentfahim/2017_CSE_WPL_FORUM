<?php

include_once '/../util/class.util.php';
include_once '/../dao/class.searchDiscussiondao.php';


/*
	searchDiscussion Business Object 
*/
Class searchDiscussionBAO{

	private $_DB;
	private $_searchDiscussionDAO;

	function searchDiscussionBAO(){

		$this->_searchDiscussionDAO = new searchDiscussionDAO();

	}

	//get all searchDiscussions value
	public function getAllsearchDiscussions(){

		$Result = new Result();	
		$Result = $this->_searchDiscussionDAO->getAllsearchDiscussions();
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in searchDiscussionDAO.getAllsearchDiscussions()");		

		return $Result;
	}

	//create searchDiscussion funtion with the searchDiscussion object
	public function createsearchDiscussion($searchDiscussion){

		$Result = new Result();	
		$Result = $this->_searchDiscussionDAO->createsearchDiscussion($searchDiscussion);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in searchDiscussionDAO.createsearchDiscussion()");		

		return $Result;

	
	}


	public function readCreator($CreatorID){


		$Result = new Result();	
		$Result = $this->_searchDiscussionDAO->readCreator($CreatorID);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in searchDiscussionDAO.readCreator()");		

		return $Result;


	}

	public function readDiscussionCreator($CreatorID){


		$Result = new Result();	
		$Result = $this->_searchDiscussionDAO->readDiscussionCreator($CreatorID);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in searchDiscussionDAO.readDiscussionCreator()");		

		return $Result;


	}

	//read an searchDiscussion object based on its id form searchDiscussion object
	public function readsearchDiscussion($searchDiscussion){


		$Result = new Result();	
		$Result = $this->_searchDiscussionDAO->readsearchDiscussion($searchDiscussion);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in searchDiscussionDAO.readsearchDiscussion()");		

		return $Result;


	}

	public function readDiscussion($Discussion){


		$Result = new Result();	
		$Result = $this->_searchDiscussionDAO->readDiscussion($Discussion);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in searchDiscussionDAO.readDiscussion()");		

		return $Result;


	}

	//update an searchDiscussion object based on its current information
	public function updatesearchDiscussion($searchDiscussion){

		$Result = new Result();	
		$Result = $this->_searchDiscussionDAO->updatesearchDiscussion($searchDiscussion);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in searchDiscussionDAO.updatesearchDiscussion()");		

		return $Result;
	}

	//delete an existing searchDiscussion
	public function deletesearchDiscussion($searchDiscussion){

		$Result = new Result();	
		$Result = $this->_searchDiscussionDAO->deletesearchDiscussion($searchDiscussion);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in searchDiscussionDAO.deletesearchDiscussion()");		

		return $Result;

	}

}

//echo '<br> log:: exit the class.searchDiscussionbao.php';

?>