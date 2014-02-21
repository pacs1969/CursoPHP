<TABLE CELLPADDING="1" CELLSPACING="1" BORDER="0" style="text-align:left;">
<TR>
  <TD colspan="2" align='left'><strong><u>Create a new project:</u></strong></TD>
</TR>

<tr>
  <td width="128">Title :    </td>
  <td align='left'><input name="NAME" type="text" id="NAME" value="{$projectinfo.NAME}" onblur="create_project(this.form,'{php}
echo DOC_ROOT;{/php}','{php}
echo SITE_URL;{/php}')" /></td>
</tr>
<tr>
  <td align='left'>Description:    </td>
  <td align='left'><textarea name="DESCRIPTION" id="DESCRIPTION">{$projectinfo.DESCRIPTION}</textarea></td>
</tr>
<tr>
  <td align='left'>PHP Version:</td>
  <td align='left'><select name="VERSION" id="VERSION">
<!-- <option value="PHP4">php4</option> -->
    <option value="PHP5">php5</option>
    </select></td>
</tr>
<tr>
  <td align='left'>OS</td>
  <td align='left'><select name="OS" id="OS">
    <option value="windows">Windows</option>
    <option value="linux">Linux</option>
    </select></td>
</tr>
<tr>
  <td align='left'>Document Root: </td>
  <td align='left'><input name="DOCROOT" type="text" id="DOCROOT" value="{$projectinfo.DOCROOT}"  readonly /></td>
</tr>
<tr>
  <td align='left'>Project URL: </td>
  <td align='left'><input name="SITEURL" type="text" id="SITEURL" value="{$projectinfo.SITEURL}" readonly /></td>
</tr>
<tr>
  <td colspan="2"><strong>Database Details </strong></td>
  </tr>
<tr>
  <td align='left'>DBMS</td>
  <td align='left'><select name="DBTYPE" id="DBTYPE" >
    <option value="Mysql">Mysql</option>
    </select></td>
</tr>
<tr>
  <td align='left'>Host</td>
  <td align='left'><input name="DBHOST" type="text" id="DBHOST" value="localhost" /></td>
</tr>
<tr>
  <td align='left'>Port </td>
  <td align='left'><input name="PORT" type="text" id="PORT" value="3306" /></td>
</tr>
<tr>
  <td align='left'>UserName </td>
  <td align='left'><input name="DBUSERNAME" type="text" id="DBUSERNAME" value="{$projectinfo.DBUSERNAME}" /></td>
</tr>
<tr>
  <td align='left'>Password</td>
  <td align='left'><input name="DBPASSWORD" type="text" id="DBPASSWORD" value="{$projectinfo.DBPASSWORD}" /></td>
</tr>
<tr>
  <td align='left'>DB Name </td>
  <td align='left'><input name="DBNAME" type="text" id="DBNAME" value="{$projectinfo.DBNAME}" /></td>
</tr>
<tr>
  <td align='left'>DB Wrapper</td>
  <td align='left'><input name="DBWRAPPER" type="radio" id="DBWRAPPER" value="mydb" checked/>mydb - <a href="http://www.smartcrud.com/docs/default/mydb.html" target="_blank">Click Here</a> to View Document</td>
</tr>
<tr>
  <td colspan="2"><p><strong>Add Plugins</strong></p></td>
  </tr>
<tr>
  <td align='left'>HTML Editors </td>
  <td align='left'><input name="EDITOR" type="radio" value="fckeditor" checked/>FCKeditor
      </td>
</tr>
<tr>
  <td align='left'>&nbsp;</td>
  <td align='left'>&nbsp;</td>
</tr>
<tr>
  <td colspan="2" align="right"><input type="hidden" name="action_flag" value="" />
{$writeprotected}
<input type="Submit" name="Submit" value="Next >>" {$disabled} class="button" onclick="return project_submit('new_project');"></td>
  </tr>
</TABLE>
