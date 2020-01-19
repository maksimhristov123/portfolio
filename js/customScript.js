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
            
        }else {
            $(".navbar").fadeIn("slow");
        }
    });
});

function changeHeader(current){
    $('.prof').css("display","none");
    $('.slog').css("display","none");
    $(".hero_head").html(current);
    $(".hero_content").css({"top":"30%", "left":"30%"});
    $(".hero").css({"height":"75vh","background-attachment":"fixed", "background-position":"bottom"});
}

function markLocation(current){
    $("#" + current ).addClass("active");
}

var rellax = new Rellax('.rellax', {
    speed: -5,
    center:true
  });