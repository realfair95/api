<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-success" style="margin-bottom:10px;margin:auto;"  data-toggle="modal" data-target="#myModal">ADD NEW APP VERSION</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">ADD NEW VERSION APP</h4>
      </div>
      <div class="modal-body">
      <form method="POST">
          <div class="form-group">
              <label for="recipient-name" class="control-label">Version Name:</label>
              <input required="" type="text" class="form-control" name="v_name" id="recipient-name" placeholder="ex:1.8">
          </div>
          <div class="form-group">
              <label for="recipient-name" class="control-label">Version Code:</label>
              <input required="" type="number" name="v_code" class="form-control" id="recipient-name" placeholder="ex:1.8">
          </div>
          <div class="form-group">
              <label for="message-text" class="control-label">Description:</label>
              <textarea class="form-control" name="v_texte" id="message-text" required=""></textarea>
          </div>
          <div class="form-group">
              <label for="recipient-name" class="control-label">Application Id:</label>
              <input type="text" class="form-control" name="v_id" id="recipient-name" placeholder="ex:com.example.com" required="">
          </div>
          <div class="form-group">
            <CENTER><button name="save" class="btn btn-success">SAVE INFORMATION</button></CENTER>
          </div>
      </form>
      <?php include("save_content.php"); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>