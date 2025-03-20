<?php
/*Instrucciones
Dados los nombres de los estudiantes junto con el grado en el que están, 
cree una lista para la escuela.

Al final, deberías poder:

Agregar el nombre de un estudiante a la lista para una calificación:
"Agrega a Jim al grado 2".
"DE ACUERDO."
Obtenga una lista de todos los estudiantes inscritos en un grado:
"¿Qué estudiantes están en 2º grado?"
"Por ahora sólo tenemos a Jim."
Obtenga una lista ordenada de todos los estudiantes de todos los grados. 
Los grados deben ordenarse como 1, 2, 3, etc., y los estudiantes dentro de un 
grado deben ordenarse alfabéticamente por nombre.
"¿Quién está matriculado en la escuela en este momento?"
Déjame pensar. Tenemos a Anna, Barb y Charlie en primer grado, Alex, Peter y 
Zoe en segundo grado, y Jim en quinto grado. Así que la respuesta es: Anna, 
Barb, Charlie, Alex, Peter, Zoe y Jim.
Tenga en cuenta que todos nuestros estudiantes solo tienen un nombre 
(es un pueblo pequeño, ¿qué desea?), y cada estudiante no puede agregarse 
más de una vez a un grado ni a la lista. Si una prueba intenta agregar al 
mismo estudiante más de una vez, su implementación debería indicar que esto 
es incorrecto.


 */


declare(strict_types=1);

class GradeSchool
{
 

    private array $students = [];
    public function add(string $name, int $grade): bool
    {
        if(isset($this->students[$grade]) && in_array($name, $this->students[$grade])){
            return false;
        }
        if(!isset($this->students[$grade])){
            $this->students[$grade] = [];
        }foreach ($this->students as $gradeStudents) {
            if (in_array($name, $gradeStudents)) {
            return false;
            }
        }
        $this->students[$grade][] = $name;
        return true;
        //throw new \BadMethodCallException(sprintf('Implement the %s method', __FUNCTION__));
    }

    public function grade(int $grade): array
    {
        
        $listado= $this->students[$grade] ?? [];
        sort($listado);
        return $listado;
       // throw new \BadMethodCallException(sprintf('Implement the %s method', __FUNCTION__));
    }

    public function roster(): array
    {
        ksort($this->students);
        $students = [];
        foreach($this->students as $grade => $names){
            sort($names);
            $students = array_merge($students, $names);
        }
        return $students;

        //throw new \BadMethodCallException(sprintf('Implement the %s method', __FUNCTION__));
    }
}
?>