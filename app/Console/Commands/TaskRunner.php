<?php

namespace App\Console\Commands;

use Log;
use App\Http\Services\TaskService;

class TaskRunner
{
	private $tasks;
	private $taskService;

	function __construct
	(
		TaskService $taskService
	)
	{
		$this->taskService = $taskService;
	}

	public function run()
	{
		Log::info(LogStyle('Staring TaskRunner'));
		$this->task = $this->taskService->getAllTasks();

		$this->runDailyTask();
	}

	public function runDailyTask()
	{
		
	}
}