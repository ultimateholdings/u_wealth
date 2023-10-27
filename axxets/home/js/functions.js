var digits = "0123456789";
// non-digit characters which are allowed in phone numbers
var phoneNumberDelimiters = "()- ";
// characters which are allowed in international phone numbers
// (a leading + is OK)
var validWorldPhoneChars = phoneNumberDelimiters + "+";
// Minimum no of digits in an international phone no.
var minDigitsInIPhoneNumber = 10;

function isInteger(s)
{   var i;
    for (i = 0; i < s.length; i++)
    {   
        // Check that current character is number.
        var c = s.charAt(i);
        if (((c < "0") || (c > "9"))) return false;
    }
    // All characters are numbers.
    return true;
}

function pnumOnly()
{
	if((window.event.keyCode<46 || window.event.keyCode>57 ) && (window.event.keyCode != 13))
	{
		window.event.keyCode=null;
		//alert("Please Enter Numeric Values Only");
		
	}
}

function check()
{
	if(window.event.keyCode == 34 || window.event.keyCode == 39 )
	{
		window.event.keyCode=null;
		//alert("Please Enter Numeric Values Only");
	}
}

function stripCharsInBag(s, bag)
{   var i;
    var returnString = "";
    // Search through string's characters one by one.
    // If character is not in bag, append to returnString.
    for (i = 0; i < s.length; i++)
    {   
        // Check that current character isn't whitespace.
        var c = s.charAt(i);
        if (bag.indexOf(c) == -1) returnString += c;
    }
    return returnString;
}

function checkInternationalPhone(strPhone){
s=stripCharsInBag(strPhone,validWorldPhoneChars);
return (isInteger(s) && s.length >= minDigitsInIPhoneNumber);
}

function ValidatePhone(phNumber){
	var Phone = phNumber;
	if ((Phone==null)||(Phone=="")){
		//alert("Please Enter your Phone Number")
		return false
	}
	if (checkInternationalPhone(Phone)==false){
		//alert("Please Enter a Valid Phone Number")
		return false
	}
	return true
 }

function isEmail(string) {
if (string.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/) != -1)
return true;
else
return false;
}

function isDate(field_name,langf)
{
	var dod = document.getElementById(field_name).value;
	if (dod.length == 0){
		alert("Enter Date");
		document.getElementById(field_name).focus();
		return false;
	}
	var da = dod.split("-");
	if (da.length != 3){
		alert("Date must be in correct Format");
		document.getElementById(field_name).focus();
		return false;
	}
	var dteDate;
	if(langf == "E"){
		da[0] = da[0] -1;
		dteDate=new Date(da[2],da[0],da[1]);
		if (((da[1]==dteDate.getDate()) && (da[0]==dteDate.getMonth()) && (da[2]==dteDate.getFullYear())) == false){
			alert("Date must be in correct Format");
			document.getElementById(field_name).focus();
			return false;
		}
	}
	else{
		da[1] = da[1]-1;
		dteDate=new Date(da[2],da[1],da[0]);
		if (((da[0]==dteDate.getDate()) && (da[1]==dteDate.getMonth()) && (da[2]==dteDate.getFullYear())) == false){
			alert("Date must be in correct Format");
			document.getElementById(field_name).focus();
			return false;
		}
	}
	return true;
}


function validatelength(ta_name,a)
{
	var p;
	p = ta_name.value;

	
	if(window.event.keyCode == 34 || window.event.keyCode == 39 )
	{
		window.event.keyCode=null;
		return;
		//alert("Please Enter Numeric Values Only");
	}
	
	if ((a==1) && (p.length >= 255))
	{
		alert("Max. Charatcters Limit 255 Exceeds");
		window.event.keyCode=null;
	}
	if ((a==2) && (p.length > 255))
	{
		alert("Max. Charatcters Limit 255 Exceeds");
		ta_name.value = p.substring(0,255);
	}
}

function checkFile(fname,extension)
{
		  
	var ext = document.getElementById(fname).value;
	if (ext == "")
	{	
		alert("Select a File in (." + extension + ") Format");
		document.getElementById(fname).focus();
		return false;
	}
	ext = ext.substring(ext.length-3,ext.length);
	ext = ext.toLowerCase();
	if (ext != extension)
	{
		alert("You selected a ." + ext + " file; please select a ." + extension + " file instead!");
		document.getElementById(fname).focus();
		return false;
	}
	return true;
}



function checkField(field_name,err_msg)
{
	if (document.getElementById(field_name).value == "")
	{
		alert(err_msg);
		document.getElementById(field_name).focus();
		return false;
	}
	return true;
}


var leftPos = 0;
var topPos = 0;


function adjustTopLeft(w,h) {
leftPos = 0
topPos = 0
if (screen) {
leftPos = (screen.width / 2) - w/2;
topPos = (screen.height / 2) - h/2;
}
}


// U.S. Social Security Numbers have 9 digits.
// They are formatted as 123-45-6789.
var digitsInSocialSecurityNumber = 9;

function isEmpty(s)
{   return ((s == null) || (s.length == 0))
}

function isSSN (s)
{   if (isEmpty(s)) 
       if (isSSN.arguments.length == 1) return defaultEmptyOK;
       else return (isSSN.arguments[1] == true);
    return (isInteger(s) && s.length == digitsInSocialSecurityNumber)
}


function refreshSource()
{
	window.opener.location.reload();
	window.close();
}

