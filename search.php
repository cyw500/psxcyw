<html>
<body>
    <form action="" method="post">
        <div class="row">
        <div class="col-sm-offset-2 col-sm-5">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search" name="<?php echo $_SESSION['type'] ?>_search">
                <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="btn-group btn-group-justified">
                <div class="btn-group">
                    <input type="submit" name="action" value="Search <?php echo $_SESSION['type'] ?>" class="btn btn-default"/>
                </div>
            </div>
        </div>
        <?php
        if ($_SESSION['type'] != "offence"){
        echo "
        <div class='col-sm-2'>
            <div class='btn-group btn-group-justified'>
                <div class='btn-group'>
                    <input type='submit' name='action' value='Add new {$_SESSION['type']}'
                           class='btn btn-default' style='white-space: normal'/>
                </div>
            </div>
        </div>
        ";
        }
        ?>
        </div>
    </form>
</body>
</html>
