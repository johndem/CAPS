/********************** HTTP REQUEST ****************************/

var http = getXMLHttpRequest();

function getXMLHttpRequest() {
    if (window.XMLHttpRequest) {
        request = new XMLHttpRequest();
    } 
    else {
        request = new ActiveXObject("Microsoft.XMLHTTP");
    }
    return request;
}

/********************* DELETE FUNC - ALL PAGES *******************/

function onselected(eventid, volid) {

      var myurl = "../back-end/selected.php";
    
      var parameters ="eventid="+eventid+"&volid="+volid;

    
    alert(parameters);

    console.log(parameters);
    http.open("POST", myurl, true);
    http.onreadystatechange = useHttpResponseVol;
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send(parameters);
}

function useHttpResponseVol() {
    if (http.readyState == 4) {
        if (http.status == 200) {
            if (http.responseText == "OK") {
                window.location.reload();   
            }
            else {
                alert(http.responseText);
            }
        }
    }
}

