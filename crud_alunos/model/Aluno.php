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
            $this->id = 0;
        }


      
        public function getId(): ?int
        {
                return $this->id;
        }

        
        public function setId(?int $id): self
        {
                $this->id = $id;

                return $this;
        }

      
        public function getNome(): ?string
        {
                return $this->nome;
        }

        
        public function setNome(?string $nome): self
        {
                $this->nome = $nome;

                return $this;
        }

      
        public function getIdade(): ?int
        {
                return $this->idade;
        }

       
        public function setIdade(?int $idade): self
        {
                $this->idade = $idade;

                return $this;
        }

       
        public function getEstrangeiro(): ?string
        {
                return $this->estrangeiro;
        }

        public function getEstrangeiroTexto(): ?string
        {  if($this->estrangeiro == 'S')
            return "Sim";
            
            elseif($this->estrangeiro == 'N')
            return "Não";
        }

        
        public function setEstrangeiro(?string $estrangeiro): self
        {
                $this->estrangeiro = $estrangeiro;

                return $this;
        }

        public function getCurso(): ?curso
        {
                return $this->curso;
        }

       
        public function setCurso(?curso $curso): self
        {
                $this->curso = $curso;

                return $this;
        }
    }


        
?>
        

        
        


