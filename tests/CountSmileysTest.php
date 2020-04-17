<?php

/*
Given an array as an argument complete the function that should return the total number of smiling faces.
Rules for a smiling face:
- Each smiley face must contain a valid pair of eyes. Eyes can be marked as : or ;
- A smiley face can have a nose but it does not have to. Valid characters for a nose are - or ~
- Every smiling face must have a smiling mouth that should be marked with either ) or D.
No additional characters are allowed except for those mentioned.

Valid smiley face examples:
:) :D ;-D :~)

Invalid smiley faces:
;( :> :} :]

 */

use App\CountSmileys;
use PHPUnit\Framework\TestCase;

class CountSmileysTest extends TestCase
{
    /** @test */
    public function it_works()
    {
        $counter = new CountSmileys;

        $this->assertEquals(0, $counter->count([]));
        $this->assertEquals(4, $counter->count([':D',':~)',';~D',':)']));
        $this->assertEquals(2, $counter->count([':)',':(',':D',':O',':;']));
        $this->assertEquals(1, $counter->count([';]', ':[', ';*', ':$', ';-D', ':))']));
    }
}
