<?php
/*数据库连接操作*/
function connect(){
    $link= new mysqli(DB_HOST,DB_USER,DB_PWD,DB_DBNAME);
// 检测连接
    if ($link->connect_error) {
        die("连接失败: " . $link->connect_error);
    }
    return $link;
}
/*数据库插入操作*/
function insert($table, $array)
{
    $keys = "".join(",", array_keys($array));
    $vals = "'" . join("','", array_values($array)) . "'";
    $sql = "INSERT INTO {$table} ({$keys}) VALUES ({$vals})";
    mysqli_query(connect(),$sql);
    return mysqli_affected_rows(connect());
}

function update($table,$array,$where=null){
    $str="";
    foreach($array as $key=>$val){
        if($str==null){
            $sep="";
        }else{
            $sep=",";
        }$str.=$sep.$key."='".$val."'";
    }
    $sql="update {$table} set {$str} ".($where==null?null:" where ".$where);
    $result=mysqli_query(connect(),$sql);
    if($result){
        return $sql;
    }else{
        return false;
    }
}
/*删除操作*/
function delete($table,$where=null){
    $where=$where==null?null:" where ".$where;
    $sql="delete from {$table}{$where}";
    print_r($sql);
    mysqli_query(connect(),$sql);
    return mysqli_affected_rows(connect());
}
/*查找操作,查找一条记录*/
function fetchOne($sql,$result_type=MYSQLI_ASSOC){
    $result=mysqli_query(connect(),$sql);
    if ($result->num_rows > 0) {
        // 输出每行数据
        while($row = $result->fetch_assoc()) {
            return $row;
        }
    } else {
        echo "0 个结果";
    }
}
/*查找操作,获取所有记录*/
function fetchAll($sql,$result_type=MYSQLI_ASSOC){
    $conn=connect();
    $result=$conn->query($sql);
    if ($result->num_rows > 0) {
        // 输出每行数据
        while($row = $result->fetch_assoc()) {
            $rows[]=$row;
        }
    } else {
        echo "0 个结果";
    }
    return $rows;
}
/*获取记录条数*/
function getResultNum($sql){
    $conn=connect();
    $result=$conn->query($sql);
    $totalRows=$result->num_rows;
    return $totalRows;
}


