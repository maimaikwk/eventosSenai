<?php

session_start();

session_destroy();

header("Location: remocao.php");