<?php
require __DIR__.'/connect.php';?>


<?php

if(isset($_GET['sid'])) 
{
    $id = intval($_GET['sid']);
    $file_name =$_GET['file_name'];
   // $upload_dir = 'C:/xampp/htdocs/mytest/Chef_pic/add_utensils_photo/';
    //$path = $upload_dir.$file_name;
    $path = 'C:/xampp/htdocs/mytest/Chef_pic/add_utensils_photo/'.$file_name;

    echo $path;
    $result = $pdo->query("DELETE FROM `add_utensils_photo` WHERE `sid`='$id'");
    
    unlink($path);
    if($result) echo "Delete success";

} else { 

    echo "GET NOT SET";

 }
 <script>
 // delete selected records
$('#delete_records').on('click', function(e) {
    var employee = [];
    $(".emp_checkbox:checked").each(function() {
    employee.push($(this).data('emp-id'));
    });
    if(employee.length <=0) { alert("Please select records."); } else { WRN_PROFILE_DELETE = "Are you sure you want to delete "+(employee.length>1?"these":"this")+" row?";
    var checked = confirm(WRN_PROFILE_DELETE);
    if(checked == true) {
    var selected_values = employee.join(",");
    $.ajax({
    type: "POST",
    url: "delete_action.php",
    cache:false,
    data: 'emp_id='+selected_values,
    success: function(response) {
    // remove deleted employee rows
    var emp_ids = response.split(",");
    for (var i=0; i < emp_ids.length; i++ ) { $("#"+emp_ids[i]).remove(); } } }); } } });
 </script>
 header('Location: '. $_SERVER['HTTP_REFERER']);