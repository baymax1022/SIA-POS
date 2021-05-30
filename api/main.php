<?php 
	require_once("./config/Config.php");

	$db = new Connection();
	$pdo = $db->connect();
	$gm = new GlobalMethods($pdo);
	$post = new Post($pdo);
	$get = new Get($pdo);
	$auth = new Auth($pdo);

	if (isset($_REQUEST['request'])) {
		$req = explode('/', rtrim($_REQUEST['request'], '/'));
	} else {
		$req = array("errorcatcher");
	}

	switch($_SERVER['REQUEST_METHOD']) {
		case 'POST':

			

			switch($req[0]) {
				case 'addOrder':
                    $d = json_decode(base64_decode(file_get_contents("php://input")));
                    echo json_encode($gm->insert("tbl_preorder",$d), JSON_PRETTY_PRINT);
                break;
				case 'order':                   
					 if(count($req)>1) {                        
						 echo json_encode($get->pullOrder($req[1]), JSON_PRETTY_PRINT);                   
					 } 
					else
					{                        
						 echo json_encode($get->pullOrder(null), JSON_PRETTY_PRINT); 
					}                
						 break;
				 case 'delOrder': 
					    $d = json_decode(base64_decode(file_get_contents("php://input"))); 
						     echo json_encode($post->delOrder($d), JSON_PRETTY_PRINT);           
							break;
			}
		break;

		case 'GET':
			switch ($req[0]) {

				default:
				http_response_code(400);
				echo "Bad Request";
				break;
			}
		break;

		default:
			http_response_code(403);
			echo "Please contact the Systems Administrator";
		break;
	}
?>