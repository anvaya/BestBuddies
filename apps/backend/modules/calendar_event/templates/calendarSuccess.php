<script type="text/javascript">

        $(document).ready(function() {
           var view="month";

           var info_dialog = $('#event_details').dialog
                    (
                        {
                            autoOpen: false,
                            title: 'Event Details',
                            width: '400',
                            height:'300',
                            hide: 'clip',
                            buttons:
                                {
                                    'OK': function() { $(this).dialog('close'); }
                                }
                        }
                    );

            var DATA_FEED_URL = "<?php url_for("calendar_event/calendar") ?>";
            var op = {
                view: view,
                theme:3,
                showday: new Date(),
                EditCmdhandler:Edit,
                DeleteCmdhandler:Delete,
                ViewCmdhandler:View,
                onWeekOrMonthToDay:wtd,
                onBeforeRequestData: cal_beforerequest,
                onAfterRequestData: cal_afterrequest,
                onRequestDataError: cal_onerror,
                autoload:true,
                url: DATA_FEED_URL + "?method=list",
                quickAddUrl: "<?php echo url_for("calendar_event/quickadd") ?>",
                quickUpdateUrl: DATA_FEED_URL + "?method=update",
                quickDeleteUrl: "<?php echo url_for("calendar_event/quickdelete") ?>",
                readonly: false
            };
            var $dv = $("#calhead");
            var _MH = document.documentElement.clientHeight;
            var dvH = $dv.height() + 2;
            op.height = _MH - dvH;
            op.eventItems =[];

            var p = $("#gridcontainer").bcalendar(op).BcalGetOp();
            if (p && p.datestrshow) {
                $("#txtdatetimeshow").text(p.datestrshow);
            }
            $("#caltoolbar").noSelect();

            $("#hdtxtshow").datepicker({ picker: "#txtdatetimeshow", showtarget: $("#txtdatetimeshow"),
            onReturn:function(r){
                            var p = $("#gridcontainer").gotoDate(r).BcalGetOp();
                            if (p && p.datestrshow) {
                                $("#txtdatetimeshow").text(p.datestrshow);
                            }
                     }
            });

            function cal_beforerequest(type)
            {
                var t="Loading data...";
                switch(type)
                {
                    case 1:
                        t="Loading data...";
                        break;
                    case 2:
                    case 3:
                    case 4:
                        t="The request is being processed ...";
                        break;
                }
                $("#errorpannel").hide();
                $("#loadingpannel").html(t).show();
            }
            function cal_afterrequest(type)
            {
                switch(type)
                {
                    case 1:
                        $("#loadingpannel").hide();
                        break;
                    case 2:
                    case 3:
                    case 4:
                        $("#loadingpannel").html("Success!");
                        window.setTimeout(function(){ $("#loadingpannel").hide();},2000);
                    break;
                }

            }
            function cal_onerror(type,data)
            {
                $("#errorpannel").show();
            }
            function Edit(data)
            {
                if(data[0] == '0')
                  return false;
                var eurl = "<?php echo url_for("@calendar_event_edit?id=1") ?>";
                eurl = eurl.replace('/1/edit',"");
                eurl = eurl+"/{0}/edit?start={2}&end={3}&isallday={4}&title={1}&calendar=1";
               //var eurl="edit.php?id={0}&start={2}&end={3}&isallday={4}&title={1}";
                if(data)
                {
                    var url = StrFormat(eurl,data);
                    OpenModelWindow(url,{ width: 600, height: 400, caption:"Manage  The Calendar",onclose:function(){
                       $("#gridcontainer").reload();
                    }});
                }
            }
            function View(data)
            {
                var info_div = $('#event_details');

                $('#event_from_date', info_div).html(data[2].toLocaleDateString() + " "+ data[2].toLocaleTimeString());
                $('#event_to_date', info_div).html(data[3].toLocaleDateString() + " "+ data[3].toLocaleTimeString());
                $('#event_title', info_div).html(data[1]);
                $('#event_location', info_div).html(data[9]);
                $('#event_desc', info_div).html(data[10]);
                $('#event_details').dialog('open');

                /*                var str = "";
                $.each(data, function(i, item){
                    str += "[" + i + "]: " + item + "\n";
                });
                alert(str);               */
            }
            function Delete(data,callback)
            {

                $.alerts.okButton="Ok";
                $.alerts.cancelButton="Cancel";
                hiConfirm("Are You Sure to Delete this Event", 'Confirm',function(r){ r && callback(0);});
            }
            function wtd(p)
            {
               if (p && p.datestrshow) {
                    $("#txtdatetimeshow").text(p.datestrshow);
                }
                $("#caltoolbar div.fcurrent").each(function() {
                    $(this).removeClass("fcurrent");
                })
                $("#showdaybtn").addClass("fcurrent");
            }
            //to show day view
            $("#showdaybtn").click(function(e) {
                //document.location.href="#day";
                $("#caltoolbar div.fcurrent").each(function() {
                    $(this).removeClass("fcurrent");
                })
                $(this).addClass("fcurrent");
                var p = $("#gridcontainer").swtichView("day").BcalGetOp();
                if (p && p.datestrshow) {
                    $("#txtdatetimeshow").text(p.datestrshow);
                }
            });
            //to show week view
            $("#showweekbtn").click(function(e) {
                //document.location.href="#week";
                $("#caltoolbar div.fcurrent").each(function() {
                    $(this).removeClass("fcurrent");
                })
                $(this).addClass("fcurrent");
                var p = $("#gridcontainer").swtichView("week").BcalGetOp();
                if (p && p.datestrshow) {
                    $("#txtdatetimeshow").text(p.datestrshow);
                }

            });
            //to show month view
            $("#showmonthbtn").click(function(e) {
                //document.location.href="#month";
                $("#caltoolbar div.fcurrent").each(function() {
                    $(this).removeClass("fcurrent");
                })
                $(this).addClass("fcurrent");
                var p = $("#gridcontainer").swtichView("month").BcalGetOp();
                if (p && p.datestrshow) {
                    $("#txtdatetimeshow").text(p.datestrshow);
                }
            });

            $("#showreflashbtn").click(function(e){
                $("#gridcontainer").reload();
            });

            //Add a new event
            $("#faddbtn").click(function(e) {
                var url ="edit.php";
                OpenModelWindow(url,{ width: 500, height: 400, caption: "Create New Calendar"});
            });
            //go to today
            $("#showtodaybtn").click(function(e) {
                var p = $("#gridcontainer").gotoDate().BcalGetOp();
                if (p && p.datestrshow) {
                    $("#txtdatetimeshow").text(p.datestrshow);
                }


            });
            //previous date range
            $("#sfprevbtn").click(function(e) {
                var p = $("#gridcontainer").previousRange().BcalGetOp();
                if (p && p.datestrshow) {
                    $("#txtdatetimeshow").text(p.datestrshow);
                }

            });
            //next date range
            $("#sfnextbtn").click(function(e) {
                var p = $("#gridcontainer").nextRange().BcalGetOp();
                if (p && p.datestrshow) {
                    $("#txtdatetimeshow").text(p.datestrshow);
                }
            });

        });

