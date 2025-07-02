/**
 * @OA\Schema(
 *     schema="Task",
 *     type="object",
 *     title="Task",
 *     required={"title", "description"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="title", type="string", example="Comprar leche"),
 *     @OA\Property(property="description", type="string", example="Ir al supermercado..."),
 *     @OA\Property(property="completed", type="boolean", example=false),
 *     @OA\Property(property="due_date", type="string", format="date", example="2024-12-31"),
 *     @OA\Property(property="user_id", type="integer", example=1),
 * )
 */
