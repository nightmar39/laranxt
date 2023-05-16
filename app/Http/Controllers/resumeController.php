<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resume; 
use App\Models\skills;
use App\Models\experience;

class resumeController extends Controller
{
    //Function to print a staticly printed version of our model
    public function ListStaticResume(){

        $resumes = [];

        $name = 'test';
        $email = 'test@example.com';

        $resumes[] = [
            'name' => $name,
            'email' => $email,
        ];

        return $this->render($resumes);
    }
//List all resumes in database 
    public function ListResumes(){
        return $this->render(Resume::all());
    }

//List particular resume of Anthony with ID 1
    public function Anthony(){
        $candidate = []; 

        $candidate = [
        'Candidate' => Resume::find(1),
        'Skills' => skills::where('resumes_id', '1')->get()->pluck('name')->toArray(),
        'Experience' => experience::where('resumes_id', '1')->get()->toArray(),
        //'Experience' => experience::all()
        ];
        return $this->render($candidate);

    }

    public function EditCandidateEmail(Request $request){
        $resume = Resume::find(1);
        $resume-> email = request->email;
        $resume->save(); 
    }

    public function AddSkill(Request $request){

        $newSkill = new skills; 
        $newSkill->name = $request->skill;
        $newSkill->resumes_id = 1;
        $newSkill->save();

    }

    public function DeleteSkill($id)
    {
        $skill = skills::find($id);
        if ($skill) {
            $skill->delete();
            //return response()->json(['message' => 'Skill deleted successfully']);
        } //else {
            //return response()->json(['message' => 'Skill not found'], 404);
        //}
    }


    public function SaveResume(Request $request){
        \Log::info(json_encode($request->all()));
        return "Hello_world";

    }

    public function AddExperience(Requst $request){
        $newExperience = new experience; 
        $newExperience->company_name = $request->company_name; 
        $newExperience->job_title = $request->job_title;
        $newExperience->start_date = $request->start_date; 
        $newExperience->description = $request->description; 
        $newExperience->resumes_id = 1;
        $newExperience->save();
    }   

    public function EditExperience(Requst $request){
        $experience = experience::find($request->id);
        $experience->company_name = $request->company_name; 
        $experience->job_title = $request->job_title;
        $experience->start_date = $request->start_date; 
        $experience->description = $request->description; 
        $experience->resumes_id = 1;  
        $experience->save(); 
    }

    public function DeleteExperience($id)
    {
        $experience = experience::find($id);
        if ($experience) {
            $experience->delete();
            //return response()->json(['message' => 'Skill deleted successfully']);
        } //else {
            //return response()->json(['message' => 'Skill not found'], 404);
        //}
    }

}
