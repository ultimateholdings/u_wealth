<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>
<script>
$(document).ready(function(){
    $('#binary_income').on('change', function() {
      if ( this.value == '1')
      //.....................^.......
      {
        $("#package").show();
      }
      else
      {
        $("#package").hide();
      }
    });
});
</script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>
<script>
$(document).ready(function(){
    $("#without_package").hide();
    $('#binary_income_package').on('change', function() {
      if ( this.value == '1')
      //.....................^......
      {
        $("#package").show();
         $("#without_package").hide();
      }
      if( this.value == '0')
      {
        $("#without_package").show();
        $("#package").hide();
      }
      
    });
});
$(document).ready(function(){
    $("button").on("click", function(){
           var count = $('#BinaryLevels tr').length;
           //window.alert(count);
           if(count<25){
           var new_count = count+1;
           var row = "<tr><td><input type='text' class='form-control' name='new_level[]' value= " +  new_count + " placeholder='Level' required></input></td><td><input type='number' class='form-control' name='new_commission[]' value='' placeholder='Commission' required></input></td></tr>";
         $("#BinaryLevels").append(row);
           }
       });
     
     }); 
</script>
<div class="alert alert-danger">
    <strong>Warning !</strong> if you don't know what you are doing. Please do not modify this setting. Call our support
    team if you have any query or you want to learn to how to use this setting. From here you can set when an user will
    get
    commission and on which condition basis.
</div>
<!--<div class="row">
    <?php echo form_open() ?>
    <div class="col-sm-6">
        <label>Is Binary income based on package?</label>
        <select class="form-control" name="package" id="package">
            <option value="1">Yes</option>
            <option value="0">No</option>
            
        </select>
    </div>
    <div id="package">
    <div class="col-sm-6">
        <label>Select Product/Package</label>
        <!--<label><?php foreach($prod_name as $p){ 
          echo $p['prod_name'];
        } ?></label>-->
        <!--
        <select class="form-control" name="product_name">
          
           <?php
            foreach($prod_name as $p){ ?>
              <option>
           <?php echo $p['prod_name']; ?>
             </option>
           <?php  }
            ?>
           
            
        </select>
    </div>
    <div class="col-sm-6">
        <label>First Pair Matching Ratio:</label>
       <select class="form-control" name="first_matching_ratio" id="first_matching_ratio">
            <option value="1">1:1</option>
            <option value="2">1:2/2:1</option>
            
        </select>
    </div>
    <div class="col-sm-6">
        <label>Second Pair Onwards Matching Ratio: <br/> </label>
        <select class="form-control" name="second_matching_ratio" id="second_matching_ratio">
            <option value="1:1">1:1</option>
            <option value="1:2/2:1">1:2/2:1</option>
        </select>
    </div>
    <div class="col-sm-6">
        <label>First Pair Matching income:</label>
        <input type="text" class="form-control" value="" name="first_matching_income">
    </div>

    <div class="col-sm-6">
        <label>Second Pair Matching income:</label>
        <input type="text" class="form-control" value="" name="second_matching_income">
    </div>

    <div class="col-sm-6">
        <label>Levels:</label>
        <select class="form-control" name="level" id="level">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="2">3</option>
            <option value="2">4</option>
            <option value="2">5</option>
            <option value="2">6</option>
            <option value="2">7</option>
            <option value="2">8</option>
            <option value="2">9</option>
            <option value="2">10</option>
            <option value="2">11</option>
            <option value="2">12</option>
            <option value="2">13</option>
            <option value="2">14</option>
            <option value="2">15</option>
            <option value="2">16</option>
            <option value="2">17</option>
            <option value="2">18</option>
            <option value="2">19</option>
            <option value="2">20</option>
            
        </select>
    </div>
    <div class="col-sm-6"><br/>
        <input type="hidden" name="id" value="<?php echo $result->id ?>">
        <input type="submit" class="btn btn-success" value="Update" onclick="this.value='Updating..'">
    </div>
    <?php echo form_close() ?>
</div>
</div><!--  end of div id=package-->

