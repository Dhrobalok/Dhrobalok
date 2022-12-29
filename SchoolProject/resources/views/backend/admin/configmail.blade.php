@extends('backend.Dashboard.AdminDashUser')
<style>
    #myTable th
    {
        color:rgb(250, 235, 235);
    font-size:15px;
    line-height: 10px;
    text-transform:capitalize;
    font-weight: 400px !important;
    width: 20px !important;
    background-color: rgb(129, 152, 212)
    }

/* .table-responsive
{
    overflow-x: hidden !important;
} */

#myTable_filter
{
    float: right !important;
}

#list
{
    width: 340px !important;
}
</style>

@php
    $i=1;
@endphp

 @section('content')

     <div class="col-md-11">

        <div class="card shadow mt-4">

            <div class="card-header">

                <div class="text-right">

                    <a href="{{route('email.setting')}}" class="btn btn-sm btn-secondary">Mail&nbsp;Setting</a>

                </div>


            </div>


            <div class="card-body">

                  <div class="table-responsive-sm">

                        <table class="table table-striped" id="mytable">

                              <thead>
                                  <tr>
                                    <th>Id</th>
                                    <th>Mail&nbsp;Port</th>
                                    <th>Mail&nbsp;Username</th>
                                     <th></th>
                                  </tr>
                              </thead>


                              <tbody>

                                @foreach ($mailsetting as $mail)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$mail->mail_port}}</td>
                                        <td>{{$mail->mail_username}}</td>
                                        <td>

                                             <div class="d-flex">
                                              &nbsp;

                                                <a href="{{route('delete.config',$mail->id)}}" class="btn btn-sm btn-danger" style="height: 30px;">
                                                    <i class="fas fa-times"></i>&nbsp;Delete
                                                </a>

                                             </div>
                                        </td>
                                   </tr>

                                @endforeach

                              </tbody>

                        </table>

                  </div>

            </div>

        </div>

     </div>

 @endsection
