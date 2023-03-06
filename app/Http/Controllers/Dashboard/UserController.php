<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $usermodel;

    public function __construct(User $user)
    {
        $this->usermodel = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.users.add');
    }

    public function getUsersDatatable()
    {
        if(auth()->user()->can('viewany', $this->usermodel))
        {
            $data = User::select('*');
        }else {
            $data = User::where('id', auth()->user()->id);
        }
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn = '';
                if(auth()->user()->can('update', $row)) {
                    $btn .= '<a href ="' . Route('dashboard.users.edit', $row->id) . '" class="edit btn btn-success btn-sm">
                    <i class = "fa fa-edit"></i></a>';
                }
                if(auth()->user()->can('delete', $row)) {
                    $btn .= '<a id="deleteBtn" data-id="'.$row->id.'" class="edit btn btn-danger btn-sm" data-toggle= "modal" 
                    data-target="#deletemodal"><i class="fa fa-trash"></i></a>';
                }
                return $btn;
            })
            ->addColumn('status', function ($row) {
                return $row->status == null ? __('words.notActivated') : __('words'.'.'.$row->status);
            })
            ->rawColumns(['action', 'status'])
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('update', $this->usermodel);
        $data = [
            'name'=>'required|string',
            'email'=>'required|email|unique:users',
            'status'=>'nullable|in:null,admin,writer',
            'password' => ['required', 'string', 'min:8'],
        ];
        $validatedData = $request->validate($data);
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        return redirect()->route('dashboard.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);

        return view('dashboard.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user);

        $user->update($request->all());
        return redirect()->route('dashboard.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function delete(Request $request)
    {
        $this->authorize('delete', $this->usermodel);

        if(is_numeric($request->id)) {
            User::where('id', $request->id)->delete();
        }
        return redirect()->route('dashboard.users.index');
    }
}
