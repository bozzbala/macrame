<?php
/*
 *
 * Functions to work with database
 *
 */
global $conn;
function db_connect($hostname, $username, $password, $database){
    $conn = mysqli_connect($hostname, $username, $password, $database);
    if($conn){
        return $conn;
    }
    else{
        die(mysqli_error($conn));
    }
}

// Производит SQL запрос
function db_query($query) {
    global $conn;
    if ($conn) {
        return mysqli_query($conn, $query);
    } else {
        return false;
    }
}

function db_num_rows($result) {
    return mysqli_num_rows($result);
}

// Возвращает строку или поле после проведения SQL запроса
function db_get_data($sql, $field = '', $mode = 'assoc') {

    $result = db_query($sql);
    if (db_num_rows($result) > 0) {
        $row = ($mode == 'assoc') ? db_fetch_assoc($result) : db_fetch_array($result);
        db_free_result($result);

        return ($field == '' || $field == '*') ? $row : $row[$field];
    }

    return false;
}

function db_errno($mysqli) {
    return mysqli_errno($mysqli);
}

function db_error($mysqli) {
    return mysqli_error($mysqli);
}

function db_num_fields($result) {
    return mysqli_num_fields($result);
}

function db_fetch_object($result) {
    return mysqli_fetch_object($result);
}

function db_fetch_array($result) {
    return mysqli_fetch_array($result);
}

function db_fetch_assoc($result) {
    return mysqli_fetch_assoc($result);
}

function db_insert_id($conn) {
    return mysqli_insert_id($conn);
}

function db_list_tables() {
    return db_get_array("SHOW TABLES FROM ".DB_NAME);
}

function db_list_fields($tableName) {
    return db_get_array("SHOW COLUMNS FROM ".DB_NAME);
}

function db_field_name($result, $i) {
    $finfo = mysqli_fetch_fields($result);
    return $finfo[$i]->name;
}

function db_field_type($result, $i) {
    $finfo = mysqli_fetch_fields($result);
    return $finfo[$i]->type;
}

function db_tablename($result, $i) {
    $finfo = mysqli_fetch_fields($result);
    return $finfo[$i]->table;
}

function db_affected_rows() {
    global $_mysqliLink;
    return mysqli_affected_rows($_mysqliLink);
}

function db_free_result($result){
    if ($result) {
        return mysqli_free_result($result);
    } else {
        return false;
    }
}

function db_real_escape_string($escapestr) {
    global $_mysqliLink;
    return mysqli_real_escape_string($_mysqliLink, $escapestr);
}

# Service MySQL Functions ############################################################################

// Возвращает количество строк согласно заданному условию
function db_table_count($table, $condition = '') {
    if (!empty($condition)) $condition = ' WHERE '.$condition;
    $num = db_get_data("SELECT COUNT(*) AS num FROM ".$table.$condition, "num");
    return $num;
}

// Проверяет существует ли указанная таблица в БД
function db_table_exists($tablename) {
    try {
        return boolval(db_query("SELECT 1 FROM `".$tablename."` WHERE 0"));
    } catch (RuntimeException $e) {
        return false;
    }
}

// Проверяет существует ли указанное поле в таблице
function db_field_exists($tableName, $fieldName) {
    $result = db_query("DESCRIBE ".$tableName." ".$fieldName);
    return (db_num_rows($result) > 0) ? true : false;
}

// Возвращает значение поля
function db_get_field($field_name, $table, $where = '') {
    global $_dbLastQuery;

    if (!empty($where)) $where = ' WHERE '.$where;

    $sql = "SELECT ".$field_name." FROM ".$table.$where;
    $_dbLastQuery = $sql;

    $result = db_query($sql);
    if (db_num_rows($result) > 0) {
        $row = db_fetch_assoc($result);
        db_free_result($result);

        return $row[$field_name];
    }

    return false;
}

// Возвращает массив строк или полей после проведения SQL запроса
function db_get_array($sql, $field1 = '', $field2 = '', $key = '') {
    $records = array();
    $result = db_query($sql);
    if (db_num_rows($result) > 0) {
        while ($row = db_fetch_assoc($result)) {
            if ($field1 && $field2 && isset($row[$field1]) && isset($row[$field2])) {
                $records[$row[$field1]] = $row[$field2];
            } else if ($field1) {
                $records[] = $row[$field1];
            } else {
                if (!empty($key)) {
                    $records[$row[$key]] = $row;
                } else {
                    $records[] = $row;
                }
            }
        }

        db_free_result($result);

        return $records;
    }

    return false;
}

// Возвращает массив строк или полей после проведения SQL запроса
function db_get_assoc($sql, $field1 = '', $field2 = '', $key = '') {
    $records = array();
    $result = db_query($sql);
    if (db_num_rows($result) > 0) {
        while ($row = db_fetch_assoc($result)) {
            if ($field1 && $field2 && isset($row[$field1]) && isset($row[$field2])) {
                $records[$row[$field1]] = $row[$field2];
            } else if ($field1) {
                $records[] = $row[$field1];
            } else {
                if (!empty($key)) {
                    $records[$row[$key]] = $row;
                } else {
                    $records[] = $row;
                }
            }
        }

        db_free_result($result);
    }

    return $records;
}

