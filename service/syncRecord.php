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
$sql ="TRUNCATE ad_report_total_record";
$exe = mysqli_query($conn,$sql);

//Cap nhat lai thong tin
$sql ="INSERT INTO ad_report_total_record(category_id,total_record,date_time,parent_id)
(SELECT category_id, COUNT(a.id) AS total, published_time, parent_id FROM ad_article a INNER JOIN ad_category c ON a.category_id=c.id GROUP BY category_id ,published_time)";
$exe = mysqli_query($conn,$sql);

//update them so luot xem cua chuyen muc cha
$sql ="INSERT INTO ad_report_total_record(category_id,total_record,date_time)
(SELECT parent_id, SUM(total_record) AS total, date_time FROM ad_report_total_record WHERE parent_id>0 GROUP BY parent_id,date_time)";
$exe = mysqli_query($conn,$sql);

mysqli_close($conn);

?>