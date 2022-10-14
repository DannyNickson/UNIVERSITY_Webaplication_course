<?php
require_once('project.class.php');
require_once('task.class.php');
require_once('user.class.php');

$sender = new MessengerSender();
$logger = new ConsoleLogger();

$User = new User($sender);
$Admin = new Admin($sender);
$FirstTask = new Task([$User],'First task',$sender);

$project = new Project([$User,$Admin],[$FirstTask],$sender,$logger);