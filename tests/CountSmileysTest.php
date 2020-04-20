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
    /**
     * @test
     * @dataProvider check
     */
    public function it_returns_only_valid_smileys($expected, $data)
    {
        $counter = new CountSmileys;

        $this->assertEquals($expected, $counter->count($data));
        $this->assertEquals($expected, $counter->countWithRegex($data));
    }

    public function check()
    {
        return [
            [0, []],
            [2, [':)', ';(', ';}', ':-D']],
            [1, [';]', ':[', ';*', ':$', ';-D']],
            [2, [':)',':(',':D',':O',':;']],
            [3, [':-)',';~D',':-D',':_D']],
            [1, [':---)','))',';~~D',';D']],
            [3, [';~)',':)',':-)',':--)']],
            [0, [':o)',':--D',';-~)']]
        ];
    }
}
