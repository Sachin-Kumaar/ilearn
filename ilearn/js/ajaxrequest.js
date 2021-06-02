$(document).ready(function () {
    $("#stuemail").on("keypress blur", function () {
        var stuemail = $("#stuemail").val();
        $.ajax({
            url: "Student/addStudent.php",
            method: "POST",
            data: {
                checkemail: "checkemail",
                stuemail: stuemail,
            },
            success: function (data) {
                // console.log(data);
                if (data != 0) {
                    $("#statusMsg2").html('<small style="color:red">Email ID alredy Used !</small>');
                    $("#signup").attr("disabled", true);
                } else if (data == 0){
                $("#statusMsg2").html('<small style="color:green">There you go</small>');
                $("#signup").attr("disabled", false);
                }
            },
        });
    });
});



function addStu() {
    var regg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    var stuname = $("#stuname").val()
    var stuemail = $("#stuemail").val()
    var stupass = $("#stupass").val()

    if (stuname.trim() == "") {
        $("#statusMsg1").html('<small style="color:red">Please Enter Name !</small>');
        $("#stuname").focus();
        return false;
    } else if (stuemail.trim() == "") {
        $("#statusMsg2").html('<small style="color:red">Please Enter Email !</small>');
        $("#stuemail").focus();
        return false;
    } else if (stuemail.trim() != "" && !regg.test(stuemail)) {
        $("#statusMsg2").html('<small style="color:red">Please Enter valid Email e.g. example@mail.com</small>');
        $("#stupass").focus();
        return false;
    } else if (stupass.trim() == "") {
        $("#statusMsg3").html('<small style="color:red">Please Enter Password !</small>');
        $("#stupass").focus();
        return false;
    } else {


        $.ajax({
            url: 'Student/addStudent.php',
            method: 'POST',
            dataType: "json",
            data: {
                stuname: stuname,
                stuemail: stuemail,
                stupass: stupass,
            },
            success: function (data) {
                console.log(data);
                if (data == "OK") {
                    $("#successMsg").html("<span class='alert alert-sucess'>Registration Sucessful!</span>");
                    clearStuReg();
                } else if (data == "Failed") {
                    $("#successMsg").html("<span class='alert alert-danger'>Registration Unsucessful!</span>");
                }
            },



        });
    }
}

function clearStuReg() {
    $("#stuRegForm").trigger("reset");
    $("#statusMsg2").html(" ");
    $("#statusMsg3").html(" ");
    $("#statusMsg1").html(" ");
}


// login code 

function checkStuLogin(){
    var stuLogEmail=$("#stuLogemail").val();
    var stuLogPass=$("#stuLogpass").val();
    $.ajax({
        url:"Student/addStudent.php",
        method: 'POST',
        data: {
            checkLogEmail : "checkLogEmail",
            stuLogEmail: stuLogEmail,
            stuLogPass: stuLogPass,
        },
        success: function(data){
            if(data == 0){
               $("#statusLogMsg").html('<small ">Invalid Email ID or Password</small>');
            } else if(data == 1 ){
                $("#statusLogMsg").html('<div class="spinner-border text-success" role="status"></div>');
                setTimeout(()=>{
                    window.location.href = "index.php";
                }, 1000);
            }
        },
    });
}

