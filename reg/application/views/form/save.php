<?php
    $path ='';
    if($type == 'income'){
        $path = base_url('index.php/Home/do_save/income');
    }else if($type == 'pay'){
        $path = base_url('index.php/Home/do_save/pay');
    }else{
        exit();
    }
?>
<div class="container">
    <form method="post" action="<?php echo $path;?>" role="form">

        <div class="form-group">
            <label for="name">Date</label>
            <input name="date" type="date" class="form-control"/>
        </div>


        <div class="form-group">
            <label for="name">Description</label>
            <input name="description" type="text" class="form-control" placeholder="Description">
        </div>


        <div class="form-group">
            <label for="name">Invoice</label>
            <input name="invoice" type="text" class="form-control" placeholder="Invoice no">
        </div>


        <div class="form-group">
            <label for="name">Cost (Rs.)</label>
            <input name="cost" type="text" class="form-control" placeholder="Cost">
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="submit">
        </div>
    </form>
</div>
