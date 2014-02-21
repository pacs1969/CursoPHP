function showdiv(t){
document.getElementById(t).style.display="inline";
}
function hidediv(t){
document.getElementById(t).style.display="none";
}

 if (document.getElementById){ //DynamicDrive.com change
document.write('<style type="text/css">\n')
document.write('.submenu{display: none;}\n')
document.write('</style>\n')
}
function load_project(val){
	document.project.action_flag.value=val;
	document.project.submit();
}
function switchmenu(obj){
       if(document.getElementById){
       var el = document.getElementById(obj);
//	   var ar = document.getElementById("masterdiv").getElementsByTagName("div"); //DynamicDrive.com change
               if(el.style.display == "none"){ //DynamicDrive.com change
                       for (var i=0; i<ar.length; i++){
                             // if (ar[i].className=="submenu") //DynamicDrive.com change
                         document.getElementById(ar[i]).style.display = "none";
                       }
                       el.style.display = "block";
               }else{
                       el.style.display = "block";
               }
       }
}
function submitsql(theform){
	//alert(theform);
	theform.submit();
}
function ValidateEmail(theinput)
{
	var s=theinput;
	
	if(s.search)
	{
		return (s.search(new RegExp('^([-!#$%&\'*+./0-9=?A-Z^_`a-z{|}~'+unescape('%7F')+'])+@([-!#$%&\'*+/0-9=?A-Z^_`a-z{|}~'+unescape('%7F')+']+\\.)+[a-zA-Z]{2,6}$','gi'))>=0)
	}
	if(s.indexOf)
	{
		var at_character=s.indexOf('@')
		if(at_character<=0 || at_character+4>s.length)
			return false
	}
	if(s.length<6)
		return false
	else
		return true
}
function Validatecheckbox(theinput){
	if(theinput.checked == true){
	document.registration.ChkTerms.value="yes";
	}else{
	document.registration.ChkTerms.value="";
	}
}
function select_county(theform,actionform){
	if(theform.actionflag){
		if(theform.actionflag.value=='editprop'){
			theform.actionflag.value='showprop';
		}
    }
	if(theform.State.value){
	theform.countyselect.value='yes';
	theform.action=actionform;
	theform.submit();
	}
}
function pop_up(page,id) {
	var a =page+id;
	window.open(a,'welcome','width=800,height=600,menubar=no,status=no,location=no,toolbar=no,scrollbars=yes');
}

function project_submit(val){
if(document.project.NAME.value == ""){
	alert("Project title field empty!");
	document.project.NAME.focus();
	return false;
}
if(document.project.DOCROOT.value == ""){
	alert("Document root directory cannot be empty!");
	document.project.DOCROOT.focus();
	return false;
}
if(document.project.SITEURL.value == ""){
	alert("Site URL cannot be empty!");
	document.project.SITEURL.focus();
	return false;
}
if(document.project.DBHOST.value == ""){
	alert("Database hostname cannot be empty!");
	document.project.DBHOST.focus();
	return false;
}
if(document.project.DBUSERNAME.value == ""){
	alert("Database username cannot be empty!");
	document.project.DBUSERNAME.focus();
	return false;
}
if(document.project.DBPASSWORD.value == ""){
	alert("Database password cannot be empty!");
	document.project.DBPASSWORD.focus();
	return false;
}
if(document.project.DBNAME.value == ""){
	alert("Database name cannot be empty!");
	document.project.DBNAME.focus();
	return false;
}
	document.project.action_flag.value=val;
	document.project.submit();
}
function create_project(thisform,doc_root,site_url){
thisform.DOCROOT.value=doc_root+'projects/'+thisform.NAME.value+'/';
thisform.SITEURL.value=site_url+'projects/'+thisform.NAME.value+'/';
}