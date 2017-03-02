<div class="container">
    <table class="table table-striped">
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Contact</th>
            <th>Event</th>
            <th>Food Choice</th>
            <th>School</th>
        </tr>
        <?php
      foreach ($sch_students as $student){
      ?>
          <tr>
              <td><?php echo $student->id; ?></td>
              <td><?php echo $student->name; ?></td>
              <td><?php echo $student->email; ?></td>
              <td><?php echo $student->address; ?></td>
			  
              <td><?php echo $student->contact; ?></td>
              <td><?php if($student->event == 1){ echo 'Conference';}else {echo "Competition";}  ?></td>
              <td><?php
               $food =  $student->food;
                if($food == 1){
                   echo "Chicken";
                }elseif ($food == 2) {
                  echo "Fish";
                }elseif ($food == 3) {
                  echo "Vegetable";
                }elseif ($food == 4) {
                  echo "Egg";
                }
               ?></td>
              <td><?php echo $student->sch_name; ?></td>
          </tr>

      <?php
      }
      ?>

    </table>

</div>
