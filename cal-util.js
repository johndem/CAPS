var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

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

function getResponseCal(parent) {
    var month = document.getElementById('mon').innerHTML;
     var parameters = "month="+month+"&arrow="+parent.id;
	
    console.log(parameters);
    http.open("POST", "cal-handler.php", true);
    http.onreadystatechange = useHttpResponseCal;
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send(parameters);
}

function useHttpResponseCal() {
    if (http.readyState == 4) {
        if (http.status == 200) {
           document.getElementById('cal-cont').innerHTML = http.responseText;
		  var previous = document.getElementById('mon').innerHTML;
		  var previous_num = months.indexOf(previous);
		  
		  console.log(previous + " " + previous_num);
		document.getElementById('mon').innerHTML = months[previous_num + 1];
        }
    }
}

$(document).ready(function() {
	$("td").hover(function() {
		$(this).toggleClass("cal-back");
	})
})