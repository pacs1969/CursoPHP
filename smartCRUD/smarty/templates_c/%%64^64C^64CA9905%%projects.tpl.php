<?php /* Smarty version 2.6.13, created on 2008-06-24 03:56:34
         compiled from projects.tpl */ ?>
<?php echo $this->_tpl_vars['menuvars']; ?>

<TABLE CELLPADDING="1" CELLSPACING="1" BORDER="0" ALIGN="center" WIDTH="90%"><form name="project" method="post">

<TR VALIGN="TOP" ><TD ALIGN="CENTER" ><BR>
<div id="masterdiv">
<div id="listing" class="submenu" style="display:<?php echo $this->_tpl_vars['menu'][0][2]; ?>
;"> 
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "load_project.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
<div id="create" style="display:<?php echo $this->_tpl_vars['menu'][1][2]; ?>
;" class="submenu"> 
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "create_project.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
</div>
</TD></TR></form>
</TABLE>