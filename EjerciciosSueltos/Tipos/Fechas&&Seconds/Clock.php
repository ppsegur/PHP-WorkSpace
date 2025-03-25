<?php
/*
Implementar un reloj que maneje horas sin fechas.
Deberías poder sumarle y restarle minutos.
Dos relojes que representan la misma hora deben ser iguales entre sí.
*/

declare(strict_types=1);

class Clock
{
    public int $hours;
    public int $minutes;

    public function __construct(int $hours, int $minutes = 0)
    {
        $totalMinutes = ($hours * 60 + $minutes) % (24 * 60);
        if ($totalMinutes < 0) {
            $totalMinutes += 24 * 60;
        }

        $this->hours = intdiv($totalMinutes, 60);
        $this->minutes = $totalMinutes % 60;
    }

    public function __toString(): string
    {
        return sprintf("%02d:%02d", $this->hours, $this->minutes);
    }

    public function add(int $minutes): Clock
    {
        return new Clock($this->hours, $this->minutes + $minutes);
    }

    public function sub(int $minutes): Clock
    {
        return new Clock($this->hours, $this->minutes - $minutes);
    }

    public function equals(Clock $clock): bool
    {
        return $this->hours === $clock->hours && $this->minutes === $clock->minutes;
    }
}
?>
