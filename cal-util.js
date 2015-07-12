var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

var http = getXMLHttpRequest();

var parent_id = "";

document.onkeydown = checkKey;

function checkKey(e) {

    e = e || window.event;

    if (e.keyCode == '37') {
       getResponseCal(document.getElementById('left'));
    }
    else if (e.keyCode == '39') {
        getResponseCal(document.getElementById('right'));

    }

}

function checkMonth() {
	var month = document.getElementById('mon').innerHTML;
	var d = new Date();
	var current_month = months[d.getMonth()];
	var year = document.getElementById('year').innerHTML;
	year = parseInt(year);


	
	console.log("month " + month + "  cur " + current_month + "year " + d.getFullYear() + " " + year);
	if (d.getFullYear() == year) {
		if (month != current_month) {
		document.getElementById('left').style.visibility = 'visible';
		}
		else {
			document.getElementById('left').style.visibility = 'hidden';
		}
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
    var year = document.getElementById('year').innerHTML;
	year = parseInt(year);
    var parameters = "month="+month+"&arrow="+parent.id+"&year="+year;
	
    console.log(parameters);
    http.open("POST", "cal-handler.php", true);
    http.onreadystatechange = useHttpResponseCal;
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send(parameters);
}


function useHttpResponseCal() {
    if (http.readyState == 4) {
        if (http.status == 200) {
        	document.getElementById('loading').innerHTML = "";
           document.getElementById('cal-cont').innerHTML = http.responseText;
		  var previous = document.getElementById('mon').innerHTML;
		  var previous_num = months.indexOf(previous);
		  var year = document.getElementById('year').innerHTML;
		  year = parseInt(year);

		  console.log(previous + " " + previous_num);
		  if (parent_id == 'right') {
		  	  if (previous === 'December' ) {
		  	   document.getElementById('mon').innerHTML = months[0];
			   document.getElementById('year').innerHTML = year + 1;
		  	  }
		  	  else {

			  document.getElementById('mon').innerHTML = months[previous_num + 1];
			  document.getElementById('year').innerHTML = year;
			}
		  }
		  else if (parent_id == 'left') {
		  	if (previous === 'January' ) {
		  	   document.getElementById('mon').innerHTML = months[11];
			   document.getElementById('year').innerHTML = year - 1;
		  	  }
		  	  else {

			  document.getElementById('mon').innerHTML = months[previous_num - 1];
			  document.getElementById('year').innerHTML = year;
			}

		  }
		  checkMonth();
		
        }
        

    }
    else {
        	document.getElementById('loading').innerHTML = '<img src="images/loading.gif"/>';
        }
    
}

$(document).ready(function() {
	$('#')
})