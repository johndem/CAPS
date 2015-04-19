$(document).ready(function() {
    $("#dob").datepicker({
  dateFormat: "dd-mm-yy"
});
 });

function checkpass() {
    var elpass =  document.getElementById("password");
    var elconf = document.getElementById('con-pass');
    var span = document.getElementById('conf-span');

    var pass = elpass.value;
    var conf = elconf.value;
    console.log(pass + " " + conf);
     
    if (conf != pass) {
       
        puterror("conf-span",'err-conf', 'Passwords do not match!')
        //button.disabled = true;
    }
    else {
       putok('conf-span', 'err-conf');
		//button.disabled = false;
    }
}

function putok(imgid,mspanid) {
    var imgspan = document.getElementById(imgid);
    var span = document.getElementById(mspanid);
    
    imgspan.innerHTML = "<img class='err-img' src='check.jpg'>";
    span.innerHTML = "";
}

function puterror(imgid,mspanid,errmess) {
    
        var imgspan = document.getElementById(imgid);
        var span = document.getElementById(mspanid);
        
        imgspan.innerHTML = "<img class='err-img' src='images/exc-mark.png'>";
        span.innerHTML = errmess;
        
        imgspan.onmouseover = function () {
            span.style.display  = 'block';
        }
        
         imgspan.onmouseout = function () {
            span.style.display = 'none';
        }
    
}

function getValidity() {
    var error = false;
    
    var email =  document.getElementById('email');
    var first =  document.getElementById('first');
    var last =  document.getElementById('last-name');
    var username =  document.getElementById('username');
    var password =  document.getElementById('password');
    var conpass =  document.getElementById('con-pass');
    var birth =  document.getElementById('dob');
    var tel = document.getElementById('phone');
    var addr = document.getElementById('address');
    var str = document.getElementById('str');
    var zip = document.getElementById('zip');
   
    if (email.checkValidity() == false ) {
        puterror('email-span','err-email', email.validationMessage);
        error = true;
    }
    else {
        putok('email-span','err-email');
    }
    
    if (first.checkValidity() == false ) {
        puterror('first-span','err-first', first.validationMessage);
        error = true;

    }
    else {
        putok('first-span','err-first');
    }
    
    if (last.checkValidity() == false ) {
        puterror('last-span','err-last', last.validationMessage);
         error = true;

    }
    else {
        putok('last-span','err-last');
    }
    
    if (username.checkValidity() == false ) {
        puterror('username-span','err-username', username.validationMessage);
         error = true;

    }
    else {
         putok('username-span','err-username');
    }
    
    if (password.checkValidity() == false ) {
        puterror('password-span','err-password', password.validationMessage);
        error = true;

    }
    else {
         putok('password-span','err-password');
    }
    
     if (birth.checkValidity() == false ) {
        puterror('dob-span','err-dob', birth.validationMessage);
        error = true;

     }
    else {
         putok('dob-span','err-dob');
    }
    
    if (tel.checkValidity() == false ) {
        puterror('phone-span','err-phone', tel.validationMessage);
        error = true;

    } 
    else {
         putok('phone-span','err-phone');
    }
    
     if (addr.checkValidity() == false ) {
        puterror('addr-span','err-addr', addr.validationMessage);
         error = true;

    }
    else {
         putok('addr-span','err-addr');
    }
    
     if (str.checkValidity() == false ) {
        puterror('str-span','err-str', str.validationMessage);
         error = true;

    }
    else {
         putok('str-span','err-str');
    }
    
     if (zip.checkValidity() == false ) {
        puterror('zip-span','err-zip', zip.validationMessage);
        error = true;

    }
    else {
         putok('zip-span','err-zip');
    }

    return error;

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



function check_org_required_fields() {
    var error = false;
    
    var username =  document.getElementById('org-username').value;
    var email =  document.getElementById('org-email').value;
    var password =  document.getElementById('password').value;
    var conpass =  document.getElementById('con-pass').value;
    var name =  document.getElementById('org-name').value;
    var website =  document.getElementById('website').value;
    var facebook =  document.getElementById('facebook').value;
    var twitter =  document.getElementById('twitter').value;
    var other =  document.getElementById('other').value;
    var description =  document.getElementById('description').value;
   
    
    if (username.trim().length === 0 || email.trim().length=== 0 || password.trim().length=== 0|| conpass.trim().length=== 0 || name.trim().length=== 0 || description.trim().length=== 0) {
        error = true;
    }
    return error;
}



function checkform() {
    document.getElementById('res-ul').innerHTML = "";
    var error = false;
    var req = getValidity();
    var res = "";
    
    if (req === true) {
        res = res + "<li> Please make sure your input is correct! Mouse over for error message. </li>";
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





function getResponse() {
      var myurl = "check-username.php";
      var first = encodeURIComponent(document.getElementById("first").value);
      var last = encodeURIComponent(document.getElementById("last-name").value);
      var password = encodeURIComponent(document.getElementById("password").value);
      var phone = encodeURIComponent(document.getElementById("phone").value);
      var address = encodeURIComponent(document.getElementById("address").value);
      var str = encodeURIComponent(document.getElementById("str").value);
      var zip = encodeURIComponent(document.getElementById("zip").value);
      var usernamevalue = encodeURIComponent(document.getElementById("username").value);
      var emailvalue = encodeURIComponent(document.getElementById("email").value);
      var birth = encodeURIComponent(document.getElementById("dob").value);
    
      var parameters = "username="+usernamevalue+"&email="+emailvalue+"&first="+first+"&last="+last+"&password="+password+"&phone="+phone+"&address="+address+"&str="+str+"&zip="+zip+"&birth="+birth;

    console.log(parameters);
    http.open("POST", myurl, true);
    http.onreadystatechange = useHttpResponse;
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send(parameters);
}



function getOrgResponse() {
      var myurl = "check-org-username.php";
      var username = encodeURIComponent(document.getElementById("org-username").value);
      var email = encodeURIComponent(document.getElementById("org-email").value);
      var password = encodeURIComponent(document.getElementById("password").value);
      var name = encodeURIComponent(document.getElementById("org-name").value);
      var website = encodeURIComponent(document.getElementById("website").value);
      var facebook = encodeURIComponent(document.getElementById("facebook").value);
      var twitter = encodeURIComponent(document.getElementById("twitter").value);
      var other = encodeURIComponent(document.getElementById("other").value);
      var description = encodeURIComponent(document.getElementById("description").value);
    
      var parameters = "username="+username+"&email="+email+"&password="+password+"&name="+name+"&website="+website+"&facebook="+facebook+"&twitter="+twitter+"&other="+other+"&description="+description;

    console.log(parameters);
    http.open("POST", myurl, true);
    http.onreadystatechange = useHttpResponse;
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send(parameters);
}

function getLogResponse() {
    var myurl = "log.php";
    
    var username = encodeURIComponent(document.getElementById("log-username").value);
    var password = encodeURIComponent(document.getElementById("log-password").value);

    var parameters = "username="+username+"&password="+password;
    
    console.log(parameters);
    http.open("POST", myurl, true);
    http.onreadystatechange = useHttpResponse;
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send(parameters);
}

function useHttpResponse() {
    if (http.readyState == 4) {
        if (http.status == 200) {
            if (http.responseText === "OK") {
                //$('.registration').hide();//css("display","none");
                //$('.logged').show();//css("display","block");
				//$('.registration').addClass("disappear");
                //$('.logged').removeClass("disappear");
                window.location = "index.php";   
            }
            else {
                document.getElementById('res-ul').innerHTML = http.responseText;
            }
        }
    }
}