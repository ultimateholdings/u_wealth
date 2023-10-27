<form  method="POST" action="<?= base_url();?>admin/ajax_note_update" >
   
  
 
        <input type="hidden" name="id" value="<?=$res->id;?>" >                      
        <input type="hidden" name="userid" value="<?=$res->to_userid;?>" >                           
      <label>Note</label>
              <textarea id="note" name="note" class="form-control" value="<?=$res->note;?>" rows="2"><?=$res->note;?></textarea>
               
    
                <div style="margin-top: 10px;">
                    <button type="submit" class="btn btn-success">Save</button>
                   <button type="button" class="btn btn-primary pull-right" data-dismiss="modal">Close</button>  
                </div>
                                   </form>
<!-- <script type="text/javascript" src="<?php echo base_url('axxets/base/js/jquery-3.3.1.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('axxets/base/js/popper.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('axxets/base/js/bootstrap.min.js') ?>"></script> -->