<div class="row">
    <?php echo form_open() ?>
    <div class="col-sm-6">
        <label>Is Binary income based on package?</label>
        <select class="form-control" name="binary_income_package" id="binary_income_package">
            
            <option value="1" selected="">Yes</option>
            <!--<option value="0">No</option>-->
            
        </select>
    </div>
    <div id="package">
    <div class="col-sm-6">
        <label>Select Product/Package</label>
        <select class="form-control" name="product_name" id="product_name">
          <!--<?php foreach($prod_name as $p){ 
            //echo $p['prod_name'];
        } ?>-->
            
           <!--<?php
            foreach($prod_name as $p){ ?>
                <option>
           <?php echo $p['prod_name']; ?>
             </option>
           <?php  }
            ?>-->
           <option>
            <?php echo $product_name; ?>
           </option>
            
        </select>
    </div>
    <div class="col-sm-6">
        <label>First Pair Matching Ratio:</label>
       <select class="form-control" name="first_matching_ratio" id="first_matching_ratio">
            <option value="1:1">1:1</option>
           <!-- <option value="1:2/2:1">1:2/2:1</option>-->
            
       </select>
    </div>
    <div class="col-sm-6">
        <label>Second Pair Onwards Matching Ratio: <br/> </label>
        <select class="form-control" name="second_matching_ratio" id="second_matching_ratio">
            <option value="1:1">1:1</option>
            <!--<option value="1:2/2:1">1:2/2:1</option>-->
        </select>
    </div>
    <div class="col-sm-6">
        <label>First Pair Matching income:</label>
        <input type="text" class="form-control" value="" name="first_matching_income">
    </div>

    <div class="col-sm-6">
        <label>Second Pair Matching income:</label>
        <input type="text" class="form-control" value="" name="second_matching_income">
    </div>

    <div class="col-sm-6" id="level">
        <label> Levels:</label>
        <?php if($level_detail){  ?>
        <table id = 'BinaryLevels'>
          <?php
          
           foreach($level_detail as $detail){ ?>
            <tr>
             <td><input type="text" class="form-control" 
              value="<?php echo $detail['level']; ?>" name="new_level[]" required></td>
             <td><input type="text" class="form-control" 
              value="<?php echo $detail['commission']; ?>" placeholder="Commission" name="new_commission[]" required></td>
            </tr>
            <?php } ?>
        </table>
      <?php }

      else{
        ?>
        <table id = 'BinaryLevels'>
          <tr>
             <td><input type="text" class="form-control" 
              value="1" name="new_level[]"></td>
             <td><input type="text" class="form-control" 
              value="" placeholder="Commission" name="new_commission[]"></td>
          </tr>
        </table>

       
      <?php } ?>
  <!--  </div>-->
    <div class="col-sm-6"><br/>
        <button type="button" class="btn btn-default" data-dismiss="modal">Add More!!</button>
    </div>

    <div class="col-sm-12"><br/>
        <input type="submit" class="btn btn-success" value="Update" onclick="this.value='Updating..'">
    </div>
    <?php echo form_close() ?>
</div><!--  end of div id=package-->
</div><!--end of row-->

<script type="text/javascript">
        function add_item() {
            var rand = parseInt($('#dup').val()) + 1;
            $('#dup').val(rand);
            var data = '<div id="' + rand + '" class="row">\n' +
                '                        <div class="col-sm-4">\n' +
                '                            <label>Level *</label>\n' +
                '                            <input required type="text" class="form-control" name="new_level[]">\n' +
                '                        </div>\n' +
                '                        <div class="col-sm-4">\n' +
                '                            <label>Commission (in <?php echo config_item('currency') ?>)*</label>\n' + '                            <input required type="text" class="form-control" name="new_commission[]">\n' + '                        </div>\n' + '                        <div class="col-sm-4">\n' + '                            <br/>\n' + '                            <a href="javascript:;" onclick="remove_item(\'#' + rand + '\')" class="btn btn-xs btn-danger">Remove\n' + '                                Item</a>\n' + '                        </div>\n' + '                    </div>';
            $('#res').append(data);
        }

        function remove_item(id) {
            $(id).remove();
        }
    </script>

