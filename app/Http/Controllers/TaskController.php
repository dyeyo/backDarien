<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Services\TaskService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct(protected TaskService $taskService)
    {
    }

    public function index(Request $request)
    {
        return response()->json($this->taskService->list($request->user()));
    }

    public function show(Request $request, $id)
    {
        try {
            $task = $this->taskService->find($request->user(), $id);
            return response()->json($task);
        } catch (ModelNotFoundException) {
            return response()->json(['message' => 'Tarea no encontrada'], 404);
        }
    }

    public function store(StoreTaskRequest $request)
    {
        try {
            $task = $this->taskService->create($request->user(), $request->validated());
            return response()->json($task, 201);
        } catch (\Throwable $e) {
            return response()->json(['message' => 'Error al crear la tarea'], 500);
        }
    }

    public function update(UpdateTaskRequest $request, $id)
    {
        try {
            $task = $this->taskService->find($request->user(), $id);
            $updated = $this->taskService->update($task, $request->validated());
            return response()->json(data: $updated);
        } catch (ModelNotFoundException) {
            return response()->json(['message' => 'Tarea no encontrada'], 404);
        } catch (\Throwable $e) {
            return response()->json(['message' => 'Error al actualizar la tarea'], 500);
        }
    }

    public function destroy(Request $request, $id)
    {
        try {
            $task = $this->taskService->find($request->user(), $id);
            $this->taskService->delete($task);
            return response()->json(['message' => 'Tarea eliminada']);
        } catch (ModelNotFoundException) {
            return response()->json(['message' => 'Tarea no encontrada'], 404);
        } catch (\Throwable $e) {
            return response()->json(['message' => 'Error al eliminar la tarea'], 500);
        }
    }
}
