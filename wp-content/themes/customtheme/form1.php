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
        update_post_meta( 68, 'c1', $name1);
        update_post_meta( 68, 'c2', $name2);
        update_post_meta( 68, 'c3', $name3);
        update_post_meta( 68, 'c4', $name4);
    }
    $name1 = get_post_meta(68,'c1',true);
    $name2 = get_post_meta(68,'c2',true);
    $name3 = get_post_meta(68,'c3',true);
    $name4 = get_post_meta(68,'c4',true);

   ?>
    <div class="card mx-auto mt-5">
        <div class="card-body">
            <form action="" method="post">
                <div class="form-check">
                    <input class="form-check-input mt-1" type="checkbox" name="c1" value="Instagram" id="c1" <?php if ($name1=='Instagram') {
                                                                                                                echo 'checked';
                                                                                                            } ?>>
                    <label class="form-check-label" for="c1">
                        Instagram
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input mt-1" type="checkbox" name="c2" value="X(Twitter)" id="c2" <?php if ($name2=='X(Twitter)') {
                                                                                                                echo 'checked';
                                                                                                            } ?>>
                    <label class="form-check-label" for="c2">
                        X(Twitter)
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input mt-1" type="checkbox" name="c3" value="YouTube" id="c3" <?php if ($name3=='YouTube') {
                                                                                                                echo 'checked';
                                                                                                            } ?>>
                    <label class="form-check-label" for="c3">
                        YouTube
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input mt-1" type="checkbox" name="c4" value="WhatsApp" id="c4" <?php if ($name4=='WhatsApp') {
                                                                                                                echo 'checked';
                                                                                                            } ?>>
                    <label class="form-check-label" for="c4">
                        WhatsApp
                    </label>
                </div>
                <input type="submit" class="btn btn-primary" name="submit" value="submit">
            </form>
        </div>
    </div>
</body>

</html>