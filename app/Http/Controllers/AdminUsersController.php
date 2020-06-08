<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserEditRequest;
use App\Photo;
use App\Role;
use App\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
            $users = User::all();
        return view("admin.users.index",compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $roles = Role::pluck('name','id')->all();

        return view("admin.users.create", compact("roles"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //


        if(trim($request->password) == "") {

            $input = $request->except("password");

        } else {

            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }
        

        if($file = $request->file("photo_id")) {

           $name = time() . $file->getClientOriginalName();

           $file->move("images",$name);

           $photo = Photo::create(['file'=>$name]);

           $input['photo_id'] = $photo->id;


           


           User::create($input);


        }
         return redirect("/admin/users")->with('success','User Created successfully');
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

        // return view('admin.uses.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //


        $user = User::findOrFail($id);
        $roles = Role::pluck('name','id')->all();
        return view("admin.users.edit", compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        //


        $user = User::findOrFail($id);

        if(trim($request->password) == "") {

            $input = $request->except("password");

        } else {

            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }

        if($file = $request->file('photo_id')) {

                $name = time() . $file->getClientOriginalName();

                $file->move("images", $name);

                $photo = Photo::create(['file'=>$name]);

                $input['photo_id'] = $photo->id;

                
        }

                        

        $user->update($input);

        return redirect("admin/users")->with('success','User Has been Updated successfully');


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

       $user = User::findOrFail($id);

       unlink(public_path() . $user->photo->file);
       $user->delete();

       return redirect("/admin/users")->with('warning','User Deleted successfully');
    }
}
