var xmlhttpUR=GetXmlHttpObjectUR();
function GetXmlHttpObjectUR()
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
function stateChangedUR()
{
if (xmlhttpUR.readyState==4)
  {
	  var httpDoc=xmlhttpUR.responseText;
	  if(httpDoc=="REG_SUCCESS")
	  {
		  clearFormUR();
		  alert("You have been registered successfully!\n\nYour password has been mailed to you.\n\nUse this account to Log In and participate in the online events of JECLAT 13.\n\nNote: Don't forget to check the SPAM folder in case you do not find an email in your inbox.");
		  //doAlumniYearView();
	  }
	  else
	  {
		  alert(httpDoc);
	  }
	  document.getElementById("rf_submit").value=" Register ";
	  document.getElementById("rf_submit").disabled="";
  	  document.getElementById("rf_submit").style.backgroundColor = "#2bf";

  }
}
function doUserRegister()
{
	
	name=document.getElementById("rf_fullname").value;
	colg=document.getElementById("rf_college").value;
	phon=document.getElementById("rf_contact").value;
	emai=document.getElementById("rf_email").value;
	if (name.length==0 || colg.length==0 || phon.length==0 || emai.length==0) { alert("One or more fields empty!"); return; }
	if(name.indexOf("|")>=0 || emai.indexOf("|")>=0 || name.toLowerCase()=="admin") { alert("Illegal Characters in name field!"); return; }
	if (xmlhttpUR==null) { return; }
	document.getElementById("rf_submit").disabled="disabled";
	document.getElementById("rf_submit").value=" Posting... ";
	document.getElementById("rf_submit").style.backgroundColor = "#ccc";
	var url="ajax-user-register.php";
	var params="na="+name+"&co="+colg+"&ph="+phon+"&em="+emai+"&ra="+Math.random();
	xmlhttpUR.onreadystatechange=stateChangedUR;
	xmlhttpUR.open("POST",url,true);
	xmlhttpUR.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttpUR.setRequestHeader("Content-length", params.length);
	xmlhttpUR.setRequestHeader("Connection", "close");
	xmlhttpUR.send(params);	
}
function clearFormUR()
{
	document.getElementById("rf_fullname").value="";
	document.getElementById("rf_college").value="";
	document.getElementById("rf_contact").value="";
	document.getElementById("rf_email").value="";
	
}