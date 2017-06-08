<?php
include 'header.php';

if (count($_POST) === 3) {
    $servername = "localhost";
    $username = "root";
    $password = "123456";

    $conn = new mysqli($servername, $username, $password, 'web');
    if ($conn->connect_errno) {
        echo '<h1>Помилка підключення до MySQL</h1>';
    }

    $name = $_POST['name'];
    if (!$name) {
        echo '<h1 class="text-center text-danger">Поле І\'мя обов\'язкове для вводу </h1>';
    }

    $email = $_POST['email'];
    if (!$email) {
        echo '<h1 class="text-center text-danger">Поле Email обов\'язкове для вводу </h1>';
    }

    $message = $_POST['message'];
    if (!$message) {
        echo '<h1 class="text-center text-danger">Поле Повідомлення обов\'язкове для вводу </h1>';
    }


    if ($name && $email && $message) {
        $posted = new DateTime();
        $result = mysqli_query($conn, sprintf(
            "INSERT INTO posts (name, email, message, posted) VALUES ('%s', '%s', '%s', '%s')",
            $_POST['name'], $_POST['email'], $_POST['message'], $posted->format('Y-m-d')
        ));

        if ($result) {
            echo '<h1 class="text-center text-primary">Пост доданий</h1>';
        } else {
            echo '<h1 class="text-center text-danger">Помилка</h1>';
        }
    }
}
?>

<div class="container">
    <div class="row">
        <div class="col-xs-6 col-xs-offset-3">
            <form action="add.php" class="form-horizontal" method="POST">
                <div class="input-group form-group">
                    <label class="input-group-addon">Ім'я</label>
                    <input name="name" class="form-control" type="text" placeholder="Введіть ім'я">
                </div>

                <div class="input-group form-group">
                    <label class="input-group-addon">Email</label>
                    <input name="email" class="form-control" type="email" placeholder="Введіть email">
                </div>

                <div class="input-group form-group">
                    <label class="input-group-addon">Повідомлення</label>
                    <textarea name="message" class="form-control"
                              rows="4" placeholder="Введіть повідомлення"></textarea>
                </div>

                <div class="form-group text-center">
                    <button class="btn btn-success" type="submit">Додати</button>
                    <a href="list.php" class="btn btn-primary" type="submit">Переглянути повідомлення</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include 'footer.php';
$conn->close();
?>