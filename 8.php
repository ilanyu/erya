<?php
function GetMineURL($mine) {
    $rand = base64_encode($mine * 60 . "&1&" . time() . "&" . rand(001,999) . "&" . rand(001,999) . "&Chrome 35.0.1916.153&0");
    return "http://cdavtc.tsk.erya100.com/student/studentVideoAction!recieveNewVideoTime?videoId=" . $_GET["videoId"] . "&videoNumber=" . $_GET["videoNumber"] . "&courseId=" . $_GET["courseId"] . "&rand=" . $rand . "&ecode=" . md5("1erya_tsk" . $rand) . "&schoolCourseId=" . $_GET["schoolCourseId"];
}
echo '$.get("' . GetMineURL(8) . '");';