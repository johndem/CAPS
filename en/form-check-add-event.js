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
    
    imgspan.innerHTML = "<img class='err-img' src='../images/other/check.jpg'>";
    span.innerHTML = "OK";
}

function puterror(imgid,mspanid,errmess) {
    
        var imgspan = document.getElementById(imgid);
        var span = document.getElementById(mspanid);
        
        imgspan.innerHTML = "<img class='err-img' src='../images/other/exc-mark.png'>";
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
    var ddesc = document.getElementById('ddesc');
    
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
    if (category.value == 0 ) {
        puterror('category-span','err-category', "Please choose a category");
        error = true;

    }
    else {
        putok('category-span','err-category');
    }
    
    // Age Group
    if (agegroup.value == 0 ) {
        puterror('agegroup-span','err-agegroup', "Please select the age group");
         error = true;

    }
    else {
        putok('agegroup-span','err-agegroup');
    }
    
    // Skills
    if (skills.value == 0 ) {
        puterror('skills-span','err-skills', "Please choose at least one skill");
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
    
    //Detailed Description
    if (ddesc.checkValidity() == false ) {
        puterror('ddesc-span','err-ddesc', ddesc.validationMessage);
        error = true;

    }
    else {
         putok('ddesc-span','err-ddesc');
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
    if (area.value == 0 ) {
        puterror('area-span','err-area', "Please select the event place/area");
        error = true;

    }
    else {
         putok('area-span','err-area');
    }
    
    
    return error;

}
function getSelectedOptions(sel) {
    var opts = [], opt;
    
    // loop through options in select list
    for (var i=0, len=sel.options.length; i<len; i++) {
        opt = sel.options[i];
        
        // check if selected
        if ( opt.selected ) {
            // add to array of option elements to return from this function
            opts.push(opt);
        }
    }
    
    // return array containing references to selected option elements
    return opts;
}

/*************************** Add Event utilities ***************************/

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
        getResponse();
    }
    
}

