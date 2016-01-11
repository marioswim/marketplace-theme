(function($) {
	$(document).ready(function(){	
		
		ResearchArea($);
		ResearchAreaActive($);
		ProductSector($);
		ProductSectorActive($);
		placeHolder($);
		//printPage($);
	});	

})(jQuery);

function ResearchArea($)
{
	var areas=["any","agr","bio","cts","fqm","hum","rnm","sej","tep","tic"];
	var count=0;
	$(".page-research-group #edit-field-area-tid-wrapper .bef-select-as-links .form-item >div").each(function()
	{
		$(this).addClass(areas[count]);
		count++;
	});	
}
function ResearchAreaActive($)
{
	var areas=["","agr_active","bio_active","cts_active","fqm_active","hum_active","rnm_active","sej_active","tep_active","tic_active"];
	$(".page-research-group #edit-field-area-tid-wrapper .bef-select-as-links .form-item >div a").on("click",function(){
		cssActiveImages(areas,$(this),$);
	}
	);
	
}
function ProductSector($)
{
	var areas=["","AGR","BIOySAl","ENE","GSE","HUMyED","INF","MAT","PIND","ICT","TPC"];
	var count=0;
	$("#edit-field-sector-productivo-tid-wrapper .bef-select-as-links .form-item >div ").each(function()
	{
		$(this).addClass(areas[count]);
		count++;
	});	
}
function ProductSectorActive($)
{
	var areas=["","AGR_active","BIOySAl_active","ENE_active","GSE_active","HUMyED_active","INF_active","MAT_active","PIND_active","ICT_active","TPC_active"];
	$("#edit-field-sector-productivo-tid-wrapper .bef-select-as-links .form-item > div a.active").addClass(function()
	{
		cssActiveImages(areas,$(this),$);
	});
	$("#edit-field-sector-productivo-tid-wrapper .bef-select-as-links .form-item > div a").on("click",function()
	{
		cssActiveImages(areas,$(this),$);
	});
}

function cssActiveImages(areas,a,$)
{
	var pos=a.parent().index();
	var count=0;

	a.parent().parent().children("div").each(function() 
	{
		$(this).removeClass(areas[count]);
		count++;
	});
	a.parent().addClass(areas[pos]);
}

function placeHolder($)
{
	var path=window.location.pathname;

	var splitPath=path.split("/");

	switch(splitPath[1])
	{	
	case "es":
		$(".page-research-group #edit-populate-wrapper input").attr("placeholder","Buscar");
		$(".front  #edit-populate-wrapper input").attr("placeholder","Buscar");
		$(".page-list-products #edit-populate-wrapper input").attr("placeholder","Buscar");
		$(".page-list-products #edit-field-keywords-tid-wrapper select").attr("data-original-title","Dejar en blanco, o seleccionar el primer elemento para volver a la opción por defecto.");
		break;
	case "en":
		$(".front  #edit-populate-wrapper input").attr("placeholder","Search");
		$(".page-research-group #edit-populate-wrapper input").attr("placeholder","Search");
		$(".page-list-products #edit-populate-wrapper input").attr("placeholder","Search");
		break;
	}
}

function printPage($)
{
/*	$("#imprimir").on("click",function()
	{
		$(".row").printArea();
	});*/
}