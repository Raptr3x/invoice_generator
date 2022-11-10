<?php 

/*
when live, implement:
if(!empty($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER']=="www.mywebiste.com/ajaxurl") 
{
//AJAX Request from own server 
} 
*/
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");
header("Content-type:application/json");
include_once "./database.php";

$conn = get_connection();

switch ($_POST['f']) {
    case 'compare_login_cookies':
        $cookie_val = filter_var($_POST['cookieValue'], FILTER_SANITIZE_STRING);
        if(strlen($cookie_val)==32){
            $res = select_cond($conn, "users", "recovery='".$cookie_val."'");
            if(isset($res[0])){
                echo json_encode(true);
            }
        }
        break;
    
    default:
        # code...
        break;
}



?>