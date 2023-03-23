<?php

    session_start();

    include_once("connection.php");
    include_once("url.php");

    $data = $_POST;

    // MODIFICAÇÃO NO BANCO
    if(!empty($data)){

        // adicionar contato
        if($data["type"] === "create"){

            $name = $data["name"];
            $phone = $data["phone"];
            $observations = $data["observations"];

            $query = "INSERT INTO CONTACTS (NAME, PHONE, OBSERVATIONS) VALUES (:name, :phone, :observations)";

            $stmt = $conn->prepare($query);

            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":phone", $phone);
            $stmt->bindParam(":observations", $observations);

            try{

                $stmt->execute();
                $_SESSION["msg"] = "Contato cadastrado com sucesso!";

            } catch(PDOException $e){

                $error = $e->getMessage();
                echo "Erro: $error";

            }

        } else if($data["type"] === "edit"){

            $name = $data["name"];
            $phone = $data["phone"];
            $observations = $data["observations"];
            $id = $data["id"];

            $query = "UPDATE CONTACTS
                      SET NAME = :name, PHONE = :phone, OBSERVATIONS = :observations
                      WHERE ID = :id";
                      
            $stmt = $conn->prepare($query);
            
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":phone", $phone);
            $stmt->bindParam(":observations", $observations);
            $stmt->bindParam(":id", $id);

            try{

                $stmt->execute();
                $_SESSION["msg"] = "Contato atualizado com sucesso!";

            } catch(PDOException $e){

                $error = $e->getMessage();
                echo "Erro: $error";

            }

        } else if($data["type"] === "delete"){

            $id = $data["id"];

            $query = "DELETE FROM CONTACTS WHERE ID = :id";

            $stmt = $conn->prepare($query);

            $stmt->bindParam(":id", $id);
            
            try{

                $stmt->execute();
                $_SESSION["msg"] = "Contato removido com sucesso!";

            } catch(PDOException $e){

                $error = $e->getMessage();
                echo "Erro: $error";

            }

        }

        // REDIRECT HOME
        header("location:" . $BASE_URL . "../index.php");

    } else{

        // SELEÇÃO DE DADOS
        $id;

        if(!empty($_GET)){
            $id = $_GET["id"];
        }

        // retorna os dados de um contato específico
        if(!empty($id)){
            
            $query = "SELECT * FROM CONTACTS WHERE ID = :id";

            $stmt = $conn->prepare($query);
            $stmt->bindParam(":id", $id);
            $stmt->execute();

            $contact = $stmt->fetch();

        } else{
            // retorna os dados de todos os contatos
            $contacts = [];

            $query = "SELECT * FROM CONTACTS";

            $stmt = $conn->prepare($query);
            $stmt->execute();
            
            $contacts = $stmt->fetchAll();
        }
    }

    // FECHANDO A CONEXÃO
    $conn = null;