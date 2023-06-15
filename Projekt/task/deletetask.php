<?php
require_once '../database.php';

$id = $_GET['id'];

if (deleteTask($id)) {
    echo 'Task deleted successfully';
} else {
    echo 'Error deleting task';
}

