<div class="row">
    <form method="post" role="form">
        <h3> My Account</h3><hr/>
        <h4> Your code : <span id="code"></span></h4>
        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" name="email" type="text" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="name">Date of birth</label>
            <input id="dob" name="date" type="date" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="name">Address</label>
            <textarea id="address" name="email" type="text" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="name">University</label>
            <input id="school" disabled="disabled" type="text" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="name">Contact No</label>
            <input id="contact" name="pass" type="number" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="name">Food Choice</label>
            <select id="food" class="form-control">
                    <option value="1">Chicken</option>
                    <option value="2">Fish</option>
                    <option value="3">Vegetable</option>
                    <option value="4">Egg</option>
            </select>
        </div>
        <div>
          <div class="col-lg-7"></div>
          <div class="col-lg-2" style="padding-right: 0;padding-left: 0;">
              <input type="button" class="btn btn-primary" align="center" style="width: 100%" value="Back" onclick="open_root('uni_student_login')">
          </div>
          <div class="col-lg-1"></div>
            <div class="col-lg-2" style="padding-right: 0;padding-left: 0;">
                <div class="btn btn-primary" align="center" onclick="save()">Save</div>
            </div>
        </div>
    </form>
</div>
<script>
    if(getToken()==undefined){
        open_root('chose_event_type');
    }
    call('student/details',{
        token:getToken()
    },function (status, user) {
        if(status==200){
            //$(document).ready(function (e) {
               $('#name').val(user.name);
               $('#dob').val(user.dob);
               $('#address').html(user.address);
               $('#contact').val(user.contact);
               $('#code').html(user.code);
			   $('#food').val(user.food);

            //});
            call('university/'+user.study,{
                token:getToken()
            },function (status, school) {
               // $(document).ready(function (e) {
                    $('#school').val(school.name);
               // });

            });
        }
    });
    function save() {
        call('student/set_data',{
            token:getToken(),
            data: {
                name: $('#name').val(),
                dob: $('#dob').val(),
                address: $('#address').val(),
                contact: $('#contact').val(),
                food: $('#food').val(),
            }
        },function (status,data) {
            if(status == 200){
                alert('Saved');
            }else {
                alert('Not saved');
            }
        });
    }


</script>
