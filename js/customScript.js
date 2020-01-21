$(document).ready(function(){
    $(".item").hover(function() {
        $(".item_heading", this).slideToggle("slow");
    });
    
    var currentPage = $("#section-name").html();
    console.log(currentPage);

    if(currentPage !== "home"){
        changeHeader(currentPage);
        markLocation(currentPage);
    }

    /* On window scroll change background of nav bar */
    $(window).scroll(function(){
        if($(this).scrollTop() > 100){
            $(".navbar").css("display","none");
            $(".back_to_top").fadeIn("slow");
            
        }else {
            $(".navbar").fadeIn("slow");
            $(".back_to_top").fadeOut();
        }
    });
});

function changeHeader(current){
    $('.prof').css("display","none");
    $(".hero_head").html(current);
    $(".hero").css({"height":"90vh","background-attachment":"fixed", "background-position":"bottom"});
}

function markLocation(current){
    $("#" + current ).addClass("active");
}

var rellax = new Rellax('.rellax', {
    speed: -5
  });