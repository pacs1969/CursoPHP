{literal}
<script>
function addElement(id1)
{
var ni = document.getElementById(id1);
id2 = id1 + "_val";
var numi = document.getElementById(id2);
var num = (document.getElementById(id2).value -1)+ 2;
numi.value = num;
var divIdName = "my"+num+"Div";
var newdiv = document.createElement('div');
newdiv.setAttribute("id",divIdName);
newdiv.innerHTML = 'caption&nbsp;<input name="' + id1 + '_caption[]" type="text" value="" size="5"/>&nbsp;&nbsp;&nbsp;value&nbsp;<input name="' + id1 + '_value[]" type="text" value="" size="5"/>';
ni.appendChild(newdiv);
}
function removeElement(id1) {
  var d = document.getElementById(id1);
  id2 = id1 + "_val";
  var numi = document.getElementById(id2).value;
  var divIdName = "my"+numi+"Div";
  document.getElementById(id2).value=numi-1;
  var olddiv = document.getElementById(divIdName);
  d.removeChild(olddiv);
}
function showextras(id){
var fieldval = document.getElementById(id).value;
master = id + "_master"
divid = id + "_" + fieldval;
switchextra(divid,master);
}
function switchextra(obj,masterdiv){
if(document.getElementById){
var el = document.getElementById(obj);
var ar = document.getElementById(masterdiv).getElementsByTagName("div"); 
	if(el.style.display == "none"){ 
		for (var i=0; i<ar.length; i++){
		ar[i].style.display = "none";
		}
		el.style.display = "block";
	}else{
	el.style.display = "block";
	}
	}

}
function change_values(fieldname){
fieldname_label = fieldname + "_label_id";
fieldname_jsalert = fieldname + "_jsalert_id";
fieldname_list = fieldname + "_listhead_id";
document.getElementById(fieldname_jsalert).value = document.getElementById(fieldname_label).value + " field left blank!";
document.getElementById(fieldname_list).value = document.getElementById(fieldname_label).value;
}
function change_option(id1,id2){
document.getElementById(id1).style.display='none';
document.getElementById(id2).style.display='block';
}
</script>
{/literal}


<TABLE CELLPADDING="1" CELLSPACING="1" BORDER="0" ALIGN="center" width="100%">
<TR><td valign="top">

<TABLE CELLPADDING="4" CELLSPACING="4" BORDER="0" width="100%">
<tr><td width="25%" valign="top"><b>FIELD</b>(caption or label)</td><!--<td width="5%" valign="top"><b>LIST</b></td>--><td width="5%" valign="top"><b>INCLUDE</b></td></td><td valign="top" width="15%"><b>INPUT TYPE</b></td><td valign="top"><b>EXTRA</b> details for inputs. <br>( if required ) </td></tr>
{foreach from=$tbldetails.fields item=fields}
{if $fields.auto_increment neq 1}
<tr>
<td valign="top"><input type="text" name="{$fields.name}_label" id="{$fields.name}_label_id" value="{$fields.name|replace:"_":" "}" class="captionbox" onblur="change_values('{$fields.name}');"><br>{$fields.Type}, {$fields.length}, {foreach from=$fields.flags item=flag}{$flag} {/foreach}</td>
<!--<td valign="top"><input type="Checkbox" name="{$fields.name}_listing" checked></td>-->
<td valign="top"><input type="Checkbox" name="{$fields.name}_include" checked></td>
<td valign="top">
<select name="{$fields.name}_inputtype" id="{$fields.name}_id" class="selectbox" onchange="showextras('{$fields.name}_id');">
<option value="none">-- Select type --</option>
<option value="text">Text</option>
<option value="password">Password</option>
<option value="textarea">TextArea</option>
<option value="check">CheckBox</option>
<option value="radio">RadioButton</option>
<option value="list">List</option>
<option value="multiple">MultipleList</option>
<option value="file">FileUpload</option>
<option value="date">Date</option>
<option value="date_time">Date and Time</option>
<option value="htmleditor">HTMLeditor</option>
<option value="hidden">hidden</option>
</select>
</td>
<td valign="top">
<div id="{$fields.name}_id_master">
<div id="{$fields.name}_id_text" style="display:none;">
Field size <input type="text" value="15" size="5" name="{$fields.name}_text_size">
</div>
<div id="{$fields.name}_id_password" style="display:none;">
Field  size <input type="text" value="15" size="5" name="{$fields.name}_password_size">
</div>
<div id="{$fields.name}_id_textarea" style="display:none;">
Rows&nbsp;<input type="text" name="{$fields.name}_id_rows" size="4"> &nbsp;
Columns&nbsp;<input type="text" name="{$fields.name}_id_columns" size="4">
</div>
<div id="{$fields.name}_id_check" style="display:none;">
<input type="radio" name="{$fields.name}_check_captionfrm" value="frmfield" size="5" checked onclick="change_option('{$fields.name}_check_op2','{$fields.name}_check_op1');">&nbsp;Field values <input type="radio" name="{$fields.name}_check_captionfrm" size="5" onclick="change_option('{$fields.name}_check_op1','{$fields.name}_check_op2');" value="specify">&nbsp;specify <br>
<span id="{$fields.name}_check_op1">
{if $fields.enumvals neq ''}
<br>
{foreach from=$fields.enumvals item=enumval}
caption&nbsp;<input type="text" name="{$fields.name}_check_op1_caption[]" value="{$enumval}" size="5">&nbsp;
value&nbsp;<input type="text" name="{$fields.name}_check_op1_value[]" value="{$enumval}" size="5"><br>
{/foreach}
{/if}
</span>
<span id="{$fields.name}_check_op2" style="display:none"><br>
caption&nbsp;<input type="text" name="{$fields.name}_check_op2_caption[]" size="5"> &nbsp;
value&nbsp;<input type="text" name="{$fields.name}_check_op2_value[]" size="5">&nbsp;<a href="javascript:;" onclick="addElement('{$fields.name}_check_op2');">++</a> &nbsp;<a href="javascript:;" onclick="removeElement('{$fields.name}_check_op2');">--</a>
<input type="hidden" value="0" id="{$fields.name}_check_op2_val" /> 
</span>

