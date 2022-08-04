<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Summary;
use App\Models\Skill;
use App\Models\Language;
use App\Models\Contact;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;


class adminController extends Controller
{
    //
    public function login(){
        return view('admin.login');
    }

    public function index(){
        $user=User::select("name","image")->findOrFail(1);
        $personal=User::findOrFail(1)->personals()->get();
        return view("admin.index",compact(['personal',"user"]));
    }

    public function editPersonal(Request $request){
        $this->validate($request,[
            "name"=>'required|string|min:6',
            "address" =>"required|string|min:6",
            "education" => "required|string|min:10",
            "job" =>"required|string|min:5",
            "nationality"=>"required|string|min:5",
            "date_of_birth"=>"required|date",
            "Military_service"=>'required|string|min:4',

        ]);
        if($request->image){
            $photo=$request->image;
        $file_name = 'Mypic.jpeg';
        $path =public_path("images");
        $photo -> move($path,$file_name);
        }

        $user=User::findOrFail(1);
        $user->name=$request->name;
        $user->save();

        $personal=$user->personals;
        $personal->address=$request->address;
        $personal->education=$request->education;
        $personal->job=$request->job;
        $personal->nationality=$request->nationality;
        $personal->date_of_birth=$request->date_of_birth;
        $personal->Military_service=$request->Military_service;
        $personal->save();

        return response()->json([
            'status' => true,
        ]);

        
    }

    public function check(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
         $admin=Admin::where(["email"=>$request->email])->first();
        if (isset($admin)&&$admin->count()>0&&Crypt::decryptstring($admin->password)==$request->password)
        {
            $request->session()->put('success','success');
           return redirect()->route('dashboard');

        } else {
            $msg="Your Email Or Password is Wrong";
            return redirect()->route("admin.login")->with(["msg"=>$msg]);
        }
    }

    public function getSummary(){
        $summary = User::findOrFail(1)->summary->get();
        return view("admin.summary",compact('summary'));
    }

    public function editSummary(Request $request){
        $this->validate($request, [
            'title' => 'required',
        ]);
        $summary=Summary::findOrFail(1);
        if(!$summary){
            return  response()->json([
                'status' =>false,
            ]);
        }
        $summary->title=$request->title;
        $summary->save();
        return response()->json([
            'status' => true,
        ]);
    }
    public function allSkills(){
        $skills=Skill::all();
        return view("admin.skills",compact("skills"));
    }

    public function createSkill(){
        return view("admin.createSkill");
    }

    public function saveSkill(Request $request){
        $this->validate($request,[
            "name"=>"required|string|min:2|unique:skills,name",
        ]);
        $user=User::first();
        $skill=Skill::create([
            "name"=>$request->name,
            "user_id"=>$user->id,
        ]);
        $skill->save();
        return response()->json([
            'status' => true,
        ]);
    }
    public function updateSkill($id){
        $skill=Skill::findOrFail($id);
        return view("admin.update-skill",compact("skill"));
    }

    public function editSkill(Request $request,$id){
        $this->validate($request,[
            "name"=>"required|string|min:2|unique:skills,name,".$id.",id",
        ]);
        $skill=Skill::findOrFail($id);
        $skill->name=$request->name;
        $skill->save();
        return response()->json([
            "status"=>true,
        ]);
    }
    
    public function deleteSkill(Request $request){
        $skill=Skill::findOrFail($request->id);

        if(!$skill){
            return response()->json([
                "status"=>false,
            ]);
        }
        $skill->delete();
        return response()->json([
            "status"=>true,
        ]);
    }

    public function allLanguages(){
        $languages=Language::all();
        return view("admin.languages",compact("languages"));
    }

    public function createLanguage(){
        return view("admin.createLanguage");
    }

    public function saveLanguage(Request $request){
        $this->validate($request,[
            "name"=>"required|string|unique:languages,name|min:5",
            "description"=>"required|string|min:4"
        ]);
        $user=User::first();
        $lang=Language::create([
            "name"=>$request->name,
            "description"=>$request->description,
            "user_id"=>$user->id,
        ]);
        return response()->json([
            "status" =>true,
        ]);
    }
    
    public function updateLanguage($id){
        $language=Language::findOrFail($id);
        return view("admin.update-language",compact("language"));
    }

    public function editLanguage(Request $request,$id){
        $this->validate($request,[
            "name"=>"required|string|min:2|unique:languages,name,".$id.",id",
            "description"=>"required|string|min:4",
        ]);
        $language=Language::findOrFail($id);
        $language->name=$request->name;
        $language->description=$request->description;
        $language->save();
        return response()->json([
            "status"=>true,
        ]);
    }

    public function deleteLanguage(Request $request){
        $language=Language::findOrFail($request->id);

        if(!$language){
            return response()->json([
                "status"=>false,
            ]);
        }
        $language->delete();
        return response()->json([
            "status"=>true,
        ]);

    }

    public function allContacts(){
        $contacts=Contact::all();
        return view("admin.contacts",compact("contacts"));
    }

    public function createContact  (){
        return view("admin.createContact");
    }


    public function saveContact(Request $request){
        $this->validate($request,[
            "name"=>"required|string|min:5",
            "icon"=>"required|string|min:2",
            "link" =>"required|string|min:10"
        ]);
        $user=User::first();
        $contact=Contact::create([
            "name"=>$request->name,
            "icon"=>$request->icon,
            "link"=>$request->link,
            "user_id"=>$user->id,
        ]);
        return response()->json([
            "status" =>true,
        ]);
    }

    public function updateContact($id){
        $contact=Contact::findOrFail($id);
        return view("admin.update-contact",compact("contact"));
    }

    public function editContact(Request $request,$id){
        $this->validate($request,[
            "name"=>"required|string|min:5",
            "icon"=>"required|string|min:2",
            "link" =>"required|string|min:10"
        ]);
        $contact=Contact::findOrFail($id);
        $contact->name=$request->name;
        $contact->icon=$request->icon;
        $contact->link=$request->link;
        $contact->save();
        return response()->json([
            "status"=>true,
        ]);
    }

    public function deleteContact(Request $request){
        $contact=Contact::findOrFail($request->id);

        if(!$contact){
            return response()->json([
                "status"=>false,
            ]);
        }
        $contact->delete();
        return response()->json([
            "status"=>true,
        ]);

    }




}
