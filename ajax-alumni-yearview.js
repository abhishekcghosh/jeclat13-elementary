var xmlhttpAY=GetXmlHttpObjectAY();
function GetXmlHttpObjectAY()
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
function stateChangedAY()
{
if (xmlhttpAY.readyState==4)
  {
	  var httpDoc=xmlhttpAY.responseText;
	  document.getElementById("af_yeardata").innerHTML=httpDoc;	  
	  if(httpDoc.length==0) { document.getElementById("af_yearview_nodata").style.display="block";  }
	  else  { document.getElementById("af_yearview_nodata").style.display="none";  }
  }
}
function doAlumniYearView()
{
	if (xmlhttpAY==null) { return; }
	//document.getElementById("af_listdata").innerHTML="Fetching Data...";
	var url="ajax-alumni-yearview.php";
	xmlhttpAY.onreadystatechange=stateChangedAY;
	xmlhttpAY.open("GET",url,true);
	xmlhttpAY.send(null);	
}
