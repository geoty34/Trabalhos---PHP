<?php
    
    //Modelo para aluno
    require_once(__DIR__ . "/Curso.php");

    class Aluno{

        private ?int $id;
        private ?string $nome;
        private ?int $idade;
        private ?string $estrangeiro;
        private ?Curso $curso;

       

        public function __construct()
        {
           
            $this->curso = null;
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

      
        public function getIdade()
        {
                return $this->idade;
        }

       
        public function setIdade($idade)
        {
                $this->idade = $idade;

                return $this;
        }

       
        public function getEstrangeiro()
        {
                return $this->estrangeiro;
        }

        public function getEstrangeiroTexto()
        {  if($this->estrangeiro == 'S')
            return "Sim";
            
            elseif($this->estrangeiro == 'N')
            return "Não";
        }

        
        public function setEstrangeiro($estrangeiro)
        {
                $this->estrangeiro = $estrangeiro;

                return $this;
        }

        public function getCurso()
        {
                return $this->curso;
        }

       
        public function setCurso($curso)
        {
                $this->curso = $curso;

                return $this;
        }
    }


        
?>
        

        
        


