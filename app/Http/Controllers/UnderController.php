<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UnderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permission=Permission::all();
        return view('Admin.pages.Under-accompte.under-accompte', compact('permission'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $result = DB::table('users')
            ->select(
                'users.id',
                'users.name',
                'users.email',
                'users.task',
                'users.image',
                'users.occupation',
                DB::raw("LPAD('*', 14, '*') AS password")
            )->get();


        return response()->json($result);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $permission = new User();
            $name = $request->input('name');
            $email = $request->input('email');
            // Générer un mot de passe alphanumérique de 8 caractères
            $password = Str::random(8);
            $hashedPassword = Hash::make($password);
            $permission->occupation = $request->input('occupation');
            $permission->name = $name;
            $permission->email = $email;
            $task = $request->input('task');
            $taskString = implode(', ', $task);
            $permission->task=$taskString;
            $permission->role = '3';
            $permission->password = $hashedPassword;
           // dd($permission);
            // Envoyer par mail les accès d'authentification à l'utilisateur
            $details = [
                'name' => $name,
                'email' => $email,
                'password' => $password,
            ];

            Mail::to($email)->send(new ContactMail($details));

            $permission->save();
            return back()->with('status', 'Account created successfully. login data sent to user');

        } catch (\Illuminate\Database\QueryException $exception) {
            return back()->with('warning-status', 'Please complete all fields');
        } catch (\Exception $e) {
            return back()->with('error-status', 'An error has occurred. Please try again later.');
        }
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
    public function edit($id)
    {
        $User = User::find($id);
        return response()->json([
            'status' => 200,
            'User' => $User,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $permission_id = $request->input('id');
        $permission = User::find($permission_id);

        try {
            $permission->name = $request->input('name');
            $permission->occupation = $request->input('occupation');
            $permission->email = $request->input('email');
            // Check if password field is provided
            if ($request->filled('password')) {
                $permission->password = Hash::make($request->input('password'));
            }

            $task = $request->input('task');
            $taskString = implode(', ', $task);
            $permission->task = $taskString;
            $permission->role = '3';


            $permission->update();

            return back()->with('status', 'Account updated successfully.');

        } catch (\Illuminate\Database\QueryException $exception) {
            return back()->with('warning-status', 'Please complete all fields');
        } catch (\Exception $e) {
            return back()->with('error-status', 'An error has occurred. Please try again later.');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data_id = $request->input('deleteUnder');
        $data = User::find($data_id);

        // Get the filename
        $filename = $data->image;

        try {
            // Delete entry from the database
            $data->delete();

            // Delete the file from the server if it exists
            if (!empty($filename) && file_exists(public_path('img/' . $filename))) {
                unlink(public_path('img/' . $filename));
            }

            return back()->with('status', 'Account deleted successfully.');
        } catch (\Illuminate\Database\QueryException $exception) {
            return back()->with('error-status', 'An error has occurred. Please try again later.');
        }
    }
}
