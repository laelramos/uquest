<?php
// functions.php

function getInitials($name)
{
    $words = explode(' ', $name);
    $initials = '';

    // If the name is a single word, use the first two letters
    if (count($words) == 1) {
        $initials = strtoupper(substr($name, 0, 2));
    } else {
        // For names with more than one word, use the first letter of each word
        foreach ($words as $word) {
            $initials .= strtoupper($word[0]);
        }
    }
    return $initials;
}
