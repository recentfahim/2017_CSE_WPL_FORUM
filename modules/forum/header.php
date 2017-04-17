
<html>
<head>
<style>
#middle{
  width:300px;
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
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}
aside{
  float:right;
}

h1{
  text-align:center;
  background-color : Blue;
  padding:20px 16px;
}
h4{
    list-style-type: none;
    margin: 0;
    padding: 1;
    width: 200px;
    background-color: #f1f1f1;
}
li {
    float: left;
    border-right:1px solid #bbb;
}

li:last-child {
    border-right: none;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #111;
}

.active {
    background-color: #4CAF50;
}
label{display:inline-block;width:100px;margin-bottom:10px;}
</style>
</head>
<body>
<h1>Online Discussion Forum</h1>
<ul>
  <li><a href="view.discussionList.php">Question</a></li>
  <li><a href="view.answered.php">Answered</a></li>
  <li><a href="view.unanswered.php">Unanswered</a></li>
  <li><a href="view.mostRecent.php">Most Recent</a></li>
  <li><a href="view.searchDiscussion.php">Search Question</a></li>
  <li><a href="view.discussion.php">Ask a Question</a></li>
  <li><a href="view.discussionCategory.php">Add Category</a></li>
</ul><br/>
</body>
</html>