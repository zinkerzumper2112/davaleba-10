<?php include('helpers/db_connection.php') ?>

<?php include('components/header.php') ?>
    
<?php include('components/aside.php') ?>

<?php


    $sql_categories = "SELECT * FROM categories";
    $result = mysqli_query($conn, $sql_categories);
    $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // insert
    if(isset($_POST['action']) && $_POST['action'] == 'insert') {
        $title = isset($_POST['title']) ? $_POST['title'] : '' ;
        $text = isset($_POST['text']) ? $_POST['text'] : '' ;
        $category_id = isset($_POST['category_id']) ? $_POST['category_id'] : '' ;

        if($title && $text && $category_id) {

            $sql = "INSERT INTO news (title, text, category_id) VALUES ('$title', '$text', '$category_id')";

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
        <a href="" class="btn">Add New</a>
    </div>
    <div class="content">
        <form action="" method="post">
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="title">
            </div>
            <div class="form-group">
                <label for="">Text</label>
                <textarea name="text" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="">Category</label>
                <select name="category_id" id="">
                    <?php foreach($categories as $value): ?>
                    <option value="<?= $value['id'] ?>"><?= $value['title'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <input type="hidden" name="action" value="insert">
                <button class="btn submit">Add</button>
            </div>
        </form>
    </div>
</main>

<?php include('components/footer.php') ?>