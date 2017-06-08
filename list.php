<?php include 'header.php'; ?>

<?php

$servername = "localhost";
$username = "root";
$password = "123456";

$conn = new mysqli($servername, $username, $password, 'web');

$posts = mysqli_query($conn, 'SELECT * FROM posts');
?>

<div class="container">
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1">

            <div style="margin-bottom: 20px;">
                <a href="add.php" class="btn-primary btn">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>Додати повідомлення</span>
                </a>
            </div>

            <div class="list-group">
                <?php foreach ($posts as $post): ?>
                    <div class="list-group-item" style="margin-top: 20px;">
                        <div class="list-group-item-text">
                            <div style="margin: 10px 0;">
                                <b>Ім'я:</b>
                                <span><?php echo $post['name']; ?></span>
                            </div>
                            <div style="margin: 10px 0;">
                                <b>Email:</b>
                                <span><?php echo $post['email']; ?></span>
                            </div>
                            <div style="margin: 10px 0;">
                                <b>Дата:</b>
                                <span><?php echo $post['posted']; ?></span>
                            </div>
                            <div style="margin: 10px 0;">
                                <b>Повідомлення:</b>
                                <pre><?php echo $post['message']; ?></pre>
                            </div>

                            <a href="delete.php?id=<?php echo $post['id']?>" class="btn btn-danger btn-sm">
                                <i class="glyphicon glyphicon-remove"></i>
                                Видалити повідомлення
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <?php if (count($posts) > 3): ?>
            <div style="margin-top: 20px;">
                <a href="add.php" class="btn-primary btn">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>Додати повідомлення</span>
                </a>
            </div>
            <?php endif ?>
        </div>
    </div>
</div>

<?php

include 'footer.php';
$conn->close();

?>


