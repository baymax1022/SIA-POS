<?php
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');
// INCLUDES --------------------------------------------
	include_once './config/database.php';
	include_once './posts/post.php';
// VARIABLES -------------------------------------------
	$database = new Database();
	$db = $database->connect();
	$post = new Post($db);
	$data = array();

	$req = explode('/', rtrim($_REQUEST['request'], '/'));
// SWICTH - CASE ---------------------------------------
	switch ($_SERVER['REQUEST_METHOD']) {
// -----------------------------------------------------
case 'POST':
			switch ($req[0]) {
			// Adds message
				case 'add_menu':
					$d = json_decode(file_get_contents("php://input"));
					echo json_encode($post->send_message($d));
				break;
			// DELETE Menu
				case 'delete_menu':
					$d = json_decode(file_get_contents("php://input"));
					echo json_encode($post->send_message($d));
				break;
			// Update Menu
				case 'delete_menu':
					$d = json_decode(file_get_contents("php://input"));
					echo json_encode($post->send_message($d));
				break;
			// Login user
				case 'login':
					$d = json_decode(file_get_contents("php://input"));
					echo json_encode($auth->login_user($d));
				break;

				default:
				http_response_code(400);
				echo "Bad Request";
				break;
			}
	break;
// -----------------------------------------------------
	case 'GET':

// GET PRODUCTS ----------------------------------------
		switch ($req[0]) {
			case 'products':
				if(count($req)>1){
					echo json_encode($post->select('tbl_'.$req[0], $req[1]),JSON_PRETTY_PRINT);
				} else {
						echo json_encode($post->select('tbl_'.$req[0], null),JSON_PRETTY_PRINT);
					}
			break;
			}
// GET INGREDIENTS --------------------------------------
		switch ($req[0]) {
			case 'ingredients':
				if(count($req)>1){
					echo json_encode($post->select_food_ing('tbl_'.$req[0], $req[1]),JSON_PRETTY_PRINT);
				} else {
					echo json_encode($post->select_food_ing('tbl_'.$req[0], null),JSON_PRETTY_PRINT);
				}
		break;
		}
		break;
// DEFAULT RESPONSE --------------------------------------
		default:
			http_response_code(400);
			echo "Bad Request";
	break;
 }
?>
