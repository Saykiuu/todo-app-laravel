<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\Return_;

class TodoController extends Controller
{
    public function index(){
   


        $search = request('search');
        $order = request('ordem');
        $col_order = request('coluna');
        
       if(!$order){
            $order = 'DESC';
        }else{
            switch ($order) {
                case 'DESC':
                    $order = 'ASC';
                    break;
 
                default:
                    $order = 'DESC';
                    break;
            }
        }
        if (!$col_order) {
         

            $col_order = 'id';
        }
     
        
        if($search){
            $tasks = Task::where('title', 'like', '%'.$search .'%')->orderBy($col_order, $order)->paginate(5);
        }else{
            $tasks = Task::orderBy($col_order, $order)->paginate(5);
        }
        
        $user = User::where([
            ['email', 'tokenEmail@exemple.com']
        ])->get();
        if(count($user) > 0){
           
            $user = true;
        }else{
            $user = false;
        }
        return view('todo', ['listaTarefas'=> $tasks,  'search' => $search, 'user' => $user, 'order' => $order, 'col_order'=>$col_order]);
    }

   

    public function createToken(){

        $chekuser = User::where([
            ['email', 'tokenEmail@exemple.com']
        ])->get();
        if(count($chekuser) == 0){
            $user = new User();
            $user->name = 'user1';
            $user->password = Hash::make('123');
            $user->email = 'tokenEmail@exemple.com';
            $user->save();
            return redirect('/')->with('msg', 'Token criado!');
        }else{
            return redirect('/')->with('msg', 'Ja existe um token!');
        }
        
    }

    public function limparToken(){
        User::where([
            ['email', 'tokenEmail@exemple.com']
        ])->delete();

        return redirect('/')->with('msg', 'Usuário removido!');
    }

    public function store(Request $request){
            $this->validate($request, [
                'title' =>'required',
                'description' => 'required',
            ]);
            
            $task = new Task;

            $task->title = $request->title;
            $task->description = $request->description;

            $task->save();

            return redirect('/')->with('msg', 'Task adicionada!');
    }

    public function update(Request $request){
        $this->validate($request, [
            'id' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        $task = Task::find($request->id);

        if($task != null){
            error_log('this is the id:.', $request->id);
        }

        $task->title = $request->title;
        $task->description = $request->description;

        $task->save();

        return redirect('/')->with('msg', 'Task atualizada!');
        
    }

    public function destroy(Request $request) {
        Task::findOrFail($request->id)->delete();
        return redirect('/')->with('msg', 'Task Removida!');
    }
    
}
