<?php 
    require_once "../config/conexao.php";
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $nome= $_POST['nome'];
        $dataNascimento= $_POST['dataNascimento'];
        $curso= $_POST['curso'];
        $matricula= $_POST['matricula'];
        $cpf= $_POST['cpf'];
        $email= $_POST['email'];
        $endereco= $_POST['endereco'];
        if(isset($nome) && isset($dataNascimento ) && isset($curso) && isset($matricula)
        && isset($cpf) && isset($email) &&($endereco))
        try
        {
            $stmt= $conn->prepare("INSERT INTO  aluno(Nome, DataNascimento, Curso, Matricula, 
            CPF, Email, Endereco) VALUES (:nome, :dataNascimento, :curso, :matricula, :cpf,
            :email, :endereco)");//stmt é a consulta.
            $stmt->bindParam(":nome",$nome);// bindparam faz a ligação do valor da variável com a Query.
            $stmt->bindParam(":dataNascimento",$dataNascimento);
            $stmt->bindParam(":curso",$curso);
            $stmt->bindParam(":matricula",$matricula);
            $stmt->bindParam(":cpf",$cpf);
            $stmt->bindParam(":email",$email);
            $stmt->bindParam(":endereco",$endereco);
            $stmt->execute(); //Executa a consulta
            header("Location: ../templates/index.php");
            exit();
            
        }//fim try
        catch(PDOException $e){
            echo "Erro ao inserir aluno".$e->getMessage();
        }//fim catch
       
    }//fim if isset
    else{
        echo "<h1> Valores não definidos.</h1>";
    }
?>