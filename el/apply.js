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

	http.open("POST", "../back-end/handleCancel.php", true);
    http.onreadystatechange = useHttpResponseVol;
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send(parameters);
}


/**** APPLY BUTTON FUNCTION *********/
function volApply() {


    // Get the modal
var modal = document.getElementById('myModal');
modal.style.display = "block";

// Get the button that opens the modal
var btn = document.getElementById("vol-sub");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];


// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

btn.onclick = function() {
	var eventId = encodeURIComponent(getParameterByName('id'));
    var skill_value = document.getElementById("vol-input").value;

	var parameters = "eventID=" + eventId + "&skill=" + skill_value;

	console.log(parameters);

    http.open("POST", "../back-end/handleApply.php", true);
    http.onreadystatechange = useHttpResponseVol;
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send(parameters);
}
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
