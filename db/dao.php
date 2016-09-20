<?php
// SQL查询语句生成函数
function ser($table,$column,$condition)
{
    if($column==null)
    {
        $sql = "SELECT * FROM $table";
    }
    else
    {
        $sql = "SELECT $column FROM $table";
    }
    if($condition==null)
    {
        return $sql;
    }
    else
    {
        return $sql." WHERE $condition";
    }
}

// SQL插入语句生成函数
function ins($table,$column,$value)
{
    $sql = "INSERT INTO $table ($column) VALUES ($value)";
    return $sql;
}

// SQL更新语句生成函数
function upd($table,$columnvalue,$condition)
{
    $sql = "UPDATE $table SET $columnvalue";
    if($condition==null)
    {
        return $sql;
    }
    else
    {
        return $sql." WHERE $condition";
    }
}

// SQL删除语句生成函数
function del($table,$condition)
{
    $sql = "DELETE FROM $table";
    if($condition==null)
    {
        return $sql;
    }
    else
    {
        return $sql." WHERE $condition";
    }
}
?>