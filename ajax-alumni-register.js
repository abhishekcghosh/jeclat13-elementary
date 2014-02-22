var xmlhttpA=GetXmlHttpObjectA();
function GetXmlHttpObjectA()
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
function stateChangedA()
{
if (xmlhttpA.readyState==4)
  {
	  var httpDoc=xmlhttpA.responseText;
	  if(httpDoc=="REG_SUCCESS")
	  {
		  clearFormA();
		  alert("Thank you for your time! You may want to see others who have registered. To do so, follow the \"See who's coming\" link.");
		  doAlumniYearView();
	  }
	  else
	  {
		  alert(httpDoc);
	  }
	  document.getElementById("af_submit").value=" Submit ";
	  document.getElementById("af_submit").disabled="";
  	  document.getElementById("af_submit").style.backgroundColor = "#2bf";

  }
}
function doAlumniRegister()
{
	
	name=document.getElementById("af_name").value;
	nick=document.getElementById("af_nick").value;
	year=document.getElementById("af_year").value;
	dept=document.getElementById("af_deptt").value;
	comp=document.getElementById("af_company").value;
	phon=document.getElementById("af_phone").value;
	emai=document.getElementById("af_email").value;
	stat=document.getElementById("af_status").value;
	if (name.length==0 || year.length==0 || dept.length==0 || comp.length==0 || phon.length==0 || emai.length==0 || stat.length==0) { alert("One or more fields empty!"); return; }
	if (xmlhttpA==null) { return; }
	document.getElementById("af_submit").disabled="disabled";
	document.getElementById("af_submit").value=" Posting... ";
	document.getElementById("af_submit").style.backgroundColor = "#ccc";
	var url="ajax-alumni-register.php";
	var params="na="+name+"&ni="+nick+"&ye="+year+"&de="+dept+"&co="+comp+"&ph="+phon+"&em="+emai+"&st="+stat+"&ra="+Math.random();
	xmlhttpA.onreadystatechange=stateChangedA;
	xmlhttpA.open("POST",url,true);
	xmlhttpA.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttpA.setRequestHeader("Content-length", params.length);
	xmlhttpA.setRequestHeader("Connection", "close");
	xmlhttpA.send(params);	
}
function clearFormA()
{
	document.getElementById("af_name").value="";
	document.getElementById("af_nick").value="";
	document.getElementById("af_year").value="2011";
	document.getElementById("af_deptt").value="CE";
	document.getElementById("af_company").value="";
	document.getElementById("af_phone").value="";
	document.getElementById("af_email").value="";
	document.getElementById("af_status").value="Yes";
}