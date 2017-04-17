<?php
// write dao object for each class
include_once '/../common/class.common.php';
include_once '/../util/class.util.php';

Class DiscussionDAO{

	private $_DB;
	private $_Cat;

	function DiscussionDAO(){

		$this->_DB = DBUtil::getInstance();
		$this->_Cat = new Discussion();

	}

	// get all the Discussions from the database using the database query
	public function getAllTerms(){

		$DiscussionList = array();

		$this->_DB->doQuery("SELECT * FROM tbl_discussion_category");

		$rows = $this->_DB->getAllRows();

		for($i = 0; $i < sizeof($rows); $i++) {
			$row = $rows[$i];
			$this->_Discussion = new Discussion();

		    $this->_Discussion->setID ( $row['ID']);
		    $this->_Discussion->setName( $row['Name'] );


		    $DiscussionList[]=$this->_Discussion;
   
		}

		//todo: LOG util with level of log


		$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($DiscussionList);

		return $Result;
	}

	//create Discussion funtion with the Discussion object
	public function createDiscussion($Discussion){

		$ID=$Discussion->getID();
		$Name=$Discussion->getName();


		$SQL = "INSERT INTO tbl_discussion_category(ID,Name) VALUES('$ID','$Name')";

		$SQL = $this->_DB->doQuery($SQL);		
		
	 	$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($SQL);

		return $Result;
	}

	//read an Discussion object based on its id form Discussion object
	public function readDiscussion($Discussion){
		
		
		$SQL = "SELECT * FROM tbl_discussion_category WHERE ID='".$Discussion->getID()."'";
		$this->_DB->doQuery($SQL);

		//reading the top row for this Discussion from the database
		$row = $this->_DB->getTopRow();

		$this->_Discussion= new Discussion();

		//preparing the Discussion object
	    $this->_Discussion->setID ( $row['ID']);
	    $this->_Discussion->setName( $row['Name'] );



	 	$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($this->_Discussion);

		return $Result;
	}

	//update an Discussion object based on its 
	public function updateDiscussion($Discussion){

		$SQL = "UPDATE tbl_discussion_category SET Name='".$Discussion->getName()."' WHERE ID='".$Discussion->getID()."'";


		$SQL = $this->_DB->doQuery($SQL);

	 	$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($SQL);

		return $Result;

	}

	//delete an Discussion based on its id of the database
	public function deleteDiscussion($Discussion){


		$SQL = "DELETE from tbl_discussion_category where ID ='".$Discussion->getID()."'";
	
		$SQL = $this->_DB->doQuery($SQL);

	 	$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($SQL);

		return $Result;

	}

}

echo '<br> log:: exit the class.discussiondao.php';

?>