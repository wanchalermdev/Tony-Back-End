<?php
session_start();
$GLOBALS['debug_display'] = false;
function console($str){
    if($GLOBALS['debug_display']){
        echo '<div>';
        echo $str;
        echo '</div>';
    }
}
function SwitchTopic($topic, $id){
    $response = array();
    switch($topic){
        case "abc": 
            $response['operation'] = 'success';
            $response['topic'] = $topic;
            break;
        default : $response['operation'] = 'fail';
    }
    return $response;
}

$URI = explode("/", $_SERVER['REQUEST_URI']);
/*
 * ตรวจสอบเบื้องต้นว่า URI เมื่อ Explode แล้วจะเป็นอาเรย์ขนาด 2 หรือ 3 ตัวเท่านั้น
*/
$count_uri = count($URI);
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if($count_uri == 3){
        console("Good URI Request");
        $DataOperation = SwitchTopic($URI[1], $URI[2]);
        echo json_encode($DataOperation);
    }else{
        console("Bad URI Request");
        http_response_code(404);
    }
}else{
    console("Bad Method Request");
    http_response_code(404);
}
?>