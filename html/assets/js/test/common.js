$(document).ready(function () {
	AOS.init({
		easing: "ease-in"
	});

	var navBtn = $(".nav-btn"),
		navWrap = $(".nav-wrap"),
		topBtn = $("#footerArea .go-top > button"),
		header = $("#headerArea");

	var cursor = $(".cursor");

	var posX = 0,
		posY = 0;

	var mouseX = 0,
		mouseY = 0;

	navBtn.on("click", function () {
		if (!$(this).hasClass("on")) {
			$(this).addClass("on");
			navWrap.fadeIn().addClass("show");
			$.lockBody();
		} else {
			$(this).removeClass("on");
			navWrap.fadeOut().removeClass("show");
			$.unlockBody();
		}

		//프로젝트 상세페이지 header
		if($(".container").hasClass("prj")){
			if(header.hasClass("white")){
				header.removeClass("white");
			}else{
				header.addClass("white");
			}
		}
	});

	topBtn.on("click", function () {
		$("html, body").animate({ scrollTop: 0 }, 500);
	});

	// cursor
	TweenMax.to({}, 0.016, {
		repeat: -1,
		onRepeat: function () {
			posX += (mouseX - posX) / 9;
			posY += (mouseY - posY) / 9;

			TweenMax.set(cursor, {
				css: {
					left: mouseX,
					top: mouseY
				}
			});
		}
	});

	$(document).on("mousemove", function (e) {
		mouseX = e.clientX;
		mouseY = e.clientY;
	});

	//cursor hover
	$("a, button, label, input").on("mouseenter", function(){
		cursor.addClass("hovered");
	});

	$("a, button, label, input").on("mouseleave", function(){
		cursor.removeClass("hovered");
	});
});

// top버튼
$(window).on("scroll", function(){
	var ftTop = $("#footerArea").offset().top,
		scrollTop = $(this).scrollTop(),
		topBtn = $("#footerArea .go-top");

	if(scrollTop > 200){
		topBtn.fadeIn("fast");
	}else{
		topBtn.fadeOut("fast");
	}
    
	if($(this).outerHeight() >= 1160){
		if(scrollTop > ftTop - 1100){
			topBtn.addClass("no-fixed");
		}else{
			topBtn.removeClass("no-fixed");
		}
	}else{
		if(scrollTop > ftTop - 900){
			topBtn.addClass("no-fixed");
		}else{
			topBtn.removeClass("no-fixed");
		}
	}
});

(function () {
	// 즉시실행함수
})();


// popup open
function popOpen(el) {
	$("#" + el).fadeIn("fast");
	$.lockBody();
};

// popup close
function popClose(el) {
	$("#" + el).fadeOut("fast");
	$.unlockBody();
}

// prevent body scroll
var $docEl = $("html, body"),
	$wrap = $(".wrap"),
	$scrollTop;

$.lockBody = function () {
	if (window.pageYOffset) {
		$scrollTop = window.pageYOffset;
		$wrap.css({
			top: - ($scrollTop)
		});
	}
	$docEl.css({
		height: "100%",
		overflow: "hidden"
	});
};

$.unlockBody = function () {
	$docEl.css({
		height: "",
		overflow: ""
	});
	$wrap.css({
		top: ""
	});
	window.scrollTo(0, $scrollTop);
	window.setTimeout(function () {
		$scrollTop = null;
	}, 0);
};
