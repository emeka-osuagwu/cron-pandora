<?php

namespace App\Console\Commands;

use Log;
use App\Http\Services\TaskService;
use App\Http\Services\RequestService;

class TaskRunner
{
	private $tasks;
	private $taskService;
	private $requestService;

	function __construct
	(
		TaskService $taskService,
		RequestService $requestService
	)
	{
		$this->taskService = $taskService;
		$this->requestService = $requestService;
	}

	public function run()
	{
		Log::info(LogStyle('Staring TaskRunner'));
		$this->task = collect($this->taskService->getAllTasks());

		$this->runDailyTask();
	}

	public function runDailyTask()
	{
		$daily_task = $this->task;

		Log::info(LogStyle('Running ' . $daily_task->count() . ' Daily Task'));
		
		foreach ($daily_task as $task) {
			$this->requestService->handle('GET', $daily_task->first()->callback_url, ['query' => ['foo' => 'bar']]);
		}
	}
}