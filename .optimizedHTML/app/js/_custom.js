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
		var divAmountLeft = parseFloat(jQuery('.slider.amount').find('.rangeslider__handle').css('left')) - 10;
		var divPeriodLeft = parseFloat(jQuery('.slider.period').find('.rangeslider__handle').css('left')) - 10;
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
	


});
