<?php include('PDO.php'); ?>

<?php

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $body = $_POST['body'];
    $author = $_POST['author_id'];
    $createdAt = $_POST['created_at'];
    if (empty($title) || empty($body) || empty($author)) {
        echo ("Something is not filled");
        return;
    } else {
        $sqlCreateNewPost = "INSERT INTO posts 
       (title, body, author_id, created_at) VALUES('$title', '$body', '$author', '$createdAt')";
        setDataToServer($sqlCreateNewPost, $connection);
    };
}

$sqlGetAuthors = "SELECT * FROM author";
$authors = getDataFromServer($sqlGetAuthors, $connection, true);
?>


<?php include('header.php'); ?>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Vivify Blog</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="styles/blog.css" rel="stylesheet">
    <link href="styles/styles.css" rel="stylesheet">
</head>


<main role="main" class="container">
    <div class="row">
        <div class='col-sm-8 blog-main'>
            <form class='create-post-form' action="create-post.php" method="post">
                <h3>Create new post</h3>
                <br>
                <label for="author">Choose an author:</label>
                <select name="author_id" id="" required>
                    <?php foreach ($authors as $author) { ?>
                        <option value="<?php echo $author['id'] ?>"><?php echo "{$author['firstName']} {$author['lastName']}" ?></option>
                    <?php } ?>
                </select>
                <input type="text" name="title" id="" placeholder="Add post title" required></input>
                <input type="date" id="date" name="created_at" placeholder="Add date"></input>
                <textarea name="body" id="" cols="70" rows="10" placeholder="Write post text here" required></textarea>
                <br>
                <input type="submit" name="submit" value="Add new post">
            </form>
        </div>
        <?php include 'sidebar.php' ?>
    </div>
</main>

<?php include('footer.php'); ?>