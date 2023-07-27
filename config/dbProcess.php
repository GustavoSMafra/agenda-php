<?php

    session_start();
    include_once("dbConnection.php");
    include_once("url.php");

    $id;
    $contatos = [];
    $contato = [];
    $where = '';

    $data = $_POST;

    if(!empty($data)){
        if($data["type"] === "create") {
            $nome = $data["name"];
            $telefone = $data["phone"];
            $observacoes = $data["obs"];

            $query = "INSERT INTO contatos (nome, telefone, observacoes) VALUES (:nome,:telefone,:observacoes)"; 
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":telefone", $telefone);
            $stmt->bindParam(":observacoes", $observacoes);
            try {
                $stmt->execute();
                $_SESSION['msg'] = 'Contato criado com sucesso!';
            } catch(PDOException $e) {
                $error = $e->getMessage();
                echo "Erro na criação: $error";
            }
        } else if($data["type"] === "update"){
            $id = $data["id"];
            $nome = $data["name"];
            $telefone = $data["phone"];
            $observacoes = $data["obs"];
            $query = "UPDATE contatos SET nome = :nome, telefone = :telefone, observacoes = :observacoes WHERE id = :id"; 
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":telefone", $telefone);
            $stmt->bindParam(":observacoes", $observacoes);
            try {
                $stmt->execute();
                $_SESSION['msg'] = 'Contato atualizado com sucesso!';
            } catch(PDOException $e) {
                $error = $e->getMessage();
            }  
        } else if($data["type"] === "delete"){
            $id = $data["id"];
            $query = "DELETE FROM contatos WHERE id = :id"; 
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":id", $id);
            try {
                $stmt->execute();
                $_SESSION['msg'] = 'Contato deletado com sucesso!';
            } catch(PDOException $e) {
                $error = $e->getMessage();
            } 
        }

        header("Location:" . $BASE_URL . "../index.php");
    } else {
        if(!empty($_GET)){
            $id = $_GET["id"];
            $where = " WHERE id = $id";
        }
    
        $query = "SELECT * FROM contatos";
        $query .= $where;
        $stmt = $conn->prepare($query);
        $stmt->execute();
    
        if(!empty($_GET)){
            $contato = $stmt->fetchAll()[0];
        } else {
            $contatos = $stmt->fetchAll();
        }
    }

    $conn = null;


    