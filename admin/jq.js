$(document).ready(function () {
    
	
	$('#logout').click(function() {
		$.ajax( {
			type: "POST",
			url: "logout.php",
			data: "action=unsetsession",
			success: function(msg) {
				if(msg=="success") {
					//window.location = "index.php";
					//window.location.reload();
					history.go(0);
				}
				else {
					// it failed
				}
			},
			error: function(msg) {
				alert("There was a problem loading a page.");
			}
		});
	});
    
    $("#log-password,#log-username").keyup(function(event){
        if(event.keyCode == 13){
            $("#sButton").click();
        }
    });
    
    

});

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

/*** DELETE FUNC ************/

function ondelete(type, id) {

      var myurl = "remove.php";
    
      var parameters ="type="+type+"&id="+id;

    
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
            if (http.responseText == "OK") {
                window.location.reload();   
            }
            else {
                alert(http.responseText);
            }
        }
    }
}