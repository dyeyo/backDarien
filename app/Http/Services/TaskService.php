<?php
namespace App\Http\Services;

use App\Models\Task;
use App\Models\User;

class TaskService
{
    public function list(User $user): array
    {
        $countNoComplete = $user->tasks()->where('completed', 0)->count();
        $countComplete = $user->tasks()->where('completed', 1)->count();
        $list = $user
            ->tasks()
            ->with('user')
            ->paginate(5);
        return [
            'countNoComplete' => $countNoComplete,
            'countComplete' => $countComplete,
            'tasks' => $list,
        ];
    }

    public function find(User $user, $id)
    {
        return $user->tasks()->findOrFail($id);
    }

    public function create(User $user, array $data)
    {
        return $user->tasks()->create(attributes: $data);
    }

    public function update(Task $task, array $data)
    {
        $task->update($data);
        return $task;
    }

    public function delete(Task $task)
    {
        return $task->delete();
    }
}
