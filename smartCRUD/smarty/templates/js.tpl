<TABLE CELLPADDING="1" CELLSPACING="1" BORDER="0" ALIGN="left" width="100%">
<TR><TD align="right">
<TABLE CELLPADDING="2" CELLSPACING="2" BORDER="0" width="100%" align="left">
<tr><td align="left"><b>Client Validation</b></td><td colspan="3" align="left"><input type="radio" name="jsvalidation" value="yes" class="radiobox" checked>&nbsp;Required
<input type="radio" name="jsvalidation" value="no" class="radiobox">&nbsp;Not Required</td></tr>

<tr><td width="30%" align="left"><b>FIELD</b> (Client side alert message) </td><td width="5%" align="left"><b>REQUIRED</b></td><td width="5%" align="left"><b>OTHER VALIDATION</b></td><td align="left"></td></tr>
{foreach from=$tbldetails.fields item=fields}
{if $fields.auto_increment neq 1}
<tr>
<td align="left"><b><input type="text" name="{$fields.name}_jsalert" id="{$fields.name}_jsalert_id" value="{$fields.name|replace:"_":" "} field left blank!" class="captionbox" size="30"></b><br>{$fields.Type}, {$fields.length}, {foreach from=$fields.flags item=flag}{$flag} {/foreach}</td>
<td align="left"><input type="Checkbox" name="{$fields.name}_required" checked></td>
<td align="left">
<select name="{$fields.name}_other_validation" class="selectbox">
<option value="">-- Select Validation Type --</option>
<option value="fl">Field Length</option>
<option value="ac">Accepted Characters</option>
<option value="email">Email</option>
<option value="compare">Compare Fields</option>
<option value="none">None</option>
</select>
<!--
<input type="checkbox" name="{$fields.name}_other_validation[]" value="fl">&nbsp;Field length<br>
<input type="checkbox" name="{$fields.name}_other_validation[]" value="ac">&nbsp;Accepted characters<br>
<input type="checkbox" name="{$fields.name}_other_validation[]" value="email">&nbsp;Email validation<br>
<input type="checkbox" name="{$fields.name}_other_validation[]" value="compare">&nbsp;Compare fields<br>
-->
</td>
<td align="left">
</td>
</tr>
{else}
<tr><td align="left" colspan="4">{$fields.name} ( Auto Increment )</td></tr>
{/if}
{/foreach}
<tr><td align="left"><b>Server Validation</b></td><td colspan="3" align="left"><input type="radio" name="servervalidation" value="yes" class="radiobox" >&nbsp;Required
<input type="radio" name="servervalidation" value="no" class="radiobox"checked>&nbsp;Not Required</td></tr>
<tr>
<td colspan="2" align="left"><input type="button" name="jsprevious" value="<< Previous" class="button" onclick="switchmenu('html')"></td>
<td colspan="2" align="right"><input type="button" name="jsnext" value="Next >>" class="button" onclick="switchmenu('php')"></td>
</tr>
</TABLE>
</TD></TR>
</TABLE>
