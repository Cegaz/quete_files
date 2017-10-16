<?php
include 'header.php';

$nbFiles = count($_FILES['upload']['name']);

for ($i = 0; $i < $nbFiles; $i++) {
    if ($_FILES['upload']['error'][$i] == 2) { ?>

    <div class="alert alert-danger text-center" role="alert">File '<?php echo $_FILES['upload']['name'][$i]; ?>' is too heavy (1 Mo max).
        <a href="index.php">
            <button type="button" class="btn btn-default">Back to form</button>
        </a>
    </div>

        <?php
    } elseif ($_FILES['upload']['type'][$i] != 'image/jpg' &&
        $_FILES['upload']['type'][$i] != 'image/png' &&
        $_FILES['upload']['type'][$i] != 'image/jpeg' &&
        $_FILES['upload']['type'][$i] != 'imag/gif') { ?>

    <div class="alert alert-danger text-center" role="alert">Seuls les formats .jpg .png et .gif sont acceptés.
        <div>
            <a href="index.php">
                <button type="button" class="btn btn-default">Back to form</button>
            </a>
        </div>
    </div>

        <?php
    } else {
        $tmpFile = $_FILES['upload']['tmp_name'][$i];
        switch($_FILES['upload']['type'][$i]) {
            case 'image/png':
                $extension = '.png';
                break;
            case 'image/jpg':
                $extension = '.jpg';
                break;
            case 'image/jpeg':
                $extension = '.jpeg';
                break;
            case 'image/gif':
                $extension = '.gif';
                break;
        }

        $destination = 'img/' . 'image' . date('dmYHis') . $extension;
        if (move_uploaded_file($tmpFile, $destination)) { ?>

        <div class="alert alert-success text-center" role="alert">Transfer of <?php echo $_FILES['upload']['name'][$i]; ?> succeeded !</div>

            <?php
        } else { ?>

            <div class="alert alert-danger" role="alert">Transfer of <?php echo $_FILES['upload']['name'][$i]; ?> failed</div>

            <?php }
    }
} ?>

<div>
    <a href="list.php">
        <button type="button" class="btn btn-primary btn-lg margin">See uploaded files</button>
    </a>
</div>