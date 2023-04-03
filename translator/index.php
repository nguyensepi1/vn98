<?php

$txt = $_POST['text'];

// Mở và đọc data
$freplace = fopen("./txt/replace.txt", "r");
$fname = fopen("./txt/name.txt", "r");
$fsau_name = fopen("./txt/sau_name.txt", "r");
$ftruoc_name = fopen("./txt/truoc_name.txt", "r");
$fluat_nhan = fopen("./txt/luat_nhan.txt", "r");
$fxung_ho = fopen("./txt/xung_ho.txt", "r");

// Tạo mảng trống
$replace= [];
$name = [];
$name2 = [];
$truoc_name = [];
$truoc_name2 = [];
$sau_name = [];
$sau_name2 = [];
$luat_nhan = [];
$xung_ho = [];
$xung_ho2 = [];
$number = [];

// Lọc data theo thứ tự dài -> ngắn
while(!feof($freplace)){
    $line = fgets($freplace);
    array_push($replace, str_replace("\n", "", $line));
}
while(!feof($fname)){
    $line = fgets($fname);
    array_push($name, str_replace("\n", "", $line));
}
while(!feof($ftruoc_name)){
    $line = fgets($ftruoc_name);
    array_push($truoc_name, str_replace("\n", "", $line));
}
while(!feof($fsau_name)){
    $line = fgets($fsau_name);
    array_push($sau_name, str_replace("\n", "", $line));
}
while(!feof($fluat_nhan)){
    $line = fgets($fluat_nhan);
    array_push($luat_nhan, str_replace("\n", "", $line));
}
while(!feof($fxung_ho)){
    $line = fgets($fxung_ho);
    array_push($xung_ho, str_replace("\n", "", $line));
}

// Điền data đã lọc vào mảng trống đã tạo trước đó


usort($replace, 'usesort');
usort($name, 'usesort');
usort($truoc_name, 'usesort');
usort($sau_name, 'usesort');
usort($luat_nhan, 'usesort');
usort($xung_ho, 'usesort');

preg_match_all('/\d+/', $txt, $matches);
$number = $matches[0];
usort($number, 'usesort');

function usesort($a, $b) {
    return strlen($b)-strlen($a);
}

// Sắp xếp câu
foreach ($replace as $rp) {
    if (strpos($rp, ' ') !== false && strpos($rp, '=') !== false) {
        $old = explode('=', $rp)[0];
        $new = explode('=', $rp)[1];
        $txt = str_replace(lcfirst(substr($old, 0, 1)).substr($old, 1), $new, $txt);
        $txt = str_replace(ucfirst(substr($old, 0, 1)).substr($old, 1), $new, $txt);
    }
}

// Chuẩn bị trước, lọc những Name, Trước Name, Sau Name cần sử dụng, rồi lưu vào biến riêng
foreach ($name as $i) {
    if (strpos($txt, $i) !== false) {
        array_push($name2, $i);
    }
}

foreach ($truoc_name as $i) {
    if (strpos($txt, explode('*', $i)[0]) !== false) {
        array_push($truoc_name2, $i);
    }
}

foreach ($sau_name as $i) {
    if (strpos($txt, $i) !== false) {
        array_push($sau_name2, $i);
    }
}

// Các cấu trúc khác
foreach ($xung_ho as $j) {
    // Cấu trúc: Đã + ... = Nếu + ... + đã
    $txt = str_replace("Đã $j", "Nếu $j đã", $txt);
    $txt = str_replace("đã $j", "nếu $j đã", $txt);

    // Cấu trúc: ... + khả năng = có thể + ... + đã
    $txt = str_replace("$j khả năng", "có thể $j đã", $txt);

    // Cấu trúc: ... + sợ rằng = sợ rằng + ...
    $txt = str_replace("$j sợ rằng", "sợ rằng $j", $txt);

    // Cấu trúc: Hiện tại + ... = Bây giờ + ... + đang
    $txt = str_replace("Hiện tại $j", "Bây giờ $j đang", $txt);
    $txt = str_replace("hiện tại $j", "bây giờ $j đang", $txt);

    // Cấu trúc: ... + nếu như = Nếu như + ...
    $txt = str_replace("$j nếu như", "nếu như $j", $txt);
}

foreach ($number as $j) {
    $txt = str_replace("kinh nghiệm $j điểm", "$j điểm kinh nghiệm", $txt);
    $txt = str_replace("hồn tinh $j viên", "$j viên hồn tinh", $txt);

    // đổi vạn
    if ((int)$j < 100) {
        $txt = str_replace("$j vạn", (string)((int)$j * 10) . " ngàn", $txt);
    } elseif ((int)$j % 100 == 0) {
        $txt = str_replace("$j vạn", (string)((int)$j / 100) . " triệu", $txt);
    } else {
        $txt = str_replace("$j vạn", floor((string)((int)$j / 100)) . " triệu " . (string)((int)$j % 100) . "0 ngàn", $txt);
    }

    // đổi ức
    if ((int)$j < 10) {
        $txt = str_replace("$j ức", (string)((int)$j * 100) . " triệu", $txt);
    } elseif ((int)$j % 10 == 0) {
        $txt = str_replace("$j ức", (string)((int)$j / 10) . " tỷ", $txt);
    } else {
        $txt = str_replace("$j ức", floor((string)((int)$j / 10)) . " tỷ " . (string)((int)$j % 10) . "00 triệu", $txt, $txt);
    }
}

