<?php 

	require_once('../initialize.php');

	//$connect = new PDO('mysql:host=localhost;dbname=testing', 'root', '');

	$data = array();

	//$query = "SELECT * FROM events ORDER BY id";

	//$statement = $connect->prepare($query);

	//$statement->execute();

	//$result = $statement->fetchAll();

	/*foreach($result as $row)
	{
	 $data[] = array(
	  'id'   => $row["id"],
	  'title'   => $row["title"],
	  'start'   => $row["start_event"],
	  'end'   => $row["end_event"]
	 );
	}*/

	$results = load_calendar();

	foreach($results as $events){
	 $data[] = array(
	  'id'   => $events["event_id"],
	  'title'   => h($events["event_name"]),
	  'event_description' => h($events["event_description"]),
	  'start'   => $events["event_datestart"],
	  //'end'   => $events["end_event"]
	 );
	}

	echo json_encode($data);
?>