</div>
<div id="{$fields.name}_id_radio" style="display:none;">
<input type="radio" name="{$fields.name}_radio_captionfrm" value="frmfield" size="5" checked onclick="change_option('{$fields.name}_radio_op2','{$fields.name}_radio_op1');">&nbsp;Field values <input type="radio" name="{$fields.name}_radio_captionfrm" size="5" onclick="change_option('{$fields.name}_radio_op1','{$fields.name}_radio_op2');" value="specify">&nbsp;specify <br>
<span id="{$fields.name}_radio_op1">
{if $fields.enumvals neq ''}
<br>
{foreach from=$fields.enumvals item=enumval}
caption&nbsp;<input type="text" name="{$fields.name}_radio_op1_caption[]" value="{$enumval}" size="5">&nbsp;
value&nbsp;<input type="text" name="{$fields.name}_radio_op1_value[]" value="{$enumval}" size="5"><br>
{/foreach}
{/if}
</span>
<span id="{$fields.name}_radio_op2" style="display:none"><br>
caption&nbsp;<input type="text" name="{$fields.name}_radio_op2_caption[]" size="5"> &nbsp;
value&nbsp;<input type="text" name="{$fields.name}_radio_op2_value[]" size="5">&nbsp;<a href="javascript:;" onclick="addElement('{$fields.name}_radio_op2');">++</a> &nbsp;<a href="javascript:;" onclick="removeElement('{$fields.name}_radio_op2');">--</a>
<input type="hidden" value="0" id="{$fields.name}_radio_op2_val" /> 
</span>
<!--
caption&nbsp;<input type="text" name="{$fields.name}_radio_caption" size="5"> &nbsp;
value&nbsp;<input type="text" name="{$fields.name}_radio_value" size="5">
-->


