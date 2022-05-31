<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Author;
use App\Models\Category;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Post::all();
        return view('retrieve_posts')->with('posts_details',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        $categories = Category::all();
        return view('create_posts',compact('authors','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
      
        parse_str($request['formdata'],$formdata);
        //dd($formdata);
        $validator = Validator::make($formdata, [
            'title'=>'required|max:1000|min:5|string',
            'content'=>'required|max:1000|min:5|string',   
            'author_id'=>'required',  
            'category_id'=>'required',
           ]);


        if ($validator->fails()) {
            return response()->Json(['status'=>'error','msg'=>'validation failed']);

        }
        
        
           $task = new Post();

           $task->title=$formdata['title'];
           $task->content=$formdata['content'];
           $task->author_id=$formdata['author_id'];
           $task->category_id=$formdata['category_id'];
          
    
           $task->save();
           return response()->Json(['status'=>'success','msg'=>'Added successfully']);

        //dd($request -> all());
        //dd("controller");
        //dd("controller");
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
        $posts=Post::find($id);
        $authors = Author::all();
        $categories = Category::all();
        return view('update_posts')->with('postsdata',$posts)->with('authors',$authors)->with('categories',$categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        parse_str($request['formdata'],$formdata);
        //dd($formdata);
        $validator = Validator::make($formdata, [
            'title'=>'required|max:1000|min:5|string',
            'content'=>'required|max:1000|min:5|string',   
            'author_id'=>'required',  
            'category_id'=>'required',
           ]);


        if ($validator->fails()) {
            return response()->Json(['status'=>'error','msg'=>'validation failed']);

        }


        $updateData = Post::find($id);
        $updateData->title = $formdata['title'];
        $updateData->content = $formdata['content'];
        $updateData->author_id = $formdata['author_id'];
        $updateData->category_id = $formdata['category_id'];
        
        $updateData->save();       
        
        
           return response()->Json(['status'=>'success','msg'=>'Updated successfully']);


        
         
         

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        $posts=Post::find($id);
        $posts->delete();
        return response()->Json(['status'=>'success','msg'=>'Deleted successfully']);
        
    }

    public function getPostsList(Request $request)
    {
        $posts = Post::all();
        
       
        return DataTables::of($posts)
            
            ->editColumn('author_id', function($posts) {
                if($posts->author){
                    return $posts->author->name;
                } else{
                   return '';
                }   
            })

            ->editColumn('category_id', function($posts) {
                if($posts->category){
                    return $posts->category->name;
                } else{
                   return '';
                }   
            }) 

            ->addColumn('action', function ($posts) {
                return '<div >
               
                      
                <button class="btn btn btn_delete " data-id="'.$posts->id.'" style="background-color:#008080!important;color:white;">Delete</button>
               
                <a href="'.url('/posts/'.$posts->id.'/edit').'" class="btn btn" style="background-color:#0059b3!important;color:white;" >Edit</a>
           </div>  ';      
            })
           
            ->rawColumns(['action'])
            ->make();
    }
}
