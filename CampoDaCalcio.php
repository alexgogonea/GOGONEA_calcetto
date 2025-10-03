<?php

class CampoDaCalcio
{
    private string $nome;
    private int $spettatori;
    private string $url;
    public function __construct(string $nome, int $spettatori, string $url){
        $this -> nome = $nome;
        $this -> spettatori = $spettatori;
        $this -> url = $url;
    }

    public function getNome(){
    return $this -> nome;
    }
    public function getSpettatori(){
        return $this -> spettatori;
    }
    public function getUrl(){
        return $this -> url;
    }

    public function __toString(){
        return "Campo da calcio: " . $this->nome . ", spettatori: " . $this->spettatori;
    }
}

