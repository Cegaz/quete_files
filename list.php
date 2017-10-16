<?php
include 'header.php';

if(isset($_GET['delete'])) { ?>
    <div class="alert alert-danger text-center" role="alert"><?php echo $_GET['delete']; ?> has been deleted</div>

<?php }
$directory = 'img/';
$list = scandir($directory); ?>

<div class='row'>

    <?php
for ($i = 2; $i < count($list); $i++) { ?>

    <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <img src="<?php echo $directory . $list[$i]; ?>" alt="picture">
            <div class="caption text-center">
                <h3><?php echo $list[$i]; ?></h3>
                <a href="delete.php?file=<?php echo $list[$i]; ?>">
                    <button type="button" class="btn btn-default">DELETE</button>
                </a>
            </div>
        </div>
    </div>

<?php
} ?>

</div>
<div>
    <a href="index.php">
        <button type="button" class="btn btn-primary btn-lg margin">Upload more files</button>
    </a>
</div>