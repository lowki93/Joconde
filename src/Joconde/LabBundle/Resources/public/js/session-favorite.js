// INITIALISE VARIABLE
var $page = $(".page-container");

var simpleWidth = $page.width();
var pageList = $(".page-list")[0].offsetWidth;

var i=0;
var search = [];
var numQuestion = 0;

// load mansory if page are totaly load
jQuery(function($){

	loader.show();

	var fisrtSearch = $(".title-page a").text();
	search.push(fisrtSearch);

	var $container = $('.page-list');
	$container
		.addClass("active")
		.imagesLoaded(function(){

			setMasonry($container);

			loader.hide();

			animation.opacity($container,1);

		});
});

$(document)
	.on("click", ".page-list.active .session", function(){// ADD NOTICE IN FAVORIS
		// add the notice with ajax
		$.ajax({
			url: Routing.generate('add_favorite_notice'),
			dataType: "json",
			data: {
				param: $(this).val()
			},
			success: function(message){

				if( message.message == "good" ) var $classMessage = $(".good");
				if( message.message == "bad" ) var $classMessage = $(".bad");
				
				var $notif = $('.notification');
				var notifWidth = $notif.width();
				
				notification.show($notif,$classMessage,notifWidth);

			}
		});
		
	})
	.on({ // HOVER TOO CHANGE PICTO FOR SEE
		mouseenter: function(){

			var $button = $(this).find('i');
			$button
				.removeClass("picto_oeil")
				.addClass("picto_oeil_hover");

		},
		mouseleave: function(){

			var $button = $(this).find('i');
			$button
				.removeClass("picto_oeil_hover")
				.addClass("picto_oeil");

		}
	}, '.page-list.active .see')
	.on({// HOVER TOO CHANGE PICTO FOR SESSION
		mouseenter: function(){

			var $button = $(this).find('i');
			$button
				.removeClass("picto_ajouter")
				.addClass("picto_ajouter_hover");

		},
		mouseleave: function(){

			var $button = $(this).find('i');
			$button
				.removeClass("picto_ajouter_hover")
				.addClass("picto_ajouter");
				
		}
	}, '.page-list.active .session')
	.on("click", ".page-list.active .see", function(){// CLICK TO SEE NOTICE

		var result = $(this).val();

		loader.show();

		$.ajax({
			url: Routing.generate('notice_id'),
			dataType: "json",
			data: {
				param: result
			},
			complete: function(content){

				$(".loader-notice").css("display", "-webkit-flex");

				var response = content.responseJSON.content;
				$(".loader-notice").html(response);

				loader.hide();
				animation.loader($(".loader-notice"),1,0);

			}
		});

	})
	.on("click", ".notice-close", function(){// CLICK TO CLOSE NOTICE

		animation.loader($(".loader-notice"),0,"-100%");

		setTimeout(function(){

			$(".loader-notice").css("display", "none")

		}, 1000);

	})
	.on("click", ".page-list.active .btn-question", function(){// CLICK TO CHANGE QUESTION

		//Get value for new question
		var result = $(this).val();
		var splitResponse = result.split(",");
		var newQuestion = splitResponse[0];
		var none = splitResponse[1];
		var goNotice = splitResponse[2];

		var index = $('.page-list').index($('.page-list.active')) 

		if( none == "none" || none == "no") {

			$.ajax({
				url: Routing.generate('change_question'),
				dataType: "json",
				data: {
					numQuestion: newQuestion
				},
				complete: function(question){

					$('.page-list.active .question').fadeOut(500,function(){
						var responseQuestion = question.responseJSON.question;
						var splitResponse = responseQuestion.split(",");
						var newQuestion = splitResponse[0];
						var typeQuestion = splitResponse[1];
						var nbQuestion = splitResponse[2];
						var response = '<p>'+newQuestion+' ?</p><button class="btn-question" value="'+typeQuestion+','+nbQuestion+',yes">oui</button><button class="btn-question" value="'+nbQuestion+',no">non</button>';

						if (typeQuestion !== "recherche") response += '<button class="btn-question" value="'+nbQuestion+',none">ne sais pas</button>';

						if(nbQuestion > (index+1)) response += '<button class="btn-question" value="'+(nbQuestion-2)+',no">question précendte</button>';
						$('.page-list.active .question').html(response);
						$('.page-list.active .question').fadeIn(500);
						$('.page-list.active .question').css('display', 'inline');

						ajustMasonry($('.page-list.active'));

					});

				}
			});

		} else {

			if( newQuestion == "recherche" ) {

				$('.page-list.active .question').remove();
				ajustMasonry($('.page-list.active'));

			} else {

				loader.show();

				var nbDiv = $('.page-list').length;

				var newSearch = $(this).val();
				var splitResponse = newSearch.split(",");
				var newQuestion = splitResponse[0];
				var nbQuestion = splitResponse[1];
				
				if( nbDiv-index !== 1 ) {

					$('.page-list.active').nextAll('div').remove();
					i = index;
					search = search.slice(0,index+1);

				};

				search.push(newQuestion);

				$.ajax({
					url: Routing.generate('change_question_good'),
					dataType: "json",
					data: {
						answer: search,
						nb: nbQuestion
					},
					complete: function(content){

						var $page = $(".page-container");
						newWidth = $page.width()+simpleWidth+5+$('.page-list')[0].offsetLeft;
						$page.css("width", newWidth);
						var div = $('<div class="page-list"></div>');
						$page.append(div);

						i++;
						
						var $container = $(".page-list:last-child");
						
						var response = content.responseJSON.content;

						var searchTitle = $(".title-page").html();
						var splitsearch = searchTitle.split(".");

						var newSearchTitle = "";

						for ( var i = 0; i < search.length-1; i++ ) {

							if(i!==0) newSearchTitle +=".";
							newSearchTitle += splitsearch[i];

						};

						newSearchTitle += ".<a href='#' value='-"+i*simpleWidth+"'>"+newQuestion+"</a>";

						$(".title-page").html(newSearchTitle);

						$container.html(response);

						$container
							.imagesLoaded(function(){

								setMasonry($container);

							});

						var newLeft = $page.position().left-simpleWidth;

						loader.hide();

						animation.opacity($(".page-list.active"),0.5);

						$('.page-list').removeClass('active');
						$container.addClass('active');

						animation.left($page,newLeft);
						animation.opacity($container,1);
						animation.opacity($(".page-list:nth-last-child(2)"),0.5);

						$('.page-list').css("width", pageList);

					}
				});

			}

		}
	})
	.on("click", ".title-page a", function(){

		var transition = $(this).attr("value");

		animation.left($page,transition);

		animation.opacity($(".page-list.active"),0.5);

		$('.page-list').removeClass('active');

		var aIdx = $('.title-page a').index($(this));
		$('.page-list').eq(aIdx).addClass('active');

		animation.opacity($(".page-list.active"),1);

	})
	.on("click", ".delete-all", function(){
		
		$.ajax({
			url: Routing.generate('delete_all'),
			dataType: "json",
			data: {
				param: 0,
			},
			complete: function(response){

				var message = response.responseJSON.message;

				if( message == "good" ) {

					var response = response.responseJSON.content;

					$('.page-list.active').fadeOut(500,function(){

						$('.page-list.active').html(response);
						$('.page-list.active ')
							.imagesLoaded(function(){

								setMasonry($('.page-list.active '));

							});

						$('.page-list.active').fadeIn(500);

					});

					var $classMessage = $(".good-delete-all");
					
					var $notif = $('.notification');
					var notifWidth = $notif.width();
					
					$(".delete-all").hide();

					notification.show($notif,$classMessage,notifWidth);

				}
			}
		});

	})
	.on("click", ".delete-one", function(){
		
		var id = $(this).val();
		$.ajax({
			url: Routing.generate('delete_one'),
			dataType: "json",
			data: {
				param: id,
			},
			complete: function(response){

				var message = response.responseJSON.message;
				var selection = response.responseJSON.selection;

				if( message == "good" ) {

					var response = response.responseJSON.content;

					$('.page-list.active').fadeOut(500,function(){

						$('.page-list.active ').masonry('destroy');
						$('.page-list.active ').html(response);

						$('.page-list.active ')
							.imagesLoaded(function(){

								setMasonry($('.page-list.active '));

							});
						
						$('.page-list.active ').fadeIn(500);

					});

					var $classMessage = $(".good-delete-one");
					
					var $notif = $('.notification');
					var notifWidth = $notif.width();
					
					if( selection == 0 ) $(".delete-all").hide();

					notification.show($notif,$classMessage,notifWidth);
				}
			}
		});

	});

