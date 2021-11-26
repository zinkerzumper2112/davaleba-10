<?php include('helpers/db_connection.php') ?>

<?php include('components/header.php') ?>

<?php include('components/aside.php') ?>

<?php

// Delete Query
if(isset($_POST['action']) && $_POST['action'] == 'delete'){
    $id = isset($_POST['id']) ? $_POST['id'] : null;

    if($id) {
        $delete_query = "DELETE FROM categories WHERE id = " .$id;

        if(mysqli_query($conn, $delete_query)) {
            echo "Record Deleted";
        } else {
            echo "Error";
        }
    }
}


// SELECT Query
$sql = "SELECT * FROM categories ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
$categories = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<main>
    <div class="container-header">
        <h2>Categories</h2>
        <a href="category_add.php" class="btn">Add New</a>
    </div>
    <div class="content">
        <table>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Actions</th>
            </tr>
            <?php foreach($categories as $value): ?>
                <tr>
                    <td><?= $value['id'] ?></td>
                    <td><?= $value['title'] ?></td>
                    <td class="actions">
                        <a class="edit" href="category_edit.php?id=<?= $value['id'] ?>">Edit</a>
                        <form action="" method="post">
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="id" value="<?= $value['id'] ?>">
                            <button class="delete">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </table>
    </div>
</main>

<?php include('components/footer.php') ?>