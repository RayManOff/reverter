<?php

use PHPUnit\Framework\TestCase;

/**
 * @author Gadel Raymanov <raymanovg@gmail.com>
 */
final class ReverterTest extends TestCase
{
    public function testReversePunctuationMarks() : void
    {
        $handler = new TextHandler();
        $this->assertEquals(
            'Привет? Как дела!',
            $handler->revertPunctuationMarks('Привет! Как дела?')
        );
        $this->assertEquals(
            '1?2!3.4,5:',
            $handler->revertPunctuationMarks('1:2,3.4!5?')
        );
        $this->assertEquals(
            'Hello? How are you!',
            $handler->revertPunctuationMarks('Hello! How are you?')
        );
        $this->assertEquals(
            'Hi~ Меня зовут Mike^',
            $handler->revertPunctuationMarks('Hi^ Меня зовут Mike~')
        );
    }
}