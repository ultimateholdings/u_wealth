<?php echo form_open('member/ajax_note_update') ?>
   
  
 
        <input type="hidden" name="id" value="<?=$res->id;?>" >                      
        <input type="hidden" name="userid" value="<?=$res->userid;?>" >                            
      <label>Note</label>
              <textarea id="note" name="note" class="form-control" value="<?=$res->note;?>" rows="2"><?=$res->note;?></textarea>
               
    
                <div style="margin-top: 10px;">
                    <button type="submit" class="btn btn-success">Save</button>
                   <button type="button" class="btn btn-primary pull-right" data-dismiss="modal">Close</button>  
                </div>
                                  <?php echo form_close() ?>