var $page = $(".page-container");
var simpleWidth = $page.width();

// for retour
var i=0;
var search = [];

$(document).ready(function(){
    var fisrtSearch = $(".title-page a").text();
    search.push(fisrtSearch);

    var $container = $('.page-list');
    $container.addClass("active");
    $container.imagesLoaded(function(){
        $container.find("img").each(function(){
            if(  $(this)[0].naturalHeight > $(this)[0].naturalWidth ){
                $(this).addClass("imgHeight");
            } else {
                $(this).addClass("imgWidth");
            }
        });
        // initialize Masonry after all images have loaded
        $container.imagesLoaded( function() {
            $container.masonry({
                isAnimated: true,
                gutter: 10,
                columnWidth: 10,
                itemSelector: '.item',
            });
        });

        $container.animate({
            opacity: 1,
        }, 1000);
    });
});

// add to favorite
$(document).on("click", ".page-list.active .session", function(){
    $.ajax({
        url: Routing.generate('add_favorite_notice'),
        dataType: "json",
        data: {
            param: $(this).val()
        },
        success: function(message){
            console.log(message);
        }
    });

});

// image hover
// $(document).on({
//     mouseenter: function() {
//         $img = $(this);
//         $.ajax({
//             url: Routing.generate('notice_hover'),
//             dataType: "json",
//             data: {
//                 id: $img.attr("alt")
//             },
//             complete: function(data){
//                 var image = /^[^;]*/i.exec(data.responseJSON[0].video);
//                 var response = " auteur : "+data.responseJSON[0].autr+"<br />"
//                     +'<img src="http://www.culture.gouv.fr/Wave/image/joconde'+image[0]+'"/>';
//                 $('.notice-hover').html(response);
//             }
//         });
//     },
//     mouseleave: function() {
//         $('.notice-hover').text("");
//     }
// }, '.page-list.active img');

// Bouton see
$(document).on({
    mouseenter: function() {
        var $button = $(this).find('i');
        $button.removeClass("picto_oeil");
        $button.addClass("picto_oeil_hover");
    },
    mouseleave: function() {
        var $button = $(this).find('i');
        $button.removeClass("picto_oeil_hover");
        $button.addClass("picto_oeil");
    }
}, '.page-list.active .see');

// Bouton session
$(document).on({
    mouseenter: function() {
        var $button = $(this).find('i');
        $button.removeClass("picto_ajouter");
        $button.addClass("picto_ajouter_hover");
    },
    mouseleave: function() {
        var $button = $(this).find('i');
        $button.removeClass("picto_ajouter_hover");
        $button.addClass("picto_ajouter");
    }
}, '.page-list.active .session');
   
// BUTTON SEE NOTICE
$(document).on("click", ".page-list.active .see", function(){
    var result = $(this).val();
    $.ajax({
        url: Routing.generate('notice_id'),
        dataType: "json",
        data: {
            param: result
        },
        complete: function(content){
            console.log(content.responseJSON.content);
        }
    });

});

// NEW QUESTION 
$(document).on("click", ".page-list.active .btn-question", function(){
    // change question
    var result = $(this).val();
    if(result == "none" || result == "no" ) {
        $.ajax({
            url: Routing.generate('change_question'),
            dataType: "json",
            data: {
                answer: $(this).val()
            },
            complete: function(question){
                $('.page-list.active .question').fadeOut(500,function(){
                    var responseQuestion = question.responseJSON.question;
                    var splitResponse = responseQuestion.split(",");
                    var newQuestion = splitResponse[0];
                    var typeQuestion = splitResponse[1];
                    var response = '<p>'+newQuestion+' ?</p><button class="btn-question" value="'+typeQuestion+',yes">oui</button><button class="btn-question" value="no">non</button><button class="btn-question" value="none">ne sais pas</button>'
                    $('.page-list.active .question').html(response);
                    $('.page-list.active .question').fadeIn(500);
                    $('.page-list.active .question').css('display', 'inline')
                    $('.page-list.active').masonry({
                        isAnimated: true,
                        gutter: 10,
                        columnWidth: 10,
                        itemSelector: '.item',
                    });
                });
            }
        });
    } else {
        $('.loader').css("display", "-webkit-flex");
        var nbDiv = $('.page-list').length;
        var index = $('.page-list').index($('.page-list.active'))

        var newSearch = $(this).val();
        var splitResponse = newSearch.split(",");
        var newQuestion = splitResponse[0];
        
        if(nbDiv-index !== 1) {
            $('.page-list.active').nextAll('div').remove();
            i = index;
            search = search.slice(0,index+1);
        }

        search.push(newQuestion);
        console.log(search);

        $.ajax({
            url: Routing.generate('change_question_good'),
            dataType: "json",
            data: {
                answer: search
            },
            complete: function(content){
                var $page = $(".page-container");
                newWidth = $page.width()+simpleWidth+5;
                $page.css("width", newWidth);
                var div = $('<div class="page-list"></div>');
                $page.append(div);

                i++;
                
                var $container = $(".page-list:last-child");
                
                var response = content.responseJSON.content;

                var searchTitle = $(".title-page").html();
                var splitsearch = searchTitle.split(".");
                console.log(splitsearch);
                var newSearchTitle = "";
                for (var i = 0; i < search.length-1; i++) {
                    if(i!==0) newSearchTitle +="."
                    newSearchTitle += splitsearch[i];
                };

                newSearchTitle += ".<a href='#' value='-"+i*simpleWidth+"'>"+newQuestion+"</a>";

                $(".title-page").html(newSearchTitle);

                $container.html(response);

                $container.imagesLoaded(function(){
                    $container.find("img").each(function(){
                        if( $(this)[0].naturalHeight > $(this)[0].naturalWidth ){
                            $(this).addClass("imgHeight");
                        } else {
                            $(this).addClass("imgWidth");
                        }
                    });

                    $container.imagesLoaded( function() {
                        $container.masonry({
                            isAnimated: true,
                            gutter: 10,
                            columnWidth: 10,
                            itemSelector: '.item',
                        });
                    });
                });

                var newLeft = $page.position().left-simpleWidth;

                $('.loader').css("display", "none");

                $(".page-list.active").animate({
                    opacity: 0.5,
                }, 1000);

                $('.page-list').removeClass('active');
                $container.addClass('active');

                $page.animate({
                    left: newLeft,
                }, 1000);

                $container.animate({
                    opacity: 1,
                }, 1000);

                $(".page-list:nth-last-child(2)").animate({
                    opacity: 0.5,
                }, 1000);
            }
        });
    }
});

$(document).on("click", ".title-page a", function(){
    var transition = $(this).attr("value");
    $page.animate({
        left: transition,
    }, 1000);

    $(".page-list.active").animate({
        opacity: 0.5,
    }, 1000);

    $('.page-list').removeClass('active');

    var aIdx = $('.title-page a').index($(this));
    $('.page-list').eq(aIdx).addClass('active');

    $(".page-list.active").animate({
        opacity: 1,
    }, 1000);
});