function setMasonry($className){

	$className
		.find("img")
		.each(function(){

			if( $(this)[0].naturalHeight > $(this)[0].naturalWidth ){

				$(this).addClass("imgHeight");

			} else {

				$(this).addClass("imgWidth");
			
			};

		})
		.imagesLoaded(function(){

			$className.masonry({
				isAnimated: true,
				gutter: 10,
				columnWidth: 10,
				itemSelector: '.item',
			});

		});

}

function ajustMasonry($className){

	$className.masonry({
		isAnimated: true,
		gutter: 10,
		columnWidth: 10,
		itemSelector: '.item',
	});

}

var animation = {
	opacity: function($className,opacity){

		$className.animate({
			opacity: opacity,
		}, 1000);

	},
	left: function($className,left){

		$className.animate({
			left: left,
		}, 1000);

	},
	loader: function($className,opacity,left){

		$className.animate({
				opacity: opacity,
				left: left,
		}, 1000);

	}
}

var loader = {
	show: function(){

		$('.loader').css("display", "-webkit-flex");

	},
	hide: function(){

		$('.loader').css("display", "none");

	}
}

var notification = {
	show: function($className,$classMessage,left){
		
		$className.show();
		$classMessage.attr('style','display: -webkit-flex !important');

		$className
			.animate({
				opacity: 1,
				right: 0,
			}, 1000)
			.delay( 1000 )
			.animate({
				opacity: 0,
				right: -left,
			}, 1000)
		
		setTimeout(function(){

			$className.hide();
			$classMessage.attr('style','display: none !important');

		}, 3000);

	}
}