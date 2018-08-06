	//BFH Datepicker custom sync function between inv date and due date
	//Don't modify without making a backup of project
	$(function(){
		
		window.due_date_val;
		
		$('#date').on('change.bfhdatepicker', function(e) {
					
			var date = moment($('#date').val(), "YYYY-MM-DD");

			var due_date = moment(date).add(30, 'day');

			due_date_val = moment(due_date).format("YYYY-MM-DD");

			$('input[name=dueDate]').val(due_date_val);
			
		});
		
		$('#dueDate').on('show.bfhdatepicker', function(e) {
					
			var due_date = moment($('#dueDate').val(), "YYYY-MM-DD");
			due_date_val = moment(due_date).format("YYYY-MM-DD");
			
			$this = $(this);
			$parent = getParent($this);
			$datePicker = $parent.data('bfhdatepicker');
			
			var $calendar = $(this).find('.bfh-datepicker-calendar');
			var year = moment(due_date).get('year');
			var month = moment(due_date).get('month');
			var date = moment(due_date).get('date');
			
			$datePicker.options['date'] = due_date_val;
			
			$datePicker.updateCalendarHeader($calendar, month, year);
			$datePicker.updateCalendarDays($calendar, month, year);
			
			$datePicker.setDate();
			
			$(this).find( 'td.selecteddate' ).removeClass('selecteddate');
			$(this).find('td[data-day='+date+']').addClass('selecteddate');
		});

		setTimeout(function(){
			
			$('#date').trigger("change");
			
		},50);
		
		function getParent($this) {
			return $this.closest('.bfh-datepicker');
		}
		
	});	





	// $(function(){
		
	// 	window.due_date_val;
		
	// 	$('#date').on('change.bfhdatepicker', function(e) {
					
	// 		var date = moment($('#date').val(), "DD-MM-YYYY");
	// 		var due_date = moment(date).add(30, 'days');
	// 		due_date_val = moment(due_date).format("DD-MM-YYYY");
	// 		$('input[name=duedate]').val(due_date_val);
			
	// 	});
		
	// 	$('#duedate').on('show.bfhdatepicker', function(e) {
					
	// 		var due_date = moment($('#duedate').val(), "DD-MM-YYYY");
	// 		due_date_val = moment(due_date).format("DD-MM-YYYY");
			
	// 		$this = $(this);
	// 		$parent = getParent($this);
	// 		$datePicker = $parent.data('bfhdatepicker');
			
	// 		var $calendar = $(this).find('.bfh-datepicker-calendar');
	// 		var year = moment(due_date).get('year');
	// 		var month = moment(due_date).get('month');
	// 		var date = moment(due_date).get('date');
			
	// 		$datePicker.options['date'] = due_date_val;
			
	// 		$datePicker.updateCalendarHeader($calendar, month, year);
	// 		$datePicker.updateCalendarDays($calendar, month, year);
			
	// 		$datePicker.setDate();
			
	// 		$(this).find( 'td.selecteddate' ).removeClass('selecteddate');
	// 		$(this).find('td[data-day='+date+']').addClass('selecteddate');
	// 	});

	// 	setTimeout(function(){
			
	// 		$('#date').trigger("change");
			
	// 	},50);
		
	// 	function getParent($this) {
	// 		return $this.closest('.bfh-datepicker');
	// 	}
		
	// });	