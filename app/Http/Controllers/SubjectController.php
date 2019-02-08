<?php

namespace App\Http\Controllers;

use App\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::get();

        return view('subject.index')->with(compact('subjects'));
    }

    public function checkIfSubjectExist($name = null)
    {
        if (Subject::where('subject_name', '=', $name)->exists())
            return true;
        else
            return false;
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post'))
        {
            $data = $request->input();

            if ($this->checkIfSubjectExist($data['subject_name'])) {

                return redirect('przedmioty/dodaj')->with('flash_message_error','Przedmiot '.$data['subject_name'].' juz istnieje');
            }

            $subject = new Subject;
            $subject->subject_name = $data['subject_name'];
            
            if ($subject->save())
                return redirect('przedmioty')->with('flash_message_success','Przedmiot został dodany.');
            else
                return redirect('przedmioty')->with('flash_message_error','Błąd podczas dodawania przedmiotu.');
        }
        return view('subject.create');
    }

    public function edit(Request $request, $subject_id = null)
    {
        if ($request->isMethod('post'))
        {
            $data = $request->input();

            $subject = Subject::where('subject_id',$subject_id)->first();

            if ($subject->subject_name != $data['subject_name'])
                if ($this->checkIfSubjectExist($data['subject_name'])) {

                    return redirect('przedmioty/edytuj/'.$subject_id)->with('flash_message_error','Przedmiot '.$data['subject_name'].' juz istnieje');
                }

            $subject_data['subject_name'] = $data['subject_name'];
            
            if (Subject::where('subject_id',$subject_id)->update($subject_data))
                return redirect('przedmioty')->with('flash_message_success','Przedmiot został zaktualizowany.');
            else
                return redirect('przedmioty')->with('flash_message_error','Błąd podczas aktualizowania przedmiotu.');
        }

        $subject = Subject::where('subject_id',$subject_id)->first();

        return view('subject.edit')->with(compact('subject'));
    }

    public function delete(Request $request, $subject_id = null)
    {
        if(!empty($subject_id))
        {
            if (Subject::where('subject_id',$subject_id)->delete())
                 return redirect('przedmioty')->with('flash_message_success','Przedmiot został usunięty.');
            else
                return redirect('przedmioty')->with('flash_message_error','Błąd podczas usuwania przedmiotu.');
        }
        return redirect('przedmioty');
    }
}
