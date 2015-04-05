function checkpass() {
    var elpass =  document.getElementById("password");
    var elconf = document.getElementById('con-pass');
    var span = document.getElementById('pass-span');
	var button = document.getElementById("sButton");
    var pass = elpass.value;
    var conf = elconf.value;
    console.log(pass + " " + conf);
    
    if (conf != pass) {
        elconf.style.border = "solid 2px red";
        span.innerHTML = "<img src='X.jpg'>";
        //button.disabled = true;
    }
    else {
        elconf.style.border = "solid 2px green";
        span.innerHTML = "<img src='check.jpg'>";
		//button.disabled = false;
    }
}

/*
function checkuser() {
    $("#username").keyup(function () {
        var username = $(this).val();
        $.post('check-username.php', {'username':username}, function(data) {
			if (data == '1') {
				//$("#sButton").attr("disabled", false);
				$("#user-span").html("<img src='check.jpg'>");
				$('#username').css('border', 'solid 2px green');
			}
			else {
				//$("#sButton").attr("disabled", true);
				$("#user-span").html("<img src='X.jpg'>");
				$('#username').css('border', 'solid 2px red');
			}
        });
    });
}

function checkemail() {
    $("#email").keyup(function () {
        var email = $(this).val();
        $.post('check-email.php', {'email':email}, function(data) {
            if (data == '1') {
				$("#sButton").attr("disabled", false);
				$("#email-span").html("<img src='check.jpg'>");
				$('#email').css('border', 'solid 2px green');
			}
			else {
				$("#sButton").attr("disabled", true);
				$("#email-span").html("<img src='X.jpg'>");
				$('#email').css('border', 'solid 2px red');
			}
        });
    });
}
*/

var http = getXMLHttpRequest();

function getXMLHttpRequest()
{
  if(window.XMLHttpRequest) {
    request = new XMLHttpRequest();
  } else {
    request = new ActiveXObject("Microsoft.XMLHTTP");
  }
  return request;
}


function getResponse() {
  var myurl = "check-username.php";
  var usernamevalue= encodeURIComponent(document.getElementById("username").value);
  var emailvalue=encodeURIComponent(document.getElementById("email").value);
  var parameters="username="+usernamevalue+"&email="+emailvalue;
  console.log(parameters);
  http.open("POST", myurl,true);
  http.onreadystatechange = useHttpResponse;
  http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  http.send(parameters);
}

function useHttpResponse() {
  if (http.readyState == 4) {
    if (http.status == 200) {
       document.getElementById('results').innerHTML = http.responseText;
    }
      else {
          alert("failed");
      }
  }
}