// Возвращает массив строк или полей после проведения SQL запроса
function db_get_assoc_array($sql, $key = null, $value = null) {
    $records = array();
    $result = db_query($sql);
    if (db_num_rows($result) > 0) {
        while ($row = db_fetch_assoc($result)) {

            if (is_array($key)) {

                if ($value && isset($row[$value])) {
                    $records[$key[0]][$key[1]] = $row[$value];
                } else if (isset($row[$key[0]]) && isset($row[$key[1]])) {
                    $records[$row[$key[0]]][$row[$key[1]]] = $row;
                }

            } else if (($key && $value) && (isset($row[$key]) && isset($row[$value]))) {

                $records[$row[$key]] = $row[$value];

            } else if ($key && isset($row[$key]) && $value == null) {
                $records[$key] = $row;
            } else if ($value && isset($row[$value]) && $key == null) {
                $records[] = $row[$value];
            } else {
                $records[] = $row;
            }
        }

        db_free_result($result);
    }

    return $records;
}

// Возвращает строку SQL для запроса с условием WHERE
function db_build_query($fields, $operator = 'AND') {
    $data = [];

    if (is_array($fields)) {
        foreach ($fields as $val) {
            $data[] = $val;
        }

        $sql = implode(" ".$operator." ", $data);

        return $sql;
    }

    return false;
}

// Возвращает строку SQL для операции INSERT
function db_build_insert($fields, $table, $allow_null = false, $mode = 'INSERT') {

    if ($table == '' || !is_array($fields)) return false;

    $sql = '';
    $data = array();

    foreach ($fields as $name => $value) {
        if (is_array($value)) {
            if (!empty($value[0])) {
                $data[] = $name.' = '.$value[1]."('".$value[0]."')";
            } else {
                $data[] = $name.' = '.$value[1]."()";
            }
        } else {
            if (($allow_null == false && !empty($value)) || $allow_null == true) $data[] = $name." = '".db_real_escape_string($value)."'";
        }
    }

    $data = implode(', ', $data);

    $sql = $mode.' INTO '.$table.' SET '.$data;

    return $sql;
}

// Возвращает строку SQL для операции UPDATE
function db_build_update($fields, $table, $where = '', $exclude_fields = array()) {

    if ($table == '' || empty($fields) || !is_array($fields)) return false;

    $sql = '';
    $data = array();

    foreach ($fields as $name => $value) {
        if (in_array($name, $exclude_fields)) continue;
        if (is_array($value)) {
            if (!empty($value[0])) {
                $data[] = $name.' = '.$value[1]."('".$value[0]."')";
            } else {
                $data[] = $name.' = '.$value[1]."()";
            }
        } else {
            $data[] = $name." = '".$value."'";
        }
    }

    if (!empty($data) && is_array($data)) {
        $data = implode(', ', $data);
        $sql = 'UPDATE '.$table.' SET '.$data;
        if ($where != '') $sql.= ' WHERE '.$where;

        return $sql;
    } else {
        return false;
    }
}

// Возвращает строку SQL для запроса с перечислением полей и их значений field = value OPERAND ..
function db_build_fields($fields, $operator = 'AND', $field = '') {
    if (is_array($fields)) {
        if ($operator == 'IN') {

            $i = 0;
            $items = '';
            $count = count($fields);

            foreach ($fields as $index => $key) {
                $i++;
                $items.= "'".$key."'";
                if ($i < $count) $items.= ', ';
            }

            $sql = $field." IN (".$items.")";

        } else {
            $data = [];

            if (empty($field)) {
                foreach ($fields as $key => $val) {
                    $data[] = $key." = '".db_real_escape_string($val)."'";
                }
            } else {
                foreach ($fields as $val) {
                    $data[] = $field." = '".db_real_escape_string($val)."'";
                }
            }

            $sql = implode(" ".$operator." ", $data);
        }

        return $sql;
    }

    return false;
}

// Отображаем последний SQL запрос
function db_last_query() {
    global $_dbLastQuery;
    trace($_dbLastQuery);
}

// Производим подстановку стандартных значений в строке SQL
function db_default_sql($sql, $values = null) {

    // Получаем все маркеры в фигурных скобках {VALUE} и присваиваем им значения из массива значений
    if (is_array($values) && count($values) > 0) {
        preg_match_all("/\{([a-zA-Z0-9_ =:']*)\}/", $sql, $keys);

        if (isset($keys[1])) {
            foreach ($keys[1] as $key) {
                if (isset($values[strtolower($key)])) $sql = preg_replace("/\{".$key."\}/", $values[strtolower($key)], $sql);
            }
        }
    }

    // Производим подстановку вычисляемых значений [TYPE:VALUE] в условии
    preg_match_all("/\[SQL:([a-zA-Z0-9_ =']*)\]/", $sql, $vals);

    if (isset($vals[1])) {
        for ($i = 0; $i < count($vals[1]); $i++) {
            if ($result = db_get_data($vals[1][$i], '', 'array')) {
                $sql = preg_replace("/\\".$vals[0][$i]."/", $result[0], $sql);
            }
        }
    }

    // Производим подстановку значений полей текущей записи [FIELD:NAME] в условии
    if (isset($values['row'])) {
        $vals = array();
        preg_match_all("/\{FIELD:([a-zA-Z0-9_ =@']*)\}/", $sql, $vals);

        if (isset($vals[1])) {
            foreach ($vals[1] as $val) {
                if (isset($values['row'][strtolower($val)])) {
                    $sql = str_replace('{FIELD:'.$val.'}', $values['row'][strtolower($val)], $sql);
                }
            }
        }
    }

    return $sql;
}
