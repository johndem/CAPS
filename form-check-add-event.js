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

$(document).ready(function() {
    $("#day").datepicker({
  dateFormat: "dd-mm-yy"
});
    
 });

function putok(imgid,mspanid) {
    var imgspan = document.getElementById(imgid);
    var span = document.getElementById(mspanid);
    
    imgspan.innerHTML = "<img class='err-img' src='check.jpg'>";
    span.innerHTML = "OK";
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

//Check validity
function getValidity() {
    var error = false;
    
    var title =  document.getElementById('op-title');
    var category =  document.getElementById('category');
    
    var agegroup =  document.getElementById('agegroup');
    var skills = document.getElementById('skills');
    var desc = document.getElementById('desc');
    
    var day =  document.getElementById('day');
    var time = document.getElementById('time');
    
    var area =  document.getElementById('area');
    var addr = document.getElementById('address');
    var str = document.getElementById('str');
    var zip = document.getElementById('zip');
   
    //Title
    if (title.checkValidity() == false ) {
        puterror('title-span','err-title', title.validationMessage);
        error = true;
    }
    else {
        putok('title-span','err-title');
    }
    
    //Category
    if (category.checkValidity() == false ) {
        puterror('category-span','err-category', category.validationMessage);
        error = true;

    }
    else {
        putok('category-span','err-category');
    }
    
    // Age Group
    if (agegroup.checkValidity() == false ) {
        puterror('agegroup-span','err-agegroup', agegroup.validationMessage);
         error = true;

    }
    else {
        putok('agegroup-span','err-agegroup');
    }
    
    // Skills
    if (skills.checkValidity() == false ) {
        puterror('skills-span','err-skills', skills.validationMessage);
         error = true;

    }
    else {
         putok('skills-span','err-skills');
    }
    
    //Description
    if (desc.checkValidity() == false ) {
        puterror('desc-span','err-desc', desc.validationMessage);
        error = true;

    }
    else {
         putok('desc-span','err-desc');
    }
    
    
    //Day
     if (day.checkValidity() == false ) {
        puterror('day-span','err-day', day.validationMessage);
        error = true;

     }
    else {
         putok('day-span','err-day');
    }
    
    //Time
    if (time.checkValidity() == false ) {
        puterror('time-span','err-time', time.validationMessage);
        error = true;

    } 
    else {
         putok('time-span','err-time');
    }
    
    //Adress
     if (addr.checkValidity() == false ) {
        puterror('addr-span','err-addr', addr.validationMessage);
         error = true;

    }
    else {
         putok('addr-span','err-addr');
    }
    
    //Street Number
     if (str.checkValidity() == false ) {
        puterror('str-span','err-str', str.validationMessage);
         error = true;

    }
    else {
         putok('str-span','err-str');
    }
    
    //Zip Code
     if (zip.checkValidity() == false ) {
        puterror('zip-span','err-zip', zip.validationMessage);
        error = true;

    }
    else {
         putok('zip-span','err-zip');
    }

    
    //Area 
    if (area.checkValidity() == false ) {
        puterror('area-span','err-area', area.validationMessage);
        error = true;

    }
    else {
         putok('area-span','err-area');
    }
    
    
    return error;

}

//Check Form
function checkform() {
    document.getElementById('res-ul').innerHTML = "";
    var req = getValidity();
    var res = "";
    
    if (req === true) {
        res = res + "<li> Please make sure your input is correct! Mouse over for error message. </li>";
        document.getElementById('res-ul').innerHTML = res;
    }
    else {
        //getResponse();
    }
    
}

// Get Response
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

// Use Response
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