</script>
<div>

      <div id="calhead" style="padding-left:1px;padding-right:1px;">
            <div class="cHead"><div class="ftitle">Event Calendar</div>
            <div id="loadingpannel" class="ptogtitle loadicon" style="display: none;">Loading data...</div>
             <div id="errorpannel" class="ptogtitle loaderror" style="display: none;">Sorry, could not load your data, please try again later</div>
            </div>

            <div id="caltoolbar" class="ctoolbar">
              <div id="faddbtn" class="fbutton" style="display: none;">
                <div><span title='Click to Create New Event' class="addcal">

                New Event
                </span></div>
            </div>
            <div class="btnseparator"></div>
             <div id="showtodaybtn" class="fbutton">
                <div><span title='Click to back to today ' class="showtoday">
                Today</span></div>
            </div>
              <div class="btnseparator"></div>

            <div id="showdaybtn" class="fbutton">
                <div><span title='Day' class="showdayview">Day</span></div>
            </div>
              <div  id="showweekbtn" class="fbutton">
                <div><span title='Week' class="showweekview">Week</span></div>
            </div>
              <div  id="showmonthbtn" class="fbutton fcurrent">
                <div><span title='Month' class="showmonthview">Month</span></div>

            </div>
            <div class="btnseparator"></div>
              <div  id="showreflashbtn" class="fbutton">
                <div><span title='Refresh view' class="showdayflash">Refresh</span></div>
                </div>
             <div class="btnseparator"></div>
            <div id="sfprevbtn" title="Prev"  class="fbutton">
              <span class="fprev"></span>

            </div>
            <div id="sfnextbtn" title="Next" class="fbutton">
                <span class="fnext"></span>
            </div>
            <div class="fshowdatep fbutton">
                    <div>
                        <input type="hidden" name="txtshow" id="hdtxtshow" />
                        <span id="txtdatetimeshow">Loading</span>

                    </div>
            </div>

            <div class="clear"></div>
            </div>
      </div>
      <div style="padding:1px;">

        <div class="t1 chromeColor">
            &nbsp;</div>
        <div class="t2 chromeColor">
            &nbsp;</div>
        <div id="dvCalMain" class="calmain printborder">
            <div id="gridcontainer" style="overflow-y: visible;">
            </div>
        </div>
        <div class="t2 chromeColor">

            &nbsp;</div>
        <div class="t1 chromeColor">
            &nbsp;
        </div>
        </div>

  </div>
<div id="event_details" style="display: none; background-color: white;">
    <table>
        <tr>
            <th>From Date:</th><td id="event_from_date"></td></tr>
            <tr><th>To Date:</th><td id="event_to_date"></td></tr>
            <tr><th>Event Title:</th><td id="event_title"></td></tr>
            <tr><th>Location:</th><td id="event_location"></td></tr>
            <tr><th>Description:</th><td id="event_desc"></td></tr>
        </tr>
    </table>
</div>