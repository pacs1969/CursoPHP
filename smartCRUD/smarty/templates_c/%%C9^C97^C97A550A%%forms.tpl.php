<?php /* Smarty version 2.6.13, created on 2008-06-24 05:42:30
         compiled from forms.tpl */ ?>
<?php echo $this->_tpl_vars['menuvars']; ?>

<?php echo $this->_tpl_vars['jsscript']; ?>


<?php if ($this->_tpl_vars['menu'][0][2] != 'block'): ?>
<form name="myforms" action="<?php echo $this->_tpl_vars['site_url']; ?>
forms.php" method="post">
<?php endif; ?>
<TABLE CELLPADDING="0" CELLSPACING="0" BORDER="0" ALIGN="left" WIDTH="100%">
<script src="<?php echo $this->_tpl_vars['js_url']; ?>
build_validation.js" type="text/javascript"></script>
<TR VALIGN="TOP"><TD><BR>

<div id="masterdiv">
<div id="sql" class="submenu" style="display:<?php echo $this->_tpl_vars['menu'][0][2]; ?>
;"> 
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "sql.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
<div id="html" style="display:<?php echo $this->_tpl_vars['menu'][1][2]; ?>
;" class="submenu"> 
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "html.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
<div id="js" style="display:<?php echo $this->_tpl_vars['menu'][2][2]; ?>
;" class="submenu"> 
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "js.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
<div id="php" style="display:<?php echo $this->_tpl_vars['menu'][3][2]; ?>
;" class="submenu"> 
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "php.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
<div id="build" style="display:<?php echo $this->_tpl_vars['menu'][4][2]; ?>
;" class="submenu"> 
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "build.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
</div>
</TD></TR>
</TABLE>
<?php if ($this->_tpl_vars['menu'][0][2] != 'block'): ?>
</form>
<?php endif; ?>