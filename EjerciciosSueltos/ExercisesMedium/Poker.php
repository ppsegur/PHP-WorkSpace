<?php
/*
Instrucciones
Elija la mejor mano de poker de entre las cartas dadas.
*/

//Tremendo ejercicio
// logrado  

declare(strict_types=1);

class Poker
{
    public array $bestHands = [];

    private array $AllSets = [
        "StraightF" => [],
        "Four" => [],
        "Full" => [],
        "Flush" => [],
        "Straight" => [],
        "Three" => [],
        "Two" => [],
        "Pair" => [],
        "High" => []
    ];

    private array $sequence = [
        "A" => 1,
        "2" => 2,
        "3" => 3,
        "4" => 4,
        "5" => 5,
        "6" => 6,
        "7" => 7,
        "8" => 8,
        "9" => 9,
        "10" => 10,
        "J" => 11,
        "Q" => 12,
        "K" => 13
    ];

    public function __construct(array $hands)
    {
        $this->bestHands = $this->GetBest($hands);
    }

    private function GetBest(array $hands): array
    {
        $numbers = [];
        $suits = [];
        foreach ($hands as $k => &$l) {
            $l = explode(",", $l);
            foreach ($l as $card) {
                $numbers[$k][] = substr($card, 0, strlen($card) - 1);
                $suits[$k][] = $card[strlen($card) - 1];
            }
        }

        foreach ($hands as $k => $cards) {
            $uniqueNum = array_unique($numbers[$k]);
            $uniqueSu = array_unique($suits[$k]);
            sort($uniqueNum);
            sort($uniqueSu);

            if (count($uniqueSu) === 1 && $this->IsInSequence($numbers[$k])) {
                $this->AddSet("StraightF", $cards, $numbers[$k], $suits[$k]);
            } else if (count($uniqueNum) === 2 && $this->IsValid($numbers[$k], 4)) {
                $this->AddSet("Four", $cards, $numbers[$k], $suits[$k]);
            } else if (count($uniqueNum) === 2 && $this->IsValid($numbers[$k], 3) && $this->IsValid($numbers[$k], 2)) {
                $this->AddSet("Full", $cards, $numbers[$k], $suits[$k]);
            } else if (count($uniqueSu) === 1) {
                $this->AddSet("Flush", $cards, $numbers[$k], $suits[$k]);
            } else if ($this->IsInSequence($numbers[$k])) {
                $this->AddSet("Straight", $cards, $numbers[$k], $suits[$k]);
            } else if (count($uniqueNum) === 3 && $this->IsValid($numbers[$k], 3)) {
                $this->AddSet("Three", $cards, $numbers[$k], $suits[$k]);
            } else if (count($uniqueNum) === 3 && $this->IsValid($numbers[$k], 2, 2)) {
                $this->AddSet("Two", $cards, $numbers[$k], $suits[$k]);
            } else if (count($uniqueNum) === 4 && $this->IsValid($numbers[$k], 2)) {
                $this->AddSet("Pair", $cards, $numbers[$k], $suits[$k]);
            } else if (count($uniqueNum) === 5) {
                $this->AddSet("High", $cards, $numbers[$k], $suits[$k]);
            }
        }

        $final = [];
        foreach ($this->AllSets as $set) {
            if ($set !== []) {
                if (count($set) === 2) {
                    foreach ($set as $s) {
                        $final[] = implode(",", $s);
                    }
                    return $final;
                }
                return [implode(",", $set)];
            }
        }
    }

    private function IsInSequence(array $numbers): bool
    {
        $sequence = $this->sequence;
        if (in_array("K", $numbers)) {
            $sequence["A"] = 14;
        }

        usort($numbers, function ($a, $b) use ($sequence) {
            return $sequence[$a] === $sequence[$b] ? 0 : ($sequence[$a] < $sequence[$b] ? -1 : 1);
        });

        $index = 0;
        for ($i = $sequence[$numbers[0]]; $i < $sequence[$numbers[0]] + count($numbers); $i++) {
            if ($i !== $sequence[$numbers[$index]]) return false;
            $index++;
        }
        return true;
    }

    private function AddSet(string $type, array $cards, array $otherData, array $Newsuite)
    {
        if ($this->AllSets[$type] === []) $this->AllSets[$type] = $cards;
        else {
            $oldSet = $this->AllSets[$type];
            $oldnumbers = [];
            foreach ($oldSet as $l) {
                $oldnumbers[] = substr($l, 0, strlen($l) - 1);
            }

            usort($oldnumbers, function ($a, $b) use ($oldnumbers) {
                $sequence = $this->sequence;
                $CA = count(array_keys($oldnumbers, $a));
                $CB = count(array_keys($oldnumbers, $b));

                if ($CA === 1) {
                    return $sequence[$a] > $sequence[$b] ? -1 : 1;
                }
                if ($CA === $CB) {
                    return $a > $b ? -1 : 1;
                }
                return $CA > $CB ? -1 : 1;
            });
            usort($otherData, function ($a, $b) use ($otherData) {
                $sequence = $this->sequence;
                $CA = count(array_keys($otherData, $a));
                $CB = count(array_keys($otherData, $b));

                if ($CA === 1) {
                    return $sequence[$a] > $sequence[$b] ? -1 : 1;
                }
                if ($CA === $CB) {
                    return $a > $b ? -1 : 1;
                }
                return $CA > $CB ? -1 : 1;
            });

            $se = $this->sequence;
            for ($i = 0; $i < 5; $i++) {
                if ($se[$oldnumbers[$i]] < $se[$otherData[$i]]) {
                    $this->AllSets[$type] = $cards;
                    return;
                }
                if ($se[$oldnumbers[$i]] > $se[$otherData[$i]]) return;
            }

            $this->AllSets[$type] = [$oldSet, $cards];
        }
    }

    private function IsValid(array $numbers, int $Value, int $Count = 1): bool
    {
        $num = 0;
        $unique = array_unique($numbers);
        foreach ($unique as $i) {
            if (count(array_keys($numbers, $i)) === $Value) $num++;
        }

        return $num === $Count;
    }
}

 



?>