<TABLE CELLPADDING="1" CELLSPACING="4" BORDER="0" ALIGN="center">
<TR>
  <TD align='left'>List of existing projects
</TD>
</TR>
{if $projects.0 neq ''}
{foreach from=$projects item=projects}

<TR><TD align="left">
<input type="radio" name="projects" value="{$projects.PROJECTID}" class="inputbox">&nbsp;{$projects.NAME}
</TD></TR>
{/foreach}
{else}
<TR><TD align="left">
<b>NULL</b>
</TD></TR>
{/if}

<TR><TD align="center">&nbsp;</TD></TR>
<TR><TD align="center">
<input type="button" name="Submit" value="Load >>" class="button" onclick="load_project('load_project')">&nbsp;
<input type="button" name="Submit" value="Edit >>" disabled class="button" onclick="project_submit('edit_project')">&nbsp;
<input type="button" name="Submit" value="Remove >>" disabled class="button" onclick="project_submit('remove_project')">&nbsp;
</TD></TR>
</TABLE>
