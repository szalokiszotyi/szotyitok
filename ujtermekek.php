<?php
if( $d["kategoria"] == "" ||
        $d["alkategoria"] == "" ||
        $d["ar"] == "" ||
        $d["leiras"] == "") return;
    try{
        $exe = $pdo->prepare('INSERT INTO `termekek` (`kategoria`,`alkategoria`,`ar`,`leiras`) VALUES
                              (:kategoria,:alkategoria,:ar,:leiras)');
        $exe->bindParam(':kategoria', $d["kategoria"]);
        $exe->bindParam(':alkategoria', $d["alkategoria"]);
        $exe->bindParam(':ar', $d["ar"]);
        $exe->bindParam(':leiras', $d["leiras"]);
     
        if(!$exe->execute()){
            throw new PDOException ($exe->errorinfo()[2]);
        }

        //header("Location: index.php"); //refresh
    }
    catch(PDOException $e){
        print $e->getMessage();
    }

?>