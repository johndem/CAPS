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
  var myurl = "volregi.php";
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

