<?php

namespace Bulkly\Http\Controllers;

use Bulkly\BufferPosting;
use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index(Request $request)
    {
        $searchTerm = $request->input('search');
        $type = $request->query('group_type');
        $posts = BufferPosting::with('groupInfo')->whereHas('groupInfo', function ($query) use ($searchTerm, $type) {
            if ($type != 'all') {
                $query->where('type', 'like', "{$type}%")
                    ->orWhere('name', 'like', "%{$searchTerm}%");
            }
            $query->where('name', 'like', "{$searchTerm}%");

        })->paginate();
        $pagination = $posts->appends(array(
            'search' => $searchTerm,
            'group_type' => $type
        ));

        return view('pages.test.index', compact('posts'));
    }

}
