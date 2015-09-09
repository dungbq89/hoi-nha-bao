<?php
/**
 * Created by PhpStorm.
 * User: Ta Van Ngoc
 * Date: 8/31/15
 * Time: 11:42 PM
 */
date_default_timezone_set('Asia/Ho_Chi_Minh');
function mysqlConnect(){
    $server = 'localhost';
    $port='3306';
    $username = 'hoinhabao';
    $password = 'Hnb!23$';
    $dbName = 'hnb';
    $link = mysqli_connect($server,$username, $password,$dbName,$port);
    if (!$link) {
        die('Connect Error: ' . mysqli_connect_error());
    }
    mysqli_select_db($link,$dbName);
    return $link;
}

$conn = mysqlConnect();
mysqli_set_charset($conn,'utf8');
//Xoa du lieu trong bang ad_report_hitcounter
$sql ="TRUNCATE ad_report_hitcounter";
$exe = mysqli_query($conn,$sql);
//Cap nhat lai thong tin
$sql ="INSERT INTO ad_report_hitcounter(category_id,hitcounter,parent_id)
(SELECT category_id, SUM(hit_count) AS total ,parent_id FROM ad_article INNER JOIN ad_category ON ad_article.category_id=ad_category.id GROUP BY category_id)";
$exe = mysqli_query($conn,$sql);
//update them so luot xem cua chuyen muc cha
$sql ="INSERT INTO ad_report_hitcounter(category_id,hitcounter)
(SELECT parent_id, SUM(hitcounter) AS total FROM ad_report_hitcounter WHERE parent_id>0 GROUP BY parent_id)";
$exe = mysqli_query($conn,$sql);

mysqli_close($conn);

?>