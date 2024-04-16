$(document).ready(function(){
    $(".button-text").hide();
    $(".button").hover(function(){
        $(this).find(".button-text1").hide();
        $(this).find(".button-text").slideDown();
    }, function() {
        $(this).find(".button-text").hide();
        $(this).find(".button-text1").slideDown();

    })


})