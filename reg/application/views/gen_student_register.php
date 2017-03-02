<div class="row">
    <form method="post" role="form">
        <h3>Genaral / Public Registration</h3><hr/>
        <div class="form-group">
            <label for="name">Email</label>
            <input id="email" type="text" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="name">Your Event</label>
            <select  class="form-control" id="event">
                <option selected="selected" value="1">Conference</option>
            </select>
        </div>
        <div>
            <div class="col-lg-7"></div>
            <div class="col-lg-2" style="padding-right: 0;padding-left: 0;">
                <input type="button" class="btn btn-primary" align="center" style="width: 100%" value="Back" onclick="open_root('gen_student_login')">
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-2" style="padding-right: 0;padding-left: 0;">
                <input type="button" class="btn btn-primary" align="center" style="width: 100%" value="Register" onclick="save()">
            </div>
        </div>
    </form>
</div>
<script>


    function save() {
        $('#btn_reg').val("Wait...");
        call('student/register',{
            data: {
                email: $('#email').val(),
                event: $('#event').val(),
                type:3
            }
        },function (status,data) {
            $('#btn_reg').val("Register");
            if(status == 200){
                alert('Welcome, You are registered to AURORA 2K17. Please check your email to get your password.');
                open_root('gen_student_login')
            }else if(status == 203){
                alert('Email already exist. Try again with another email');
            }else {
                alert('Registration Fail');
            }
        });
    }


</script>
