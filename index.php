<?php
include 'header.php'; ?>

<body>
<form class="form-block" action="add.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
    <div class="form-group">
        <label for="inputFile">File upload</label>
        <input type="file" id="inputFile" name="upload[]" multiple="multiple">
    </div>
    <button type="submit" class="btn btn-default" name="submit">send</button>
</form>

</body>
</html>