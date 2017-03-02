
<style>
</style>
    <div class="row">
      <div class="col-lg-12">
	       <span style="color:#9c27b0;">Choose your category</span> <br/>
        <select id="type" style="border: solid 1px #9c27b0;" class="form-control">
          <option value="student_login">I'M A SCHOOL STUDENT</option>
          <option value="uni_student_login">I'M AN UNDERGRADUATE</option>
          <option value="teacher_login">I'M A TEACHER</option>
          <option value="gen_student_login">GENARAL / PUBLIC </option>
        </select>
      </div>
    </div>
	<div class="row">
      <div class="col-lg-10">

	  </div>
	  <div class="col-lg-2">
		<button onclick='open_root($("#type").val())' class="btn btn-primary">Next</button>
	  </div>
	</div>

    <!-- <div class="row">
        <div class="col-lg-4" >
            <button class="btn-lg btn-theme" onclick="open_root('student_login')"> <span class="glyphicon glyphicon-book"></span> I'M A SCHOOL STUDENT</button>
        </div>
        <div class="col-lg-4" >
            <button class="btn-lg btn-theme" onclick="open_root('uni_student_login')"> <span class="glyphicon glyphicon-education"></span> I'M AN UNDERGRADUATE</button>
        </div>
        <div class="col-lg-4" >
            <button class="btn-lg btn-theme" onclick="open_root('teacher_login')"> <span class="glyphicon glyphicon-user"></span> I'M A TEACHER</button>
        </div>
    </div> -->
