<?php

/**
 * @param string $input
 *
 * @return bool
 * @throws Exception for empty input
 */

function isParenthesisValid(string $input = ''): bool
{
	if (!$input)
	{
		throw new InvalidArgumentException("Пустая строка :O");
	}

	$possibleParenthesis = ['(', ')', '[', ']', '<', '>']; //константа с возможными символами скобок

	$arrayOfChars = str_split($input); //Разбиение строки на символы
	$parenthesisInOrder = [];

	foreach ($arrayOfChars as $char)
	{
		if (in_array($char, $possibleParenthesis, true)) //достаем скобки из строки
		{
			$parenthesisInOrder[] = $char;
		}
	}
	if (!count($parenthesisInOrder))
	{
		return true; //скобок нет, строка валидна - ранний выход
	}

	if (count($parenthesisInOrder) % 2)
	{
		return false; //Не может быть валидным, если количество скобок нечетное
	}

	$stack = [];
	foreach ($parenthesisInOrder as $parentheses)
	{
		if (
			$parentheses === '('
			|| $parentheses === '['
			|| $parentheses === '<'
		)
		{
			$stack[] = $parentheses; //Если скобка открывающая, добавляем в стак
		}
		else //скобка закрывающая
		{
			if (
				empty($stack) //пустой стак с первой скобкой - закрывающей скобкой это плохо
				//если стак не пустой, проверяем предыдущую скобку
				|| ($parentheses === ')' && $stack[count($stack) - 1] !== '(')
				|| ($parentheses === ']' && $stack[count($stack) - 1] !== '[')
				|| ($parentheses === '>' && $stack[count($stack) - 1] !== '<')
			)
			{
				return false; //скобка не правильная, скобки в строке не валидны
			}
			array_pop($stack); //скобка правильная, выкидываем ее из стака
		}
	}

	return true;
}