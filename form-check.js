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

function check_required_fields() {
    var error = false;
    
    var first =  document.getElementById('first').value;
    var last =  document.getElementById('last-name').value;
    var username =  document.getElementById('username').value;
    var email =  document.getElementById('email').value;
    var password =  document.getElementById('password').value;
    var conpass =  document.getElementById('con-pass').value;
    var birth =  document.getElementById('dob').value;
   
    
    if (first.trim().length === 0 || last.trim().length=== 0 || username.trim().length=== 0|| email.trim().length=== 0 || password.trim().length=== 0 || conpass.trim().length=== 0 || birth.trim().length=== 0) {
        error = true;
    }
    return error;
}



function checkform() {
document.getElementById('res-ul').innerHTML = "";
var error = false;
var req = check_required_fields();
var res = "";
if (req === true) {
    res = res + "<li> Please fill in all required fields. </li>";
    error = true;
}
var elpass =  document.getElementById("password").value;
var elconf = document.getElementById('con-pass').value;
if (elconf != elpass) {
    res = res + "<li>Passwords do no match!</li>";
    error = true;
}
document.getElementById('res-ul').innerHTML = res;

if (!error) {
    getResponse();
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
      var first= encodeURIComponent(document.getElementById("first").value);
      var last= encodeURIComponent(document.getElementById("last-name").value);
      var password= encodeURIComponent(document.getElementById("password").value);
      var phone= encodeURIComponent(document.getElementById("phone").value);
      var address= encodeURIComponent(document.getElementById("address").value);
      var str= encodeURIComponent(document.getElementById("str-num").value);
      var zip= encodeURIComponent(document.getElementById("zip").value);
      var usernamevalue= encodeURIComponent(document.getElementById("username").value);
      var emailvalue=encodeURIComponent(document.getElementById("email").value);
      var birth= encodeURIComponent(document.getElementById("dob").value);

      var parameters="username="+usernamevalue+"&email="+emailvalue+"&first="+first+"&last="+last+"&password="+password+"&phone="+phone+"&address="+address+"&str="+str+"&zip="+zip+"&birth="+birth;

    console.log(parameters);
    http.open("POST", myurl,true);
    http.onreadystatechange = useHttpResponse;
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send(parameters);
}

function useHttpResponse() {
  if (http.readyState == 4) {
    if (http.status == 200) {
     if (http.responseText === "OK") {
            window.location = "confirm.html";
     }
        else {
            document.getElementById('res-ul').innerHTML(http.responseText);
        }
  }
}
}