<?php /* Smarty version 2.6.13, created on 2008-06-24 05:42:30
         compiled from sql.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'sql.tpl', 22, false),)), $this); ?>
<?php echo '
<script>
function cannot_change(){

}
</script>
'; ?>

<TABLE CELLPADDING="4" CELLSPACING="2" BORDER="0" ALIGN="center" width="100%">
<?php if ($this->_tpl_vars['menu'][0][2] == 'block'): ?>
<form name="sqlform" action="<?php echo $this->_tpl_vars['site_url']; ?>
forms.php" method="post">
<?php endif; ?>

<TR><TD align="left" align="left" width="25%">
<input type="radio" name="sql" value="fromtbl" checked class="radiobox">&nbsp;Get fields from table
&nbsp;
</TD><TD width="25%">
<?php if ($this->_tpl_vars['action_table'] != ''): ?>
<input type="hidden" value="<?php echo $this->_tpl_vars['action_table']; ?>
" name="dbtblname">
<?php endif; ?>
<select selected=$table name="dbtblname"  class="selectbox" 
<?php if ($this->_tpl_vars['action_table'] != ''): ?>disabled<?php endif; ?> onchange="submitsql(this.form);">
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tables'],'selected' => $this->_tpl_vars['action_table']), $this);?>

</select>
<br />
</TD><TD></TD></TR>
<TR><TD align="left">
<input type="radio" name="sql" value="createtbl" class="radiobox" <?php if ($this->_tpl_vars['action_table'] != ''): ?>disabled<?php endif; ?>>&nbsp;Create new table 
</TD><TD>
&nbsp;<input type="text" name="newtblname" value="New table name" <?php if ($this->_tpl_vars['action_table'] != ''): ?>readonly<?php endif; ?> class="inputbox">
</TD><TD></TD></TR>
<TR><TD colspan=3 align="right">
<br>
<input type="hidden" name="actionflag" value="<?php echo $this->_tpl_vars['setaction']; ?>
">
<input type="button" name="Next" value="Next >>" class="button" onclick="switchmenu('html')">
</TD></TR>
<?php if ($this->_tpl_vars['menu'][0][2] == 'block'): ?>
</form>
<?php endif; ?>
</TABLE>