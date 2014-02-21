<?php /* Smarty version 2.6.13, created on 2008-06-24 05:42:30
         compiled from html.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', 'html.tpl', 69, false),)), $this); ?>
<?php echo '
<script>
function addElement(id1)
{
var ni = document.getElementById(id1);
id2 = id1 + "_val";
var numi = document.getElementById(id2);
var num = (document.getElementById(id2).value -1)+ 2;
numi.value = num;
var divIdName = "my"+num+"Div";
var newdiv = document.createElement(\'div\');
newdiv.setAttribute("id",divIdName);
newdiv.innerHTML = \'caption&nbsp;<input name="\' + id1 + \'_caption[]" type="text" value="" size="5"/>&nbsp;&nbsp;&nbsp;value&nbsp;<input name="\' + id1 + \'_value[]" type="text" value="" size="5"/>\';
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
document.getElementById(id1).style.display=\'none\';
document.getElementById(id2).style.display=\'block\';
}
</script>
'; ?>



<TABLE CELLPADDING="1" CELLSPACING="1" BORDER="0" ALIGN="center" width="100%">
<TR><td valign="top">

<TABLE CELLPADDING="4" CELLSPACING="4" BORDER="0" width="100%">
<tr><td width="25%" valign="top"><b>FIELD</b>(caption or label)</td><!--<td width="5%" valign="top"><b>LIST</b></td>--><td width="5%" valign="top"><b>INCLUDE</b></td></td><td valign="top" width="15%"><b>INPUT TYPE</b></td><td valign="top"><b>EXTRA</b> details for inputs. <br>( if required ) </td></tr>
<?php $_from = $this->_tpl_vars['tbldetails']['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['fields']):
?>
<?php if ($this->_tpl_vars['fields']['auto_increment'] != 1): ?>
<tr>
<td valign="top"><input type="text" name="<?php echo $this->_tpl_vars['fields']['name']; ?>
_label" id="<?php echo $this->_tpl_vars['fields']['name']; ?>
_label_id" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['fields']['name'])) ? $this->_run_mod_handler('replace', true, $_tmp, '_', ' ') : smarty_modifier_replace($_tmp, '_', ' ')); ?>
" class="captionbox" onblur="change_values('<?php echo $this->_tpl_vars['fields']['name']; ?>
');"><br><?php echo $this->_tpl_vars['fields']['Type']; ?>
, <?php echo $this->_tpl_vars['fields']['length']; ?>
, <?php $_from = $this->_tpl_vars['fields']['flags']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['flag']):
 echo $this->_tpl_vars['flag']; ?>
 <?php endforeach; endif; unset($_from); ?></td>
<!--<td valign="top"><input type="Checkbox" name="<?php echo $this->_tpl_vars['fields']['name']; ?>
_listing" checked></td>-->
<td valign="top"><input type="Checkbox" name="<?php echo $this->_tpl_vars['fields']['name']; ?>
_include" checked></td>
<td valign="top">
<select name="<?php echo $this->_tpl_vars['fields']['name']; ?>
_inputtype" id="<?php echo $this->_tpl_vars['fields']['name']; ?>
_id" class="selectbox" onchange="showextras('<?php echo $this->_tpl_vars['fields']['name']; ?>
_id');">
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
<div id="<?php echo $this->_tpl_vars['fields']['name']; ?>
_id_master">
<div id="<?php echo $this->_tpl_vars['fields']['name']; ?>
_id_text" style="display:none;">
Field size <input type="text" value="15" size="5" name="<?php echo $this->_tpl_vars['fields']['name']; ?>
_text_size">
</div>
<div id="<?php echo $this->_tpl_vars['fields']['name']; ?>
_id_password" style="display:none;">
Field  size <input type="text" value="15" size="5" name="<?php echo $this->_tpl_vars['fields']['name']; ?>
_password_size">
</div>
<div id="<?php echo $this->_tpl_vars['fields']['name']; ?>
_id_textarea" style="display:none;">
Rows&nbsp;<input type="text" name="<?php echo $this->_tpl_vars['fields']['name']; ?>
_id_rows" size="4"> &nbsp;
Columns&nbsp;<input type="text" name="<?php echo $this->_tpl_vars['fields']['name']; ?>
_id_columns" size="4">
</div>
<div id="<?php echo $this->_tpl_vars['fields']['name']; ?>
_id_check" style="display:none;">
<input type="radio" name="<?php echo $this->_tpl_vars['fields']['name']; ?>
_check_captionfrm" value="frmfield" size="5" checked onclick="change_option('<?php echo $this->_tpl_vars['fields']['name']; ?>
_check_op2','<?php echo $this->_tpl_vars['fields']['name']; ?>
_check_op1');">&nbsp;Field values <input type="radio" name="<?php echo $this->_tpl_vars['fields']['name']; ?>
_check_captionfrm" size="5" onclick="change_option('<?php echo $this->_tpl_vars['fields']['name']; ?>
_check_op1','<?php echo $this->_tpl_vars['fields']['name']; ?>
_check_op2');" value="specify">&nbsp;specify <br>
<span id="<?php echo $this->_tpl_vars['fields']['name']; ?>
_check_op1">
<?php if ($this->_tpl_vars['fields']['enumvals'] != ''): ?>
<br>
<?php $_from = $this->_tpl_vars['fields']['enumvals']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['enumval']):
?>
caption&nbsp;<input type="text" name="<?php echo $this->_tpl_vars['fields']['name']; ?>
_check_op1_caption[]" value="<?php echo $this->_tpl_vars['enumval']; ?>
" size="5">&nbsp;
value&nbsp;<input type="text" name="<?php echo $this->_tpl_vars['fields']['name']; ?>
_check_op1_value[]" value="<?php echo $this->_tpl_vars['enumval']; ?>
" size="5"><br>
<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>
</span>
<span id="<?php echo $this->_tpl_vars['fields']['name']; ?>
_check_op2" style="display:none"><br>
caption&nbsp;<input type="text" name="<?php echo $this->_tpl_vars['fields']['name']; ?>
_check_op2_caption[]" size="5"> &nbsp;
value&nbsp;<input type="text" name="<?php echo $this->_tpl_vars['fields']['name']; ?>
_check_op2_value[]" size="5">&nbsp;<a href="javascript:;" onclick="addElement('<?php echo $this->_tpl_vars['fields']['name']; ?>
_check_op2');">++</a> &nbsp;<a href="javascript:;" onclick="removeElement('<?php echo $this->_tpl_vars['fields']['name']; ?>
_check_op2');">--</a>
<input type="hidden" value="0" id="<?php echo $this->_tpl_vars['fields']['name']; ?>
_check_op2_val" /> 
</span>

</div>
<div id="<?php echo $this->_tpl_vars['fields']['name']; ?>
_id_radio" style="display:none;">
<input type="radio" name="<?php echo $this->_tpl_vars['fields']['name']; ?>
_radio_captionfrm" value="frmfield" size="5" checked onclick="change_option('<?php echo $this->_tpl_vars['fields']['name']; ?>
_radio_op2','<?php echo $this->_tpl_vars['fields']['name']; ?>
_radio_op1');">&nbsp;Field values <input type="radio" name="<?php echo $this->_tpl_vars['fields']['name']; ?>
_radio_captionfrm" size="5" onclick="change_option('<?php echo $this->_tpl_vars['fields']['name']; ?>
_radio_op1','<?php echo $this->_tpl_vars['fields']['name']; ?>
_radio_op2');" value="specify">&nbsp;specify <br>
<span id="<?php echo $this->_tpl_vars['fields']['name']; ?>
_radio_op1">
<?php if ($this->_tpl_vars['fields']['enumvals'] != ''): ?>
<br>
<?php $_from = $this->_tpl_vars['fields']['enumvals']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['enumval']):
?>
caption&nbsp;<input type="text" name="<?php echo $this->_tpl_vars['fields']['name']; ?>
_radio_op1_caption[]" value="<?php echo $this->_tpl_vars['enumval']; ?>
" size="5">&nbsp;
value&nbsp;<input type="text" name="<?php echo $this->_tpl_vars['fields']['name']; ?>
_radio_op1_value[]" value="<?php echo $this->_tpl_vars['enumval']; ?>
" size="5"><br>
<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>
</span>
<span id="<?php echo $this->_tpl_vars['fields']['name']; ?>
_radio_op2" style="display:none"><br>
caption&nbsp;<input type="text" name="<?php echo $this->_tpl_vars['fields']['name']; ?>
_radio_op2_caption[]" size="5"> &nbsp;
value&nbsp;<input type="text" name="<?php echo $this->_tpl_vars['fields']['name']; ?>
_radio_op2_value[]" size="5">&nbsp;<a href="javascript:;" onclick="addElement('<?php echo $this->_tpl_vars['fields']['name']; ?>
_radio_op2');">++</a> &nbsp;<a href="javascript:;" onclick="removeElement('<?php echo $this->_tpl_vars['fields']['name']; ?>
_radio_op2');">--</a>
<input type="hidden" value="0" id="<?php echo $this->_tpl_vars['fields']['name']; ?>
_radio_op2_val" /> 
</span>
<!--
caption&nbsp;<input type="text" name="<?php echo $this->_tpl_vars['fields']['name']; ?>
_radio_caption" size="5"> &nbsp;
value&nbsp;<input type="text" name="<?php echo $this->_tpl_vars['fields']['name']; ?>
_radio_value" size="5">
-->


</div>
<div id="<?php echo $this->_tpl_vars['fields']['name']; ?>
_id_list" style="display:none;">
<input type="radio" name="<?php echo $this->_tpl_vars['fields']['name']; ?>
_list_captionfrm" value="frmfield" size="5" checked onclick="change_option('<?php echo $this->_tpl_vars['fields']['name']; ?>
_list_op2','<?php echo $this->_tpl_vars['fields']['name']; ?>
_list_op1');">&nbsp;Field values <input type="radio" name="<?php echo $this->_tpl_vars['fields']['name']; ?>
_list_captionfrm" size="5" onclick="change_option('<?php echo $this->_tpl_vars['fields']['name']; ?>
_list_op1','<?php echo $this->_tpl_vars['fields']['name']; ?>
_list_op2');" value="specify">&nbsp;specify <br>
<span id="<?php echo $this->_tpl_vars['fields']['name']; ?>
_list_op1">
<?php if ($this->_tpl_vars['fields']['enumvals'] != ''): ?>
<br>
<?php $_from = $this->_tpl_vars['fields']['enumvals']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['enumval']):
?>
caption&nbsp;<input type="text" name="<?php echo $this->_tpl_vars['fields']['name']; ?>
_list_op1_caption[]" value="<?php echo $this->_tpl_vars['enumval']; ?>
" size="5">&nbsp;
value&nbsp;<input type="text" name="<?php echo $this->_tpl_vars['fields']['name']; ?>
_list_op1_value[]" value="<?php echo $this->_tpl_vars['enumval']; ?>
" size="5"><br>
<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>
</span>
<span id="<?php echo $this->_tpl_vars['fields']['name']; ?>
_list_op2" style="display:none"><br>
caption&nbsp;<input type="text" name="<?php echo $this->_tpl_vars['fields']['name']; ?>
_list_op2_caption[]" size="5"> &nbsp;
value&nbsp;<input type="text" name="<?php echo $this->_tpl_vars['fields']['name']; ?>
_list_op2_value[]" size="5">&nbsp;<a href="javascript:;" onclick="addElement('<?php echo $this->_tpl_vars['fields']['name']; ?>
_list_op2');">++</a> &nbsp;<a href="javascript:;" onclick="removeElement('<?php echo $this->_tpl_vars['fields']['name']; ?>
_list_op2');">--</a>
<input type="hidden" value="0" id="<?php echo $this->_tpl_vars['fields']['name']; ?>
_list_op2_val" /> 
</span>
</div>
<div id="<?php echo $this->_tpl_vars['fields']['name']; ?>
_id_multiple" style="display:none;">
size&nbsp;<input type="text" name="<?php echo $this->_tpl_vars['fields']['name']; ?>
_mlist_size" size="5"> 
<input type="radio" name="<?php echo $this->_tpl_vars['fields']['name']; ?>
_mlist_captionfrm" value="frmfield" size="5" checked onclick="change_option('<?php echo $this->_tpl_vars['fields']['name']; ?>
_mlist_op2','<?php echo $this->_tpl_vars['fields']['name']; ?>
_mlist_op1');">&nbsp;Field values <input type="radio" name="<?php echo $this->_tpl_vars['fields']['name']; ?>
_mlist_captionfrm" size="5" onclick="change_option('<?php echo $this->_tpl_vars['fields']['name']; ?>
_mlist_op1','<?php echo $this->_tpl_vars['fields']['name']; ?>
_mlist_op2');" value="specify">&nbsp;specify <br>
<span id="<?php echo $this->_tpl_vars['fields']['name']; ?>
_mlist_op1">
<?php if ($this->_tpl_vars['fields']['enumvals'] != ''): ?>
<br>
<?php $_from = $this->_tpl_vars['fields']['enumvals']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['enumval']):
?>
caption&nbsp;<input type="text" name="<?php echo $this->_tpl_vars['fields']['name']; ?>
_mlist_op1_caption[]" value="<?php echo $this->_tpl_vars['enumval']; ?>
" size="5">&nbsp;
value&nbsp;<input type="text" name="<?php echo $this->_tpl_vars['fields']['name']; ?>
_mlist_op1_value[]" value="<?php echo $this->_tpl_vars['enumval']; ?>
" size="5"><br>
<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>
</span>
<span id="<?php echo $this->_tpl_vars['fields']['name']; ?>
_mlist_op2" style="display:none"><br>
caption&nbsp;<input type="text" name="<?php echo $this->_tpl_vars['fields']['name']; ?>
_mlist_op2_caption[]" size="5"> &nbsp;
value&nbsp;<input type="text" name="<?php echo $this->_tpl_vars['fields']['name']; ?>
_mlist_op2_value[]" size="5">&nbsp;<a href="javascript:;" onclick="addElement('<?php echo $this->_tpl_vars['fields']['name']; ?>
_mlist_op2');">++</a> &nbsp;<a href="javascript:;" onclick="removeElement('<?php echo $this->_tpl_vars['fields']['name']; ?>
_mlist_op2');">--</a>
<input type="hidden" value="0" id="<?php echo $this->_tpl_vars['fields']['name']; ?>
_mlist_op2_val" /> 
</span>
</div>
<div id="<?php echo $this->_tpl_vars['fields']['name']; ?>
_id_file" style="display:none;">
file
</div>
<div id="<?php echo $this->_tpl_vars['fields']['name']; ?>
_id_date" style="display:none;">
date
</div>
<div id="<?php echo $this->_tpl_vars['fields']['name']; ?>
_id_htmleditor" style="display:none;">
htmleditor
</div>
<div id="<?php echo $this->_tpl_vars['fields']['name']; ?>
_id_hidden" style="display:none;">
hidden
</div>
<div id="<?php echo $this->_tpl_vars['fields']['name']; ?>
_id_none" style="display:none;">
none
</div>
</div>
</td></tr>
<?php else: ?>
<tr><td valign="top"><?php echo $this->_tpl_vars['fields']['name']; ?>
</td><td colspan="3">Auto increment</td></tr>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
<tr><td valign="top">Key field</td><td colspan="3">
<?php echo $this->_tpl_vars['tbldetails']['primary']; ?>

</td></tr>
<tr><td valign="top">HTML Template</td><td colspan="3"><select name="htmltemplate" class="selectbox">
<!--<option value="">-- Select HTML Template --</option>-->
<option value="S">Seperate</option>
<option value="HF">Header and Footer</option>
<option value="HFL">Header,Footer and Left</option>
<option value="HFLR">Header,Footer,Left and Right</option>
</select></td></tr>
<tr><td valign="top">Form name</td><td colspan="3"><input type="text" name="form_name" value="<?php echo $this->_tpl_vars['tbldetails']['table']; ?>
frm"></td></tr>
<tr><td valign="top">Form method</td><td colspan="3"><input type="radio" name="form_method" value="POST" checked> &nbsp;POST
<input type="radio" name="form_method" value="GET"> &nbsp;GET
</td></tr>

<tr><td colspan="2" align="left"><input type="button" name="htmlprevious" value="<< Previous" class="button" onclick="switchmenu('sql')"></td>
<td colspan="2" align="right"><input type="button" name="htmlnext" value="Next >>" class="button" onclick="switchmenu('js')"></td></tr>
</TABLE>
</TD></TR>
</TABLE>
