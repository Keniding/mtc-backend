<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index() {
        $users = User::orderBy('id', 'desc')->paginate(4);
        return $users;
    }

    public function show(User $user) {
        return $user;
    }

    public function create() {
        return view('user.create');
    }

    public function createSlug($string, $id) {
        $slug = str_replace(' ', '-', $string);
        $slug = strtolower($slug);
        $slug = preg_replace('/[^a-z0-9-]/', '', $slug);
        $slug = preg_replace('/-+/', '-', $slug);
        $slug = trim($slug, '-');
        $slug = $slug . '-' . $id;
        return $slug;
    }

    public function store() {
        $user = new User();
        $user->name = request('name');
        $user->slug = '';
        $user->email = request('email');
        $user->password = bcrypt(request('password'));
        $user->save();

        $user->slug = $this->createSlug($user->name, $user->id);
        $user->save();
        return redirect()->route('user.index');
    }

    public function edit(User $user) {
        return view('user.edit', compact('user'));
    }

    public function update(User $user) {
        $user->name = request('name');
        $user->email = request('email');
        $user->password = bcrypt(request('password'));
        $user->save();
        return redirect()->route('user.index');
    }

    public function destroy(User $user) {
        $user->delete();
        return redirect()->route('user.index');
    }
}
