<?php

namespace App\Http\Controllers;






use App\TreeEstructura;
use Illuminate\Http\Request;
use App\Http\Models\Todolist;
use App\Estructura;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;


class AjaxController extends Controller
{
    public function setSession(Request $request)
    {
        if ($request->ajax()) {
            $request->session()->put(
                [
                    'rol_id' => $request->input('rol_id'),
                    'rol_nombre' => $request->input('rol_nombre')
                ]
            );
            return response()->json(['mensaje' => 'ok']);
        } else {
            abort(404);
        }
    }

    public function ajaxRequestPost(Request $request)
    {

        if ($request->ajax()) {
            $user = session()->get('usuario_id');
            $posts = Todolist::where('userid', $user)->orderby('id')->get();

            $data['lists'][0] = [
                'onSingleLine' => 'true',
                'sortable' => 'true',
                'title' => 'Tareas',
                'defaultStyle' => 'lobilist-info',
            ];

            foreach ($posts as $key => $post) {
                $data['lists'][0]['items'][$key] = [
                    'id' => $post->id,
                    'userid' => $post->userid,
                    'title' => $post->titulo,
                    'description' => $post->descripcion,
                    'dueDate' => $post->fecha
                ];
            }



            // $data='{
            // "lists": [
            // {
            // "onSingleLine": "true",
            // "sortable": "true",
            // "title": "Tareas",
            // "defaultStyle": "lobilist-info",
            // "items": [
            // {
            // "title": "beforeItemDelete is never called",
            // "description": "even in your \"Event handling\" example",
            // "dueDate" : "31-01-2020"
            // },
            // {
            // "title": "jhdhdhbd df sdf sdfsf",
            // "description": "sajdhasd sdhas sad sad",
            // "dueDate" : "31-04-2020"
            // }
            // ]
            // }
            // ]
            // }';


            return $data;
        }
    }
    public function ajaxFillStrucTree(Request $request)
    {
        $res = TreeEstructura::paginate(3000);

        foreach ($res as $row) {
            $data[] = $row->toarray();
        }

        $itemsByReference = array();

        // Build array of item references:
        foreach ($data as $key => &$item) {
            $itemsByReference[$item['id']] = &$item;
            // Children array:
            $itemsByReference[$item['id']]['children'] = array();
            // Empty data class (so that json_encode adds "data: {}" )
            $itemsByReference[$item['id']]['data'] = new \StdClass();
        }

        // Set items as children of the relevant parent item.
        foreach ($data as $key => &$item)
            if ($item['parent_id'] && isset($itemsByReference[$item['parent_id']]))
                $itemsByReference[$item['parent_id']]['children'][] = &$item;

        // Remove items that were added to parents elsewhere:
        foreach ($data as $key => &$item) {
            if ($item['parent_id'] && isset($itemsByReference[$item['parent_id']]))
                unset($data[$key]);
        }


        return $data;
    }

    public function ajaxGetNodeInfoStructTree(Request $request)
    {

        if ($request->ajax()) {

            $estructuras = Estructura::findOrFail($request["id"]);

            $view = View::make('estructura.form')->with('estructuras', $estructuras);
            $sections = $view->render();

            return json_encode($sections);
        }
    }
}
