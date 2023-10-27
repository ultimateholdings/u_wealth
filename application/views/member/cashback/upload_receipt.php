
<form action="<?php echo base_url('member/upload_receipt'); ?>" method="POST">

  <div class="row">

    <div class="col-sm-3">

    </div>

    <div class="col-sm-7">

    </div>

    <div class="col-sm-2">

    <a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-xs pull-right">

    Upload My Purchase Receipt

    </a>

    </div>

  </div>

</form>

<div>&nbsp;</div>
<div class="modal fade" id="myModal">

    <div class="modal-dialog">

      <div class="modal-content">

        <div class="modal-header">

          <h4 class="modal-title">Product Details</h4>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">

            <span aria-hidden="true">&times;</span>

          </button>

        </div>

        <div class="modal-body">

          <form id="create_my_purchase" action="" method="POST">

            <div class="row">

              <div class="form-group col-sm-12 text-left">

                <label for="plan">Product Description</label><span style="color:red">*</span>

                <input type="text" name="description" class="form-control" id="description" placeholder="Enter Product Description" required>

              </div>

              <div class="form-group col-sm-12 text-left">

                <label for="plan_cost">Product Cost<span style="color:red">*Enter dollar amount</span></label>

                <input type="text" min="1" pattern="^[0-9]*$" maxlength="10" name="amount" class="form-control" id="amount" placeholder="Enter Product Cost" required>

              </div>

              &nbsp;

              <div class="form-group col-sm-6 text-left">

                <label for="img">Product Receipt</label><span style="color:red">*</span><br>

                <input class="btn btn-primary" type="file" name="img" id="img" required>

              </div>

              <div class="form-group col-sm-12 text-left">

                <label for="note">Note</label>

                <textarea name="note" id="note" cols="30" rows="5" class="form-control" placeholder="Send Note To Seller (optional)"></textarea>

              </div>

            </div>

            <div class="modal-footer">

              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

              <button type="submit" class="btn btn-success" id="save">Save</button>

            </div>

          </form>

        </div>

      </div>

    </div>

  </div>

</div>

  <div class="pull-right">

    <?php echo $this->pagination->create_links(); ?>

  </div>

  </div>


<script type="text/javascript">

  $(document).ready(function() {

    document.getElementsByClassName('active')[0].classList.remove('active');

    document.getElementById("Purchase").classList.add('active');

    document.querySelector("#Purchase > ul > li:nth-child(1) > a > span").setAttribute('style', 'color: darkorange !important;');

  });

</script>



<script>

  $('#create_my_purchase').submit(function(e) {

    e.preventDefault();

    let formData = new FormData(this);

    $.ajax({

      type: "POST",

      url: "<?php echo site_url('member/upload_receipt')?>",

      data: formData,

      cache: false,

      contentType: false,

      processData: false,

      success: function(res) {

        if (res == 0) {

          console.log(res);

        } else if (res == 1) {

          console.log(res);

        }

        window.location ="<?php echo site_url('member/receipt_history')?>";

      }

    });

  });




</script>