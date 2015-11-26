(function($) {
	$(document).ready(function(){	
		
		ResearchAreaImage($);
		ResearchAreaImageActive($);
	});	

})(jQuery);

function ResearchAreaImage($)
{
	var areas=["","agr","bio","cts","fqm","hum","rnm","sej","tep","tic"];
	var count=0;
	$(".page-research-group #edit-field-area-tid-wrapper .bef-select-as-links .form-item >div").each(function()
	{
		$(this).addClass(areas[count]);
		count++;
	});	
}
function ResearchAreaImageActive($)
{
	var areas=["","agr_active","bio_active","cts_active","fqm_active","hum_active","rnm_active","sej_active","tep_active","tic_active"];
	$(".page-research-group #edit-field-area-tid-wrapper .bef-select-as-links .form-item >div a").on("click",function()
	{
		var pos=$(this).parent().index();
		var count=0;

		$(this).parent().parent().children("div").each(function() 
		{
			$(this).removeClass(areas[count]);
			count++;
		});
		$(this).parent().addClass(areas[pos]);
	});
	
}