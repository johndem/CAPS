$(document).ready(function () {
    
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
    

    $("#hc").on({
     "mouseover" : function() {
        this.src = 'images/hc-gray.png';
      },
      "mouseout" : function() {
        this.src='images/hc-green.png';
      }
    });

    $("#em").on({
     "mouseover" : function() {
        this.src = 'images/em-gray.png';
      },
      "mouseout" : function() {
        this.src='images/em-green.png';
      }
    });

    $("#edu").on({
     "mouseover" : function() {
        this.src = 'images/edu-gray.png';
      },
      "mouseout" : function() {
        this.src ='images/edu-green.png';
      }
    });

    $("#env").on({
     "mouseover" : function() {
        this.src = 'images/env-gray.png';
      },
      "mouseout" : function() {
        this.src='images/env-green.png';
      }
    });

     $("#com").on({
     "mouseover" : function() {
        this.src = 'images/com-gray.png';
      },
      "mouseout" : function() {
        this.src='images/com-green.png';
      }
    });

    $("#an").on({
     "mouseover" : function() {
        this.src = 'images/an-gray.png';
      },
      "mouseout" : function() {
        this.src='images/an-green.png';
      }
    });

});