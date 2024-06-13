<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questionlist extends Model
{
    use HasFactory;

    public function ScopeFilter($query){

        $submenu_id = request('submenu_id');
        if($submenu_id) {
            $query->whereSubmenu_id($submenu_id);
        }

        $search = request('search');
        if($search) {
            $query->where('questionlists.question', 'like', '%' . $search . '%')
                ->orwhere('questionlists.answer' , 'LIKE' , '%' .$search. '%');
        }
    }
}
