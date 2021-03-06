<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['items'] = Task::paginate(5);
        return view('frontend.task.index')->with($data);
    }

    /**
     * @param int $id
     * @return View
     */
    public function show(int $id): View
    {
        $data['item'] = Task::findOrFail($id);
        return view('frontend.task.show')->with($data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ajax_index(Request $request): View
    {
        $sort_by = $request->get('sortby') ?? 'id';
        $sort_type = $request->get('sorttype') ?? 'asc';
        $page= $request->get('page') ?? 1;
        $term = $request->get('term') ?? '';
        $take = $request->get('take') ?? 5;

        $data['items'] = Task::orderBy($sort_by, $sort_type)->where('name', 'like', '%'.$term.'%') ->paginate($take);
        $data['sortby'] = $sort_by;
        $data['sorttype'] = $sort_type ;
        $data['page'] =  $page;


        if ($request->ajax()) {
            return view('frontend.task.components._index')->with($data);
        }

        return view('frontend.task.index')->with($data);

    }

}
