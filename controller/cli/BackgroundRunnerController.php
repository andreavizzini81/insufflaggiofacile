<?php

class BackgroundRunnerController extends CliController {

    public function fetchPendingTasks() {

        $tasks = (new BackgroundTaskList([], true, BackgroundTask::class))->setPageLength(10)->getPage(1);
        Cli::print();
        Cli::print(
            sprintf('Background Runner: %d tasks found', count($tasks))
        );
        Cli::print();
        foreach($tasks as $task) {
            Cli::print(
                sprintf('Task ID: %d => ', $task->getId()), false
            );
            $task->execute();
            $task->delete();
        }
        Cli::print();
    }

}