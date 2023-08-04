<?php
//Modelo para curso

class Curso
{

    private ?int $id;
    private ?string $nome;
    private ?string $turno;


    public function __toString()
    {
        return $this->nome . " - " . $this->turno;
    }
    public function getDesc()
    {
        return $this->nome . " - " . $this->turno;
    }




    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }


    public function getNome()
    {
        return $this->nome;
    }


    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }


    public function getTurno()
    {
        return $this->turno;
    }


    public function setTurno($turno)
    {
        $this->turno = $turno;

        return $this;
    }
}
