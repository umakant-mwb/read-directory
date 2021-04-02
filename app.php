<?php

processDirectory(getcwd());

function processDirectory($dir)
{
    if(is_dir($dir))
    {
        if ($dh = opendir($dir))
        {
            echo "<ul>";
            while (($file = readdir($dh)) !== false)
            {
                if ($file{0} == '.') continue; // skip dirs . and .. by first char test

                if(is_dir($dir."/".$file))
                {
                    echo "Directory:" . $file;
                    processDirectory($dir."/".$file);
                } else{
                    echo "<li>filename:" . $file."</li>";
                }
            }
            closedir($dh);
            echo "</ul>";
        }
    }
}