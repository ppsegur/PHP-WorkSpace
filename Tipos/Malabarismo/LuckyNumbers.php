<?php

class LuckyNumbers
{
    //Task 1: Calcular la suma de los números de las 
    //máquina tragamonedas
    public function sumUp(string $number1, string $number2): int
    {
        $digitsOfNumber1 = str_split($number1);
        $digitsOfNumber2 = str_split($number2);

        $sum = 0;
        foreach (array_map('intval', $digitsOfNumber1) as $digit) {
            $sum += $digit;
        }
        foreach (array_map('intval', $digitsOfNumber2) as $digit) {
            $sum += $digit;
        }

        return $sum;
    }
  
       
    

    public function isPalindrome(int $number): bool
    {
        throw new \BadFunctionCallException("Implement the function");
    }

    public function validate(string $input): string
    {
        throw new \BadFunctionCallException("Implement the function");
    }
}
