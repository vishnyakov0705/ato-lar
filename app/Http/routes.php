<?php

use App\Task;
use Illuminate\Http\Request;

  /**
   * Вывести панель с задачами
   */
  Route::get('/', function () 
  {
    $tasks = Task::orderBy('created_at', 'asc')->get();
    //dump('tasks');
    return view('tasks', [
        'tasks'=>$tasks,
    ]);
  });

  /**
   * Добавить новую задачу
   */
  Route::post('/task', function (Request $request) 
  {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
  ]);
    if ($validator->fails()) 
    {
      return redirect('/')
        ->withInput()
        ->withErrors($validator);
    }
    //dump('no errors');
    $task = new Task;
    $task->name = $request->name;
    $task->save();

    return redirect('/');
  });

  /**
   * Удалить задачу
   */
  Route::delete('/task/{task}', function (Task $task) 
  {
    $task->delete();
    return redirect('/');
  });
  
  /**
   * Обновить задачу
   */
    Route::post('/task/eddit', function (Request $request) 
  {
    $eddit = update::make($request->all(), [
        'name' => 'required|max:255',
  ]);

    if ($eddit->fails()) 
    {
      return redirect('/')
        ->withInput()
        ->withErrors($eddit);
    }
    dump('no errors');
    $task = new Task;
    $task->name = $request->name;
    $task->save();

    return redirect('/');
  });
    
  /**
   * Сохранить задачу
   */
  Route::save('/task', function (Request $request) 
  {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
  ]);

    if ($validator->fails()) 
    {
      return redirect('/')
        ->withInput()
        ->withErrors($validator);
    }
    //dump('no errors');
    $task = new Task;
    $task->name = $request->name;
    $task->save();

    return redirect('/');
  });
