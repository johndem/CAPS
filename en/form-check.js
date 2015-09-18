
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

/************************* UTILITIES **************************/

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


/********************* VOLUNTEER REGISTER **************************/


function getVolValidity() {
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

function checkform() {
    document.getElementById('res-ul').innerHTML = "";
    var error = false;
    var req = getVolValidity();
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
            if (http.responseText === "OK") {
                window.location = "confirm.php";   
            }
            else {
                document.getElementById('res-ul').innerHTML = http.responseText;
            }
        }
    }
}

/********************* ORGANIZATION REGISTER **************************/


function getOrgValidity() {
    var error = false;
    
    var username =  document.getElementById('org-username');
    var email =  document.getElementById('org-email');
    var password =  document.getElementById('password');
    //var conpass =  document.getElementById('con-pass').value;
    var name =  document.getElementById('org-name');
    var website =  document.getElementById('website');
    var facebook =  document.getElementById('facebook');
    var twitter =  document.getElementById('twitter');
    var other =  document.getElementById('other');
    var description =  document.getElementById('description');
   
    // USERNAME //
    if (username.checkValidity() == false ) {
        puterror('username-span','err-username', username.validationMessage);
         error = true;

    }
    else {
         putok('username-span','err-username');
    }
    
    // EMAIL //
    if (email.checkValidity() == false ) {
        puterror('email-span','err-email', email.validationMessage);
        error = true;
    }
    else {
        putok('email-span','err-email');
    }
    
    // PASSWORD //
    if (password.checkValidity() == false ) {
        puterror('password-span','err-password', password.validationMessage);
        error = true;

    }
    else {
         putok('password-span','err-password');
    }
    
    // ORG NAME //
    if (name.checkValidity() == false ) {
        puterror('name-span','err-name', name.validationMessage);
        error = true;

    }
    else {
        putok('name-span','err-name');
    }
    
    // WEBSITE //
    if (website.checkValidity() == false ) {
        puterror('ws-span','err-ws', website.validationMessage);
         error = true;
    }
    else {
        putok('ws-span','err-ws');
    }
    
    // FACEBOOK //
     if (facebook.checkValidity() == false ) {
        puterror('fb-span','err-fb', facebook.validationMessage);
        error = true;

     }
    else {
         putok('fb-span','err-fb');
    }
    
    // TWIITER //
    if (twitter.checkValidity() == false ) {
        puterror('tw-span','err-tw', twitter.validationMessage);
        error = true;

    } 
    else {
         putok('tw-span','err-tw');
    }
    
    // OTHER //
     if (other.checkValidity() == false ) {
        puterror('other-span','err-other', other.validationMessage);
         error = true;

    }
    else {
         putok('other-span','err-other');
    }
    
    // DESCRIPTION //
     if (description.checkValidity() == false ) {
        puterror('desc-span','err-desc', description.validationMessage);
         error = true;

    }
    else {
         putok('desc-span','err-desc');
    }
    
    return error;
}

function checkorgform() {
    document.getElementById('res-ul').innerHTML = "";
    var error = false;
    var req = getOrgValidity();
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
        getOrgResponse();
    }
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
    http.onreadystatechange = useHttpResponseOrg;
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send(parameters);
}

function useHttpResponseOrg() {
    if (http.readyState == 4) {
        if (http.status == 200) {
            if (http.responseText === "OK") {
                window.location = "confirm.php";   
            }
            else {
                document.getElementById('res-ul').innerHTML = http.responseText;
            }
        }
    }
}


/****************** LOGIN ******************************************/

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
                window.location = "index.php";   
            }
            else {
                document.getElementById('res-ul').innerHTML = http.responseText;
            }
        }
    }
}

/****************** EDIT USER INFO ******************************************/

function getEditVolValidity() {
    var error = false;
    
    var first =  document.getElementById('edit-first');
    var last =  document.getElementById('edit-last-name');
    var birth =  document.getElementById('edit-dob');
    var tel = document.getElementById('edit-phone');
    var addr = document.getElementById('edit-address');
    var str = document.getElementById('edit-str');
    var zip = document.getElementById('edit-zip');
   
    
    if (first.checkValidity() == false ) {
        puterror('edit-first-span','edit-err-first', first.validationMessage);
        error = true;

    }
    else {
        putok('edit-first-span','edit-err-first');
    }
    
    if (last.checkValidity() == false ) {
        puterror('edit-last-span','edit-err-last', last.validationMessage);
         error = true;

    }
    else {
        putok('edit-last-span','edit-err-last');
    }
    
    if (birth.checkValidity() == false ) {
        puterror('edit-dob-span','edit-err-dob', birth.validationMessage);
        error = true;

    }
    else {
         putok('edit-dob-span','edit-err-dob');
    }
    
    if (tel.checkValidity() == false ) {
        puterror('edit-phone-span','edit-err-phone', tel.validationMessage);
        error = true;

    } 
    else {
         putok('edit-phone-span','edit-err-phone');
    }
    
    if (addr.checkValidity() == false ) {
        puterror('edit-addr-span','edit-err-addr', addr.validationMessage);
         error = true;

    }
    else {
         putok('edit-addr-span','edit-err-addr');
    }
    
    if (str.checkValidity() == false ) {
        puterror('edit-str-span','edit-err-str', str.validationMessage);
        error = true;

    }
    else {
         putok('edit-str-span','edit-err-str');
    }
    
    if (zip.checkValidity() == false ) {
        puterror('edit-zip-span','edit-err-zip', zip.validationMessage);
        error = true;

    }
    else {
         putok('edit-zip-span','edit-err-zip');
    }

    return error;

}

