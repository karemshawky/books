<?php

function removeStripTagsAndDecode($words)
{
    return strip_tags(html_entity_decode($words));
}

function make_slug($string, $separator = '-')
{
    if (is_null($string)) {
        return "";
    }

    $string = trim($string);
    $string = mb_strtolower($string, "UTF-8");;

    // Make alphanumeric (removes all other characters)
    // this makes the string safe especially when used as a part of a URL
    // this keeps latin characters and arabic charactrs as well
    $string = preg_replace("/[^a-z0-9_\s\-ءاآؤئبپتثجچحخدذرزژسشصضطظعغفقكکگلمنوهی]/u", '', $string);

    // Remove multiple dashes or whitespaces or underscores
    $string = preg_replace("/[\s\-_]+/", ' ', $string);

    // Convert whitespaces and underscore to the given separator
    $string = preg_replace("/[\s_]/", $separator, $string);

    return $string;
}

function word_rev($str)
{
    $r = '';
    for ($i = mb_strlen($str); $i>=0; $i--) {
        $r .= mb_substr($str, $i, 1);
    }
    return $r;
}
