<?php

namespace application\Controllers;

use application\Core\Controller;
use application\Core\Paginator;
use application\Models\Task;
use application\Models\User;

class HomeController extends Controller
{
    /**
     * @return \stdClass
     */
    public function index()
    {
        $request = $this->request;
        $perPage = 3;
        $total = Task::count();
        $sortRow = $request->get('field', 'created_at');
        $sortBy = $request->get('by', 'desc');

        $tasks = Task::orderBy($sortRow, $sortBy)
            ->take($perPage)
            ->skip(($request->page - 1) * $perPage);


        $paginator = new Paginator($perPage, $total);

        return view('home', [
            'paginator' => $paginator,
            'tasks' => $tasks->get()
        ]);
    }
}