<?php include_once('PDO.php');
ini_set('display_errors', 1); ?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Vivify Blog</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
        integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="styles/blog.css" rel="stylesheet">
    <link href="styles/styles.css" rel="stylesheet">
</head>


<?php include('header.php'); ?>


<?php

$sql = "SELECT * FROM posts WHERE posts.id = {$_GET['id']}";
$singlePost = getDataFromServer($sql,  $connection, false);

$sql_comments = "SELECT * FROM comments WHERE post_id = {$_GET['id']}";
$comments = getDataFromServer($sql_comments,  $connection, true);

?>

<main role="main" class="container">
    <div class="row">
        <div class="col-sm-8 blog-main">
            <div class="blog-post">
                <a href="" class="">
                    <h2 class="blog-post-title"><?php echo $singlePost['title'] ?> </h2>
                </a>

                <p class="blog-post-meta"><?php date_format(date_create($singlePost['created_at']), 'd-F-Y') ?> by
                    <a href="#"><?php echo $singlePost['author'] ?></a>
                </p>
                <p><?php echo $singlePost['body'] ?></p>
            </div>


            <div class="comments">
                <h3>Comments</h3>
                <div class="unordered-list">
                    <ul>
                        <?php
                        foreach ($comments as $comment) {
                        ?>
                        <li class="comment-item">
                            <p> posted by <strong><?php echo $comment['author'] ?></strong>:
                                <p>
                                    <p><?php echo $comment['text'] ?>
                                        <p>
                        </li>
                        <hr>
                        <?php } ?>
                    </ul>
                </div>
            </div>

            <nav class="blog-pagination">
                <a class="btn btn-outline-primary" href="#">Older</a>
                <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
            </nav>

        </div>
        <?php include('sidebar.php'); ?>
    </div>

</main>
<?php include('footer.php'); ?>