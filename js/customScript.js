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

    $(".mobile-menu").click(function(){
        $(".hero_content").toggleClass("blured");
    });

});

function changeHeader(current){
    $('.prof').css("display","none");
    $(".hero_head").html(current);
    $(".hero_content").css({"top":"30%"});
    $(".hero").css({"height":"90vh", "background-position":"bottom", "border-bottom":"15px solid #303030","border-radius":"0px 0px 0px 250px"});

    if(current=="about"){
        $(".slog").html("Me");
    }

    if(current=="projects"){
        $(".hero").css({"background":"linear-gradient(45deg, rgba(0,0,0,.7), rgba(0,0,0,.8)), url(images/projects.png)"});
        $(".slog").html("They trust me!");
    }

    if(current=="My place"){
        $(".hero").css({"background":"linear-gradient(45deg, rgba(0,0,0,.7), rgba(0,0,0,.8)), url(images/coffee.jpg)"});
        $(".hero_content").css({"top":"25%"});
        $(".slog").html("Welcome to my world!");
    }

    if(current=="what"){
        $(".hero").css({"background":"linear-gradient(45deg, rgba(0,0,0,.7), rgba(0,0,0,.8)), url(images/what.jpg)","background-position":"center"});
        $(".slog").html("How can I help you?");
    }

    if(current=="Contacts"){
        $(".slog").css("display","none");
    }
}

function markLocation(current){
    $("#" + current ).addClass("active");
}

var rellax = new Rellax('.rellax', {
    speed: -3
  });