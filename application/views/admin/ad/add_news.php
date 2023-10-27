<?php
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdn.ckeditor.com/4.14.0/full/ckeditor.js"></script>
<div class="row">
    <?php echo form_open_multipart() ?>
    <div class="form-group">
        <div class="col-sm-6">
            <label>Location</label>
            <select class="form-control" name="location" id="location">
             <option value="latest_news">Latest News</option>
             <option value="live_updates">Live Updates</option>
            </select>
        </div>
        <div class="col-sm-10">
         <table>
           <tr><td>Content</td></tr>
           <tr>
            <td>
             <form method="post" style="color:blue;">
             <textarea   id="editor" name="content"><?php echo set_value('content') ?>
             </textarea>
             </form>
            </td>
           </tr>  
         </table>
         <script>
           CKEDITOR.replace( 'editor' );
         </script>
                <!--<label>Content</label>
                <textarea class="form-control" id="editor" name="content"><?php echo set_value('content') ?></textarea>-->
        </div>
      </div>
    <div class="col-sm-10"><br/>
        <input type="submit" class="btn btn-success" value="Create" onclick="this.value='Creating..'">
        <a href="<?php echo site_url('site/admin');?>" id="cancel" name="cancel" class="btn btn-default">Cancel</a>
    </div>
  <?php echo form_close() ?>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("news").classList.add('active');
        document.querySelector("#news > ul > li:nth-child(1) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>





                     

                   


            
            
        
           
                             
