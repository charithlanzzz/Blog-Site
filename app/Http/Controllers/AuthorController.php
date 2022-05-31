<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Author;
use App\Models\Category;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Author::all();
        return view('retrieve_authors')->with('authors_details',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_authors');
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
            'name'=>'required|max:1000|min:5|string',
            'description'=>'required|max:1000|min:5|string',   
           ]);


        if ($validator->fails()) {
            return response()->Json(['status'=>'error','msg'=>'validation failed']);

        }
        
        
           $task = new Author();

           $task->name=$formdata['name'];
           $task->description=$formdata['description'];
           
    
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
        $authors=Author::find($id);
        return view('update_authors')->with('authorsdata',$authors);
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
            'name'=>'required|max:1000|min:5|string',
            'description'=>'required|max:1000|min:5|string',   
            
           ]);


        if ($validator->fails()) {
            return response()->Json(['status'=>'error','msg'=>'validation failed']);

        }


        $updateData = Author::find($id);
        $updateData->name = $formdata['name'];
        $updateData->description = $formdata['description'];
        
        
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
        $authors=Author::find($id);
        $authors->delete();
        
        return response()->Json(['status'=>'success','msg'=>'Deleted successfully']);
    }

    public function getAuthorsList(Request $request)
    {
        $authors = Author::all();
        
        return DataTables::of($authors)

            ->addColumn('action', function ($authors) {
                return '<div >
               
                      
                <button class="btn btn btn_delete " data-id="'.$authors->id.'" style="background-color:#008080!important;color:white;">Delete</button>
               
                <a href="'.url('/authors/'.$authors->id.'/edit').'" class="btn btn" style="background-color:#0059b3!important;color:white;" >Edit</a>

                <button class="btn btn btn_view " data-id="'.$authors->id.'" style="background-color:#595959!important;color:white;">View</button>
           </div>  ';      
            })
           
            ->rawColumns(['action'])
            ->make();
    }
    
    public function viewAuthorPosts($id)
    {
        $authors=Author::find($id);
        $books = $authors->posts;
        return view('view_post_from_author',compact('books'));
    }
}
