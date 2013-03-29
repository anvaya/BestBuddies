<?php use_helper('Url','JavascriptBase');?>
<div class="sf_admin_form_row">
    <div style="padding-left: 5px; padding-top: 5px; padding-bottom: 5px;">      
      
          <ul class="sf_admin_actions" style="margin: 2px; display: inline-block;">
              <li class="sf_admin_action_new">
                <?php echo link_to_function("Add Question","search_question_bank('".url_for("@qb_pick_list")."')") ;?>            
              </li>              
          </ul>
          <span id="lblItemsError" class="ui-corner-all ui-state-error"></span>        
      
    </div>

    <table id="question_items">
        <tfoot>
            <tr>
                <td colspan="7">&nbsp;</td>
            </tr>
        </tfoot>
        <thead>
            <tr>
                <th scope="col">Question</th>                
                <th scope="col">Mandatory</th>            
                <th scope="col">Page No.</th>            
                <th scope="col">Question No.</th>
                <th scope="col">Disabled</th>                        
                <th scope="col">Remove</th>
            </tr>
        </thead>
        <tbody>
             <?php foreach($form["questions"] as $key=>$subform):?>            
                 <?php include_partial("survey/question",array("key"=>$key, "item"=>$subform));?>
            <?php endforeach;?>   
        </tbody>        
    </table>
</div>

<script type="text/javascript">
    
    var search_asset_id = 0;
    var item_count = <?php echo count($form['questions']); ?>;
    
    $(document).ready
    (
        function()
        {
           $('#btn_addRow').click(function()
           {
               btnAdd_clicked(this);
           });
           
           $("#txtCode").keypress(function(event)
            {
              if(event.keyCode == 13)
              {
                $("#btn_addRow").click();
                event.stopPropagation();
                event.cancelBubble=true;
                return false;
              }
            });
           
        }
    );   
       
     function remove_item(key)
    {
        if(confirm("Remove this Asset?"))
        {
            $("#survey_questions_"+key+"_remove").val(0);
            $("#items_"+key).css("display","none"); 
        }
    }
    
    function search_question_bank(strUrl)
    {
        search_asset_id = 0;
        x = parseInt((screen.availWidth - 700)/2);
        y = parseInt((screen.availHeight - 600)/2);
        var win = window.open(strUrl, 'Search', 'width= 700, height= 600, scrollbars=yes, left=' + x +", top"+y);
        win.focus();
    }    
    
    function picklist_callback(ids)
    {
        var id   =  $('#survey_id').val();
        var rows = ids;//jQuery.parseJSON(ids);
        var i= 0;
       
        if(id.length==0) id=0;
        $('#lblItemsError').css('display','none');
        
        for(i=0; i<rows.length; i++)
        {            
            var url = '<?php echo url_for("@survey_question_row?id=-2&num=-1&question_id=-3");?>';
       
            url = url.replace("-1", item_count);       
            url = url.replace("-2", id); 
            url = url.replace("-3", rows[i]);
            
            $.ajax({
                url: url ,
                processData: false,                
                success: function(data, textSuccess) { addrow_success(data, textSuccess);},
                error: function(data, textStatus, errorThrown) 
                {
                    $('#lblItemsError').text('Error:'+data.statusText); 
                    $('#lblItemsError').css('display','inline-block');                    
                },
                async: false
              });
        }
    }       
    
    function addrow_success(data, textSuccess)
    {
        var last_page = 1;
        var last_qno  = 0;
        
        if(item_count>0)
        {
          last_page = $('#survey_questions_'+(item_count-1)+'_page_id').val();
          last_qno  = $('#survey_questions_'+(item_count-1)+'_display_order').val();
        }
        
        if(last_page.length==0) last_page =1;
        last_qno++;
        
        item_count++;                      
        
        $('tbody', $('#question_items')).append(data);        
        
        $('#survey_questions_'+(item_count-1)+'_page_id').val(last_page);
        $('#survey_questions_'+(item_count-1)+'_display_order').val(last_qno);        
        
    }
</script>    