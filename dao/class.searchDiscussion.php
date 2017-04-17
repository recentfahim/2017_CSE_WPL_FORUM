<?php
include_once '/../common/class.common.php';
include_once '/../util/class.util.php';
//include_once 'class.discussiondao.php';

Class searchDiscussionDAO{

	private $_DB;
	private $_Cat;

	function searchDiscussionDAO(){

		$this->_DB = DBUtil::getInstance();
		$this->_Cat = new searchDiscussion();

	}

	// get all the searchDiscussions from the database using the database query
	public function getAllsearchDiscussions(){

		$searchDiscussionList = array();

		$this->_DB->doQuery("SELECT * FROM tbl_discussion_searchDiscussion");
		$rows = $this->_DB->getAllRows();


		for($i = 0; $i < sizeof($rows); $i++) {
			$row = $rows[$i];
			$this->_searchDiscussion = new searchDiscussion();

		    $this->_searchDiscussion->setsearchDiscussionID ( $row['searchDiscussionID']);
		    $this->_searchDiscussion->setDiscussionID( $row['DiscussionID'] );
		    $this->_searchDiscussion->setsearchDiscussion( $row['searchDiscussion'] );
		    $this->_searchDiscussion->setCreator( $row['CreatorID'] );
		    $this->_searchDiscussion->setsearchDiscussionIDTop($row['searchDiscussionIDTop']);


		    $searchDiscussionList[]=$this->_searchDiscussion;
   
		}

		//todo: LOG util with level of log


		$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($searchDiscussionList);

		return $Result;
	}


	public function readDiscussion($Discussion){
		
		//$Dis = $Discussion->getID();
		$SQL = "SELECT * FROM tbl_discussion WHERE ID='".$Discussion."'";
		
		$this->_DB->doQuery($SQL);

		//reading the top row for this Discussion from the database
		$row = $this->_DB->getTopRow();

		$this->_Discussion= new Discussion();

		//preparing the Discussion object
	    $this->_Discussion->setID ( $row['ID'] );
	    $this->_Discussion->setName( $row['Title'] );
	    $this->_Discussion->setCategory( $row['CategoryID'] );
		$this->_Discussion->setDescription( $row['Description'] );
		$this->_Discussion->setTag( $row['Tag'] );
		$this->_Discussion->setCreationDate( $row['CreationDate'] );
		$this->_Discussion->setCreator( $row['CreatorID'] );




	 	$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($this->_Discussion);

		return $Result;
	}

	public function readCreator($CreatorID){

		$SQL = "SELECT * FROM tbl_user
				WHERE ID ='".$CreatorID."'";
		$SQL = $this->_DB->doQuery($SQL);

		$row = $this->_DB->getTopRow();

		$this->_useradd = new User();

		$this->_useradd->setID ( $row['ID']);
		$this->_useradd->setUniversityID( $row['UniversityID'] );
		$this->_useradd->setEmail ( $row['Email']);
		$this->_useradd->setPassword( $row['Password'] );
		$this->_useradd->setFirstName ( $row['FirstName']);
		$this->_useradd->setLastName( $row['LastName'] );
		
		
	 	$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($this->_useradd);

		return $Result;
	}

	public function readDiscussionCreator($CreatorID){

		$SQL = "SELECT * FROM tbl_user
				WHERE ID ='".$CreatorID."'";
		$SQL = $this->_DB->doQuery($SQL);

		$row = $this->_DB->getTopRow();

		$this->_useradd = new User();

		$this->_useradd->setID ( $row['ID']);
		$this->_useradd->setUniversityID( $row['UniversityID'] );
		$this->_useradd->setEmail ( $row['Email']);
		$this->_useradd->setPassword( $row['Password'] );
		$this->_useradd->setFirstName ( $row['FirstName']);
		$this->_useradd->setLastName( $row['LastName'] );
		
		
	 	$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($this->_useradd);

		return $Result;
	}
	//read an searchDiscussion object based on its id form searchDiscussion object
	public function readsearchDiscussion($Discussion){
		
		
		$searchDiscussionList = array();

		$this->_DB->doQuery("SELECT * FROM tbl_discussion_searchDiscussion WHERE DiscussionID = '".$Discussion."'");

		$rows = $this->_DB->getAllRows();

		for($i = 0; $i < sizeof($rows); $i++) {
			$row = $rows[$i];
			$this->_searchDiscussion = new searchDiscussion();

		    $this->_searchDiscussion->setsearchDiscussionID ( $row['searchDiscussionID']);
		    $this->_searchDiscussion->setDiscussionID( $row['DiscussionID'] );
		    $this->_searchDiscussion->setsearchDiscussion( $row['searchDiscussion'] );
		    $this->_searchDiscussion->setCreator( $row['CreatorID'] );
		    $this->_searchDiscussion->setsearchDiscussionIDTop($row['searchDiscussionIDTop']);


		    $searchDiscussionList[]=$this->_searchDiscussion;
   
		}

		//todo: LOG util with level of log


		$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($searchDiscussionList);

		return $Result;
	}


}

//echo '<br> log:: exit the class.searchDiscussiondao.php';

?>