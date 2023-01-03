<?php
 include_once './questions.php';

$data =array();
$data= question::showQuestions();
echo htmlentities(json_encode($data)); 