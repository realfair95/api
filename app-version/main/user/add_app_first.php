<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-success" style="margin-bottom:10px;margin:auto;"  data-toggle="modal" data-target="#myModal">ADD NEW CONTENT</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title">ADD FIRST APP SCREEN CONTENT</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      <form id="frm_add" method="POST">
          <div class="form-group">
              <label for="recipient-name" class="control-label">Content title</label>
              <input required="" type="text" class="form-control" name="title" id="title" placeholder="">
          </div>
          <div class="form-group">
              <label for="recipient-name" class="control-label">Category</label>
              <select id="category" name="category" class="form-control" required="">
                <option value="report">REPORT AND BREAKING NEWS</option>
                <option value="event">SPECIAL EVENT</option>
              </select>
          </div>
          <div class="form-group">
              <label for="message-text" class="control-label">Description:</label>
              <textarea id="description" class="form-control" name="description" id="message-text" required=""></textarea>
          </div>
          <div class="form-group">
              <label for="recipient-name" class="control-label">Add image</label>
              <input type="file" id="file" name="file" class="form-control" required="">
              <img id="image" src="../assets/images/users/user.png" style="height: 200px;">
          </div>
          <div class="form-group">
            <CENTER><button name="save" class="btn btn-success">SAVE INFORMATION</button></CENTER>
          </div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
  $(function(){
  $("#file").on("change",function(){
    var file=document.getElementById("file").files[0];
    var name = document.getElementById("file").files[0].name;
    var ext = name.split('.').pop().toLowerCase();
    if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
    {
      $("#file").val("");
     alert("Invalid Image File");
    }else{
    var reader = new FileReader();
    reader.onload = function(){
      var dataURL = reader.result;
      var output = document.getElementById('image');
      output.src = dataURL;
    };
    reader.readAsDataURL(file);
    }

  });
  $("#frm_add").submit(function(e){
    e.preventDefault();
    var title=$("#title").val();
    var $category=$("#category").val();
    var body=$("#description").val();
    if(title.length>=10){
      if(category.length>0){
        if(body.length>=10){
           $.ajax({  
                url:"user/save_content.php",  
                method:"POST",  
                data:new FormData(this),  
                contentType:false,  
                //cache:false,  
                processData:false,  
                success:function(data)  
                {
                  alert(data);
                }  
           });
        }else{
          errors("Please add valid Description");
        }
      }else{
        errors("Please select category");
      }
    }else{
      errors("Please add valid title");
    }
  });
  });

  function errors(msg){
    alert(msg);
  }
</script>