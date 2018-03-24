<?php

namespace application\controllers;


use application\Core\Controller;
use application\Core\Validator;
use application\Helpers\ImageHelper;
use application\Models\Task;

class TaskController extends Controller
{
    /**
     * @return View
     */
    public function create()
    {
        return view('create');
    }

    /**
     * @throws \Exception
     */
    public function store()
    {
        $validator = new Validator($this->request->all(), [
            'name' => ['required', ['lengthMax', 10]],
            'email' => ['required', 'email', ['lengthMax', 50], ['lengthMin', 5]],
            'text' => ['required', ['lengthMax', 255], ['lengthMin', 5]],
            'image' => ['required', ['regex', '/^.+.[jpg,png,gif]+$/']]
        ]);

        if ($validator->fails())
            redirectBack();

        $image = new ImageHelper($this->request->file('image'));
        $newName = $image->save();
        $this->request->set('image', $newName);


        Task::create($this->request->all(['name', 'email', 'image']));

        return redirect('/');
    }

    /**
     * @param $id
     * @return string
     */
    public function update($id)
    {
        Task::find($id)
            ->update($this->request->all());

        return json_encode([1, 2, 3]);
    }
}