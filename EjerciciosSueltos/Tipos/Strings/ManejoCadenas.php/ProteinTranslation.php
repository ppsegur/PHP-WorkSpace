<?php
/*
Instrucciones
Traducir secuencias de ARN en proteínas.

El ARN se puede dividir en secuencias de tres 
nucleótidos llamadas codones y luego traducirse en una proteína de la siguiente manera:

ARN: "AUGUUUUCU"=> se traduce como

Codones: "AUG", "UUU", "UCU" => que se convierten en una proteína con la siguiente secuencia =>

Proteína:"Methionine", "Phenylalanine", "Serine"

Hay 64 codones que, a su vez, corresponden a 20 aminoácidos; 
sin embargo, todas las secuencias de codones y los aminoácidos 
resultantes no son importantes en este ejercicio. 
Si funciona con un codón, el programa debería funcionar 
con todos. No obstante, puede ampliar la lista en el conjunto de pruebas para incluirlos todos.

También hay tres codones de terminación (también conocidos como codones 'STOP');
si el ribosoma encuentra alguno de estos codones, finaliza toda la traducción y 
la proteína se termina.

Todos los codones posteriores se ignoran, de la siguiente manera:

ARN: "AUGUUUUCUUAAAUG"=>

Codones: "AUG", "UUU", "UCU", "UAA", "AUG"=>

Proteína:"Methionine", "Phenylalanine", "Serine"

Nótese que el codón de parada "UAA"finaliza la traducción y 
la metionina final no se traduce en la secuencia de proteína.

A continuación se muestran los codones y los aminoácidos resultantes necesarios para el ejercicio.

Codón	Aminoácido
AGO	Metionina
UUU, UUC	fenilalanina
UUA, UUG	Leucina
UCU, UCC, UCA, UCG	Serina
UAU, UAC	Tirosina
Universidad Gubernamental, Universidad de Georgia	Cisteína
UGG	Triptófano
UAA, UAG, UGA	DETENER
Obtenga más información sobre la traducción de proteínas en Wikipedia .
*/





declare(strict_types=1);

class ProteinTranslation
{
    private const codons = [
        'AUG' => 'Methionine',
        'UUU' => 'Phenylalanine',
        'UUC' => 'Phenylalanine',
        'UUA' => 'Leucine',
        'UUG' => 'Leucine',
        'UCU' => 'Serine',
        'UCC' => 'Serine',
        'UCA' => 'Serine',
        'UCG' => 'Serine',
        'UAU' => 'Tyrosine',
        'UAC' => 'Tyrosine',
        'UGU' => 'Cysteine',
        'UGC' => 'Cysteine',
        'UGG' => 'Tryptophan',
        'UAA' => 'STOP',
        'UAG' => 'STOP',
        'UGA' => 'STOP',
    ];

   

    public function getProteins(string $rna): array
    {
        $results = [];
        foreach (str_split($rna, 3) as $value) {
            if ( ! in_array($value, array_keys(self::codons))) throw new InvalidArgumentException("Invalid codon");
            if ("STOP" === self::codons[$value]) break;
            $results[] = self::codons[$value];
        }
        return $results;
    }
    }