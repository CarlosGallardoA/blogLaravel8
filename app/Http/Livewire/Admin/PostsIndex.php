<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;
class PostsIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';  //Para no usar taiwincss y usar bootstrap es usa esto!!
    
    public $search;

    public function updatingSearch() {  //Para eliminar las paginas del url y procceder a una busqueda completa
        $this->resetPage();
    }
    public function render()
    {
        $posts = Post::where('user_id',auth()->user()->id)
                                    ->where('name','LIKE','%'. $this->search . '%')  // para crear un filtro como datatable
                                    ->latest()
                                    ->paginate();
        return view('livewire.admin.posts-index',compact('posts'));
    }
}
