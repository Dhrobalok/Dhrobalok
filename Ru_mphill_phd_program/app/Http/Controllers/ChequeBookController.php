<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChequeBook;
use App\Rules\SelectCorrectAccount;
use App\Http\Controllers\ChequeBookStatus;
use App\Models\ChequeBookPage;
use App\Models\Bank;
use App\Models\Approve;
/**
 * This controller helps us to maintain cheque book related operation such as new cheque book addition, edition, deletion etc.
 
 */
class ChequeBookController extends Controller
{
    public function index()
    {
          /**
     * This function is used for showing/rendering all cheque books currently stored in the database.
     * @param Required no parameters
     * @return Return a view object with a list of cheque books.
     * .
     */
        $cheque_books = Approve :: where('status',1)->get();
        return view('backend.admin.cheque_books.index',['cheque_books' => $cheque_books]);
    }
    public function create()
    {
          /**
     * This function is used for starting the saving process of a cheque book.
     * @param Required no parameters
     * @return Return a view object that describe a cheque book info related form.
     */
        return view('backend.admin.cheque_books.create');
    }
    public function store(Request $request)
    {
         /**
     * This function is used for saving newly created cheque book.
     * @param Required eight parameters called cheque book registration date, issued by,account no,banks, cheque book no,cheque book pages,start page and end page.
     * 
     * @return void; Redirect to the index page of cheque books section with success message.
     */
        $request -> validate([
           'registration_date' => ['required'],
           'issued_by' => ['required'],
           'account_no' => ['required',new SelectCorrectAccount],
           'banks' => ['required', new SelectCorrectAccount],
           'cheque_book_no' => ['required'],
           'cheque_book_pages' => ['required'],
           'start_page' => ['required'],
           'end_page' => ['required']
        ]);

        $chequeBook = new ChequeBook;
        $chequeBook -> registration_date = $request -> registration_date;
        $chequeBook -> issued_by = $request -> issued_by;
        $chequeBook -> bank_id = $request -> banks;
        $chequeBook -> account_no = $request -> account_no;
        $chequeBook -> chequebook_no = $request -> cheque_book_no;
        $chequeBook -> start_page_no = $request -> start_page;
        $chequeBook -> end_page_no = $request -> end_page;
        $chequeBook -> total_page_number = $request -> cheque_book_pages;
        $chequeBook -> status = ChequeBookStatus :: Active;
        $chequeBook -> save();

        //Save the page number in the cheque book pages table
         $start_page = $request -> start_page;

        for($i = 1; $i <= $request -> cheque_book_pages; $i++)
        {
            $chequeBookPage = new ChequeBookPage();
            $chequeBookPage -> cheque_book_id = $chequeBook -> id;
            $chequeBookPage -> page_number = $start_page;
            $chequeBookPage -> status = ChequeBookStatus :: Active;
            $chequeBookPage -> save();
            $start_page++;
        }

        return redirect()->back()->with('message','Cheque Book Saved Successfully!!');
    }

    public function view($cheque_book_id)
    {
        /**
     * This function is used for  viewing a specific cheque book info
     * @param Required one parameter called cheque book id
     * @return Return a view object that contains info about a specific cheque book.
     */
        $chequeBook = ChequeBook :: find($cheque_book_id);
        $chequeBookPages = $chequeBook -> cheque_pages;
        return view('backend.admin.cheque_books.view',['chequeBook' => $chequeBook,'chequeBookPages' => $chequeBookPages]);
    }

    public function update($cheque_book_id,Request $request)
    {
          /**
     * This function is used for  update a specific cheque book info.
     * @param Required eight parameters called cheque book registration date, issued by,account no,banks, cheque book no,start page, end page and cheque book id.
     * @return void; Redirect to the index page of  cheque books section with success message.
     */
        $request -> validate([
            
            'registration_date' => ['required'],
           'issued_by' => ['required'],
           'account_no' => ['required',new SelectCorrectAccount],
           'banks' => ['required', new SelectCorrectAccount],
           'cheque_book_no' => ['required'],
           'start_page' => ['required'],
           'end_page' => ['required']
        ]);

        $chequeBook = ChequeBook :: find($cheque_book_id);
        $chequeBook -> registration_date = $request -> registration_date;
        $chequeBook -> issued_by = $request -> issued_by;
        $chequeBook -> bank_id = $request -> banks;
        $chequeBook -> chequebook_no = $request -> cheque_book_no;
        $chequeBook -> start_page_no = $request -> start_page;
        $chequeBook -> end_page_no = $request -> end_page;
        $chequeBook -> account_no = $request -> account_no;
        $chequeBook -> save();

        $chequeBookPages = $request -> chequebook_page;
        $pageIds = $request -> page_ids;
        for($i = 0; $i <  count($chequeBookPages); $i = $i + 1)
        {
            $Page = ChequeBookPage :: find($pageIds[$i]);
            $Page -> page_number = $chequeBookPages[$i];
            $Page -> save();
        }

        return redirect() -> back() -> with('message','Cheque Book Record Updated Successfully!!');
    }

    public function delete(Request $request)
    {
         /**
     * This function is used for  deleting a specific cheque book.
     * @param Required one  parameter called cheque book id.
     * @return void. Redirect to the index page of cheque books section with sucess message.
     */
        $chequeBookId = $request -> Id;
        $chequeBook = ChequeBook :: find($chequeBookId);
        $chequeBook -> delete();
        return redirect() -> back() -> with('message','Cheque Book Deleted Successfully!!');

    }

    public function get_cheque_no(Request $request)
    {
        /**
         * This function is more important for an accountant. This function return the cheque no which is available for use on a voucher.
         * @param Required only one parameter called account id.
         * @return array contains cheque no,cheque page id.
         */
        $account_id = $request -> account_id;
        $chequeBook = ChequeBook :: where('account_no',$account_id)
                      ->where('status',ChequeBookStatus :: Active)
                      ->first();
        if(is_null($chequeBook))
          return '';
        $cheque_no = $chequeBook -> get_cheque_no;
        return array('cheque_no' => $cheque_no[0] -> page_number,'id' => $cheque_no[0] -> id);
    }

   
}
