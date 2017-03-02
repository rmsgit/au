
<div class="row">
    <h3>Genaral / Public Area</h3><hr/>
    <form method="post" role="form">

        <div class="form-group">
            <label for="name">E-mail</label>
            <input id="email" name="email" type="text" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="name">Password</label>
            <input id="pass" name="pass" type="password" class="form-control"/>
        </div>
        <div>
          <div class="col-lg-4"></div>
          <div class="col-lg-2" style="padding-right: 0;padding-left: 0;">
              <input type="button" class="btn btn-primary" align="center" style="width: 100%" value="Back" onclick="open_root('chose_event_type')">
          </div>
          <div class="col-lg-1"></div>
            <div class="col-lg-2" style="padding-right: 0;padding-left: 0;">
                <input type="button" class="btn btn-primary" align="center" style="width: 100%" value="Register" onclick="open_root('gen_student_register')">
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-2" style="padding-right: 0;padding-left: 0;">
                <input type="button" class="btn btn-primary" align="center" style="width: 100%" value="Login" onclick="login()">
            </div>
        </div>
    </form>
</div>
<script>
    function login() {
        call('student/login',{
            email:$('#email').val(),
            password:$('#pass').val()
        },function (status,result) {
            if(status == 200){
                sessionStorage.setItem("token",result.token);
                open_root('gen_student_profile');
            }else{
                alert("invalid username password");
            }
        });
    }

</script>
