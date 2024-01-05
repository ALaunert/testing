<?php

/**
 * @param string $input
 *
 * @return bool
 * @throws Exception for empty input
 */

function isParenthesisValid(string $input = ''): bool
{
	return true;
}

// isParenthesisValid('Hello (there)'); //true
// isParenthesisValid('Hello (there'); //false
// isParenthesisValid('Hello )there('); //false
// isParenthesisValid('Hello there'); //true
// isParenthesisValid(''); //Exception
//
// isParenthesisValid('Hello (th[e]re)'); //true
// isParenthesisValid('Hello (th[ere)'); //true
// isParenthesisValid('Hello (th[e)re]'); //true