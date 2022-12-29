<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VoucherType;
use App\Models\User;
use App\Models\Approvers;
/**
 * This controller helps us to maintain voucher approval panel related operations such add new member,edit approval order, delete existing one etc.
 *
 */
class ManageApproverController extends Controller
{
    public function index()
    {
       // return "rashed";
        /**
         * This function is used to render/view whole approval panel for each voucher.
         * @param Required no parameters.
         * @return view object that contains approval panel list for each voucher.
         */
        $types = VoucherType :: all();
        return view('backend.admin.approvers.index',['voucher_types' => $types]);
    }

    public function get_users(Request $request)
    {
        /**
         * This function is useful when we want to add a new member into approval panel.We use that function for find out a employee/approver from the database.
         * We search that employee/approver on basis a searchTerm or keyword.
         * SearchTerm may be employee email or name.
         * @param Required only one parameter called searchTerm which represents employee nam/email full form or prefix.
         * @return array of employees those are matched with searchTerm in json format.
         */
        $searchTerm = $request -> searchTerm;
        $options;
        if(!isset($request -> searchTerm))
         $options = User :: where('is_bill_user',0)->get();
        else
        {
            $options = User :: where('is_bill_user',0)
                                       ->where('name','like','%'.$searchTerm.'%')
                                       ->get();
        }
        $data = array();
        foreach($options as $option)
        {
            $data[] = array('id' => $option -> id,'text' => $option -> name);
        }
        return json_encode($data);
    }

    public function edit_voucher_approver(Request $request)
    {
        return $request;
        /**
         * This function is used to edit the existing approval panel.
         * This function mainly get the approvers from the database and generate a html table for user.
         * @param Required only one parameter called voucher type.
         * @return string that describes a list approvers in html table format.
         *
         */
        $voucher_type_id = $request -> VoucherType;
        $voucher_type = VoucherType :: find($voucher_type_id);
        $approvers = $voucher_type -> getApprovers;
        $users = array();

        foreach($approvers as $approver)
        {
           $users[] = intval($approver -> approver_id);
        }
        return $this -> generate_table_view($users);
    }

    public function generate_table_view($users)
    {
        /**
         * This function is a helper function for edit_voucher_approver() function.
         * This function just take a list of approvers and generate a html table with two columns called approver name and approval order.
         * @param List of approvers.
         * @return html table in string format which is rendered by the frontend page.
         */
        $approver_list = '';
        for($i = 0; $i < count($users); $i = $i + 1)
        {
            $user = User :: find($users[$i]);
            $employee = $user -> employeeInfo;
            $designation = $employee -> designation;
            $approver_list .= '<tr id ='.$users[$i] .'>'.
            '<td class = "text-center">'.$user -> name.'</td>'.
            '<td class = "text-center">'.$designation -> name.'</td>'.
            '<input type = "hidden" name = "user_ids[]" value ='.$users[$i].'>'.
            '<td class = "text-center">'.
              '<a class = "btn btn-danger btn-sm text-white" onclick = "delete_user('.$users[$i].')"><i class = "fa fa-trash-alt"></i></a>'.
            '</td>'.
           '</tr>';
        }

        return $approver_list;
    }
    public function addNewApprover(Request $request)
    {
        $user_id = $request -> user_id;
        $user =  User :: find($user_id);
        $employee = $user -> employeeInfo;
        $designation = $employee -> designation;

        return '<tr id ='.$user_id.'>'.
            '<td class = "text-center">'.$user -> name.'</td>'.
            '<td class = "text-center">'.$designation -> name.'</td>'.
            '<input type = "hidden" name = "user_ids[]" value ='.$user_id.'>'.
            '<td class = "text-center">'.
              '<a class = "btn btn-danger btn-sm text-white" onclick = "delete_user('.$user_id.')"><i class = "fa fa-trash-alt"></i></a>'.
            '</td>'.
           '</tr>';
    }

    public function save_approver_setting(Request $request)
    {
        /**
         * This function do the backend job. This just take the updated approval panel along with order and save it in the database.
         * @param Required three parameters called voucher type, list of approvers and their approval order.
         * @return void.
         */

        $approvers = $request -> user_ids;
        $voucher_type_id = $request -> voucher_type_id;
        $previous_approvers = Approvers :: where('voucher_type_id',$voucher_type_id)->get();

        foreach($previous_approvers as $previous_approver)
             $previous_approver -> delete();

        if(isset($approvers))
        {
            for($i = 0; $i < count($approvers); $i++)
            {
                Approvers :: create([
                    'voucher_type_id' => $voucher_type_id,
                    'approver_id' => $approvers[$i],
                    'approve_order' => $i + 1
                ]);
            }
        }

    }
}
