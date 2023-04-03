<?php
$name_new = $_POST["name_new"];

function check($file_txt, $inp, $outp, $add) {
    $content = file($file_txt, FILE_IGNORE_NEW_LINES);
    if (in_array($inp, $content) || in_array($inp."\n", $content)) {
        echo $inp." đã tồn tại trong ".$outp."\n";
    } else {
        echo "Đã thêm ".$inp." vào ".$outp."\n";
        $f = fopen($file_txt, "a");
        fwrite($f, "\n".$add);
        fclose($f);
    }
}

function add_replace_name($name_new) {
    $status = "";
    if (strpos($name_new, "=") != FALSE ) {
        $old = explode('=', $name_new)[0];
        $new = explode('=', $name_new)[1];
        $inp = $name_new;

        check('./txt/replace.txt', $inp, 'Replace', trim($inp));
        // $status .= "Đã thêm " . $inp . " vào file Replace\n";
        check('./txt/name.txt', $new, 'Name', trim($new));
        // $status .= "Đã thêm " . $new . " vào file Names\n";
    } else if (strlen($name_new) > 0) {
        $new = $name_new;
        check('./txt/name.txt', $new, 'Name', trim($new));
        // $status .= "Đã thêm " . $new . " vào file Names\n";
    } else {
        $status = "Vui lòng nhập Name";
    }
    echo $status;
}

add_replace_name($name_new);


?>