// Get Response
function getResponse() {
    
    var category =  document.getElementById('category');
    
    var agegroup =  document.getElementById('agegroup');
    //var skills = document.getElementById('skills');
    //var desc = document.getElementById('desc');
    
    var area =  document.getElementById('area');
    //var addr = document.getElementById('address');
    // var str = document.getElementById('str');
    //var zip = document.getElementById('zip');
    
    
    var myurl = "../back-end/add-event.php";
    var title = encodeURIComponent(document.getElementById('op-title').value);
    var category = encodeURIComponent(category.options[category.selectedIndex].text);
      
    var day = encodeURIComponent(document.getElementById('day').value);
    var time = encodeURIComponent(document.getElementById('time').value);
      
    var address = encodeURIComponent(document.getElementById("address").value);
    var str = encodeURIComponent(document.getElementById("str").value);
    var zip = encodeURIComponent(document.getElementById("zip").value);
    var area = encodeURIComponent(area.options[area.selectedIndex].text);
    
    var agegroup = encodeURIComponent(agegroup.options[agegroup.selectedIndex].text);
    var desc = encodeURIComponent(document.getElementById("desc").value);
    var ddesc = encodeURIComponent(document.getElementById("ddesc").value);
    var skills = getSelectedOptions(document.getElementById("skills"));
    
//    alert(title + " " + desc + " AAAAAAAAA     " + ddesc);
    
    var file = document.getElementById('event-pic').files[0];
    var file2 = document.getElementById('event-pic2').files[0];
    var file3 = document.getElementById('event-pic3').files[0];
    
    var btn = document.getElementById('sButton').value;
    
    // Create a new FormData object.
    var formData = new FormData();
    
    // Add the file to the request.
    formData.append('event-picture', file);
    formData.append('event-picture2', file2);
    formData.append('event-picture3', file3);
    formData.append('title', title);
    formData.append('category', category);
    formData.append('date', day);
    formData.append('time', time);
    formData.append('address', address);
    formData.append('str', str);
    formData.append('zip', zip);
    formData.append('area', area);
    formData.append('agegroup', agegroup);
    formData.append('description', desc);
    formData.append('detailed-description', ddesc);
    for (var i=0; i<skills.length; i++) {
        var skill = 'skill' + i;
        formData.append(skill, skills[i].value);
        alert(skills[i].value + "   " + skill);
    }
    formData.append('skills', skills);
    formData.append('button', btn);
    
//         var parameters = "title="+title+"&category="+category+"&day="+day+"&time="+time+"&desc="+desc+"&ddesc="+ddesc+"&agegroup="+agegroup+"&address="+address+"&str="+str+"&zip="+zip+"&area="+area+"&skills="+skills;
//    
//    alert(parameters);
    
    $.ajax({  
        url: "check-event-image.php",  
        type: 'POST',
        enctype: 'multipart/form-data',
        data: formData,
        processData: false,
        contentType: false,
        success: function (data) {  
            if (data === "OK") {
                window.location = "index.php";
            }
            else {
                document.getElementById('res-ul').innerHTML = data;
            }
        }  
    });  


    

//
//     console.log(parameters);
//     http.open("POST", myurl, true);
//     http.onreadystatechange = useHttpResponse;
//     http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//     http.send(parameters);
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


/*************************** Update Event utilities ***************************/

//Check Form
function checkEventEditForm() {
    document.getElementById('res-ul').innerHTML = "";
    var req = getValidity();
    var res = "";
    
    if (req === true) {
        res = res + "<li> Please make sure your input is correct! Mouse over for error message. </li>";
        document.getElementById('res-ul').innerHTML = res;
    }
    else {
        getEventEditResponse();
    }
    
}

// Get Response
function getEventEditResponse() {
    
    var category =  document.getElementById('category');
    
    var agegroup =  document.getElementById('agegroup');
    //var skills = document.getElementById('skills');
    //var desc = document.getElementById('desc');
    
    var area =  document.getElementById('area');
    //var addr = document.getElementById('address');
    //var str = document.getElementById('str');
    //var zip = document.getElementById('zip');
    
    
    var myurl = "edit-event.php";
    var title = encodeURIComponent(document.getElementById('op-title').value);
    var category = encodeURIComponent(category.options[category.selectedIndex].text);
      
    var day = encodeURIComponent(document.getElementById('day').value);
    var time = encodeURIComponent(document.getElementById('time').value);
      
    var address = encodeURIComponent(document.getElementById("address").value);
    var str = encodeURIComponent(document.getElementById("str").value);
    var zip = encodeURIComponent(document.getElementById("zip").value);
    var area = encodeURIComponent(area.options[area.selectedIndex].text);
    
    var agegroup = encodeURIComponent(agegroup.options[agegroup.selectedIndex].text);
    var desc = encodeURIComponent(document.getElementById("desc").value);
    var ddesc = encodeURIComponent(document.getElementById("ddesc").value);
    var skills = getSelectedOptions(document.getElementById("skills"));
    
    
    var file = document.getElementById('edit-event-pic').files[0];
    var file2 = document.getElementById('edit-event-pic2').files[0];
    var file3 = document.getElementById('edit-event-pic3').files[0];
    var btn = document.getElementById('sButton').value;
    
    // Create a new FormData object.
    var formData = new FormData();
    
    // Add the file to the request.
    formData.append('event-picture', file);
    formData.append('event-picture2', file2);
    formData.append('event-picture3', file3);
    formData.append('title', title);
    formData.append('category', category);
    formData.append('date', day);
    formData.append('time', time);
    formData.append('address', address);
    formData.append('str', str);
    formData.append('zip', zip);
    formData.append('area', area);
    formData.append('agegroup', agegroup);
    formData.append('description', desc);
    formData.append('detailed-description', ddesc);
    for (var i=0; i<skills.length; i++) {
        var skill = 'skill' + i;
        formData.append(skill, skills[i].value);
        alert(skills[i].value + "   " + skill);
    }
    formData.append('button', btn);
    
    $.ajax({  
        url: "check-event-image.php",  
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