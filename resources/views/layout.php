<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show page</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="/public/css/app.css">
</head>
<body>

<?php include "navigation.php"; ?>


<div class="container">

    <?php include $file . '.php' ?>

</div>


<script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script>
    $('input[type="checkbox"]').click(function () {
        id = $(this).data('id');
        checked = $(this).prop('checked');

        $.post('/update/' + id, {
                done: +checked
            }, function (res) {
                console.log(res)
            }
        );
    });

    $('#task_text').change(function () {
        id = $(this).data('id');
        text = $(this).val();

        $.post('/update/' + id, {
                text: text
            }, function (res) {
                console.log(res)
            }
        );
    });
</script>
<?php if (file_exists(__DIR__ . '/../assets/js/' . $file . '.js')) : ?>
    <script src="/resources/assets/js/<?= $file ?>.js"></script>
<?php endif; ?>
</body>
</html>