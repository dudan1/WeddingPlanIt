<?php
session_start();
if (!IsSet($_SESSION["name"]))
    header("Location:index.php");

?>

<?php  if (count($errors) > 0) : ?>
    <div class="msg">
        <?php foreach ($errors as $error) : ?>
            <span><?php echo $error ?></span>
        <?php endforeach ?>
    </div>
<?php  endif ?>