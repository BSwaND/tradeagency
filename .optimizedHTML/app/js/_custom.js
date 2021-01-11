document.addEventListener("DOMContentLoaded", function() {

	jQuery('.plans_section__owl-carousel').owlCarousel({
		loop:false,
		margin:30,
		nav:true,
		dots: false,
		responsive:{
			0:{
				items:1
			},
			600:{
				items:2
			},
			1000:{
				items:3
			}
		}
	})
	jQuery('.certificate_owl').owlCarousel({
		loop:false,
		margin:30,
		nav:true,
		dots: false,
		responsive:{
			0:{
				items:1
			},
			600:{
				items:2
			},
			1000:{
				items:4
			}
		}
	})
	


 function togleLiFaq()  {
	 jQuery('.custom-ul_faq_body').click(function (){
		 jQuery(this).find('.custom-ul_faq__text').fadeToggle(400)
		})
 }togleLiFaq();



	jQuery('.calculator input[type="range"]').rangeslider({
		polyfill: false,
		rangeClass: 'rangeslider',
		fillClass: 'rangeslider__fill',
		handleClass: 'rangeslider__handle',
		onInit: function() {
			recalc();
		},
		onSlide: function(position, value) {
			recalc();
		},
		onSlideEnd: function(position, value) {}
	});

	function recalc() {
		var amount = parseFloat(jQuery('#amount').val());
		var months = parseFloat(jQuery('#period').val());
		var divAmountLeft = parseFloat(jQuery('.slider.amount').find('.rangeslider__handle').css('left')) - 20;
		var divPeriodLeft = parseFloat(jQuery('.slider.period').find('.rangeslider__handle').css('left')) + 5;
		jQuery('.slider.amount .current').html(amount + ' USD').css('left', divAmountLeft + 'px');
		jQuery('.slider.period .current').html(months + ' месяцев').css('left', divPeriodLeft + 'px');
		var plans = JSON.parse(jQuery('.slider.amount').attr('data-plans') || '{}');
		if (!amount || !plans) return false;
		var planName = '';
		var planPerc = false;
		var planDays = false;
		var planBody = false;
		jQuery.each(plans, function(key, data) {
			var min_max = key.split('-');
			if (amount >= parseFloat(min_max[0]) && amount < parseFloat(min_max[1])) {
				planName = data.name;
				planDays = parseFloat(data.days);
				planPerc = parseFloat(data.perc);
				planBody = parseFloat(data.body);
			}
		});
		if (planPerc === false || planDays === false) return false;
		var profitPerMonth = Math.round(amount * planPerc * planDays / 100);
		var totalProfit = months * profitPerMonth;
		var totalPerc = planPerc * planDays * months;
		if (planBody == 1) {
			totalProfit += amount;
		}
		jQuery('.profit .plan-name span').html(planName);
		jQuery('.profit .profit-month span').html(profitPerMonth + ' USD');
		jQuery('.profit .perc-total span').html(totalPerc + ' %');
		jQuery('.profit .profit-total span').html(totalProfit + ' USD');
	}


	function scrolingTop(){
		jQuery(window).scroll(function() {
			var q = jQuery(this);
			var goToUp = document.querySelector(".btn_up");

			if (q.scrollTop() > 800) {
				goToUp.classList.add("btn_up_active");
			} else{
				goToUp.classList.remove("btn_up_active");
			}
		});
		jQuery('.btn_up').click(function() {
			jQuery('body,html').animate({scrollTop:0},800);
		});
	}
	scrolingTop();
	

	function openMobMenu(){
		jQuery('.hamburger').click(function (){
			jQuery(this).toggleClass('is-active');
			jQuery('body').toggleClass('overflow-hidden')
			jQuery('.nav_header').toggleClass('nav_header__active')
		})
	}
	openMobMenu();

	
});
