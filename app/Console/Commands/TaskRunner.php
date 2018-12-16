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
		$daily_task = $this->task->where('period', 'daily');

		Log::info(LogStyle('Running ' . $daily_task->count() . ' Daily Task'));
		
		foreach ($daily_task as $task) {
			
			$response = $this->requestService->handle('GET', $daily_task->first()->callback_url, ['query' => ['foo' => 'bar']]);
			
			$update_data = [
				'service_response' => json_encode($response),
				'status' => 'completed',
			];

			$task->update($update_data);
		}
	}
}