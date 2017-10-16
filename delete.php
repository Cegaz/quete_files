<?php

unlink('img/' . $_GET['file']);

header('Location:list.php?delete=' . $_GET['file'] . '"');