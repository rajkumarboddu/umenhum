<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Utils;
use App\TreePath;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class TreePathController extends Controller
{
    public $root = null;

    public static function addChild($parent_id,$child_id){
        $now = date('Y-m-d H:i:s');
        DB::statement("insert into tree_paths (ancestor_id,descendant_id,depth,created_at,updated_at)
                    select ancestor_id, $child_id, (depth+1), '$now', '$now' from tree_paths where descendant_id=$parent_id
                    union all select $child_id, $child_id, 0, '$now', '$now'");
    }

    public static function getChildCount($parent_id){
        return TreePath::where('ancestor_id',$parent_id)->where('depth',1)->count();
    }

    public static function getDescendantsCount($parent_id){
        return TreePath::where('ancestor_id',$parent_id)->count();
    }

    public function getChildren($parent_id){
        $children = DB::table('tree_paths as t')
                ->join('users as u','u.id','=','t.descendant_id')
                ->where('ancestor_id',$parent_id)->where('depth',1)
                ->select('u.first_name as name','u.status','t.*',
                    DB::raw('(case when u.status=0 then "inactive" else "active" end) as className'),'u.id')
                ->get();
        $children = Utils::unsetAttributes($children,['created_at','updated_at']);
        foreach($children as $child){
//            $child->name = str_limit($child->name,10);
            $child->name .= '<span class="hide node-id">'.$child->id.'</span>';
        }
        return $children;
    }

    public function getFullTree($parent_id){
        /*$tree = DB::select("
        SELECT
            u.id,
            u.first_name,
            t.ancestor_id AS parent_id,
            t.depth
        FROM users as u
            JOIN tree_paths as t ON u.id=t.ancestor_id
        WHERE t.descendant_id=$parent_id
        UNION
        SELECT
            u.id,
            u.first_name,
            t.ancestor_id AS parent_id,
            t.depth
        FROM users as u
            JOIN tree_paths as t ON u.id=t.descendant_id
        WHERE t.ancestor_id=$parent_id
        order by parent_id,depth,id
        ");*/
        $this->root = DB::table('users')->where('id',$parent_id)
                        ->select('id as descendant_id','first_name as name','status',
                            DB::raw('(case when status=0 then "inactive" else "active" end) as className'))->first();
        $this->root->name .= '<span class="hide node-id">'.$this->root->descendant_id.'</span>';
        $tree = $this->traverseNode($this->root);
        return response()->json($tree,200);
//        return $this->printNode($tree);
    }

    public function traverseNode($node){
        $node->children = $this->getChildren($node->descendant_id);
        $node->name .= '<span class="children-count">'.count($node->children).'</span>';
        foreach($node->children as $key => $child){
            $node->children[$key] = $this->traverseNode($child);
        }
        return $node;
    }

/*    public function printNode($node,$html=''){
//        $class = ($node->status==0) ? "inactive" : "active" ;
        if(count($node->children)>0) {
            $html .= '<ul><li><div class="status '.$node->className.'"></div>'.$node->first_name.$node->id;
            foreach($node->children as $child){
               $html .= $this->printNode($child);
            }
            $html .= '</li></ul>';
        } else {
            $html .= '<li><div class="status '.$node->className.'"></div>'.$node->first_name.$node->id.'</li>';
        }
        return $html;
    }*/

}
