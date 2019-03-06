<?php

namespace App\Http\Services;

use App\Models\Task;

class TaskService
{
	public function getAllTasks()
	{
		return Task::get();
	}

	public function updateTask($data)
	{
		// $task = Task::where('id', $data['task_id'])->update($data);

		// dd($task);
	}

}