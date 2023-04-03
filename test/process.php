<?php
    $text = trim($_POST['name']);
    $textAr = explode("\n", $text);
    $textAr = array_filter($textAr, 'trim'); // remove any extra \r characters left behind

    foreach ($textAr as $txt) {
        foreach(file('data/replace.txt') as $line) {
            $old = explode('=', $line)[0];
            $new = str_replace(array("\r", "\n"), '', (explode('=', $line)[1]));
            $txt = str_replace($old, $new, $txt);
        }
        echo $txt;
    } 
    // echo 'Câu cũ: '.$_POST['name'].'<br>';
?>


