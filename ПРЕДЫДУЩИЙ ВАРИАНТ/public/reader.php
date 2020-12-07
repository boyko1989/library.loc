<?php
$title = "Маркдаун";
require_once('view/html/head.php');

$fp = fopen('files/markdown.md', 'r');

if ($fp) {
    while (($mytext = fgets($fp, 4096)) !== false) {
        $pat_h1 = '/^# (.*$)/';
        $repl_h1 = '<h1>$1</h1>';
        $mytext = preg_replace($pat_h1, $repl_h1, $mytext);
        //echo $mytext.'<br>';

        $pat_h2 = '/^## (.*$)/';
        $repl_h2 = '<h2>$1</h2>';
        $mytext = preg_replace($pat_h2, $repl_h2, $mytext);
        
        $pat_h3 = '/^### (.*$)/';
        $repl_h3 = '<h3>$1</h3>';
        $mytext = preg_replace($pat_h3, $repl_h3, $mytext);

        $pat_h4 = '/^#### (.*$)/';
        $repl_h4 = '<h4>$1</h4>';
        $mytext = preg_replace($pat_h4, $repl_h4, $mytext);

        $pat_h5 = '/^##### (.*$)/';
        $repl_h5 = '<h5>$1</h5>';
        $mytext = preg_replace($pat_h5, $repl_h5, $mytext);

        $pat_h6 = '/^###### (.*$)/';
        $repl_h6 = '<h6>$1</h6>';
        $mytext = preg_replace($pat_h6, $repl_h6, $mytext);

        $pat_hr = '/^---/';
        $repl_hr = '<hr>';
        $mytext = preg_replace($pat_hr, $repl_hr, $mytext);
/*
        $ital = '/((?<!\*|\\)\*[^\*\n].+?[^\*|\\]\*(?!\*))|(_.+?_)/';
        $repl_ital = 'БОЛД';
        $mytext = preg_replace($ital, $repl_ital, $mytext);

        
        $ital = '#\*{1}(.*){1}?\*#';
        $repl_ital = '<i>$1</i>';
        $mytext = preg_replace($ital, $repl_ital, $mytext);

        $ital1 = '#\_(.*)\_+#';
        $repl_ital1 = '<i>$1</i>';
        $mytext = preg_replace($ital1, $repl_ital1, $mytext);
        
        $bold = '#\*\*(.*)\*\*#';
        $repl_bold = '<b>$1</b>';
        $mytext = preg_replace($bold, $repl_bold, $mytext);

        $bold_ital = '#\*\*\*(.*)\*\*\*#';
        $repl_bold_ital = '<b><i>$1</i></b>';
        $mytext = preg_replace($bold_ital, $repl_bold_ital, $mytext);

        $bold_ital_2 = '#\*\*\_(.*)\_\*\*#';
        $repl_bold_ital_2 = '<b><i>$1</i></b>';
        $mytext = preg_replace($bold_ital_2, $repl_bold_ital_2, $mytext);*/

        

        echo $mytext.'<br>';
    }
    if (!feof($fp)) {
        echo "Ошибка: fgets() неожиданно потерпел неудачу\n";
    }
    fclose($fp);
}
?>