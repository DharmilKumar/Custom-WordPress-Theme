<!DOCTYPE html>
<html>

<head>
    <style>
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>

    <?php
    $name1 = $name2 = $name3 = $name4 = "";
    if (isset($_POST['submit'])) {
        global $table_prefix;
        global $wpdb;
        $table = $table_prefix . 'custompage';
        $name1 = $_POST['c1'];
        $name2 = $_POST['c2'];
        $name3 = $_POST['c3'];
        $name4 = $_POST['c4'];
        $wpdb->update($table, ['name1' => $name1, 'name2' => $name2, 'name3' => $name3, 'name4' => $name4], ['id' => 1]);
    }

    global $table_prefix;
    global $wpdb;
    $table = $table_prefix . 'custompage';
    $results = $wpdb->get_results("SELECT * FROM $table WHERE id=1 ");
    foreach($results as $row){
        $name1 = $row->name1;
        $name2 = $row->name2;
        $name3 = $row->name3;
        $name4 = $row->name4;
    ?>
    <div class="card mx-auto mt-5">
        <div class="card-body">
            <form action="" method="post">
                <div class="form-check">
                    <input class="form-check-input mt-1" type="checkbox" name="c1" value="Soical 1" id="c1" <?php if ($name1=='Soical 1') {
                                                                                                                echo 'checked';
                                                                                                            } ?>>
                    <label class="form-check-label" for="c1">
                        Social 1
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input mt-1" type="checkbox" name="c2" value="Soical 2" id="c2" <?php if ($name2=='Soical 2') {
                                                                                                                echo 'checked';
                                                                                                            } ?>>
                    <label class="form-check-label" for="c2">
                        Social 2
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input mt-1" type="checkbox" name="c3" value="Soical 3" id="c3" <?php if ($name3=='Soical 3') {
                                                                                                                echo 'checked';
                                                                                                            } ?>>
                    <label class="form-check-label" for="c3">
                        Social 3
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input mt-1" type="checkbox" name="c4" value="Soical 4" id="c4" <?php if ($name4=='Soical 4') {
                                                                                                                echo 'checked';
                                                                                                            } ?>>
                    <label class="form-check-label" for="c4">
                        Social 4
                    </label>
                </div>
                <input type="submit" class="btn btn-primary" name="submit" value="submit">
            </form>
        </div>
    </div>
    <?php }?>
</body>

</html>