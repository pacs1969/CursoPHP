{include file="header.tpl"}
<TABLE CELLPADDING="1" CELLSPACING="1" BORDER="0" ALIGN="center" WIDTH="900">
<TR><TD valign="top" >

<TABLE CELLPADDING="1"  CELLSPACING="1" BORDER="0" WIDTH="100%" valign="top" >
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<TR><TD valign="top" class="tblbox">

<a href="{$site_url}projects.php">My Projects</a>&nbsp;|&nbsp;
<a href="{$site_url}forms.php">Form builder</a>&nbsp;|&nbsp;
<a href="http://sourceforge.net/projects/smartcrud/" >Download</a>&nbsp;|&nbsp;
<a href="http://www.smartcrud.com/docs/" target="_blank" >Documentation</a>&nbsp;|&nbsp;
<a href="http://creativecommons.org/licenses/by-sa/3.0/us/" >License</a>&nbsp;|&nbsp;

<!--
<a href="{$site_url}#" disabled>Plugins</a>&nbsp;|&nbsp;
<a href="{$site_url}#" disabled>Modules</a>&nbsp;|&nbsp;
<a href="{$site_url}#" disabled>Classes</a>&nbsp;|&nbsp;
<a href="{$site_url}#" disabled>Tools</a>&nbsp;|&nbsp;
-->
<a href="{$site_url}#" readonly>settings</a>

<div id="downmenu">
<br>
{foreach from=$menu key=key item=val}
<a href="javascript:switchmenu('{$val[1]}')">{$val[0]}</a>&nbsp;|&nbsp;
{/foreach}

</div>



</TD><TD class="tblbox" valign="right"><!-- AddThis Button BEGIN -->
<!--
<script type="text/javascript">addthis_pub  = 'muruganvgl';URL='www.smartcrud.com';</script>
<a href="http://www.addthis.com/bookmark.php" onmouseover="return addthis_open(this, '', 'www.smartcrud.com', '[TITLE]')" onmouseout="addthis_close()" onclick="return addthis_sendto()"><img src="http://s9.addthis.com/button1-share.gif" width="125" height="16" border="0" alt="" /></a><script type="text/javascript" src="{$js_url}addthis_widget.js"></script>
-->
<!-- AddThis Button END -->
 <br> <br>
<input type="hidden" name="cmd" value="_s-xclick">
<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
">
</TD></TR>
</form>
<TR><TD valign="top" colspan="2" class="tblbox">{$contentpanel}</TD></TR>


</TABLE>
{include file="footer.tpl"}
</TD>
<TD valign="top" WIDTH="120" class="tblbox">{$rightpanel}</TD>

</TR>
</TABLE>
</td></tr>
</table>
</HTML>