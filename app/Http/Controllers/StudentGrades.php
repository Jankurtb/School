<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\schoolyear;
use App\search_subjects;
use DB;
use App\sendgradeadmin;

class StudentGrades extends Controller
{
    public function index()
    {
      $schoolyear = schoolyear::all();
      return view('student.studentgrades', compact('schoolyear'));
    }

    public function showGrades(Request $request)
    {
      $output = '';
      $gradingperiod = $request->get('gradingPeriod');
      $schoolyear = $request->get('schoolYear');
      $student_id = $request->get('student_id');
      $search = DB::table('sendgradeadmins')
                  ->join('search_subjects', 'sendgradeadmins.subjectCode', '=', 'search_subjects.subjectCode')
                  ->join('users', 'sendgradeadmins.employee_id', '=', 'users.employee_id')
                  ->select('search_subjects.subjectCode', 'search_subjects.description', 'users.firstName', 'users.lastName', 'users.middleName','sendgradeadmins.grade')
                  ->where('sendgradeadmins.gradingperiod', $gradingperiod)
                  ->where('sendgradeadmins.schoolYear', $schoolyear)
                  ->where('sendgradeadmins.student_id', $student_id)
                  ->groupBy('sendgradeadmins.subjectCode')
                  ->get();
      $count = count($search);
      
      if($count > 0)
      {
        foreach($search as $searchs)
        {
          $grade = $searchs->grade;
          if($grade >= 75)
          {
              $output .= '
                    <tr>
                      <td colspan="2">'.$searchs->subjectCode.'</td>
                      <td colspan="2">'.$searchs->description.'</td>
                      <td colspan="2">'.$searchs->firstName.' '.$searchs->middleName.' '.$searchs->lastName.'</td>
                      <td>'.$searchs->grade.'</td>
                      <td> <span class="badge badge-success"> Passed </span> </td>
                    </tr>';
          }
          else 
          {
              $output .= '
                    <tr>
                      <td colspan="2">'.$finalsearchs->subjectCode.'</td>
                      <td colspan="2">'.$finalsearchs->description.'</td>
                      <td colspan="2">'.$finalsearchs->firstName.' '.$finalsearchs->middleName.' '.$finalsearchs->lastName.'</td>
                      <td>'.$finalsearchs->grade.'</td>
                      <td><span class="badge badge-danger"> Failed </span> </td>
                    </tr>';
          }
        }
        return response()->json($output);
        
      }
        else {
          $output = '<tr> <td colspan="5">No grades were found </td> </tr>';
          return response()->json($output);
      }
      
    }

    public function update(Request $request, $id)
    {
      $student = sendgradeadmin::findOrFail($id);
      $student->grade = $request->get('grade');
      $student->save();
      return response()->json($student);
    }
}
