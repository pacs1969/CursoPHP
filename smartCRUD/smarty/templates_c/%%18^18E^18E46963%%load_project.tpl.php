<?php /* Smarty version 2.6.13, created on 2009-04-04 07:29:20
         compiled from load_project.tpl */ ?>
<TABLE CELLPADDING="1" CELLSPACING="4" BORDER="0" ALIGN="center">
<TR>
  <TD align='left'>List of existing projects
</TD>
</TR>
<?php if ($this->_tpl_vars['projects']['0'] != ''): ?>
<?php $_from = $this->_tpl_vars['projects']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['projects']):
?>

<TR><TD align="left">
<input type="radio" name="projects" value="<?php echo $this->_tpl_vars['projects']['PROJECTID']; ?>
" class="inputbox">&nbsp;<?php echo $this->_tpl_vars['projects']['NAME']; ?>

</TD></TR>
<?php endforeach; endif; unset($_from); ?>
<?php else: ?>
<TR><TD align="left">
<b>NULL</b>
</TD></TR>
<?php endif; ?>

<TR><TD align="center">&nbsp;</TD></TR>
<TR><TD align="center">
<input type="button" name="Submit" value="Load >>" class="button" onclick="load_project('load_project')">&nbsp;
<input type="button" name="Submit" value="Edit >>" disabled class="button" onclick="project_submit('edit_project')">&nbsp;
<input type="button" name="Submit" value="Remove >>" disabled class="button" onclick="project_submit('remove_project')">&nbsp;
</TD></TR>
</TABLE>