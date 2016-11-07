$(document).ready(function () {

//    $(function() {
//        $('.jcarousel').jcarousel({
//            // Configuration goes here
//
//        });
//    });

    // Set the interval to be 5 seconds
	var t = setInterval(function(){
		$("#carousel ul").animate({marginLeft:-480},1000,function(){
			$(this).find("li:last").after($(this).find("li:first"));
			$(this).css({marginLeft:0});
		})
	},5000);

    $('.submitBtn').hover(function () {
        $(this).toggleClass("button-hover");
    });

    $(".username").on({
     "mouseover" : function() {
        $('#dropdownlist').css("display","block");
      },
      "mouseout" : function() {
        $('#dropdownlist').css("display","none");
      }
    });

    $("#dropdownlist").on({
     "mouseover" : function() {
        $(this).css("display","block");
      },
      "mouseout" : function() {
        $(this).css("display","none");
      }
    });

	$('#logout').click(function() {
		$.ajax( {
			type: "POST",
			url: "../back-end/logout.php",
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


   $("#hc").on({
     "mouseover" : function() {
        this.src = '../images/masthead/el/hc-green.png';
      },
      "mouseout" : function() {
        this.src='../images/masthead/el/hc-gray.png';
      }
    });

    $("#em").on({
     "mouseover" : function() {
        this.src = '../images/masthead/el/em-green.png';
      },
      "mouseout" : function() {
        this.src='../images/masthead/el/em-gray.png';
      }
    });

    $("#edu").on({
     "mouseover" : function() {
        this.src = '../images/masthead/el/edu-green.png';
      },
      "mouseout" : function() {
        this.src ='../images/masthead/el/edu-gray.png';
      }
    });

    $("#env").on({
     "mouseover" : function() {
        this.src = '../images/masthead/el/env-green.png';
      },
      "mouseout" : function() {
        this.src='../images/masthead/el/env-gray.png';
      }
    });

     $("#com").on({
     "mouseover" : function() {
        this.src = '../images/masthead/el/com-green.png';
      },
      "mouseout" : function() {
        this.src='../images/masthead/el/com-gray.png';
      }
    });

    $("#an").on({
     "mouseover" : function() {
        this.src = '../images/masthead/el/an-green.png';
      },
      "mouseout" : function() {
        this.src='../images/masthead/el/an-gray.png';
      }
    });



    $("#event-pic").change(function() {
        $("#event-pic2").css("display", "inline");
    });

    $("#event-pic2").change(function() {
        $("#event-pic3").css("display", "inline");
    });



    $("#log-password,#log-username").keyup(function(event){
        if(event.keyCode == 13){
            $("#sButton").click();
        }
    });


    // When a link is clicked
   $("a.tab").click(function () {

       // switch all tabs off
       $(".active").removeClass("active");

       // switch this tab on
       $(this).addClass("active");

       // slide all elements with the class 'content' up
       $(".tab-content").hide();

       // Now figure out what the 'title' attribute value is and find the element with that id.  Then slide that down.
       var content_show = $(this).attr("title");
       $("#"+content_show).show();

       return false;
   });

});
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

/**** APPLY BUTTON FUNCTION *********/

function notify() {

  var parameters = "id=" + "0";

  //alert(parameters);
  console.log(parameters);

    http.open("POST", "../back-end/notify.php", true);
    http.onreadystatechange = useHttpResponseVol;
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send(parameters);
}

/****** MAKE REQUEST *******/

function useHttpResponseVol() {
    if (http.readyState == 4) {
        if (http.status == 200) {
            console.log(http.responseText);
        }
    }
}


function notifications() {
  var box = document.getElementById('notification-box');

  var what = box.style.display; 
  if (what == 'none') {
    box.style.display = block;
  }
  else {
    box.style.display = none;

  }
}
