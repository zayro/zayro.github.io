function ExcludePages(varname) 
{
	var displayObj = document.getElementById('nvx_exclude_pages');
	var str = displayObj.value;

	var myRegExp = ','+varname+',';
	var matchPos1 = str.search(myRegExp);

	if(matchPos1 != -1)
		displayObj.value = str.replace(','+varname+',', '');
	else
		displayObj.value = displayObj.value + ',' + varname + ',';
}

function ExcludeCategories(varname) 
{
	var displayObj = document.getElementById('nvx_exclude_categories');
	var str = displayObj.value;

	var myRegExp = ','+varname+',';
	var matchPos1 = str.search(myRegExp);

	if(matchPos1 != -1)
		displayObj.value = str.replace(','+varname+',', '');
	else
		displayObj.value = displayObj.value + ',' + varname + ',';
}