function sendTimetable(timetable) {
    if (window.XMLHttpRequest) {
        //code for IE7+, Firefox, Chrome and Opera
        xmlhttp = new XMLHttpRequest();
    }
    else {
        //code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.body.innerHTML = xmlhttp.responseText;
        }
    }

    var url = "../submit_timetable.php";

    xmlhttp.open("POST", url, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("data="+JSON.stringify( timetable.getShifts() ));

}

sendTimetable(timetable);