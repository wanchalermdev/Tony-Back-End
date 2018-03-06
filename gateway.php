<?php
$GLOBALS['debug_display'] = false;
/*
Array
(
    [MIBDIRS] => C:/xampp/php/extras/mibs
    [MYSQL_HOME] => \xampp\mysql\bin
    [OPENSSL_CONF] => C:/xampp/apache/bin/openssl.cnf
    [PHP_PEAR_SYSCONF_DIR] => \xampp\php
    [PHPRC] => \xampp\php
    [TMP] => \xampp\tmp
    [HTTP_HOST] => localhost
    [HTTP_CONNECTION] => keep-alive
    [HTTP_UPGRADE_INSECURE_REQUESTS] => 1
    [HTTP_USER_AGENT] => Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.186 Safari/537.36
    [HTTP_ACCEPT_ENCODING] => gzip, deflate, br
    [HTTP_ACCEPT_LANGUAGE] => th-TH,th;q=0.9
    [HTTP_COOKIE] => _ga=GA1.1.1681137447.1518532541
    [PATH] => C:\WINDOWS\system32;C:\WINDOWS;C:\WINDOWS\System32\Wbem;C:\WINDOWS\System32\WindowsPowerShell\v1.0\;C:\Program Files\nodejs\;C:\xampp\php;C:\composer;C:\Program Files\PuTTY\;C:\Users\wanchalermjunsong\AppData\Local\Microsoft\WindowsApps;C:\Program Files\Microsoft VS Code\bin;C:\Users\wanchalermjunsong\AppData\Local\GitHubDesktop\bin;C:\Users\wanchalermjunsong\AppData\Roaming\npm;C:\Users\wanchalermjunsong\AppData\Local\Microsoft\WindowsApps;C:\Users\wanchalermjunsong\AppData\Roaming\Composer\vendor\bin
    [SystemRoot] => C:\WINDOWS
    [COMSPEC] => C:\WINDOWS\system32\cmd.exe
    [PATHEXT] => .COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC
    [WINDIR] => C:\WINDOWS
    [SERVER_SIGNATURE] => 
Apache/2.4.27 (Win32) OpenSSL/1.0.2l PHP/7.1.9 Server at localhost Port 80


    [SERVER_SOFTWARE] => Apache/2.4.27 (Win32) OpenSSL/1.0.2l PHP/7.1.9
    [SERVER_NAME] => localhost
    [SERVER_ADDR] => ::1
    [SERVER_PORT] => 80
    [REMOTE_ADDR] => ::1
    [DOCUMENT_ROOT] => C:/xampp/htdocs
    [REQUEST_SCHEME] => http
    [CONTEXT_PREFIX] => 
    [CONTEXT_DOCUMENT_ROOT] => C:/xampp/htdocs
    [SERVER_ADMIN] => postmaster@localhost
    [SCRIPT_FILENAME] => C:/xampp/htdocs/CHSPaymentBackend/index.php
    [REMOTE_PORT] => 63505
    [GATEWAY_INTERFACE] => CGI/1.1
    [SERVER_PROTOCOL] => HTTP/1.1
    [REQUEST_METHOD] => GET
    [QUERY_STRING] => 
    [REQUEST_URI] => /CHSPaymentBackend/
    [SCRIPT_NAME] => /CHSPaymentBackend/index.php
    [PHP_SELF] => /CHSPaymentBackend/index.php
    [REQUEST_TIME_FLOAT] => 1520135214.487
    [REQUEST_TIME] => 1520135214
)
*/
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

// echo '<pre>';
// print_r($URI);
// print_r($_SERVER);
// echo '</pre>';
// echo count($URI);
?>