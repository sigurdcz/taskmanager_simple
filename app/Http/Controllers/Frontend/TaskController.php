<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['items'] = Task::all();
        return view('frontend.task.index')->with($data);
    }

}
