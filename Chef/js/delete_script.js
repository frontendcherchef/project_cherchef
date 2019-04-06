$('document').ready(function() {
	// select all checkbox	
	$(document).on('click', '#select_all', function() {          	
		$(".checkbox").prop("checked", this.checked);
		$("#select_count").html($("input.checkbox:checked").length+" Selected");
	});	
	$(document).on('click', '.checkbox', function() {		
		if ($('.checkbox:checked').length == $('.checkbox').length) {
			$('#select_all').prop('checked', true);
		} else {
			$('#select_all').prop('checked', false);
		}
		$("#select_count").html($("input.checkbox:checked").length+" Selected");
	});  
	// delete selected records
	jQuery('#delete_records').on('click', function(e) { 
		var add_utensils = [];  
		$(".checkbox:checked").each(function() {  
			add_utensils.push($(this).data('sid'));
		});	
		if(add_utensils.length <=0)  {  
			alert("Please select records.");  
		}  
		else { 	
			WRN_PROFILE_DELETE = "Are you sure you want to delete "+(add_utensils.length>1?"these":"this")+" row?";  
			var checked = confirm(WRN_PROFILE_DELETE);  
			if(checked == true) {			
				var selected_values = add_utensils.join(","); 
				$.ajax({ 
					type: "POST",  
					url: "add_utensils_delete.php",  
					cache:false,  
					data: 'sid='+selected_values,  
					success: function(response) {	
						// remove deleted employee rows
						var sid = response.split(",");
						for (var i=0; i<sid.length; i++ ) {						
							$("#"+sid[i]).remove();
						}										
					}   
				});				
			}  
		}  
	});
});