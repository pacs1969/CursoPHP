<link href="./calendar/js/zpcal.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" media="all" href="./calendar/js/bluexp.css" title="Calendar Theme - bluexp.css" >
{literal}
<script type="text/javascript" src="./calendar/js/utils.js"></script>
<script type="text/javascript" src="./calendar/js/calendar.js"></script>
<script type="text/javascript" src="./calendar/js/calendar-en.js"></script>
<script type="text/javascript" src="./calendar/js/calendar-setup.js"></script>
<script type="text/javascript">
var cal = new Zapatec.Calendar.setup({
  inputField     :    "date_added",     // id of the input field
  singleClick    :     true,     // require two clicks to submit
  //ifFormat       :    '%Y-%m-%d %H:%M:%S',     //  of the input field
  ifFormat       :    '%Y-%m-%d %H:%M:%S',     //  of the input field
  showsTime      :     true,     // show time as well as date
  button         :    "date_added"  // trigger button
  });
</script>
{/literal}