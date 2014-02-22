var xmlhttpAL=GetXmlHttpObjectAL();
function GetXmlHttpObjectAL()
{
	if (window.XMLHttpRequest)
    {
	  // code for IE7+, Firefox, Chrome, Opera, Safari
	  return new XMLHttpRequest();
	}
	if (window.ActiveXObject)
	{
	  // code for IE6, IE5
	  return new ActiveXObject("Microsoft.XMLHTTP");
	}
	return null;
}
function stateChangedAL()
{
if (xmlhttpAL.readyState==4)
  {
	  var httpDoc=xmlhttpAL.responseText;
	  document.getElementById("af_listdata").innerHTML=httpDoc;	  
  }
}
function doAlumniListView(year)
{
	if (xmlhttpAL==null) { return; }
	document.getElementById("af_listdata").innerHTML="<span style='color: #666'>Fetching Data...</span>";
	var url="ajax-alumni-listview.php";
	url+="?y="+year+"&ra="+Math.random();
	xmlhttpAL.onreadystatechange=stateChangedAL;
	xmlhttpAL.open("GET",url,true);
	xmlhttpAL.send(null);	
}
