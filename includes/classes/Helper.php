<?php 

class Helper { 

    public function passwordsMatch($pw1, $pw2) {
        if (!(is_string($pw1) && (is_string($pw2))))
            return false;

        if ($pw1 === $pw2)
            return true;

        return false;
    }

    public function isValidLength($str, $min=8, $max=20) {
        if (!is_string($str))
            return false;

        $length = strlen($str);

        if ($length < $min)
            return false;
        else if ($length > $max)
            return false;

        return true;
    }

    public function isEmpty($postValues) {
        foreach ($postValues as $value) {
            if ((is_string($value)) && $value === "")
                return true;
        }
        return false;
    }

    public function isSecure($pw) {
        if (!is_string($pw))
            return false;

        $lowPattern = "/[a-z]+/";
        $upPattern = "/[A-Z]+/";
        $digitPattern = "/\d+/";

        if (preg_match($lowPattern, $pw) && preg_match($upPattern, $pw) && preg_match($digitPattern, $pw))
            return true;

        return false;
    }

    public function keepValues($val, $type, $attr="") {
        if (!(is_string($val) && is_string($type) && is_string($attr)))
            return null;

        switch ($type) {
            case "textbox" :
                echo "value = '$val'";
                break;
            case "textarea" :
                echo $val;
                break;
            case "select" :
                if ($val === $attr)
                    echo "selected";
                break;
            default :
                echo "";
        }
    }

    public function extract(string $content, int $limit = 10) {    
        if (strlen($content) <= $limit)
            return $content;

        $cut = strpos($content, ' ', $limit);   
        return substr($content, 0, $cut);
    }
}