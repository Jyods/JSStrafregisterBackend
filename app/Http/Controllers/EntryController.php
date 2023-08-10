<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entry;
use App\Http\Resources\EntryResource;
use App\Http\Resources\OnlyEntryResource;

class EntryController extends Controller
{
    /**
     * Get all entries.
     *
     * @OA\GET(
     *     path="/entries/index",
     *     tags={"entry"},
     *     operationId="getEntries",
     *     security={{"barear":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *     )
     * )
     */
    public function index(Request $request)
    {
        /*get the user from the request
        $user = $request->user();
        $class = $user->restrictionClass;
        get all entries and files where the restrictionClass is lower or equal to the user restrictionClass
        $entries = Entry::whereHas('files', function ($query) use ($class) {
            $query->where('restrictionClass', '<=', $class);
        })->get();
        return EntryResource::collection($entries);*/
        return EntryResource::collection(Entry::all());
    }

    /**
     * Get the Entry from ID.
     *
     * @OA\GET(
     *     path="/entries/index/{id}",
     *     tags={"entry"},
     *     operationId="getEntryById",
     *     security={{"barear":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *     ),
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="The id of the entry",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     )
     * )
     */
    public function id(int $id)
    {
        $entry = Entry::find($id);
        return new EntryResource(Entry::find($id));
    }
    /**
     * Store a new entry.
     *
     * @OA\Post(
     *     path="/entries/create",
     *     tags={"entry"},
     *     operationId="storeEntry",
     *     security={{"bearer":{}}},
     *     @OA\Response(
     *         response=405,
     *         description="Invalid input",
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Unprocessable Entity",
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         description="The entry data",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="identification", type="string", example="EntryID123")
     *         )
     *     )
     * )
     */
    public function store(Request $request)
    {
        $entry = new Entry();
        $entry->identification = $request->identification;
        $entry->save();
        return new EntryResource($entry);
    }
    /**
     * Get the just the entries.
     *
     * @OA\GET(
     *     path="/entries/onlyEntry",
     *     tags={"entry"},
     *     operationId="getOnlyEntry",
     *     security={{"barear":{}}},
     *     @OA\Response(
     *         response=405,
     *         description="Invalid input",
     *    ),
     *    @OA\Response(
     *       response=200,
     *     description="successful operation",
     * ),
     * )
     */
    public function onlyEntry() {
        return OnlyEntryResource::collection(Entry::all());
    }
}
