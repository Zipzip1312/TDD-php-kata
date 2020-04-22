<?php

/*
String Calculator (https://osherove.com/tdd-kata-1)

1. Create a simple String calculator with a method signature: add (string $numbers)

The method can take up to two numbers, separated by commas, and will return their sum.
for example "" or "1" or "1,2" as inputs.
(for an empty string it will return 0)

2. Allow the Add method to handle an unknown amount of numbers

3. Allow the Add method to handle new lines between numbers (instead of commas).
- the following input is ok: "1\n2,3" (will equal 6)
- the following input is NOT ok: "1,\n" (not need to prove it - just clarifying)

4. Support different delimiters
- to change a delimiter, the beginning of the string will contain a separate line that looks like this: "//[delimiter]\n[numbers…]" for example "//;\n1;2" should return three where the default delimiter is ‘;’ .
- the first line is optional. all existing scenarios should still be supported

5. Calling Add with a negative number will throw an exception "negatives not allowed" - and the negative that was passed.
- if there are multiple negatives, show all of them in the exception message.

6. Numbers bigger than 1000 should be ignored, so adding 2 + 1001 = 2

 */

use App\StringCalculator;
use PHPUnit\Framework\TestCase;

class StringCalculatorTest extends TestCase
{
    /** @test */
    public function it_evaluates_an_empty_string_as_0()
    {
        $calculator = new StringCalculator;

        $this->assertSame(0, $calculator->add(''));
    }

    /** @test */
    public function it_finds_the_sum_of_a_single_number()
    {
        $calculator = new StringCalculator;

        $this->assertSame(1, $calculator->add('1'));
    }

    /** @test */
    public function it_finds_the_sum_of_any_amount_of_numbers()
    {
        $calculator = new StringCalculator;

        $this->assertSame(17, $calculator->add('5,5,4,3'));
    }

    /** @test */
    public function it_accepts_a_new_line_as_a_dilimiter()
    {
        $calculator = new StringCalculator;

        $this->assertSame(10, $calculator->add('5\n5'));
    }

    /** @test */
    public function negative_numbers_are_not_allowed()
    {
        $calculator = new StringCalculator;

        $this->expectException(\Exception::class);

        $calculator->add('5,-5');
    }

    /** @test */
    public function numbers_greater_than_1000_ignored()
    {
        $calculator = new StringCalculator;

        $this->assertSame(10, $calculator->add('5,5,1001,1002'));
    }

    /** @test */
    public function it_supports_custom_dilimiters()
    {
        $calculator = new StringCalculator;

        $this->assertSame(9, $calculator->add('//:\n5:4'));
        $this->assertSame(3, $calculator->add('//;\n1;2'));
    }
}
