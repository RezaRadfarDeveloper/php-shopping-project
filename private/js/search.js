
$(document).ready(function(){
		
		$("#searchBook").keyup(function(){
				var searchText = $(this).val();
			$.ajax({
			url:"search-engine.php?searchtext="+searchText,
			type: "GET",
			data: "hasan",
			dataType: "text",
			success: successFn,
			error: errorFn,
			complete:function(xhr, status){
				console.log("request is completed");
			}
			});
		});
				function successFn(result){
				console.log("successfully request sent");
				$("#suggestions").html(result);
			}
			function errorFn(xhr,status,result){
				console.log("failed to request sent");
			}
		

		});		

