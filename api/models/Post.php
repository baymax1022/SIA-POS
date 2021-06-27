<?php


class Post{
    protected $gm, $pdo, $get;

    public function __construct(\PDO $pdo) {
        $this->pdo = $pdo;
        $this->gm = new GlobalMethods($pdo);
        $this->get = new Get($pdo);
    }

// ADD PRODUCT

public function addPreOrder($data) {

    $code = 401;
    $payload = null;
    $remarks = "failed";
    $message = "Unable to retrieve data";
    $orderInfo = $data->orderInfo;

    $res = $this->gm->insert('tbl_order', $orderInfo);

    if($res['code']==200) {
        $code = 200;
        $payload = $res['data'];
        $remarks = "success";
        $message = "Successfully retrieved data";
        
    }
    return $this->gm->sendPayload($payload, $remarks, $message, $code);
  
}
//update
public function updatePreOrder($data) {

    $code = 401;
    $payload = null;
    $remarks = "failed";
    $message = "Unable to retrieve data";
    $orderInfo = $data->orderInfo;

    $res = $this->gm->edit('tbl_order', $orderInfo);

    if($res['code']==200) {
        $code = 200;
        $payload = $res['data'];
        $remarks = "success";
        $message = "Successfully retrieved data";
        
    }
    return $this->gm->sendPayload($payload, $remarks, $message, $code);
  
}
//ADD TO CART
    public function addOrder($data) {

        $code = 401;
        $payload = null;
        $remarks = "failed";
        $message = "Unable to retrieve data";
        $cardInfo = $data->cardInfo;

        $res = $this->gm->insert('tbl_preorder', $cardInfo);

        if($res['code']==200) {
            $code = 200;
            $payload = $res['data'];
            $remarks = "success";
            $message = "Successfully retrieved data";
            
        }
        return $this->gm->sendPayload($payload, $remarks, $message, $code);
      
    }
    public function addProduct($data) {

        $code = 401;
        $payload = null;
        $remarks = "failed";
        $message = "Unable to retrieve data";
        $productInfo = $data->productInfo;

        $res = $this->gm->insert('tbl_products', $productInfo);

        if($res['code']==200) {
            $code = 200;
            $payload = $res['data'];
            $remarks = "success";
            $message = "Successfully retrieved data";
            
        }
        return $this->gm->sendPayload($payload, $remarks, $message, $code);
      
    }


    public function delOrder($d) { 
        $data = $d; 
        $prodID = $data->prodID;
         $res = $this->gm->delete('tbl_preorder', $data, "prodID = '$prodID'"); if ($res['code'] == 200) 
         {  
            $payload = $res['data'];            
            $remarks = "success";            
            $message = "Successfully retrieved requested data";        
        } 
        else
         {            
             $payload = null;            
             $remarks = "failed";            
             $message = $res['errmsg'];        
            } 
        }

        public function delPre($d) { 
            $data = $d; 
            $order_ID = $data->order_ID;
             $res = $this->gm->delete('tbl_order', $data, "order_ID = '$order_ID'"); if ($res['code'] == 200) 
             {  
                $payload = $res['data'];            
                $remarks = "success";            
                $message = "Successfully retrieved requested data";        
            } 
            else
             {            
                 $payload = null;            
                 $remarks = "failed";            
                 $message = $res['errmsg'];        
                } 
            }



    //CHECK OUT
    
// //DELETE PRODUCT
//     public function delProduct($data) {

//         $code = 401;
//         $payload = null;
//         $remarks = "failed";
//         $message = "Unable to retrieve data";
//         $conditionString = "pid=".$data->pid;
  
//         $res = $this->gm->delete('tbl_products', $data, $conditionString);

//         if($res['code']==200) {
//             $code = 200;
//             $payload = $res;
//             $remarks = "success";
//             $message = "Successfully retrieved data";
//             return $this->get->pullProducts(null);
//         }
//         return $this->gm->sendPayload($payload, $remarks, $message, $code);
//     }



    


    
}
