<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Author;
use App\Models\Category;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Category::all();
        return view('retrieve_categories')->with('categories_details',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_categories');
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
        
        
           $task = new Category();

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
        $categories=Category::find($id);
        return view('update_categories')->with('categoriesdata',$categories);
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


        $updateData = Category::find($id);
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
        $categories=Category::find($id);
        $categories->delete();
        return response()->Json(['status'=>'success','msg'=>'Deleted successfully']);
      
    }

    public function getCategoriesList(Request $request)
    {
        $categories = Category::all();
        
       
        return DataTables::of($categories)

            ->addColumn('action', function ($categories) {
                return '<div >
                
                      
                <button class="btn btn btn_delete " data-id="'.$categories->id.'" style="background-color:#008080!important;color:white;">Delete</button>
            
                <a href="'.url('/categories/'.$categories->id.'/edit').'" class="btn btn" style="background-color:#0059b3!important;color:white;" >Edit</a>

                <button class="btn btn btn_view " data-id="'.$categories->id.'" style="background-color:#595959!important;color:white;">View</button>
           </div>  ';      
            })
           
            ->rawColumns(['action'])
            ->make();
    }

    public function viewCategoryPosts($id)
    {
        $categories=Category::find($id);
        $books = $categories->posts;
        return view('view_post_from_category',compact('books'));
    }
}
