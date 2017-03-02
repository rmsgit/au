<div class="container">
    <table class="table table-striped">
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Password</th>
            <th>Remove</th>
        </tr>

        <?php
        foreach ($schools as $school){
        ?>
            <tr>
                <td><?php echo $school->id; ?></td>
                <td><?php echo $school->name; ?></td>
                <td><?php echo $school->password; ?></td>
                <td><a  href="<?php echo base_url("index.php/home/school/remove")."/".$school->id;?>">Remove</a></td>
            </tr>

        <?php
        }
        ?>
        <form method="post" action="<?php echo base_url("index.php/home/school/add");?>">
        <tr>

            <td></td>
            <td><input name="name"></td>
            <td><input name="password"></td>
            <td><input type="submit" class="btn-primary" value="Add"></td>

        </tr>
        </form>
    </table>
</div>