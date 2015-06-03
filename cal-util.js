var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

var http = getXMLHttpRequest();

var parent_id = "";

function checkMonth() {
	var month = document.getElementById('mon').innerHTML;
	var d = new Date();
	var current_month = months[d.getMonth()];
	
	console.log("month " + month + "  cur " + current_month );
	
	if (month != current_month) {
		document.getElementById('left').style.visibility = 'visible';
	}
	else {
		document.getElementById('left').style.visibility = 'hidden';
	}
}

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
	parent_id = parent.id;
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
		  if (parent_id == 'right') {
			  document.getElementById('mon').innerHTML = months[previous_num + 1];
		  }
		  else if (parent_id == 'left') {
			  document.getElementById('mon').innerHTML = months[previous_num - 1];
		  }
		  checkMonth();
		
        }
    }
}

$(document).ready(function() {
	$('#')
})