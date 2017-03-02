<style>

</style>
<div class="row">
    <h3>Teachers' Area</h3><hr/>
    <form method="post" role="form">

        <div class="form-group">
            <label for="name">Choose the school</label>
            <select class="form-control" id="school"></select>
        </div>
        <div class="form-group">
            <label for="name">Password</label>
            <input id="pass" name="pass" type="password" class="form-control"/>
        </div>

        <div>
            <div class="col-lg-7"></div>
            <div class="col-lg-2" style="padding-right: 0;padding-left: 0;">
                <input type="button" class="btn btn-primary" align="center" style="width: 100%" value="Back" onclick="open_root('chose_event_type')">
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-2" style="padding-right: 0;padding-left: 0;">
                <input type="button" class="btn btn-primary" align="center" style="width: 100%" value="Login" onclick="login()">
            </div>
        </div>
    </form>
</div>
<script>
    call('school',{
        token:getToken()
    },function (status, schools) {
        if(status==200){
            //$(document).ready(function (e) {
                $('#school').html('');
                schools.forEach(function (school) {
                    $('#school').append('<option value="'+school.id+'">'+school.name+'</option>');
                });

            //});
        }
    });
    function login() {
        call('school/login/'+$('#school').val(),{
            password:$('#pass').val()
        },function (status,result) {
            if(status ==200){
                sessionStorage.setItem("token",result.token);
                open_root('teacher_profile');
            }

        });
    }

</script>
