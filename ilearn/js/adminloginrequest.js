function checkAdminLogin(){
    var adminLogEmail=$("#adminLogemail").val();
    var adminLogPass=$("#adminLogpass").val();
    $.ajax({
        url:"Admin/admin.php",
        method: 'POST',
        data: {
            checkLogEmail : "checkLogEmail",
            adminLogEmail: adminLogEmail,
            adminLogPass: adminLogPass,
        },
        success: function(data){
            if(data == 0){
               $("#statusadminLogMsg").html('<small ">Invalid Email ID or Password</small>');
            } else if(data == 1 ){
                $("#statusadminLogMsg").html('<div class="spinner-border text-success" role="status"></div>');
                setTimeout(()=>{
                    window.location.href = "Admin/adminDasboard.php";
                }, 1000);
            }
        },
    });
}