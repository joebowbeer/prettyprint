<?php
function pretty($string) {
    function spaces($n) {
        $result = '';
        for ($i = 0, $j = $n * 4; $i < $j; $i++) {
            $result .= ' ';
        }
        return $result;
    }
    $result = '';
    $level = 0;
    $newline = false;
    for ($i = 0, $j = strlen($string); $i < $j; $i++) {
        $c = $string[$i];
        if ($c == '{' || $c == '[') {
            $result .= "\n" . spaces($level++) . $c;
            $newline = true;
        } else if ($c == '}' || $c == ']') {
            $result .= "\n" . spaces(--$level) . $c;
            $newline = true;
        } else if ($c == ',') {
            $result .= $c;
            $newline = true;
        } else {
            if ($newline) {
                $result .= "\n" . spaces($level);
                $newline = false;
            }
            $result .= $c;
        }
    }
    return $result;
}
echo pretty('{"hello":"world!","arr":[1,{"cat":"dog"},"more",false],"obj":{"a":42}}')
?>
