<?php

use PHPUnit\Framework\TestCase;

class ParenthesisCheckTest extends TestCase
{
	public function testParenthesis()
	{
		$this->assertEquals(true, isParenthesisValid());
	}
}