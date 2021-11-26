<?php include('helpers/db_connection.php') ?>

<?php include('components/header.php') ?>
    
<?php include('components/aside.php') ?>

<?php

    // insert
    if(isset($_POST['action']) && $_POST['action'] == 'insert') {
        $title = isset($_POST['title']) ? $_POST['title'] : '' ;

        if($title) {

            $sql = "INSERT INTO categories (title) VALUES ('$title')";

            if(mysqli_query($conn, $sql)) {
                echo "Record Created";
            } else {
                echo "Error";
            }
        }
    }

?>

<main>
    <div class="container-header">
        <h2>News</h2>
        <a href="" class="btn">Add Category</a>
    </div>
    <div class="content">
        <form action="" method="post">
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="title">
            </div>
            <div class="form-group">
                <input type="hidden" name="action" value="insert">
                <button class="btn submit">Add</button>
            </div>
        </form>
    </div>
</main>

<?php include('components/footer.php') ?>