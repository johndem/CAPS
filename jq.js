$(document).ready(function () {

/*$("#hc").animate({
        height: '+=230px',
        width: '+=230px'
    },70,function() {
    
    $("#edu").animate({
        height: '+=230px',
        width: '+=230px'
    },70,function() {
        $("#em").animate({
        height: '+=230px',
        width: '+=230px'
    },70,function () {
            $("#env").animate({
        height: '+=230px',
        width: '+=230px'
    },70,function() {
                $("#com").animate({
        height: '+=230px',
        width: '+=230px'
    },70,function() {
                    $("#an").animate({
        height: '+=230px',
        width: '+=230px'
    },70);
                });
            });
        });
    });
        
}); */




    
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


    
/*$('.cat').hover(function () {
        $(this).toggleClass("change"); 
    });
    
    $('.submitBtn').hover(function () {
        $(this).toggleClass("button-hover");
    }); */
});