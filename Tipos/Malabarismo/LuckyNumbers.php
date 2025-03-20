<?php

class LuckyNumbers
{
    //Task 1: Calcular la suma de los números de las 
    //máquina tragamonedas
    //Uno de los juegos en el sitio web de Kojos parece una máquina tragamonedas con dos grupos de ruedas con dígitos. 
    // Cada grupo de dígitos representa un número. Para la mecánica del juego, Kojo necesita saber la suma de esos 
    // dos números.

    //Escriba un método sumUpque acepte dos matrices como parámetros. Cada matriz consta de uno o más dígitos entre 0 y 9
    // . La función debe interpretar cada matriz como un número y devolver la suma de ambos.

    //$lucky_numbers = new LuckyNumbers()

    //$lucky_numbers->sumUp([1, 2, 3], [0, 7]);
    //=> 130

    // [1, 2, 3] represents 123 and [0, 7] represents 7.
    // 123 + 7 = 130
    public function sumUp(array $number1, array $number2): int
    {
        $num1 = (int)implode($number1);
        $num2 = (int)implode($number2);
        return $num1 + $num2;

    }
  
       
    
//Task 2 : Validar si un número es palíndromo
//Un número palíndromo es un número que se lee igual de adelante hacia atrás que de atrás hacia adelante.
    public function isPalindrome(int $number): bool
    {
        $numR = strrev((string)$number);
        if($number == $numR){
            return true;
        }
        return false;
        //throw new \BadFunctionCallException("Implement the function");
    }

    //En varias partes del sitio web, hay campos de entrada donde los usuarios pueden introducir números y 
    //hacer clic en un botón para activar una acción. Kojo quiere mejorar la experiencia del usuario en su sitio. Quiere mostrar un mensaje de error si el usuario hace clic en el botón pero el campo contiene un valor de entrada no válido.

//Aquí hay más información sobre cómo se proporciona el valor de un campo de entrada.

//Si el usuario escribe algo en un campo, el valor asociado siempre es una cadena, incluso 
// si el usuario solo escribe números.
//Si el usuario escribe algo pero lo borra nuevamente, la variable será una cadena vacía.
//Antes de que el usuario comience a escribir, la variable será una cadena vacía.
//Escriba una función validateque acepte la entrada del usuario como parámetro. Si el usuario no 
//proporcionó ninguna entrada, debe devolver [ validate<sub> 'Required field'
//[ ...'Must be a whole number larger than 0'
    public function validate(string $input): string
    {
        if($input == "" || $input == null){
            return "Required field";
        }
        if(!is_numeric($input) && !strpos($input, "-")  || $input <= 0 ){
            return "Must be a whole number larger than 0";
        }if( strpos($input, "-")){
            return "";
        }
        else{
            return "";
        }

        //throw new \BadFunctionCallException("Implement the function");
    }
}