function checkEditVolForm() {
    document.getElementById('res-ul').innerHTML = "";
    var error = false;
    var req = getEditVolValidity();
    var res = "";
    
    if (req === true) {
        res = res + "<li> Please make sure your input is correct! Mouse over for error message. </li>";
        error = true;
    }
    
    document.getElementById('res-ul').innerHTML = res;

    if (!error) {
        getEditVolResponse();
    }
}

function getEditVolResponse() {
    
    var first = encodeURIComponent(document.getElementById("edit-first").value);
    var last = encodeURIComponent(document.getElementById("edit-last-name").value);
    var phone = encodeURIComponent(document.getElementById("edit-phone").value);
    var address = encodeURIComponent(document.getElementById("edit-address").value);
    var str = encodeURIComponent(document.getElementById("edit-str").value);
    var zip = encodeURIComponent(document.getElementById("edit-zip").value);
    var birth = encodeURIComponent(document.getElementById("edit-dob").value);
    
    var file = document.getElementById('prof-pic').files[0];
    
    // Create a new FormData object.
    var formData = new FormData();
    
    // Add the file to the request.
    formData.append('picture', file);
    formData.append('first', first);
    formData.append('last', last);
    formData.append('phone', phone);
    formData.append('address', address);
    formData.append('str', str);
    formData.append('zip', zip);
    formData.append('date', birth);
    
    $.ajax({  
        url: "check-image.php",  
        type: 'POST',
        enctype: 'multipart/form-data',
        data: formData,
        processData: false,
        contentType: false,
        success: function (data) {  
            if (data === "OK") {
                window.location = "account.php";
            }
            else {
                document.getElementById('res-ul').innerHTML = data;
            }
        }  
    });  

}

/****************** EDIT ORGANISATION INFO ******************************************/

function getEditOrgValidity() {
    var error = false;
    
    var name =  document.getElementById('edit-org-name');
    var website =  document.getElementById('edit-website');
    var facebook =  document.getElementById('edit-facebook');
    var twitter =  document.getElementById('edit-twitter');
    var other =  document.getElementById('edit-other');
    var description =  document.getElementById('edit-description');
   
    
    // ORG NAME //
    if (name.checkValidity() == false ) {
        puterror('edit-name-span','edit-err-name', name.validationMessage);
        error = true;

    }
    else {
        putok('edit-name-span','edit-err-name');
    }
    
    // WEBSITE //
    if (website.checkValidity() == false ) {
        puterror('edit-ws-span','edit-err-ws', website.validationMessage);
         error = true;
    }
    else {
        putok('edit-ws-span','edit-err-ws');
    }
    
    // FACEBOOK //
     if (facebook.checkValidity() == false ) {
        puterror('edit-fb-span','edit-err-fb', facebook.validationMessage);
        error = true;

     }
    else {
         putok('edit-fb-span','edit-err-fb');
    }
    
    // TWIITER //
    if (twitter.checkValidity() == false ) {
        puterror('edit-tw-span','edit-err-tw', twitter.validationMessage);
        error = true;

    } 
    else {
         putok('edit-tw-span','edit-err-tw');
    }
    
    // OTHER //
     if (other.checkValidity() == false ) {
        puterror('edit-other-span','edit-err-other', other.validationMessage);
         error = true;

    }
    else {
         putok('edit-other-span','edit-err-other');
    }
    
    // DESCRIPTION //
     if (description.checkValidity() == false ) {
        puterror('edit-desc-span','edit-err-desc', description.validationMessage);
         error = true;

    }
    else {
         putok('edit-desc-span','edit-err-desc');
    }
    
    return error;

}

function checkEditOrgForm() {
    document.getElementById('res-ul').innerHTML = "";
    var error = false;
    var req = getEditOrgValidity();
    var res = "";
    
    if (req === true) {
        res = res + "<li> Please make sure your input is correct! Mouse over for error message. </li>";
        error = true;
    }
    
    document.getElementById('res-ul').innerHTML = res;

    if (!error) {
        getEditOrgResponse();
    }
}

function getEditOrgResponse() {
    
    var name = encodeURIComponent(document.getElementById("edit-org-name").value);
    var website = encodeURIComponent(document.getElementById("edit-website").value);
    var facebook = encodeURIComponent(document.getElementById("edit-facebook").value);
    var twitter = encodeURIComponent(document.getElementById("edit-twitter").value);
    var other = encodeURIComponent(document.getElementById("edit-other").value);
    var description = encodeURIComponent(document.getElementById("edit-description").value);
    
    var file = document.getElementById('prof-pic').files[0];
    
    // Create a new FormData object.
    var formData = new FormData();
    
    // Add the file to the request.
    formData.append('picture', file);
    formData.append('name', name);
    formData.append('website', website);
    formData.append('facebook', facebook);
    formData.append('twitter', twitter);
    formData.append('other', other);
    formData.append('description', description);
    
    $.ajax({  
        url: "check-image.php",  
        type: 'POST',
        enctype: 'multipart/form-data',
        data: formData,
        processData: false,
        contentType: false,
        success: function (data) {  
            if (data === "OK") {
                window.location = "account.php";
            }
            else {
                document.getElementById('res-ul').innerHTML = data;
            }
        }  
    });  
}