<div class="container">
    <table class="table table-striped">
        <tr>
            <th>id</th>
            <th>School Name</th>
            <th>Contact</th>
            <th>Teacher's Name</th>
            <th>Food Choice</th>

        </tr>
        <?php
      foreach ($schools as $student){
      ?>
          <tr>
              <td><?php echo $student->id; ?></td>
              <td><?php echo $student->name; ?></td>
              <td><?php echo $student->contact; ?></td>
              <td><?php echo $student->teacher_name; ?></td>

              <td><?php
               $food =  $student->teacher_food;
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
          </tr>

      <?php
      }
      ?>

    </table>

</div>
