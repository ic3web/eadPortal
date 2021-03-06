<?php

    class Turmas extends model{
        private $info;

        public function getTurmaDoAluno($id){

            $array = array(); #Acessor de retorno 
            $sql = "
            SELECT 
                aluno_turma.id_turma,
                turmas.nome,
                turmas.imagem
            FROM 
                aluno_turma
            LEFT JOIN turmas ON aluno_turma.id_turma = turmas.id
            WHERE 
                aluno_turma.id_aluno = '$id'
            ";
            $sql = $this->db->query($sql);

            if($sql->rowCount()> 0){
                $array = $sql->fetchAll();#para buscar a turma do aluno usar o fetch apenas

            }
            return $array;
            
        }

        public function setTurma($id){

            $array = array();
            $sql = "SELECT * FROM turmas WHERE id = '$id'";
            $sql = $this->db->query($sql);

            if($sql->rowCount() > 0){

                $this->info = $sql->fetch();
            }
           
        }

        public function getNome(){
            return $this-> info['nome'];
        }   

        public function getImage(){
            return $this->info['imagem'];
        }



    }
?>