<?php

use PHPUnit\Framework\TestCase;

class ParenthesisCheckTest extends TestCase
{
	public function testCorrectCases()
	{
		$this->assertTrue(isParenthesisValid('Hello there'));
		$this->assertTrue(isParenthesisValid('Hello (there)'));
		$this->assertTrue(isParenthesisValid('Hello (th[e]re)'));
		$this->assertTrue(isParenthesisValid('Hello (t<h[e]r>e)'));
	}

	public function testEmptyStringThrowsException()
	{
		$this->expectException(InvalidArgumentException::class);
		isParenthesisValid('');
	}

	public function testOddParenthesisAmount()
	{
		$this->assertFalse(isParenthesisValid('Hello (there'));
		$this->assertFalse(isParenthesisValid('Hello (th[ere)'));
		$this->assertFalse(isParenthesisValid('Hello (th[ere]'));
		$this->assertFalse(isParenthesisValid('Hello <there]'));
	}

	public function testParenthesisOrder()
	{
		$this->assertFalse(isParenthesisValid('Hello )there('));
		$this->assertFalse(isParenthesisValid('Hello (th[e)re]'));
		$this->assertFalse(isParenthesisValid('Hello (t<h[e)r>e]'));
		$this->assertFalse(isParenthesisValid('Hello >(th)er<[e]'));
	}
}