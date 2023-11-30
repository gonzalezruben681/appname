<?php

namespace App\Http\Controllers;

use App\Http\Requests\SavePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function __construct() {
        $this->middleware('auth',['except' => ['index', 'show']]);
    }
    //listado de post
    public function index() {
        $posts = Post::get();
            return view('posts.index', ['posts' => $posts]);
    }

    //mostrar el detalle de un post
    public function show(Post $post) {
        //return Post::find($post);
        return view('posts.show', ['post' => $post]);
    }

    // para devolver el formulario para crear un post
    public function create() {
        return view('posts.create', ['post' => new Post]);
       //return 'Create form';
    }

    //para almacenar el post en la DB
    public function store(SavePostRequest $request) {
        Post::create($request->validated());

        //mensajes de sesión
        //session()->flash('status','Post created!');

        return to_route('posts.index')->with('status','Post created!');
    }

    //para mostrar el formulario de editar un post
    public function edit(Post $post) {
            return view('posts.edit', ['post' => $post]);
        }

        //para actualizar el post en la DB
    public function update(SavePostRequest $request, Post $post) {
        //return 'Edit post';
        //return view('posts.update', ['post' => $post]);

        $post->update($request->validated());

        return to_route('posts.show', $post)->with('status','Post updated!');
    }

    //para eliminar de la DB
    public function destroy(Post $post) {
        $post->delete();
        return to_route('posts.index')->with('status','Post deleted!');
    }
}
