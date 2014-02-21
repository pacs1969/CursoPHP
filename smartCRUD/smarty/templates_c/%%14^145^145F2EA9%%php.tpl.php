<?php /* Smarty version 2.6.13, created on 2008-07-20 22:48:58
         compiled from php.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', 'php.tpl', 46, false),)), $this); ?>
<?php echo '
<script>
function showlist(){
if(document.getElementById(\'listcheck\').checked==true){
document.getElementById(\'listtbl\').style.display=\'block\';
}else{
document.getElementById(\'listtbl\').style.display=\'none\';
}
}
</script>
'; ?>


<TABLE CELLPADDING="1" CELLSPACING="1" BORDER="0" ALIGN="center" width="100%">
<TR><TD align="right">
<TABLE CELLPADDING="2" CELLSPACING="4" BORDER="0" width="100%">
<tr><td align="left">PHP Version </td><td align="left">
<input type="radio" name="phpversion_type" value="global" class="radiobox" checked>&nbsp;Use global&nbsp; ( or )
<input type="radio" name="phpversion_type" value="local" class="radiobox">&nbsp;Specify here&nbsp;
<select name="phpversion" class="selectbox">
<option value="">-- Select Version --</option>
<!-- <option value="php4">php4</option>-->
<option value="php5">php5</option>
</select>
</td></tr>
<tr><td align="left">File Name</td><td align="left"><input type="text" name="filename" readonly value="<?php echo $this->_tpl_vars['tbldetails']['table']; ?>
_management<?php echo $this->_tpl_vars['filecount']; ?>
">.php</td></tr>
<tr><td align="left">Class Name</td><td align="left"><input type="text" name="classname" readonly value="<?php echo $this->_tpl_vars['tbldetails']['table']; ?>
_management<?php echo $this->_tpl_vars['filecount']; ?>
"></td></tr>
<tr><td align="left">Functions suffix</td><td align="left"><input type="text" name="funcsuffix" value="info"></td></tr>
<tr><td align="left">Actions required</td>
<td align="left">
<input type="Checkbox" name="funcadd" checked>&nbsp;Add&nbsp;
<input type="Checkbox" name="funcedit" checked>&nbsp;Edit&nbsp;
<input type="Checkbox" name="funcdelete" checked>&nbsp;Delete&nbsp;
<!-- onclick="showlist();" -->
<input type="Checkbox" name="funclist" id="listcheck" onclick="showlist();" checked>&nbsp;List&nbsp;
<input type="Checkbox" name="funcsearch">&nbsp;Search&nbsp;
</td></tr>
<tr><td colspan="2" align="left">

<div id="listtbl" >
<TABLE CELLPADDING="2" CELLSPACING="4" BORDER="0" width="100%">
<tr><td width="30%" align="left"><b>FIELD</b> (List Heading) </td><td width="5%" align="left"><b>LIST</b></td><td width="5%" align="left"><b>SORTING</b></td><td align="left"></td></tr>
<tr><td align="left">No of records/List</td><td align="left"><input type="text" name="listsize" size=4 value="10"></td><td align="left" colspan="2"></td></tr>
<?php $_from = $this->_tpl_vars['tbldetails']['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['fields']):
?>
<?php if ($this->_tpl_vars['fields']['auto_increment'] != 1): ?>
<tr>
<td align="left"><b><input type="text" name="<?php echo $this->_tpl_vars['fields']['name']; ?>
_listhead" id="<?php echo $this->_tpl_vars['fields']['name']; ?>
_listhead_id" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['fields']['name'])) ? $this->_run_mod_handler('replace', true, $_tmp, '_', ' ') : smarty_modifier_replace($_tmp, '_', ' ')); ?>
" class="captionbox" size="20"></b><br><?php echo $this->_tpl_vars['fields']['Type']; ?>
, <?php echo $this->_tpl_vars['fields']['length']; ?>
, <?php $_from = $this->_tpl_vars['fields']['flags']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['flag']):
 echo $this->_tpl_vars['flag']; ?>
 <?php endforeach; endif; unset($_from); ?></td>
<td align="left"><input type="Checkbox" name="<?php echo $this->_tpl_vars['fields']['name']; ?>
_list" checked></td>
<td align="left"><input type="Checkbox" name="<?php echo $this->_tpl_vars['fields']['name']; ?>
_sort" checked></td>
<td align="left">
</td>
</tr>
<?php else: ?>
<tr><td align="left" colspan="4"><?php echo $this->_tpl_vars['fields']['name']; ?>
 ( Auto Increment )</td></tr>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
</table>

</td></tr>
<tr><td align="left">
<input type="button" name="phpprevious" value="<< Previous" class="button" onclick="switchmenu('js')">
</td>
<td align="right">
<input type="button" name="phpnext" value="Next >>" class="button" onclick="switchmenu('build')">
</td></tr>
</TABLE>
</div>
</TD></TR>
</TABLE>