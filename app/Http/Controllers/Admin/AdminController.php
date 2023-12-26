<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\File;

use Hash;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = Admin::paginate(1);
        return view('admin.index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'string|required',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:8|confirmed',
    
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048', // 
          
    
        ]);
    
      

        $imageNew = '';
        if($request->hasFile('image')){
            $img = $request->image;
            $imageNew = time().'.'.rand(0,1000).'.'.$img->extension();
            $img->move(public_path('backend/assets/uploads') , $imageNew);
        }


        $new = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
           
    
            'image' => $imageNew
    
        ]);
 
        if($new){
            return redirect()->route('admin-view.index')->with('success','successfully created admin-view');
    
        }else{
             return back()->with('error','something went wrong!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.edit',compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      try{
        $validated = $request->validate([
            'name' => 'string|required',
            'email' => 'required|string|email|max:255|unique:admins,email,'.$id,//The 'unique:admins,email,'.$id rule in the email validation ensures that the email is unique among admins, excluding the current admin's record with the given $id.
            'password' => 'required|string|min:8|confirmed',
        
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048', // 
        ]);
        $admin = Admin::findOrFail($id);

        if ($request->hasFile('image')) {
            // Delete old image
            if (!empty($admin->image)) {
                $oldImagePath = public_path('backend/assets/uploads') . '/' . $admin->image;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
        
            // Upload new image
            $img = $request->file('image');
            $imageNew = time().'.'.rand(0,1000).'.'.$img->extension();
            $img->move(public_path('backend/assets/uploads'), $imageNew);
        
            // Update  image 
            $admin->update([
                'image' => $imageNew,
            ]);
        }
        
        // Update other fields 
        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        return redirect()->route('admin-view.index')->with(['success' => 'That\'s right']);
        


     }catch(\Exception $ex){

         return redirect()->route('admin-view.index')->with(['error'=>'there are error'.$ex->getMessage()]);

     }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);
      
        if(File::exists(public_path('backend/assets/uploads/' . $admin->image))){
            File::delete(public_path('backend/assets/uploads/' . $admin->image));
  
        }
        $info = $admin->delete();
       
        return back()->with('success','deleted success');
    }
}
