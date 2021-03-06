// Switchery
		var elems = Array.prototype.slice.call(document.querySelectorAll('.switch-btn'));
		$('.switch-btn').each(function() {
			new Switchery($(this)[0], $(this).data());
		});

		// Bootstrap Touchspin
		$("input[name='demo_vertical2']").TouchSpin({
			verticalbuttons: true,
			// verticalupclass: 'fa fa-plus',
			// verticaldownclass: 'fa fa-minus'
		});
		$("input[name='demo3']").TouchSpin({
			min: 0,
			max: 100000
		});
		$("input[name='demo3Prod']").TouchSpin({
			min: 0,
			max: 100000,
			decimals: 1
		});
		$("input[name='demo1']").TouchSpin({
			min: 0,
			max: 100000000,
			step: 0.1,
			decimals: 2,
			boostat: 5,
			maxboostedstep: 10,
			postfix: '%'
		});
		$("input[name='demo2']").TouchSpin({
			min: 0,
			max: 100000000,
			stepinterval: 50,
			maxboostedstep: 10000000,
			prefix: '$'
		});
		$("input[name='demo3_22']").TouchSpin({
			initval: 40
		});
		$("input[name='demo5']").TouchSpin({
			prefix: "pre",
			postfix: "post"
		});