<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Comment;
use App\Model\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data['item'] = Comment::findOrFail($id);
        return view('frontend.comment.index')->with($data);
    }
}
