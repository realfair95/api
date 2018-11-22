<div class="col-12">
    <div class="card">
<?php 
require("db.php");
$query=mysqli_query($con,"SELECT * FROM app_first  ORDER BY id DESC");
if($query){
    if(mysqli_num_rows($query)>0){
        ?>

        <div class="card-body">
            <h4 class="card-title">Bordered Table</h4>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>VersionCode</th>
                            <th>VersionName</th>
                            <th>Description</th>
                            <th>Update_Url</th>
                            <th>Status</th>
                            <th>Update_Date</th>
                            <th class="text-nowrap">Action</th>
                        </tr>
                    </thead>
                    <tbody>
        <?php
        while($r=mysqli_fetch_array($query)){
            $id=$r[0];
            $versionCode=$r[1];
            $versionName=$r[2];
            $texte=$r[3];
            $update_url=$r[4];
            $status=$r[5];
            $update_date=$r[6];

            ?>
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $versionCode; ?></td>
                <td><?php echo $versionName; ?></td>
                <td><?php echo $texte; ?></td>
                <td><?php echo $update_url; ?></td>
                <td><?php echo $status; ?></td>
                <td><?php echo $update_date; ?></td>
                <td><a class="btn btn-danger delete" data="<?php echo $id; ?>"><i style="color: #fff;" class="fa fa-trash-o"></i></a></td>
            </tr>
            <?php
        }
    }else{
        ?>
        <p style="margin:10px; padding: 10px;color: #fff;background:#AC0900;border-radius: 10px; ">
            NO content available!!!
        </p>
        <?php
    }
}else{
    die(mysqli_error($con));
}
?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
 <script src="../assets/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
    $(function(){
        $(".delete").click(function(){
            var id=$(this).attr("data");
           var r = confirm("Do you really want to delete this (NO UNDONE ACTION)!");
           if(r){
                $.post("delete_version.php",
                {
                    id:id
                },
                function(data, status){
                    if(data=="1"){
                        alert("Deleted successfully");
                        window.location="dashboard";
                    }
                });
           }
        });
    });
</script>