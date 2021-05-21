<?php
class Post{
  // Variables -------------------------------------
  private $conn;
  private $sql;
  private $info = [];
  private $data = array();
  private $status;
  private $failed_stat = array (
    'remarks' => 'failed',
    'message' => 'Failed to retrieve requested records'
  );
  private $success_stat = array (
    'remarks' => 'success',
    'message' => 'Successfully retrieved records'
  );
  public function __construct($db){
			$this->conn = $db;
  }
  // ------------ *!*  Functions *!* -------------------

  // SELECT ALL --------------------------------------------
  function select($table, $filter_data){
    $this->sql="SELECT * FROM `$table` WHERE 1";
    if ($filter_data != null) {
      $this->sql = "SELECT * FROM `$table` WHERE id = $filter_data";
    }
    if ($result = $this->conn->query($this->sql)) {
      if ($result->num_rows > 0) {
          while($res = $result->fetch_assoc()){
            array_push($this->data, $res);
          }
        $this->status = $this->success_stat;
        http_response_code(200);
      }
      else{
        $this->status = $this->failed_stat;
        http_response_code(400);
      }
    }
    return array(
      'status'=>$this->status,
      'payload'=>$this->data,
      'prepared by'=>', FOOD DATA',
      'timestamp'=>date('D M j, Y G:i:s T')
    );
  }

  // SELECT INGREDIENTS ------------------------------------
  function select_food_ing($table, $filter_data){
    $this->sql="SELECT tbl_ingredients.prod_id, tbl_ingredients.ing_name, tbl_ingredients.ing_quantity, tbl_products.product_id FROM tbl_ingredients INNER JOIN tbl_products WHERE tbl_products.product_id = tbl_ingredients.prod_id";
    if ($filter_data != null) {
      // SELECT 1 INGREDIENT --------------------------
      $this->sql = "SELECT tbl_ingredients.prod_id, tbl_ingredients.ing_name, tbl_ingredients.ing_quantity, tbl_products.product_id FROM tbl_ingredients INNER JOIN tbl_products ON tbl_products.product_id = tbl_ingredients.prod_id WHERE tbl_products.product_id = $filter_data";
    }
    if ($result = $this->conn->query($this->sql)) {
      if ($result->num_rows > 0) {
          while($res = $result->fetch_assoc()){
            array_push($this->data, $res);
          }
        $this->status = $this->success_stat;
        http_response_code(200);
      }
      else{
        $this->status = $this->failed_stat;
        http_response_code(400);
      }
    }
    return array(
      'status'=>$this->status,
      'payload'=>$this->data,
      'prepared by'=>', FOOD DATA',
      'timestamp'=>date('D M j, Y G:i:s T')
    );
  }
  // TO DO :: PRIMARY CURD :: !! ------------------------------

  // function add() ----- NOTE : ADD NEW MENU --------
  // function update() -------- NOTE : UPDATE A MENU ------
  // function archive() ---- NOTE : A MENU CANNOT BE DELETED BUT ARCHIVED ---
  // function available() ------ NOTE : CHECK IF A PRODUCT HAS AN INGREDIENT ING_QUANTITY = 0 THEN AVAILABLE IS = 'NO' ELSE 'YES'
  // TO DO :: SECONDARY ::  DECREASE INGREDIENT PER FOOD SALE !! ----------
    // ------------------- 1 ---------------------------
    // GET JSON DATA -> CONVERT TO PHP ARRAY = $JSON_ARRAY; ! READ !
    // SET THE VARIABLE ARRAY ID . this will an array of product id . -> $ARRAY_ID = ARRAY();
    // SET THE VARIABLE ARRAY QUANTITY . this will be an array of product quantity . -> $ARRAY_QUANTITY = ARRAY();
    // FOREACH($JSON_ARRAY as $index => $value){ 
    // ARRAY_PUSH($ARRAY_ID , $ROW['$PROD_ID']);
    // ARRAY_PUSH($ARRAY_QUANTITY , $ROW['$PROD_QUANTITY']);
    // }

    // -------------------- 2 ----------------------------
    // GET THE QUANTITY OF INGREDIENTS ! READ !
    // SET THE VARIABLE QUANTITY FROM DATABASE . this will quantity from DB . -> $DB_QUANTITY = ARRAY(); 
    // FOREACH($ARRAY_ID as $index => $value){
    // $this->SQL = " SELECT 'ING_QUANTITY' FROM TBL_INGREDIENTS WHERE PROD_ID = $ARRAY_ID[$index] " ;
    // if($result = $This->conn->query($this->sql)){
    //    if($result->num_rows > 0){
    //      while($res = $result->fetch_assoc()){
    //        ARRAY_PUSH($DB_QUANTITY , $res);
    //      }
    //    }
    //  } 
    // }
    
    // -------------------- 3 -----------------------------
    // DECREASE THE $DB_QUANTITY ' $DB_QUANTITY - $ARRAY_QUANTITY ' ! READ !
    // GLOBAL VARIABLE . this will be the results after decreasing . -> $MAIN_QUANTITY = ARRAY();
    // FOREACH($ARRAY_QUANTITY as $index => $value) {
    // $ITEM = $DB_QUANTITY[$index] - $value;
    // ARRAY_PUSH($MAIN_QUANTITY, $ITEM);
    // }


    // ------------------- 4 ------------------------------
    // UPDATE THE TBL_INGREDIENTS USING $MAIN_QUANTITY and ARRAY_ID
    // FOREACH($MAIN_QUANTITY as $index => $value){
    // $this->sql = " UPDATE TBL_INGREDIENTS SET ING_QUANTITY = '$value' WHERE PROD_ID = $ARRAY_ID[$index] " ; 
    // $this->conn->query($this->sql);
}
 ?>
