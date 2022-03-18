<?php include('PDO.php'); ?>
<?php
if (isset($_POST['submit-author'])) {
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $gender = $_POST['gender'];
    if (empty($firstName) || empty($lastName) || empty($gender)) {
        echo ("Something is not filled");
        return;
    } else {
        $sqlCreateAuthor = "INSERT INTO author (firstName, lastName, gender) 
        VALUES('$firstName', '$lastName', '$gender')";
        setDataToServer($sqlCreateAuthor, $connection);
    };
}

?>


<?php include 'header.php' ?>
<main role="main" class="container">
    <div class="row">
        <div class="col-sm-8 blog-main">
            <form class="create-author-form" action="create-author.php" method="post">
                <h4>Create new author</h4>
                <input type="text" name="firstname" id="firstname" placeholder="Add first name" required>
                <input type="text" name="lastname" id="lastname" placeholder="Add last name" required>
                <div class='new-author-gender'>
                    <input type="radio" name="gender" value='M' id="m">
                    <label for="m">Male</label>
                    <input type="radio" name="gender" value='F' id="f">
                    <label for="f">Female</label>
                </div>
                <input type="submit" name="submit-author" value="Add new author">
        </div>
        <?php include 'sidebar.php' ?>
    </div>
</main>

<?php include('footer.php'); ?>