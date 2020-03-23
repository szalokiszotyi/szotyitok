<?php 

function getConfig($path)
{
    return json_decode(file_get_contents($path), true);
}
function connect(){

    $config = json_decode(file_get_contents("config.json"), TRUE);
    try{
        return new PDO("mysql:host={$config['hostName']};dbname={$config['database']}",$config["userName"],$config["password"]);
    }
    catch(PDOException $e){
        die($e->getMessage());
    }
}
function getConnection($config)
{
    try 
    {
        return new PDO(
            "mysql:host={$config['hostName']};dbname={$config['database']};charset=utf8",
            $config['userName'],
            $config['password']

        );    
    } catch (PDOException $e) {
        return false;
    }

}


function signUp( PDO $pdo, $name, $email, $pass)
{

    try
        {
        $smt = $pdo->prepare('INSERT INTO `users`(`name`, `email`, `password`) VALUES (:name, :email, :password)');

        $smt->bindParam(':name', $name);
        $smt->bindParam(':email', $email);
        $smt->bindParam(':password', $pass);

        if (!$smt->execute())
        {
            throw new RuntimeException($smt->errorInfo()[2]);
        }
            
        return true;
        }
 
        catch (RuntimeException $e)

        {
            return true;
        }

}

function signIn($pdo, $email, $pass)
{
    try
    {
        $smt = $pdo->prepare('SELECT * FROM `users` WHERE `email` LIKE :email');

        $smt->bindParam(':email', $email);

        if(!$smt->execute())
        {
            throw new RuntimeException($smt->errorInfo()[2]);
        }

        $hash = $smt->fetch();

        if(password_verify($pass, $hash['password']))
        {
            return $hash;
        }

        return false;
    }

    
    catch (RuntimeException $e)
    {
        return false;
    }
}

function select($pdo){
    try{
        $exe = $pdo->prepare("SELECT * FROM termekek");
     
        if(!$exe->execute()){
            throw new PDOException ($exe->errorinfo()[2]);
        }
        else{
            return $exe->fetchAll(PDO::FETCH_NUM);
        }
    }
    catch(PDOException $e){
        print $e->getMessage();
    }
}

function select2($pdo,$alkategoria){
    try{
        $exe = $pdo->prepare("SELECT * FROM termekek WHERE alkategoria='$alkategoria'");
     
        if(!$exe->execute()){
            throw new PDOException ($exe->errorinfo()[2]);
        }
        else{
            return $exe->fetchAll(PDO::FETCH_NUM);
        }
    }
    catch(PDOException $e){
        print $e->getMessage();
    }
}

$pdo = connect();

function insert($pdo,$d){
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
    }
    catch(PDOException $e){
        print $e->getMessage();
    }
}
?>