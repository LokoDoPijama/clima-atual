<?php

class Clima {

    public $temperatura;
    public $cidade;
    public $humidade;
    public $direcaoDoVento;
    public $velocidadeDoVento;
    public $sensacaoTermica;
    public $descricao;
    public $temperaturaMinima;
    public $temperaturaMaxima;
    public $icone;
    public $nascerDoSol;
    public $porDoSol;
    public $fusoHorario;

    public function formatarNascerDoSol() {

        return date("G:i", $this->nascerDoSol + $this->fusoHorario);

    }

    public function formatarPorDoSol() {

        return date("G:i", $this->porDoSol + $this->fusoHorario);

    }

}