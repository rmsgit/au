<div class="row">
    <form method="post" role="form">
        <h3> Teacher's Account</h3><hr/>
        <div class="form-group">
            <label for="name">School Name</label>
            <input id="name" name="email" disabled="disabled" type="text" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="name">Teacher's name:</label>
            <input id="teacher_name" name="text" type="text" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="name">Teacher's Food Choice</label>
            <select id="food" class="form-control">
                    <option value="1">Chicken</option>
                    <option value="2">Fish</option>
                    <option value="3">Vegetable</option>
                    <option value="4">Egg</option>
            </select>
        </div>
        <div class="form-group">
            <label for="name">Contact No</label>
            <input id="contact" name="pass" type="number" class="form-control"/>
        </div>
        <div>
         <div class="col-lg-7"></div>
          <div class="col-lg-2" style="padding-right: 0;padding-left: 0;">
              <input type="button" class="btn btn-primary" align="center" style="width: 100%" value="Back" onclick="open_root('teacher_login')">
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

    call('school/data',{
        token:getToken()
    },function (status, user) {
        if(status==200){
            //$(document).ready(function (e) {
                $('#name').val(user.name);
                $('#teacher_name').val(user.teacher_name);
                $('#city').val(user.city);
				$('#food').val(user.teacher_food);
                $('#contact').val(user.contact);

            //});
        }
    });
    function save() {
        call('school/set_data',{
            token:getToken(),
            data: {
                teacher_name: $('#teacher_name').val(),
                city: $('#city').val(),
                contact: $('#contact').val(),
				teacher_food: $('#food').val()
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