<div class="container">
    <table class="table table-striped">
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Date of birth</th>
            <th>Address</th>
            <th>Contact</th>
            <th>Food Choice</th>
            <th>University</th>
        </tr>
        <?php
      foreach ($uni_students as $student){
      ?>
          <tr>
              <td><?php echo $student->id; ?></td>
              <td><?php echo $student->name; ?></td>
              <td><?php echo $student->dob; ?></td>
              <td><?php echo $student->address; ?></td>
              <td><?php echo $student->contact; ?></td>
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
              <td><?php echo $student->uni_name; ?></td>
          </tr>

      <?php
      }
      ?>

    </table>

</div>
