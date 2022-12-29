<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bank;
/**
 * This controller helps us to maintain bank related operation such as new bank addition, edition, deletion etc.
 
 */
class BankController extends Controller
{
    public function index()
    {
            /**
     * This function is used for showing/rendering all banks currently stored in the database.
     * @param Required no parameters
     * @return Return a view object with a list of banks
     * .
     */
       $banks = Bank :: all();
       return view('backend.admin.bank.index',['banks' => $banks]);
    }
    public function create()
    {
           /**
     * This function is used for starting the saving process of a bank.
     * @param Required no parameters
     * @return Return a view object that describe a bank info related form.
     */
      return view('backend.admin.bank.create');
    }
    public function store(Request $request)
    {
          /**
     * This function is used for saving newly created bank name.
     * @param Required only one parameter called bank name.
     * @return void; Redirect to the index page of banks section with success message.
     */
        $request -> validate([
            'bank_name' => ['required','min:8','unique:banks']
        ]);

       $bank_name = $request -> bank_name;
       $newBank = new Bank();
       $newBank -> bank_name = $bank_name;
       $newBank -> save();

       return redirect() -> back() -> with('message','Bank Information Saved Successfully!!');
    }

    public function view($bank_id)
    {
         /**
     * This function is used for  viewing a specific bank info
     * @param Required one parameter called bank id
     * @return Return a view object that contains info about a specific bank.
     */
       $bank = Bank :: find($bank_id);
       return view('backend.admin.bank.edit',['bank_info' => $bank]);
    }
    public function update(Request $request,$bank_id)
    {
         /**
     * This function is used for  update a specific bank info.
     * @param Required only one parameter called bank id.
     * @return void; Redirect to the index page of  banks section with success message.
     */
       $bank = Bank :: find($bank_id);
       $bank -> bank_name = $request -> bank_name;
       $bank -> save();
       return redirect()->back()->with('message','Bank Name Updated Successfully!!');
    }
    public function delete($bank_id)
    {
        /**
     * This function is used for  delete a specific bank.
     * @param Required one  parameter called bank id.
     * @return void. Redirect to the index page of banks section with sucess message.
     */
       $bank = Bank :: find($bank_id);
       $bank -> delete();
       return redirect()->back()->with('message','Bank Record Removed Successfully!!');
    }

    public function get_banks_info(Request $request)
    {
         /**
         * This function helps us to find out all banks from the database. It works on the basis of searchTerm keyword which is provided from the user.
         * For account searching process, we use an js plugin called select2. For more details about select2, please visit at :
         * https://select2.org/.
         * @param Required only the search Term(Which describes bank name)
         * @return array of banks in json encoded format, which is used in select2 plugin data.
         */
        $searchTerm = $request -> searchTerm;
        $options;
        if(!isset($request -> searchTerm))
         $options = Bank :: all();
        else
        {
            $options = Bank :: where('bank_name','like','%'.$searchTerm.'%')
                                       ->get();
        }
        $data = array();
        foreach($options as $option)
        {
            $data[] = array('id' => $option -> id,'text' => $option -> bank_name);
        }
        return json_encode($data);
    }

}
