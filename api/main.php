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
				case 'pre':
					if(count($req)>1){
						echo json_encode($gm->select_pre('tbl_order'.$req[0], $req[1]),JSON_PRETTY_PRINT);
					} else {
						echo json_encode($gm->select_pre('tbl_order', null),JSON_PRETTY_PRINT);
					}
				break;
				case 'addOrder':
                    $d = json_decode(base64_decode(file_get_contents("php://input")));
                    echo json_encode($gm->insert("tbl_preorder",$d), JSON_PRETTY_PRINT);
                break;
				case 'addPreOrder':
                    $d = json_decode(base64_decode(file_get_contents("php://input")));
                    echo json_encode($gm->insert("tbl_order",$d), JSON_PRETTY_PRINT);
                break;
				case 'getProd':
                    $d = json_decode(base64_decode(file_get_contents("php://input")));
                    echo json_encode($gm->insert("tbl_product",$d), JSON_PRETTY_PRINT);
                break;
				case 'updatePreOrder':
                    $d = json_decode(base64_decode(file_get_contents("php://input")));
                    echo json_encode($gm->edit("tbl_order",$d), JSON_PRETTY_PRINT);
                break;
				case 'prod':                   
					if(count($req)>1) {                        
						echo json_encode($get->pullProduct($req[1]), JSON_PRETTY_PRINT);                   
					} 
				   else
				   {                        
						echo json_encode($get->pullProduct(null), JSON_PRETTY_PRINT); 
				   }                
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
				 case 'delPre': 
					    $d = json_decode(base64_decode(file_get_contents("php://input"))); 
						     echo json_encode($post->delPre($d), JSON_PRETTY_PRINT);           
							break;
				 case 'clearOrder':
								$d = json_decode(base64_decode(file_get_contents("php://input")));
								echo json_encode($gm->clearOrder($d));
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