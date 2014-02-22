var xmlhttpL=GetXmlHttpObject();
var xmlhttpR=GetXmlHttpObject();
function GetXmlHttpObject()
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
function stateChangedL()
{
if (xmlhttpL.readyState==4)
  {
	  var httpDoc=xmlhttpL.responseText;
	  if(httpDoc=="POST_SUCCESS")
	  {
		  doRefresh();
	  }
	  else
	  {
		  alert(httpDoc);
		  document.getElementById("ff_submit").value=" Submit ";
	  	  document.getElementById("ff_submit").disabled="";
	  	  document.getElementById("ff_submit").style.backgroundColor="#2bf";
	  }
  }
}
function stateChangedR()
{
if (xmlhttpR.readyState==4)
  {
	  var httpDoc=xmlhttpR.responseText;
	  if(httpDoc=="POST_NULL")
	  {
		  //do nothing
	  }	  
	  else
	  {
		  pipeC=httpDoc.lastIndexOf("|");
		  lastId=httpDoc.substr(pipeC+1,httpDoc.length);
		  document.getElementById("ff_lastid").value=lastId;
		  injectFeedback(httpDoc.substr(0,pipeC));
	  }
	  document.getElementById("ff_submit").value=" Submit ";
	  document.getElementById("ff_submit").disabled="";
	  document.getElementById("ff_submit").style.backgroundColor="#2bf";
	  clearFormF();		  
  }
}
function doFeedback()
{
	name=document.getElementById("ff_name").value;
	email=document.getElementById("ff_email").value;
	msg=document.getElementById("ff_feedback").value;
	if (name.length==0 || email.length==0 || msg.length==0) { alert("One or more fields empty!"); return; }
	if (xmlhttpL==null) { return; }
	document.getElementById("ff_submit").disabled="disabled";
	document.getElementById("ff_submit").value=" Posting... ";
	document.getElementById("ff_submit").style.backgroundColor="#666";
	var url="ajax-feedback.php";
	var params="na="+name+"&em="+email+"&ms="+msg+"&ra="+Math.random();
	xmlhttpL.onreadystatechange=stateChangedL;
	xmlhttpL.open("POST",url,true);
	xmlhttpL.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttpL.setRequestHeader("Content-length", params.length);
	xmlhttpL.setRequestHeader("Connection", "close");
	xmlhttpL.send(params);	
}
function doRefresh()
{
	lastID=document.getElementById("ff_lastid").value;
	if (lastID.length==0 || xmlhttpR==null) { return; }
	var url="ajax-feedback-refresh.php";
	url+="?id="+lastID+"&ra="+Math.random();
	xmlhttpR.onreadystatechange=stateChangedR;
	xmlhttpR.open("GET",url,true);
	xmlhttpR.send(null);		
}
function clearFormF()
{
	document.getElementById("ff_name").value="";
	document.getElementById("ff_email").value="";
	document.getElementById("ff_feedback").value="";
}
function injectFeedback(str)
{
	var oldC = $("#feedbackContainer").html();
	oldC=str+oldC;
	$('#feedbackContainer').html(oldC);
	
}
