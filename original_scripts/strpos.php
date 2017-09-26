<?php
// if (
//     isset($argument['URL']) && $argument['URL'] === '/admin/shop.json' &&
//     isset($argument['METHOD']) && $argument['METHOD'] === 'GET'
// ) {
//     return true;

// $originUrl = '/qq/aQdmin/adminMQQQQQ/m';
// $originUrl = '/admin/orders/count.json';
// $condition = (strpos($originUrl, '/admin/') !== 0);
//
// if ($condition) {
//     $url = str_replace('//', '/', '/admin/' . preg_replace('/\/?admin\/?/', '', $originUrl));
// } else {
//     $url = 'NO!';
// }
//
// var_dump($condition);
// var_dump($url);

$url = '/orders/count.json';
var_dump($url);

if (strpos($url, '/admin/') !== 0) {
    $result = str_replace('//', '/', '/admin/' . preg_replace('/\/?admin\/?/', '', $url));
    echo "HOLA\n";
    var_dump($result);
}

if (strpos($url, '/admin/') > 0) {
    echo "> 0";
    $adminUrl = '/admin/' . preg_replace('/\/?admin\/?/', '', $url);
    $result = str_replace('//', '/', $adminUrl);
    var_dump($result);
}