</div>
<div id="{$fields.name}_id_list" style="display:none;">
<input type="radio" name="{$fields.name}_list_captionfrm" value="frmfield" size="5" checked onclick="change_option('{$fields.name}_list_op2','{$fields.name}_list_op1');">&nbsp;Field values <input type="radio" name="{$fields.name}_list_captionfrm" size="5" onclick="change_option('{$fields.name}_list_op1','{$fields.name}_list_op2');" value="specify">&nbsp;specify <br>
<span id="{$fields.name}_list_op1">
{if $fields.enumvals neq ''}
<br>
{foreach from=$fields.enumvals item=enumval}
caption&nbsp;<input type="text" name="{$fields.name}_list_op1_caption[]" value="{$enumval}" size="5">&nbsp;
value&nbsp;<input type="text" name="{$fields.name}_list_op1_value[]" value="{$enumval}" size="5"><br>
{/foreach}
{/if}
</span>
<span id="{$fields.name}_list_op2" style="display:none"><br>
caption&nbsp;<input type="text" name="{$fields.name}_list_op2_caption[]" size="5"> &nbsp;
value&nbsp;<input type="text" name="{$fields.name}_list_op2_value[]" size="5">&nbsp;<a href="javascript:;" onclick="addElement('{$fields.name}_list_op2');">++</a> &nbsp;<a href="javascript:;" onclick="removeElement('{$fields.name}_list_op2');">--</a>
<input type="hidden" value="0" id="{$fields.name}_list_op2_val" /> 
</span>
</div>
<div id="{$fields.name}_id_multiple" style="display:none;">
size&nbsp;<input type="text" name="{$fields.name}_mlist_size" size="5"> 
<input type="radio" name="{$fields.name}_mlist_captionfrm" value="frmfield" size="5" checked onclick="change_option('{$fields.name}_mlist_op2','{$fields.name}_mlist_op1');">&nbsp;Field values <input type="radio" name="{$fields.name}_mlist_captionfrm" size="5" onclick="change_option('{$fields.name}_mlist_op1','{$fields.name}_mlist_op2');" value="specify">&nbsp;specify <br>
<span id="{$fields.name}_mlist_op1">
{if $fields.enumvals neq ''}
<br>
{foreach from=$fields.enumvals item=enumval}
caption&nbsp;<input type="text" name="{$fields.name}_mlist_op1_caption[]" value="{$enumval}" size="5">&nbsp;
value&nbsp;<input type="text" name="{$fields.name}_mlist_op1_value[]" value="{$enumval}" size="5"><br>
{/foreach}
{/if}
</span>
<span id="{$fields.name}_mlist_op2" style="display:none"><br>
caption&nbsp;<input type="text" name="{$fields.name}_mlist_op2_caption[]" size="5"> &nbsp;
value&nbsp;<input type="text" name="{$fields.name}_mlist_op2_value[]" size="5">&nbsp;<a href="javascript:;" onclick="addElement('{$fields.name}_mlist_op2');">++</a> &nbsp;<a href="javascript:;" onclick="removeElement('{$fields.name}_mlist_op2');">--</a>
<input type="hidden" value="0" id="{$fields.name}_mlist_op2_val" /> 
</span>
</div>
<div id="{$fields.name}_id_file" style="display:none;">
file
</div>
<div id="{$fields.name}_id_date" style="display:none;">
date
</div>
<div id="{$fields.name}_id_htmleditor" style="display:none;">
htmleditor
</div>
<div id="{$fields.name}_id_hidden" style="display:none;">
hidden
</div>
<div id="{$fields.name}_id_none" style="display:none;">
none
</div>
</div>
</td></tr>
{else}
<tr><td valign="top">{$fields.name}</td><td colspan="3">Auto increment</td></tr>
{/if}
{/foreach}
<tr><td valign="top">Key field</td><td colspan="3">
{$tbldetails.primary}
</td></tr>
<tr><td valign="top">HTML Template</td><td colspan="3"><select name="htmltemplate" class="selectbox">
<!--<option value="">-- Select HTML Template --</option>-->
<option value="S">Seperate</option>
<option value="HF">Header and Footer</option>
<option value="HFL">Header,Footer and Left</option>
<option value="HFLR">Header,Footer,Left and Right</option>
</select></td></tr>
<tr><td valign="top">Form name</td><td colspan="3"><input type="text" name="form_name" value="{$tbldetails.table}frm"></td></tr>
<tr><td valign="top">Form method</td><td colspan="3"><input type="radio" name="form_method" value="POST" checked> &nbsp;POST
<input type="radio" name="form_method" value="GET"> &nbsp;GET
</td></tr>

<tr><td colspan="2" align="left"><input type="button" name="htmlprevious" value="<< Previous" class="button" onclick="switchmenu('sql')"></td>
<td colspan="2" align="right"><input type="button" name="htmlnext" value="Next >>" class="button" onclick="switchmenu('js')"></td></tr>
</TABLE>
</TD></TR>
</TABLE>

