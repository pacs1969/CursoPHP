{literal}
<script>
function cannot_change(){

}
</script>
{/literal}
<TABLE CELLPADDING="4" CELLSPACING="2" BORDER="0" ALIGN="center" width="100%">
{if $menu[0][2] eq 'block'}
<form name="sqlform" action="{$site_url}forms.php" method="post">
{/if}

<TR><TD align="left" align="left" width="25%">
<input type="radio" name="sql" value="fromtbl" checked class="radiobox">&nbsp;Get fields from table
&nbsp;
</TD><TD width="25%">
{if $action_table neq ''}
<input type="hidden" value="{$action_table}" name="dbtblname">
{/if}
<select selected=$table name="dbtblname"  class="selectbox" 
{if $action_table neq ''}disabled{/if} onchange="submitsql(this.form);">
{html_options options=$tables selected=$action_table}
</select>
<br />
</TD><TD></TD></TR>
<TR><TD align="left">
<input type="radio" name="sql" value="createtbl" class="radiobox" {if $action_table neq ''}disabled{/if}>&nbsp;Create new table 
</TD><TD>
&nbsp;<input type="text" name="newtblname" value="New table name" {if $action_table neq ''}readonly{/if} class="inputbox">
</TD><TD></TD></TR>
<TR><TD colspan=3 align="right">
<br>
<input type="hidden" name="actionflag" value="{$setaction}">
<input type="button" name="Next" value="Next >>" class="button" onclick="switchmenu('html')">
</TD></TR>
{if $menu[0][2] eq 'block'}
</form>
{/if}
</TABLE>