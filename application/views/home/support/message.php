<div class="container frame" style="height: 700px;">
  <div class="row">
    <div class="col-lg-12">
      <a class="navbar-brand" href="#">New Query</a>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <form name="frm" id="frm" method="post" action="#" onsubmit="return validate(this)">
        <input type="hidden" name="com" value="complaint">                                  
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Subject</label>
              <input maxlength="200" size="25" name="subject" id="subject" class="form-control border-input" required>
            </div>
          </div>       
          <div class="col-md-6">
            <div class="form-group">
                <lable>Message</lable>
                <textarea rows="5" name="message" id="message" cols="38" class="form-control border-input" required></textarea>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-3">
            <div class="text-center">
              <p align="center">
               <input type="submit" name="CmdSave" value="Submit" id="CmdSave" class="btn btn-info">
              </p>
            </div>
          </div>
        </div>
      </form>
       <div class="pagination pagination-right"> </div>
    </div>
  </div>  
</div>