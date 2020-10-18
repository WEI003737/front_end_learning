<?php

// 新增
// setcookie('user', 'Lisa', 'time()+3600');

//移除:設為空值
setcookie('user', '', 'time()-3600');

echo $_COOKIE['user'];

?>