foreach ($name2 as $i) {
    // Đổi Name X Number = Number viên Name
    foreach ($number as $j) {
        $txt = str_replace($i . " × " . $j, $j . " viên " . $i, $txt);
        $txt = str_replace($i . " ×" . $j, $j . " viên " . $i, $txt);
    }

    // Tìm Name cùng Name, Name Name
    foreach ($name2 as $j) {
        if (strpos($txt, $i . " cùng " . $j) !== false) {
            $txt = str_replace($i . " cùng " . $j, $i . " và " . $j, $txt);
            $i = $i . " và " . $j;
        }
        
        if (strpos($txt, $i . " " . $j) !== false) {
            $txt = str_replace($i . " " . $j, $j . " của " . $i, $txt);
            $i = $j . " của " . $i;
        }
    }

    // Luật nhân
    foreach ($luat_nhan as $j) {
        $j1 = explode('=', $j)[0];
        $j1_truoc = explode('{0}', $j1)[0];
        $j1_sau = explode('{0}', $j1)[1];
            
        $j2 = explode('=', $j)[1];
        $j2_truoc = explode('{0}', $j2)[0];
        $j2_sau = explode('{0}', $j2)[1];
            
        $txt = str_replace(ucfirst(substr($j1_truoc, 0, 1)).substr($j1_truoc, 1) . $i . $j1_sau, $j2_truoc . $i . $j2_sau, $txt);
        $txt = str_replace(lcfirst(substr($j1_truoc, 0, 1)).substr($j1_truoc, 1) . $i . $j1_sau, $j2_truoc . $i . $j2_sau, $txt);
    }

    foreach ($sau_name2 as $j) {
        foreach ($truoc_name2 as $k) {
            if (strpos($k, '*') === false) {
                $txt = str_replace($j . " " . $i . " " . $k, $k . " " . $i . " " . $j, $txt);
            } else {
                $k = explode('*', $k)[0];       
                $txt = str_replace($j . " " . $i . " " . $k, $k . " của " . $i . " " . $j, $txt);
            }
        }
        $txt = str_replace($j . " " . $i, $i . " " . $j, $txt);
    }

    foreach ($truoc_name2 as $j) {
        if (strpos($j, '*') === false) {
            $txt = str_replace($i . " " . $j, $j . " " . $i, $txt);
        } else {
            $j = explode('*', $j)[0];       
            $txt = str_replace($i . " " . $j, $j . " của " . $i, $txt);
        }
    }
}

// Đổi Nàng -> Cô nếu tích vào ô
if ($_POST['var1'] == 1) {
    $txt = str_replace(' nàng', ' cô', $txt);
    $txt = str_replace('Nàng', 'Cô', $txt);
}

// Auto viết hoa sau dấu "
$txt1 = '';
foreach (explode('"', $txt) as $i) {
    if ($i != '') {
        $res = '"' . strtoupper($i[0]) . substr($i, 1);
        $txt1 .= $res;
    }
}

// Đổi hội thoại
$txt1 = str_replace('."', ".\n", $txt1);
$txt1 = str_replace('!"', "!\n", $txt1);
$txt1 = str_replace('?"', "?\n", $txt1);
$txt1 = str_replace('~"', "~\n", $txt1);
$txt1 = str_replace('~ "', "~\n", $txt1);
$txt1 = str_replace(': "', ":\n- ", $txt1);
$txt1 = str_replace(', "', ":\n- ", $txt1);
$txt1 = str_replace("\n\"", "\n- ", $txt1);
// $txt1 = str_replace(ucfirst(explode("\n", $txt1)[0]), ucfirst(explode("\n", $txt1)[0]), $txt1);

// Xóa hàng thừa
$txt1 = str_replace("\n\n", "\n", $txt1);
$txt1 = str_replace("\n \n", "\n", $txt1);

// Auto viết hoa đầu dòng
$txt2 = '';
foreach (explode("\n", $txt1) as $i) {
    if ($i != '') {
        if ($i[0] == ' ') {
            $res = strtoupper($i[1]) . substr($i, 2) . "\n";
        } else {
            $res = strtoupper($i[0]) . substr($i, 1) . "\n";
        }
        $txt2 .= $res;
    }
}

// Auto viết hoa đầu câu
$txt3 = '';
foreach (explode('? ', $txt2) as $i) {
    if ($i != '') {
        $res = '? ' . strtoupper($i[0]) . substr($i, 1);
        $txt3 .= $res;
    }
}
$txt4 = '';
foreach (explode('! ', $txt3) as $i) {
    if ($i != '') {
        $res = '! ' . strtoupper($i[0]) . substr($i, 1);
        $txt4 .= $res;
    }
}
$txt5 = '';
foreach (explode('. ', $txt4) as $i) {
    if ($i != '') {
        $res = '. ' . strtoupper($i[0]) . substr($i, 1);
        $txt5 .= $res;
    }
}

$txt5 = str_replace('. ! ? "', '', $txt5);  
// In ra kết quả
echo $txt5;
?>