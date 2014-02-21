{$menuvars}
{$jsscript}

{if $menu[0][2] neq 'block'}
<form name="myforms" action="{$site_url}forms.php" method="post">
{/if}
<TABLE CELLPADDING="0" CELLSPACING="0" BORDER="0" ALIGN="left" WIDTH="100%">
<script src="{$js_url}build_validation.js" type="text/javascript"></script>
<TR VALIGN="TOP"><TD><BR>

<div id="masterdiv">
<div id="sql" class="submenu" style="display:{$menu[0][2]};"> 
{include file="sql.tpl"}
</div>
<div id="html" style="display:{$menu[1][2]};" class="submenu"> 
{include file="html.tpl"}
</div>
<div id="js" style="display:{$menu[2][2]};" class="submenu"> 
{include file="js.tpl"}
</div>
<div id="php" style="display:{$menu[3][2]};" class="submenu"> 
{include file="php.tpl"}
</div>
<div id="build" style="display:{$menu[4][2]};" class="submenu"> 
{include file="build.tpl"}
</div>
</div>
</TD></TR>
</TABLE>
{if $menu[0][2] neq 'block'}
</form>
{/if}