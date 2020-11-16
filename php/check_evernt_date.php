<?php

$output = [
  'success' => false,
  'message' => ''
];
$today_date = date('Y-m-d h:i:s'); //判斷活動截止
$start_date = '2020-11-09 00:00:00';
$end_date = '2020-11-15 23:59:59';

if (strtotime($today_date) < strtotime($start_date)){
  $output['message'] = '活動尚未開始';
  echo json_encode($output, JSON_UNESCAPED_UNICODE);
  exit;
};

if (strtotime($today_date) > strtotime($end_date)) {
  $output['message'] = '活動已截止！';
  echo json_encode($output, JSON_UNESCAPED_UNICODE);
  exit;
};

if (strtotime($today_date) >= strtotime($start_date) && strtotime($today_date) <= strtotime($end_date)) {
  $output['message'] = '活動進行中';
  echo json_encode($output, JSON_UNESCAPED_UNICODE);
  exit;
};


?>