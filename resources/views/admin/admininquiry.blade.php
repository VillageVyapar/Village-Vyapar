<?php
session_start();
if(!Session::has('adminemail'))
{
  echo "<script>location.href='/adminlogin'</script>";
}
?>
@include('admin/includes/sidebar_navbar')
<!-- DataTales Example -->
<span id="message"></span>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col">
                <h1 class="h3 mb-4 text-gray-800">Inquiry Details</h1>
            </div>


        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="student_table" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Customer Name </th>
                        <th>E-mail</th>
                        <th>Subject</th>
                        <th>Comp_Name</th>
                        <th>Message</th>
                        <th>Reply</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($inq as $c)

                    <tr>
                        <td style='width:200px;'>{{$c['c_name']}}</td>
                        <td>{{$c['email']}}</td>
                        <td>{{$c['subject']}} </td>
                        <td>{{$c['comp_name']}}</td>
                        <td>
                            <div style='width:250px;height:100px;overflow:scroll'>
                                {{$c['message']}}</div>
                        </td>

                        <td>
                            @if($c->reply == '')
                            <div class='' style='color:Red'> Not replied </div>
                            @else
                            <div style='width:250px;height:100px;overflow:scroll'>
                                {{$c['reply']}}</div>
                            @endif
                        </td>
                        <?php 
                                $iid=$c->i_id; 
                        ?>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#replyinq{{$iid}}">
                                Reply
                            </button>
                        </td>
                        <!-- Model Start  -->
                        <div class="modal fade" id="replyinq{{$iid}}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="modal_title">{{$c->c_name}}'s Inquiry </h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <form action="reply" method="POST" enctype="multipart/form-data">
                                        {{ @csrf_field() }}
                                        <div class="modal-body">
                                            <div class="form-group" style='width:45%;display:none;float:left'>
                                                <label>id </label>
                                                <input type="text" name='iid' value='{{$c->i_id}}' autofocus id='name'
                                                    required="True" name="name" class="form-control" />
                                            </div>
                                            <div class="form-group" style='width:45%;float:left'>
                                                <label>Subject </label>
                                                <input type="text" value='{{$c->subject}}' disabled autofocus id='name'
                                                    required="True" name="name" class="form-control" />
                                            </div>
                                            <div class="form-group" style='width:45%;float:right'>
                                                <label>Company name </label>
                                                <input type="text" value='{{$c->comp_name}}' disabled autofocus
                                                    id='name' required="True" name="name" class="form-control" />
                                            </div>
                                            <br> <br> <br> <br>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" value='{{$c->email}}' disabled autofocus id='name'
                                                    required="True" name="name" class="form-control"
                                                    placeholder="Enter Category Name" />
                                            </div>
                                            <div class="form-group">
                                                <label>Message</label><br>
                                                <textarea cols='55' disabled row='25'>{{$c->message}}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label>Reply</label><br>
                                                <textarea cols='55' name='reply' row='25'>{{$c->reply}}</textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="reset" class="btn"
                                                style='background-color:green;color:white'>Reset</button>
                                            <button type="submit" name="issert" class="btn btn-primary">Send</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Model Complete-->
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>