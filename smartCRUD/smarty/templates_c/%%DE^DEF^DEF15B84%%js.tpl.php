<?php /* Smarty version 2.6.13, created on 2008-06-24 05:42:31
         compiled from js.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', 'js.tpl', 11, false),)), $this); ?>
<TABLE CELLPADDING="1" CELLSPACING="1" BORDER="0" ALIGN="left" width="100%">
<TR><TD align="right">
<TABLE CELLPADDING="2" CELLSPACING="2" BORDER="0" width="100%" align="left">
<tr><td align="left"><b>Client Validation</b></td><td colspan="3" align="left"><input type="radio" name="jsvalidation" value="yes" class="radiobox" checked>&nbsp;Required
<input type="radio" name="jsvalidation" value="no" class="radiobox">&nbsp;Not Required</td></tr>

<tr><td width="30%" align="left"><b>FIELD</b> (Client side alert message) </td><td width="5%" align="left"><b>REQUIRED</b></td><td width="5%" align="left"><b>OTHER VALIDATION</b></td><td align="left"></td></tr>
<?php $_from = $this->_tpl_vars['tbldetails']['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['fields']):
?>
<?php if ($this->_tpl_vars['fields']['auto_increment'] != 1): ?>
<tr>
<td align="left"><b><input type="text" name="<?php echo $this->_tpl_vars['fields']['name']; ?>
_jsalert" id="<?php echo $this->_tpl_vars['fields']['name']; ?>
_jsalert_id" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['fields']['name'])) ? $this->_run_mod_handler('replace', true, $_tmp, '_', ' ') : smarty_modifier_replace($_tmp, '_', ' ')); ?>
 field left blank!" class="captionbox" size="30"></b><br><?php echo $this->_tpl_vars['fields']['Type']; ?>
, <?php echo $this->_tpl_vars['fields']['length']; ?>
, <?php $_from = $this->_tpl_vars['fields']['flags']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['flag']):
 echo $this->_tpl_vars['flag']; ?>
 <?php endforeach; endif; unset($_from); ?></td>
<td align="left"><input type="Checkbox" name="<?php echo $this->_tpl_vars['fields']['name']; ?>
_required" checked></td>
<td align="left">
<select name="<?php echo $this->_tpl_vars['fields']['name']; ?>
_other_validation" class="selectbox">
<option value="">-- Select Validation Type --</option>
<option value="fl">Field Length</option>
<option value="ac">Accepted Characters</option>
<option value="email">Email</option>
<option value="compare">Compare Fields</option>
<option value="none">None</option>
</select>
<!--
<input type="checkbox" name="<?php echo $this->_tpl_vars['fields']['name']; ?>
_other_validation[]" value="fl">&nbsp;Field length<br>
<input type="checkbox" name="<?php echo $this->_tpl_vars['fields']['name']; ?>
_other_validation[]" value="ac">&nbsp;Accepted characters<br>
<input type="checkbox" name="<?php echo $this->_tpl_vars['fields']['name']; ?>
_other_validation[]" value="email">&nbsp;Email validation<br>
<input type="checkbox" name="<?php echo $this->_tpl_vars['fields']['name']; ?>
_other_validation[]" value="compare">&nbsp;Compare fields<br>
-->
</td>
<td align="left">
</td>
</tr>
<?php else: ?>
<tr><td align="left" colspan="4"><?php echo $this->_tpl_vars['fields']['name']; ?>
 ( Auto Increment )</td></tr>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
<tr><td align="left"><b>Server Validation</b></td><td colspan="3" align="left"><input type="radio" name="servervalidation" value="yes" class="radiobox" >&nbsp;Required
<input type="radio" name="servervalidation" value="no" class="radiobox"checked>&nbsp;Not Required</td></tr>
<tr>
<td colspan="2" align="left"><input type="button" name="jsprevious" value="<< Previous" class="button" onclick="switchmenu('html')"></td>
<td colspan="2" align="right"><input type="button" name="jsnext" value="Next >>" class="button" onclick="switchmenu('php')"></td>
</tr>
</TABLE>
</TD></TR>
</TABLE>