var _atu="undefined";
if(typeof (_ate)===_atu){
var _ate={clck:1,show:1,samp:0.1-Math.random(),scnt:1,seqn:1,inst:1,wait:1000,tmot:null,cevt:[],sttm:new Date().getTime(),max:268435455,pix:"pixl",sid:0,uid:null,wid:"486105ac2e43922"+"01234567".split("")[Math.floor(Math.random()*8)],swf:"http://s9.addthis.com/as/addthis.swf",evu:"http://e1.addthis.com/at/",img:function(i,a){
new Image().src="http://e2.addthis.com/cs/1/"+i+".png?r="+Math.random()+(a||"");
},cuid:function(){
return (_ate.sttm&_ate.max).toString(16)+(Math.floor(Math.random()*_ate.max)).toString(16);
},event:function(k,v,_5){
_ate.pix=(typeof (v)!=="number"?escape(v):"pixl"+v);
_ate.cevt.push(escape(k)+"="+escape(v)+";"+Math.floor((new Date().getTime()-_ate.sttm)/100).toString(16));
if(_5){
_ate.xmit(true);
}else{
_ate.sched_xmit(true);
}
},sched_xmit:function(_6){
if(_ate.tmot!==null){
clearTimeout(_ate.tmot);
}
if(_6){
_ate.tmot=setTimeout("_ate.xmit(false)",_ate.wait);
}
},xmit:function(_7){
if(_ate.cevt.length>0&&_ate.samp>=0){
_ate.sched_xmit(false);
if(_ate.seqn===1){
_ate.event("pin",_ate.inst,false);
}
if(_ate.sid===0){
_ate.sid=_ate.cuid();
}
var _8=_ate.evu+_ate.pix+".png?ev="+_ate.wid+"/-/a/"+_ate.sid+"/"+(_ate.seqn++)+(_ate.uid!==null?"/"+_ate.uid:"")+"&ce="+_ate.cevt.join(",")+"&pub="+escape(addthis_pub);
_ate.cevt=[];
if(_7){
var d=document,_a=d.createElement("iframe");
_a.id="_atf";
_a.src=_8;
var ds=_a.style;
ds.width="1px";
ds.height="1px";
ds.border="0px";
ds.margin="0px";
ds.padding="0px";
d.body.appendChild(_a);
_a=d.getElementById("_atf");
}else{
new Image().src=_8;
}
}
},load:function(){
_ate.event("lod",1,false);
var d=document;
var _d=navigator.userAgent.toLowerCase(),_e={saf:/webkit/.test(_d),msi:/msie/.test(_d)&&!(/opera/.test(_d))};
if(_ate.swf!==null){
var _f=function(o,n,v){
var c=d.createElement("param");
c.name=n;
c.value=v;
o.appendChild(c);
};
var ato=d.createElement("object");
ato.id="_atff";
ato.width="1";
ato.height="1";
ato.setAttribute("style","position:fixed;z-index:100000");
if(_e.msi){
ato.classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000";
_f(ato,"movie",_ate.swf);
}else{
ato.data=_ate.swf;
ato.quality="high";
ato.type="application/x-shockwave-flash";
}
_f(ato,"wmode","transparent");
_f(ato,"allowScriptAccess","always");
d.body.insertBefore(ato,d.body.firstChild);
if(_e.msi){
ato.outerHTML+=" ";
}
}
},unload:function(){
_ate.event("clo",1,true);
return true;
},bucket:function(arg){
if(arg===null){
arg=_ate.cuid();
}
_ate.uid=arg;
return arg;
}};
if(_ate.samp>=0){
(function(){
var d=document,w=window;
if(w.addEventListener){
w.addEventListener("load",_ate.load,false);
w.addEventListener("unload",_ate.unload,false);
}else{
if(w.attachEvent){
w.attachEvent("onload",_ate.load);
w.attachEvent("onunload",_ate.unload);
}else{
w.onload=_ate.load;
w.onunload=_ate.unload;
}
}
})();
}
_ate.img("lod");
}else{
_ate.inst++;
}
if(typeof _atw==="undefined"){
var _atw={host:"http://s7.addthis.com/",serv:"http://s7.addthis.com/services/",path:"http://s7.addthis.com/select/",list:{"ask":["Ask","ask.png"],"delicious":["Del.icio.us","delicious.png"],"digg":["Digg","digg.png"],"email":["Email","email.png"],"favorites":["Favorites","favorites.png"],"facebook":["Facebook","facebook.gif"],"fark":["Fark","fark.png"],"furl":["Furl","furl.gif"],"google":["Google","goog.png"],"live":["Live","live.gif"],"myspace":["MySpace","myspace.png"],"myweb":["Yahoo MyWeb","yahoo-myweb.png"],"newsvine":["Newsvine","newsvine.png"],"reddit":["Reddit","reddit.gif"],"sk*rt":["Sk*rt","skrt.gif"],"slashdot":["Slashdot","slashdot.png"],"stumbleupon":["StumbleUpon","su.png"],"stylehive":["Stylehive","stylehive.gif"],"tailrank":["Tailrank","tailrank2.png"],"technorati":["Technorati","technorati.png"],"thisnext":["ThisNext","thisnext.gif"],"twitter":["Twitter","twitter.gif"],"ballhype":["BallHype","ballhype.png"],"yardbarker":["Yardbarker","yardbarker.png"],"kaboodle":["Kaboodle","kaboodle.gif"],"more":["More ...","more.gif"]},get:function(id){
return document.getElementById(id);
},xwait:function(){
if(_atw.cwait!==null){
clearTimeout(_atw.cwait);
}
},cwait:null,odone:false,divid:"addthis_dropdown15",close:function(){
var _19=_atw.get(_atw.divid);
if(_19){
_19.style.display="none";
}
var e=document.getElementsByTagName("embed");
if(e&&addthis_hide_embed){
for(i=0;i<e.length;i++){
if(e[i].addthis_hidden){
e[i].style.visibility="visible";
}
}
}
return false;
},ckto:function(obj){
obj.style.color="#000000";
if(obj.value==" email address"){
obj.value="";
}
},show:function(_1c){
var _1d=_atw.get("at_share"),_1e=_atw.get("at_email"),_1f=_atw.get("at_caption"),_20=_atw.get("at_success");
_1d.style.display="none";
_1e.style.display="none";
_20.innerHTML="";
if(_1c=="share"||_1c==""){
_1d.style.display="block";
_1f.innerHTML=addthis_caption_share;
if(_ate.show-->0){
_ate.event("sho","share");
_ate.img("sho");
}
}else{
_1e.style.display="block";
_1f.innerHTML=addthis_caption_email;
if(_ate.show-->0){
_ate.event("sho","email");
_ate.img("sho");
}
}
},genurl:function(_21){
var euc=encodeURIComponent,_23=euc(addthis_url),_24=euc(addthis_title),_25=euc(addthis_logo);
return "http://www.addthis.com/bookmark.php?v=15&winname=addthis&pub="+addthis_pub+"&s="+_21+"&url="+_23+"&title="+_24+"&logo="+_25+"&logobg="+addthis_logo_background+"&logocolor="+addthis_logo_color;
},cumulpos:function(a){
var b=0,c=0;
do{
b+=a.offsetTop||0;
c+=a.offsetLeft||0;
a=a.offsetParent;
}while(a);
return [c,b];
},wsize:function(){
var w=window,d=document,de=d.documentElement,db=d.body;
if(typeof (w.innerWidth)=="number"){
return [w.innerWidth,w.innerHeight];
}else{
if(de&&(de.clientWidth||de.clientHeight)){
return [de.clientWidth,de.clientHeight];
}else{
if(db&&(db.clientWidth||db.clientHeight)){
return [db.clientWidth,db.clientHeight];
}else{
return [0,0];
}
}
}
},spos:function(){
var w=window,d=document,de=d.documentElement,db=d.body;
if(typeof (w.pageYOffset)=="number"){
return [w.pageXOffset,w.pageYOffset];
}else{
if(db&&(db.scrollLeft||db.scrollTop)){
return [db.scrollLeft,db.scrollTop];
}else{
if(de&&(de.scrollLeft||de.scrollTop)){
return [de.scrollLeft,de.scrollTop];
}else{
return [0,0];
}
}
}
}};
function addthis_open(elt,_32,_33,_34){
_atw.xwait();
addthis_url=_33;
addthis_title=_34;
if(addthis_url===""||addthis_url==="[URL]"){
addthis_url=location.href;
}
if(addthis_title===""||addthis_title==="[TITLE]"){
addthis_title=document.title;
}
var _35=16;
var _36=elt.getElementsByTagName("img");
if(_36&&_36[0]){
elt=_36[0];
_35=0;
}
_atw.show(_32);
var _37=_atw.cumulpos(elt),_38=_37[0]+addthis_offset_left,_39=_37[1]+_35+1+addthis_offset_top,_3a=_atw.wsize(),_3b=_atw.spos(),_3c=_atw.get(_atw.divid);
_3c.style.display="block";
if(_38-_3b[0]+_3c.clientWidth+20>_3a[0]){
_38=_38-_3c.clientWidth+50;
}
if(_39-_3b[1]+_3c.clientHeight+elt.clientHeight+20>_3a[1]){
_39=_39-_3c.clientHeight-20;
}
_3c.style.left=_38+"px";
_3c.style.top=(_39+elt.clientHeight)+"px";
if(addthis_hide_embed){
var _3d=_38+_3c.clientWidth;
var _3e=_39+_3c.clientHeight;
var e=document.getElementsByTagName("embed");
var _40=0,_41=0,_42=0;
for(i=0;i<e.length;i++){
_40=_atw.cumulpos(e[i]);
_41=_40[0];
_42=_40[1];
if(_38<_41+e[i].clientWidth&&_39<_42+e[i].clientHeight){
if(_3d>_41&&_3e>_42){
if(e[i].style.visibility!="hidden"){
e[i].addthis_hidden=true;
e[i].style.visibility="hidden";
}
}
}
}
}
if(!_atw.odone){
var _44=addthis_options.replace(/\s/g,"");
var _45=_44.split(",");
for(var i=0;i<_45.length;i++){
var _46=_45[i];
if(_46 in _atw.list){
var bms=_atw.get("addthis_"+_46+"15");
if(bms){
bms.src=_atw.serv+_atw.list[_46][1];
}
}
}
_atw.odone=true;
}
return false;
}
function addthis_close(){
_atw.cwait=setTimeout("_atw.close()",500);
}
function addthis_sendto(_48){
if(_48==="email"){
_atw.show(_48);
return false;
}
_atw.close();
if(_48==="favorites"){
if(document.all){
window.external.AddFavorite(addthis_url,addthis_title);
}else{
window.sidebar.addPanel(addthis_title,addthis_url,"");
}
return false;
}
if(_48==="stumbleupon"){
_48="su";
}
if(_48==="sk*rt"){
_48="skrt";
}
window.open(_atw.genurl(_48),"addthis","scrollbars=yes,menubar=no,width=620,height=500,resizable=yes,toolbar=no,location=no,status=no");
if(_48){
_ate.event("sct",_ate.scnt++);
_ate.event("sto",_48);
_ate.img("sto","&s="+_48);
}else{
_ate.event("clk",_ate.clck++);
}
return false;
}
function addthis_send(){
var _49=_atw.get("at_from"),_4a=_atw.get("at_to"),_4b=_atw.get("at_img"),_4c=_atw.get("at_success"),_4d=_atw.get("at_msg"),euc=encodeURIComponent;
if(_49.value.indexOf("@")<0||_4a.value.indexOf("@")<0||_49.value.indexOf(".")<0||_4a.value.indexOf(".")<0){
alert("Please enter a valid email address!");
return;
}
_rnd=Math.random();
_url="http://www.addthis.com/tellfriend.php?pub="+euc(addthis_pub)+"&url="+euc(addthis_url)+"&fromname=aaa&fromemail="+euc(_49.value)+"&tofriend="+euc(_4a.value)+"&note="+euc(_4d.value)+"&r="+_rnd;
_4b.src=_url;
_4c.innerHTML="Message Sent!";
_atw.cwait=setTimeout("_atw.close()",1200);
return false;
}
(function(){
try{
if(typeof addthis_pub===_atu){
addthis_pub="";
}
if(typeof addthis_caption===_atu){
addthis_caption="Bookmark &amp Share";
}
if(typeof addthis_brand===_atu){
addthis_brand="";
}
if(typeof addthis_logo===_atu){
addthis_logo="";
}
if(typeof addthis_logo_background===_atu){
addthis_logo_background="";
}
if(typeof addthis_logo_color===_atu){
addthis_logo_color="";
}
if(typeof addthis_options===_atu){
addthis_options="favorites, digg, delicious, google, myspace, facebook, reddit, newsvine, live, more";
}
if(typeof addthis_offset_top!=="number"){
addthis_offset_top=0;
}
if(typeof addthis_offset_left!=="number"){
addthis_offset_left=0;
}
if(typeof addthis_caption_share===_atu){
addthis_caption_share="Bookmark &amp; Share";
}
if(typeof addthis_caption_email===_atu){
addthis_caption_email="Email a Friend";
}
if(typeof addthis_css===_atu){
addthis_css=_atw.host+"css/152/addthis_widget.css";
}
if(typeof addthis_hide_embed===_atu){
addthis_hide_embed=true;
}
addthis_options=addthis_options.replace(/\s/g,"");
var d=document,_50=d.createElement("link");
_50.rel="stylesheet";
_50.type="text/css";
_50.href=addthis_css;
_50.media="all";
d.lastChild.firstChild.appendChild(_50);
var str="<div id=\""+_atw.divid+"\" onmouseover=\"_atw.xwait()\" onmouseout=\"addthis_close()\" style=\"z-index:1000000;position:absolute;display:none\">";
str+="<table width=\"100%\" cellpadding=\"2\" cellspacing=\"0\" style=\"background-color:#EEEEEE;height:18px\">";
str+="<tr><td style=\"font-size:12px;color:#666666;padding-left:3px\"><span id=\"at_caption\">Bookmark&nbsp;&amp;&nbsp;Share</span></td><td align=\"right\" style=\"font-size:9px;color:#666666;padding-right:3px\">"+addthis_brand+"</td></tr>";
str+="</table>";
var _52=false;
str+="<div id=\"at_share\">";
str+="<table id=\"addthis_services\" width=\"100%\" cellpadding=\"0\" style=\"font-family:Verdana, Arial;font-size:11px\">";
str+="<tr><td colspan=\"2\" style=\"height:0px\"></td></tr>";
var _53=addthis_options.split(",");
for(var i=0;i<_53.length;i++){
var _55=_53[i];
if(_55 in _atw.list){
if(!_52){
str+="<tr>";
}
str+="<td width=\"50%\" style=\"height:19px\"><a href=\"http://www.smartcrud.com\" onclick=\"return addthis_sendto('"+_55+"');\"><img id=\"addthis_"+_55+"15\" alt=\"\" width=\"16\" height=\"16\" />&nbsp;"+_atw.list[_55][0]+"</a></td>";
if(_52){
str+="</tr>";
}
_52=!_52;
}
}
if(_52){
str+="<td></td></tr>";
}
str+="<tr><td colspan=\"2\" style=\"height:2px\"></td></tr>";
str+="</table>";
str+="</div>\n";
str+="<div id=\"at_email\" style=\"display:none;font-size:11px;padding-left:20px;padding-top:6px\">";
str+="<table border=\"0\">";
var in1="<tr><td style=\"font-size:12px\"";
var in2="style=\"width:130px;height:18px;font-size:11px;font-family:Arial;color:#999999\" value=\" email address\" onfocus=\"_atw.ckto(this)\" /></td></tr>";
str+=in1+">To:</td><td><input id=\"at_to\" type=\"text\" "+in2;
str+=in1+">From:</td><td><input id=\"at_from\" type=\"text\" "+in2;
str+=in1+" valign=\"top\">Note:</td><td><textarea id=\"at_msg\" style=\"width:130px;height:36px;font-size:11px;font-family:Arial;\"/></textarea></td></tr>";
str+="<tr><td colspan=\"2\" align=\"right\"><span id=\"at_success\" style=\"font-size:10px;color:#777777;\"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"button\" value=\"Send\" onclick=\"return addthis_send()\" style=\"font-size:9px\"/></td></tr>";
str+="</table>";
str+="</div>\n";
str+="<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"background-color:#EEEEEE\">";
str+="<tr><td colspan=\"2\" align=\"right\" style=\"padding:0px;padding-right:10px;height:11px\"><img id=\"at_img\" src=\""+_atw.path+"select_load.png\" style=\"width:1px;height:1px\" /><a href=\"http://www.addthis.com\" target=\"_blank\" style=\"height:6px;padding:0px\"><img src=\""+_atw.serv+"addthis-mini.gif\" border=\"0\" style=\"padding:0px;width:50px;height:9px\" alt=\"\" /></a></td></tr>";
str+="</table>\n";
str+="</div>\n";
div=d.createElement("div");
div.innerHTML=str;
d.body.insertBefore(div,d.body.firstChild);
div.style.zIndex=1000000;
}
catch(e){
}
})();
}

