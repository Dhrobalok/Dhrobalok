<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalarySegment;
use App\Models\Festival;
use App\Models\Employee;
use App\Models\FestivalBonus;
use App\Models\SegmentWiseSalaryDistribution;
/**
 * This controller maintains all operations about on festivals such as new festival addition, edition and deletion etc.
 * Generally we called that controller as bonus Manager.
 */
class FestivalController extends Controller
{
    public function index()
    {
          /**
     * This function is used for showing/rendering all festivals currently stored in the database.
     * @param Required no parameters
     * @return Return a view object with a list of festivals
     * .
     */
        $festivals = Festival :: all();
        return view('backend.admin.festivals.index',['festivals' => $festivals]);
    }
    public function create()
    {
          /**
     * This function is used for starting the saving process of a festival.
     * @param Required no parameters
     * @return Return a view object that describe a festival related info form.
     */
        $segments = SalarySegment :: all();
        return view('backend.admin.festivals.create',['segments' => $segments]);
    }
    public function store(Request $request)
    {
          /**
     * This function is used for saving newly created festival
     * @param Required four parameters called festival name,segment id,month and festival date.
     * @return void; Redirect to the index page of festivals section with success message.
     */
        $festival_name = $request -> festival_name;
        $segment_id = $request -> segment_id;
        $month = $request -> month;
        $percentage = $request -> bonus_percentage;
        $festival_date = $request -> festival_date;
        $year = date('Y');

        $newFestival = new Festival();
        $newFestival -> name = $festival_name;
        $newFestival -> segment_id = $segment_id;
        $newFestival -> year = $year;
        $newFestival -> month = $month;
        $newFestival -> festival_date = $festival_date;
        $newFestival -> percentage = $percentage;
        $newFestival -> status = 1;
        $newFestival -> save();

        $this -> saveFestivalBonusEntries($newFestival);

        return redirect() -> route('admin.festival.index')->with('message','Festival added successfully');
    }
    public function edit($festival_id)
    {
        /**
         * This function is used to edit a specific festival information.
         * @param Required only one parameter called festival id.
         * @return view object contains information about a specific festival.
         */
        $festival = Festival :: find($festival_id);
        $segments = SalarySegment :: all();
        return view('backend.admin.festivals.edit',['segments' => $segments,'festival' => $festival]);
    }
    public function update(Request $request,$festival_id)
    {
         /**
     * This function is used for  updating a specific festival
     * @param Required five parameters called festival name,festival id,segment id, month and status.
     * @return void; Redirect to the index page of festivals section with success message.
     */
        $festival_name = $request -> festival_name;
        $segment_id = $request -> segment_id;
        $month = $request -> month;
        $festival_date = $request -> festival_date;
        $status = $request -> status;
        $Festival = Festival :: find($festival_id);
        $Festival -> name = $festival_name;
        $Festival -> segment_id = $segment_id;
        $Festival -> percentage = $request -> percentage;
        $Festival -> month = $month;
        $Festival -> festival_date = $festival_date;
        $Festival -> status = $status;
        $Festival -> save();
        
        $this -> updateWithNewPercentage($Festival);
        return redirect() -> route('admin.festival.index')->with('message','Festival updated successfully');
    }
    public function delete(Request $request)
    {
        /**
     * This function is used for  deleting  a specific festival info.
     * @param Required one  parameter called festival id.
     * @return void.
     */
        $festival = Festival :: find($request -> festival_id);
        $festival -> delete();
    }
    public function set_bonus($employee_id)
    {
        /**
         * This function intialize the view for setting up bonus for a specific employee.
         * @param Required only one parameter called employe id.
         * @return view object contains employee info with his/her payscale info and list of festivals.
         */
        $employee = Employee :: find($employee_id);
        $festivals = Festival :: where('status',1)->get();
        return view('backend.admin.festivals.set_bonus',['employee' => $employee,'festivals' => $festivals]);
    }

    public function save_bonus(Request $request)
    {
        /**
         * This function save bonus amount(provided by the authority) to the database for an specific employee on a specific festival.
         * @param Required three parameters called employee id,festival id and bonus percentage.
         * @return void.
         */
       
       $employee_id = $request -> employee_id;
       $festival_id = $request -> festival_id;
       $bonus_per = $request -> bonus_per;
       $employee = Employee :: find($employee_id);
       $payscale = $employee -> payscale -> payscale_detail;
       $base_salary = $payscale -> salary_amount;
       $bonus_amount = ceil($bonus_per * $base_salary) / 100.00;
       $festival = Festival :: find($festival_id);
       FestivalBonus :: where('employee_id',$employee_id)
                      ->update(['status' => 0]);
       SegmentWiseSalaryDistribution :: where('employee_id',$employee_id)
                                     ->where('salary_segment_id',$festival -> segment_id)
                                     ->where('status',1)
                                     ->update(['amount' => $bonus_amount]);
       $bonus = new FestivalBonus();
       $bonus -> employee_id = $employee_id;
       $bonus -> festival_id = $festival_id;
       $bonus -> bonus_percentage = $bonus_per;
       $bonus -> status = 1;
       $bonus -> save();
       
    }
    public function copy_bonus(Request $request)
    {
        /**
         * This function do the same thing describe in the save_bonus() method for a list of employees on a specific festival.
         * @param Required three parameters called employee id(For which already bonus set up),festival id and bonus percentage.
         * @return void.
         */
        $employee_id = $request -> employee_id;
        $festival_id = $request -> festival_id;
        $bonus_per = $request -> bonus_per;
        

        $employees = Employee :: where('id','!=',$employee_id)
                    ->get();
        
        foreach($employees as $employee)
        {
            FestivalBonus :: where('employee_id',$employee -> id)
            ->update(['status' => 0]);
            
            $payscale = $employee -> payscale -> payscale_detail;
            $base_salary = $payscale -> salary_amount;
            $bonus_amount = ceil($bonus_per * $base_salary) / 100.00;
            $festival = Festival :: find($festival_id);

            SegmentWiseSalaryDistribution :: where('employee_id',$employee -> id)
            ->where('salary_segment_id',$festival -> segment_id)
            ->where('status',1)
            ->update(['amount' => $bonus_amount]);

            $bonus = new FestivalBonus();
            $bonus -> employee_id = $employee -> id;
            $bonus -> festival_id = $festival_id;
            $bonus -> bonus_percentage = $bonus_per;
            $bonus -> status = 1;
            $bonus -> save();
        }
    }

    public function saveFestivalBonusEntries(Festival $festival)
    {
        $employees = Employee :: all();
        $festival_id = $festival -> id;
        $bonus_percentage = $festival -> percentage;
        
        foreach($employees as $employee)
        {
            FestivalBonus :: create([
               'festival_id' => $festival -> id,
               'employee_id' => $employee -> id,
               'bonus_percentage' => $bonus_percentage,
               'status' => 1
            ]);
        }
    }

    public function updateWithNewPercentage(Festival $festival)
    {
       $records = $festival -> getRelatedBonusEntries;

       foreach($records as $record)
       {
           $record -> bonus_percentage  = $festival -> percentage;
           $record -> save();
       }
    }
}
