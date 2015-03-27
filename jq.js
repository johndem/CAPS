$(document).ready(function () {
    $('.cat').hover(function () {
        $(this).toggleClass("change"); 
    });
    
    $('.submitBtn').hover(function () {
        $(this).toggleClass("button-hover");
    });
});