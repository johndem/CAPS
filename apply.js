/********************** HTTP REQUEST ****************************/
function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

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

/*** CANCEL BUTTON FUNCTION *******/

function cancel() {
	var eventId = encodeURIComponent(getParameterByName('id'));

	var parameters = "eventID=" + eventId;

	http.open("POST", "handleCancel.php", true);
    http.onreadystatechange = useHttpResponseVol;
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send(parameters);
}


/**** APPLY BUTTON FUNCTION *********/

function volApply() {

	var eventId = encodeURIComponent(getParameterByName('id'));

	var parameters = "eventID=" + eventId;

	//alert(parameters);
	console.log(parameters);

    http.open("POST", "handleApply.php", true);
    http.onreadystatechange = useHttpResponseVol;
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send(parameters);
}

/****** MAKE REQUEST *******/

function useHttpResponseVol() {
    if (http.readyState == 4) {
        if (http.status == 200) {
            if (http.responseText === "OK") {
                window.location.reload();   
            }
        }
    }
}