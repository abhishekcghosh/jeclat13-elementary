var xmlhttpUL=GetXmlHttpObjectUL();
function GetXmlHttpObjectUL()
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
function stateChangedUL()
{
if (xmlhttpUL.readyState==4)
  {
	  var httpDoc=xmlhttpUL.responseText;
	  httpDocFirst = httpDoc.substr(0,13);
	  
	  if(httpDocFirst=="LOGIN_SUCCESS")
	  {
		  clearFormUL();
		  httpDocArray = httpDoc.split("|");
		  httpDocName = httpDocArray[1];
		  httpDocEmail = httpDocArray[2];
		  $("#sidePaneLogIn").html("<div style='line-height: 150%; font-size: 12px'><span style='color: #ccc'>You are logged in as </span><br/>"+httpDocName+" <span style='color: #ccc'>("+httpDocEmail+")<span></div><br/><a class='sidePaneLinks' target='_blank' href='user-logout.php' id='sidePaneLinkTabs_logout' onClick='doGiveLoginForm()'>Log out</a>");
		  $("#tabHeadingRegister").css("display","none");
		 	document.getElementById("ff_name").value=httpDocName;
			document.getElementById("ff_email").value=httpDocEmail;
	  }
	  else
	  {
		  alert(httpDoc);
	  }
	  document.getElementById("lf_submit").value=" Log In ";
	  document.getElementById("lf_submit").disabled="";
  	  document.getElementById("lf_submit").style.backgroundColor = "#2bf";

  }
}
function doUserLogin()
{
	
	emai=document.getElementById("lf_email").value;
	pass=document.getElementById("lf_password").value;
	if (emai.length==0 || pass.length==0) { alert("One or more fields empty!"); return; }
	if (xmlhttpUL==null) { return; }
	document.getElementById("lf_submit").disabled="disabled";
	document.getElementById("lf_submit").value=" Logging In... ";
	document.getElementById("lf_submit").style.backgroundColor = "#ccc";
	var url="ajax-user-login.php";
	var params="em="+emai+"&pa="+pass+"&ra="+Math.random();
	xmlhttpUL.onreadystatechange=stateChangedUL;
	xmlhttpUL.open("POST",url,true);
	xmlhttpUL.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttpUL.setRequestHeader("Content-length", params.length);
	xmlhttpUL.setRequestHeader("Connection", "close");
	xmlhttpUL.send(params);	
}
function clearFormUL()
{
	document.getElementById("lf_email").value="";
	document.getElementById("lf_password").value="";
	
}
function doGiveLoginForm() {
	$("#sidePaneLogIn").html('<table class="logintable" border="0" cellpadding="4" cellspacing="2" style="text-align:left; vertical-align:top">\
                        <tr valign="top"><td>Email<br/><input class="formitems" id="lf_email" type="text" name="email" maxlength="256" style="width: 260px" /></td></tr>\
                        <tr valign="top"><td>Password<br/><input class="formitems" type="password" name="password" id="lf_password" maxlength="32" style="width: 260px" /></td></tr>\
                        <tr valign="top"><td><input class="formitems" id="lf_submit" type="submit" name="submit" value=" Log In " onclick="doUserLogin()" /></td></tr>\
                    </table>');
	$("#tabHeadingRegister").css("display","");
	document.getElementById("ff_name").value="";
	document.getElementById("ff_email").value="";
	
}