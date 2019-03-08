<?php

//load.php

	$connect = new PDO('mysql:host=localhost;dbname=testing', 'root', '');

	$data = array();

	$query = "SELECT * FROM events ORDER BY id";

	$statement = $connect->prepare($query);

	$statement->execute();

	$result = $statement->fetchAll();

	foreach($result as $row)
	{
	 $data[] = array(
	  'id'   => $row["id"],
	  'title'   => $row["title"],
	  'start'   => $row["start_event"],
	  'end'   => $row["end_event"]
	 );
	}

	echo json_encode($data);

?>




<?php

//delete.php

if(isset($_POST["id"]))
{
 $connect = new PDO('mysql:host=localhost;dbname=testing', 'root', '');
 $query = "
 DELETE from events WHERE id=:id
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':id' => $_POST['id']
  )
 );
}

?>



<?php

//insert.php

$connect = new PDO('mysql:host=localhost;dbname=testing', 'root', '');

if(isset($_POST["title"]))
{
 $query = "
 INSERT INTO events 
 (title, start_event, end_event) 
 VALUES (:title, :start_event, :end_event)
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':title'  => $_POST['title'],
   ':start_event' => $_POST['start'],
   ':end_event' => $_POST['end']
  )
 );
}


?>


<?php

//update.php

$connect = new PDO('mysql:host=localhost;dbname=testing', 'root', '');

if(isset($_POST["id"]))
{
 $query = "
 UPDATE events 
 SET title=:title, start_event=:start_event, end_event=:end_event 
 WHERE id=:id
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':title'  => $_POST['title'],
   ':start_event' => $_POST['start'],
   ':end_event' => $_POST['end'],
   ':id'   => $_POST['id']
  )
 );
}

?>