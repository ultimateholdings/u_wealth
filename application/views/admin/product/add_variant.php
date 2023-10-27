<?php

?>
<style>
   .fourth{
      margin-left: -21px;
      width: 110%;
   }
   .fifth{
      width: 10px;
   }
   .tenn{
    width: 30%;
   }
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<script src="<?php echo base_url();?>axxets/admin/js/fileinput.js"></script>
<script src="<?php echo base_url();?>axxets/admin/js/component.fileupload.js');?>" charset="utf-8"></script>
<script src="<?php echo base_url();?>axxets/admin/js/jquery-2.2.4.min.js')"></script>
<!-- <section style="padding-left: 25px;padding-right: 25px">

 --> 
 <div class="container" style="padding: 30px;">
    

 <div class="row">
    <?php echo form_open_multipart() ?>
    <div class="form-group">
        <div class="row" style="width: 150%; margin: auto;">
         <div class="col-sm-12" id="var_name">
            <label>Variation Name*</label>
            <input type="text" class="form-control" name="variant_name" value="<?php echo set_value('variant_name') ?>">
         </div>
       </div>
       <div class="row mt-2" style="width: 150%; margin: auto;"> 
         <div class="col-sm-12" id="add_var">
            <label>Add Variation values</label>
            <table id="variant_table" class="table table-condensed table-bordered blue-header variation_value_table">
                <tr>
                   <td><input class="form-control input-sm" name="variant_value[]" type="text" required id="fifth_stack" ></td>
                   <td id="sixth_stack" ><input type="button" onclick="insRow('variant_table')" class="btn btn-success btn-xs add_variation_value_row" value="+"></td>
                </tr>
            </table>
              
         </div> 
        </div>
    </div>
 </div>
<!--- COMMISSION PART ----->
    <div class="col-sm-10"><br/>
        <input type="submit" class="btn btn-success" value="Create" onclick="this.value='Creating..'">
        <a href="<?php echo site_url('site/admin');?>" id="cancel" name="cancel" class="btn btn-default">Cancel</a>
    </div>
  <?php echo form_close() ?>
</div>
 </div>
<!-- </section>
 -->
<script>
    $(document).ready(function(){
        $("#button1").on("click", function(){
               var count = $('#BinaryLevels tr').length;
               //window.alert(count);
               if(count<25){
               var new_count = count+1;
               var row = "<tr><td><input type='text' class='form-control' name='new_level[]' value= " +  new_count + " placeholder='Level' required></input></td><td><input type='number' class='form-control' name='new_commission[]' value='' placeholder='Commission' required></input></td></tr>";
             $("#BinaryLevels").append(row);
             //window.alert(row);
               }
           });
         
         }); 
</script>
<script>
function deleteRow() {
    //alert("id");
    document.getElementById("variant_table").deleteRow(1);
}

function insRow(id) {
    //alert(id);
    var filas = document.getElementById("variant_table");
    //alert(filas);
    var x = document.getElementById(id).insertRow(1);
    //alert(filas);
    var y = x.insertCell(0);
    var z = x.insertCell(1);
    //alert(id);
    y.innerHTML ='<td ><input class="form-control input-sm fourth_stack" type="text" name="variant_value[]" /></td>';
    z.innerHTML ='<td style="text-align:center;"><input type="button" onclick="deleteRow()"  class="btn btn-danger btn-xs add_variation_value_row" value="-" /></td>';
       <?php if((config_item('admin_theme')=='admin/stack/index') ) { ?>
     document.getElementsByClassName("fourth_stack")[0].classList.add('fourth');
           <?php } ?> 
    //z.innerHTML='<td><input type="button" onclick="deleteRow('variant_table')" class="btn btn-success btn-xs add_variation_value_row" value="-"></td>'
    //e.innerHTML ='<td><input type="button" onclick="deleteRow("variant_table",id)" class="btn btn-danger btn-xs add_variation_value_row" value="-"></td>';
   }
</script>
<script>
   <?php if((config_item('admin_theme')=='admin/stack/index') ) { ?>
     $(document).ready(function () {
      document.getElementById("fifth_stack").classList.add('fourth');
      document.getElementById("sixth_stack").classList.add('fifth');
     });
            
      <?php } ?> 
      </script>
      <script>
   <?php if((config_item('admin_theme')=='admin/default/base') ) { ?>
     $(document).ready(function () {
      document.getElementById("var_name").classList.add('tenn');
      document.getElementById("add_var").classList.add('tenn');
     });
            
      <?php } ?>
      <?php if((config_item('admin_theme')=='admin/defaultNew/base') ) { ?>
     $(document).ready(function () {
      document.getElementById("var_name").classList.add('tenn');
      document.getElementById("add_var").classList.add('tenn');
     });
            
      <?php } ?>  
      </script>

<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("prodservices").classList.add('active');
        document.querySelector("#prodservices > ul > li:nth-child(3) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>


