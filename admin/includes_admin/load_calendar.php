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

	/*foreach($results as $events){
	 $data[] = array(
	  'id'   => $events["event_id"],
	  'title'   => h($events["event_name"]),
	  'event_description' => h($events["event_description"]),
	  'start'   => $events["event_datestart"],
	  'end'   => $events["event_dateend"]
	 );
	}*/

	$event_list = [];
	foreach($results as $events){
		$datas = [];
		$datas['id'] = $events["event_id"];
		$datas['title'] = h($events["event_name"]);
		$datas['event_description'] = h($events["event_description"]);
		$datas['start'] = $events["event_datestart"];
		

		/*$stop_date = '2019-09-30 20:24:00';
		$stop_date = date('Y-m-d H:i:s', strtotime($stop_date . ' +1 day'));*/

		$stop_date = $events["event_dateend"];
		$stop_date = date('Y-m-d H:i:s', strtotime($stop_date . ' +1 day'));

		$datas['end'] = $stop_date;
		$datas['event_compo_id'] = $events["event_compo_id"];

		$user_id = $events["created_by"];
		$user = get_admin_by_admin_compo_id($user_id);

		
        $date =date_create($events['date_created']);
        $formated_date= date_format($date,"F d, Y h:i:sa");
        
        $datas['date_created_format'] = $date;           

		$datas['user'] = $user['firstname'] .' '. $user['lastname'];

		if($events['event_type'] == 'urgent'){
			 $status_color = "#FF1B00";
		}else{
			$status_color = "#3c8dbc";
		}

        $datas['backgroundColor'] = $status_color;
        $datas['borderColor'] = $status_color;

		array_push($event_list, $datas);
	}

	echo json_encode($event_list);
?>