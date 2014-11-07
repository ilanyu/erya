<?php
$data = json_decode(file_get_contents("http://cdavtc.tsk.erya100.com/player/playerAction!getVideoUrl?videoId=" . $_GET["videoId"] . "&courseId=" . $_GET["courseId"] . "&schoolId=000343&seriNum=" . $_GET["videoNumber"]),1);
function GetURLPro($data) {
    $rand = base64_encode($data["data"]["totalTime"] . "&2&" . time() . "&" . rand(001,999) . "&" . rand(001,999) . "&Chrome 35.0.1916.153&0");
    return "http://cdavtc.tsk.erya100.com/student/studentVideoAction!recieveNewVideoTime?videoId=" . $_GET["videoId"] . "&videoNumber=" . $_GET["videoNumber"] . "&courseId=" . $_GET["courseId"] . "&rand=" . $rand . "&ecode=" . md5("2erya_tsk" . $rand) . "&schoolCourseId=" . $_GET["schoolCourseId"];
}
echo '$.getJSON(
    "' . GetURLPro($data) . '",
    function(data) {
       if (data.status == "1" || data.status == "4") window.close() ;
    }
);';
echo '$.getScript("http://' . $_SERVER["HTTP_HOST"] . '/end.php?videoId=" + document.getElementById("videoId").value + "&videoNumber=" + document.getElementById("videoNumber").value + "&courseId=" + document.getElementById("courseId").value + "&schoolCourseId=" + document.getElementById("schoolCourseId").value);';
