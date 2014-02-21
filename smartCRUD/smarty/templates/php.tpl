{literal}
<script>
function showlist(){
if(document.getElementById('listcheck').checked==true){
document.getElementById('listtbl').style.display='block';
}else{
document.getElementById('listtbl').style.display='none';
}
}
</script>
{/literal}

<TABLE CELLPADDING="1" CELLSPACING="1" BORDER="0" ALIGN="center" width="100%">
<TR><TD align="right">
<TABLE CELLPADDING="2" CELLSPACING="4" BORDER="0" width="100%">
<tr><td align="left">PHP Version </td><td align="left">
<input type="radio" name="phpversion_type" value="global" class="radiobox" checked>&nbsp;Use global&nbsp; ( or )
<input type="radio" name="phpversion_type" value="local" class="radiobox">&nbsp;Specify here&nbsp;
<select name="phpversion" class="selectbox">
<option value="">-- Select Version --</option>
<!-- <option value="php4">php4</option>-->
<option value="php5">php5</option>
</select>
</td></tr>
<tr><td align="left">File Name</td><td align="left"><input type="text" name="filename" readonly value="{$tbldetails.table}_management{$filecount}">.php</td></tr>
<tr><td align="left">Class Name</td><td align="left"><input type="text" name="classname" readonly value="{$tbldetails.table}_management{$filecount}"></td></tr>
<tr><td align="left">Functions suffix</td><td align="left"><input type="text" name="funcsuffix" value="info"></td></tr>
<tr><td align="left">Actions required</td>
<td align="left">
<input type="Checkbox" name="funcadd" checked>&nbsp;Add&nbsp;
<input type="Checkbox" name="funcedit" checked>&nbsp;Edit&nbsp;
<input type="Checkbox" name="funcdelete" checked>&nbsp;Delete&nbsp;
<!-- onclick="showlist();" -->
<input type="Checkbox" name="funclist" id="listcheck" onclick="showlist();" checked>&nbsp;List&nbsp;
<input type="Checkbox" name="funcsearch">&nbsp;Search&nbsp;
</td></tr>
<tr><td colspan="2" align="left">

<div id="listtbl" >
<TABLE CELLPADDING="2" CELLSPACING="4" BORDER="0" width="100%">
<tr><td width="30%" align="left"><b>FIELD</b> (List Heading) </td><td width="5%" align="left"><b>LIST</b></td><td width="5%" align="left"><b>SORTING</b></td><td align="left"></td></tr>
<tr><td align="left">No of records/List</td><td align="left"><input type="text" name="listsize" size=4 value="10"></td><td align="left" colspan="2"></td></tr>
{foreach from=$tbldetails.fields item=fields}
{if $fields.auto_increment neq 1}
<tr>
<td align="left"><b><input type="text" name="{$fields.name}_listhead" id="{$fields.name}_listhead_id" value="{$fields.name|replace:"_":" "}" class="captionbox" size="20"></b><br>{$fields.Type}, {$fields.length}, {foreach from=$fields.flags item=flag}{$flag} {/foreach}</td>
<td align="left"><input type="Checkbox" name="{$fields.name}_list" checked></td>
<td align="left"><input type="Checkbox" name="{$fields.name}_sort" checked></td>
<td align="left">
</td>
</tr>
{else}
<tr><td align="left" colspan="4">{$fields.name} ( Auto Increment )</td></tr>
{/if}
{/foreach}
</table>

</td></tr>
<tr><td align="left">
<input type="button" name="phpprevious" value="<< Previous" class="button" onclick="switchmenu('js')">
</td>
<td align="right">
<input type="button" name="phpnext" value="Next >>" class="button" onclick="switchmenu('build')">
</td></tr>
</TABLE>
</div>
</TD></TR>
</TABLE>