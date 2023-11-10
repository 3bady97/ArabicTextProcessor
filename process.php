<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $text = $_POST['text'];
    if (empty($text)) {
        echo "النص فارغ!";
    } else {
        echo removeDots($text);
    }
}

function removeDots($text) {
    $search = array('ب', 'ت', 'ث', 'ج', 'ح', 'خ', 'د', 'ذ', 'ر', 'ز', 'س', 'ش', 'ص', 'ض', 'ط', 'ظ', 'ع', 'غ', 'ف', 'ق', 'ك', 'ل', 'م', 'ن', 'ه', 'ة', 'و', 'ي');
    $replace = array('ٮ', 'ٮ', 'ٮ', 'ح', 'ح', 'ح', 'د', 'د', 'ر', 'ر', 'س', 'س', 'ص', 'ص', 'ط', 'ط', 'ع', 'ع', 'ڡ', 'ٯ', 'ك', 'ل', 'م', 'ں', 'ه', 'ه', 'و', 'ى');
   
   // تقسيم النص إلى كلمات
    $words = explode(' ', $text);

    // تعديل الكلمات
    foreach ($words as &$word) {
        // استبدال النقاط فقط على حرف "ن" عندما يكون متصلاً بحرف آخر
        $word = preg_replace('/ن(?=[^ ])/u', 'ٮ', $word);
    }

    // إعادة تجميع النص بعد التعديل
    $text = implode(' ', $words);

    // تنفيذ الاستبدال الباقي
    return str_replace($search, $replace, $text);
}

?>
