<?php
try{
        $exe = $pdo->prepare("DELETE FROM termekek WHERE termek_id=:termek_id");
        $exe->bindParam(':termek_id',$_GET['delete']);
     
        if(!$exe->execute()){
            throw new PDOException ($exe->errorinfo()[2]);
        }
        header("Location: index.php"); //refresh
    }
    catch(PDOException $e){
        print $e->getMessage();
    }

    ?>