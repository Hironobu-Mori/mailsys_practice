<?php
session_start();
require_once(dirname(__FILE__)."/app/core/define.php");

// echo $_SERVER["HTTP_HOST"]."\n";
// var_dump($_SERVER["HTTP_REFERER"]);
// exit;
// echo "<pre>";
// var_dump($_SERVER);
// echo "</pre>";
// exit;

//Alaxリクエスト時
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && (strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest')) {
    $ref = @$_SERVER["HTTP_REFERER"]?: exit;
    $ref_host = parse_url($ref);
    $server = parse_url($_SERVER["HTTP_HOST"]);
    $ref_host["host"] === $server["host"]? true : exit;
    
    if(isset($_SERVER["REQUEST_URI"])) {
        $req_file = basename($_SERVER["REQUEST_URI"]);
    }

    if($_SERVER["REQUEST_URI"] === "/") {
        $req_file = "index.php";
    }

    require_once(CTR_DIR."login.php");
    // echo "<pre>";
    // var_dump($_SERVER);
    // echo "</pre>";
    // exit;
}

//非ログイン時
if(!isset($_SESSION["user"]) || !isset($_SESSION["login_token"])) {
    require_once(CTR_DIR."login.php");
    exit;
}

if(isset($_SERVER["REQUEST_URI"])) {
    $req_file = basename($_SERVER["REQUEST_URI"]);
}

echo "<pre>";
var_dump($_SERVER);
echo "</pre>";
// if(isset($_SERVER["REQUEST_URI"])) {
//     $req_file = basename($_SERVER["REQUEST_URI"]);
// }

// echo $req_file;

