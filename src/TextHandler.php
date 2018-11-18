<?php

/**
 * @author Gadel Raymanov <raymanovg@gmail.com>
 */
class TextHandler
{
    public function revertPunctuationMarks(string $text) : string
    {
        $marks = $this->getPunctuationMarks($text);
        if (empty($marks)) {
            return $text;
        }

        $marksPositions = $this->getCharPositions($text, $marks);
        $reversedMarks = array_combine($marksPositions, array_reverse($marks));

        foreach ($reversedMarks as $position => $mark) {
            $text[$position] = $mark;
        }

        return $text;
    }

    public function getCharPositions(string $text, array $chars) : array
    {
        $positions = [];
        for ($i = 0; $i < strlen($text); $i++) {
            if (in_array($text[$i], $chars)) {
                $positions[] = $i;
            }
        }

        return $positions;
    }

    public function getPunctuationMarks(string $text) : array
    {
        static $pattern = '/[^\w\s\d]/u';

        if (!preg_match_all($pattern, $text, $matches)) {
            return [];
        }

        return $matches[0];
    }
}