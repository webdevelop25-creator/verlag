<?php

abstract class AbstractRepository
{
    public function DbCon(): PDO
    {
        return new PDO("mysql:host=localhost;dbname=verlag", "root", "");
    }
 public function query($sql, $data = []): array|false
 {
     $dbcon = $this->Dbcon();
     $stm = $dbcon->prepare($sql);
     $result = $stm->execute($data);
     $return = $dbcon->lastInsertId();
     if($id){
         $return = ['id'=>(int)$id];
     }
     if ($result)
     {
         return $return;
     } else{
         return false;
     }
 }


    public function update(EntityInterface $obj):EntityInterface
    {

        $data = $obj->mapToArray();
        $keys = array_keys($data);
        $string = ''; //':fname', ':lname'->'fname = :fname'
        foreach ($keys as $index=>$key) {
            $splate = str_replace($key, ':', '', $key);
            if($key === ':id'){ //diese schleife macht unsere 'id' weg.
                continue;
            }
            $string .= "$splate = $key, ";
            $string = rtrim($string, ', ');
        }

        $sql = "UPDATE $this->tablename set $string where id = :id";

        $this->query($sql, $data);
        return $this->findById($obj->getId());
    }

}






/*{
$dbcon = $this->Dbcon();
$stm = $dbcon->prepare($sql);
$stm->execute($data);
}*/