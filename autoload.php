<?php
spl_autoload_register(
function ($classename)
{
    include  strtolower($classename).".class.php" ;
}

);