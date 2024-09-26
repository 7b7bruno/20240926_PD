<?php

class Task {
    private $id;
    private $title;
    private $description;
    private $category;

    public function __construct($id, $title, $description, $category) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->category = $category;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setCategory($category) {
        $this->category = $category;
    }
    public function getCategory(): string {
        return $this->category;
    }

    public function displayTask() {
        echo "ID: " . $this->id . "\n";
        echo "Title: " . $this->title . "\n";
        echo "Description: " . $this->description . "\n";
        echo "Category: " . $this->category . "\n";
        echo "--------------------------\n";
    }
}

$tasks = [];

function displayAllTasks($tasks) {
    if (empty($tasks)) {
        echo "No tasks available.\n";
    } else {
        echo "--------------------------\n";
        foreach ($tasks as $task) {
            $task->displayTask();
        }
    }
}
function displayTasksByCategory($tasks): void {
    if(empty($tasks)) {
        echo "No tasks available.\n";
    }
    else {
        $category = readline("Enter category: ");
        echo "--------------------------\n";
        foreach($tasks as $task) {
            if($task->getCategory() == $category) {
                $task->displayTask();
            }
        }
    }
}

function createTask(&$tasks) {
    $title = readline("Enter Task Title: ");
    $description = readline("Enter Task Description: ");
    $category = readline("Enter category: ");

    end($tasks);
    $lastKey = key($tasks);
    $id = $lastKey + 1;

    $tasks[$id] = new Task($id, $title, $description, $category);
    echo "Task Created.\n";
}

function updateTask(&$tasks) {
    $id = readline("Enter Task ID to Update: ");

    if (isset($tasks[$id])) {
        $newTitle = readline("Enter New Title: ");
        $newDescription = readline("Enter new Description: ");
        $newCategory = readline("Enter new category: ");

        $tasks[$id]->setTitle($newTitle);
        $tasks[$id]->setDescription($newDescription);
        $tasks[$id]->setCategory($newCategory);

        echo "Task Updated.\n";
    } else {
        echo "Task ID not found.\n";
    }
}

function deleteTask(&$tasks) {
    $id = readline("Enter Task ID to Delete: ");

    if (isset($tasks[$id])) {
        unset($tasks[$id]);
        echo "Task Deleted.\n";
    } else {
        echo "Task ID not found.\n";
    }
}

while (true) {
    echo "\nToDo List CLI Application\n";
    echo "1. Create Task\n";
    echo "2. View All Tasks\n";
    echo "3. Update Task\n";
    echo "4. Delete Task\n";
    echo "5. Exit\n";
    echo "6. View tasks by category\n";
    echo "Choose an option: ";
    $choice = trim(fgets(STDIN));

    switch ($choice) {
        case 1:
            createTask($tasks);
            break;
        case 2:
            displayAllTasks($tasks);
            break;
        case 3:
            updateTask($tasks);
            break;
        case 4:
            deleteTask($tasks);
            break;
        case 5:
            echo "Exiting the application. Goodbye!\n";
            exit;
        case 6:
            displayTasksByCategory($tasks);
            break;
        case 13:
            print_r($tasks);
        default:
            echo "Invalid option. Please choose again.\n";
    }
}
