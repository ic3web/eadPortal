<?php
    class Alunos extends model{

        private $info; #armazena as informações do aluno logado

        public function isLogged(){
            if(isset($_SESSION['lgaluno'])&& !empty($_SESSION['lgaluno'])){
                return true;
            }else{
                return false;
            }
        }
        public function fazerLogin($matricula, $senha){
                $sql = "SELECT * FROM alunos WHERE matricula = '$matricula' AND senha = '$senha'";
                $sql = $this->db->query($sql);

                if($sql->rowCount() > 0){
                    $row = $sql->fetch();

                    $_SESSION['lgaluno'] = $row['id'];

                    return true;
                }
                return false;

                

        }

        #verifica se o aluno está matriculado nesta turma
        public function isInscrito($id_turma){
            $sql = "SELECT * FROM aluno_turma WHERE id_aluno = '".($this->info['id'])."'AND id_turma = '$id_turma'";
            $sql = $this->db->query($sql);
            
            if($sql->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }


        #captura o nome do usuario que estará logado
        public function setAluno($id){
            $sql = "SELECT * FROM alunos WHERE id = '$id'";
            $sql = $this->db->query($sql);

            if($sql->rowCount() > 0){
                $this->info = $sql->fetch();
            }
        }

        public function getNome() {
            return $this->info['nome'];
        }

        public function getId(){
            return $this->info['id'];
        }

        

}
?>