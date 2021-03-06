@extends('layouts.teacher')


@section('content')
  @include('Pages.sidebar')
        <div class="content">
          <div class="sidebar-content">
          </div>
          <div class="card" id="card-subjectgrade">
            <div class="card-body">
              <div class="title">
                <h1>Manage Teacher Advisory </h1>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><i class="fa fa-tachometer" aria-hidden="true" id="dashboard-icon"> </i> <a href="/dashboard">Dashboard </a> </li>
                    <li class="breadcrumb-item active" aria-current="page">Teacher Advisory</li>
                  </ol>
                </nav>
                
              
                @if(session()->has('success'))
                  <div class="alert alert-success">
                    <button class="close" type="button" data-dismiss="alert"> &times; </button>
                    <i class="fa fa-check"></i><strong> Teacher Advisory</strong> {{ session()->get('success') }}
                  </div>
                @endif

                @if(session()->has('errors'))
                  <div class="alert alert-danger">
                    <button class="close" type="button" data-dismiss="alert"> &times; </button>
                   <i class="fa fa-times"></i> <strong> Subject Code</strong> {{ session()->get('errors') }}
                  </div>
                @endif

                <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#modalFade">
                  <i class="fa fa-plus" aria-hidden="true"></i>    ADD TEACHER ADVISORY
                </button>
                <div class="modal fade" id="modalFade" tabindex = "-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title"> Teacher Advisory</h5>
                        <button type="button" class="close" data-dismiss="modal"> &times; </button>
                      </div>  
                      <div class="modal-body">
                        <form method="POST" id="form-horizontal">
                          @csrf
                          <div class="form-group">
                              <label class="col-form-label"> School Year </label>
                              <select name="schoolYear" id="schoolYear" class="form-control">
                                  <option value=""  selected disabled>-Select Grade Level-</option>
                                  @foreach ($schoolyear as $schoolYears)
                                      <option value="{{ $schoolYears->schoolYear }}">{{ $schoolYears->schoolYear }}</option>
                                  @endforeach
                              </select>
                          </div>
                          <div class="form-group">
                            <label class="col-form-label">Grade Level</label>
                            <select name="gradeLevel" id="gradeLevel" class="form-control dynamic" data-dependent="className" data-subject="subjectCode">
                                <option value="" selected disabled>-Select Grade Level-</option>
                                <option value="1">Grade 1</option>
                                <option value="2">Grade 2</option>
                                <option value="3">Grade 3</option>
                                <option value="4">Grade 4</option>
                                <option value="5">Grade 5</option>
                                <option value="6">Grade 6</option>
                            </select>
                          </div>
                       
                           <div class="form-group"> 
                            <label class="col-form-label">Class Name</label>
                            <select name="className" id="className" class="form-control">
                              <option value="">-Select Class Name-</option>
                            </select>
                          </div>
                          <div class="form-group ">     
                            <label class="col-form-label">Teacher Name</label>
                            <select name="employee_id" id="gradeLevel" class="form-control">
                                <option value="javascript:void(0);" selected disabled>-Select Teacher Name-</option>
                                @foreach ($user as $users)
                                    <option value="{{ $users->employee_id}}">{{ $users->firstName}} {{ $users->lastName}}</option>
                                @endforeach
                              </select>
                          </div>
                          <div class="form-group">
                              <label class="col-form-label">Subject</label>
                              <select name="subjectCode" id="subjectCode" class="form-control">
                                  <option value="" selected disabled>-Select Subject-</option>
                                    @foreach ($subjects as $subject)
                                        <option value="{{$subject->subjectCode}}">{{ $subject->description}}</option>
                                    @endforeach
                              </select>
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="submit"> Submit </button>                    
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> Cancel </button>
                      </form>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="table-wrapper-scroll-y">
                <table class="table table-hover" id="example">
                  <thead>
                    <tr>
                      <th> ID</th>
                      <th> School Year</th>
                      <th> Grade Level</th>
                      <th> Class Name</th>
                      <th> Subject code</th>
                      <th> Teacher Name</th>
                      <th> Action </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $n=1; ?>
                    @foreach ($advisory as $advisories)
                        <tr class="post{{ $advisories->id }}">
                          <td>{{ $n++  }}</td>
                          <td>{{ $advisories->schoolYear }} </td>
                          <td>{{ $advisories->gradeLevel }} </td>
                          <td>{{ $advisories->className }}</td>
                          <td>{{ $advisories->subjectCode}}</td>
                          <td>{{$advisories->firstName }} {{$advisories->middleName }} {{$advisories->lastName }}</td>
                          <td>
                            <a href="#" class="edit-modal btn btn-warning" data-target="#myModal" data-toggle="modal" data-id="{{ $advisories->id }}" data-schoolyear="{{ $advisories->schoolYear }}" data-gradelevel="{{ $advisories->gradeLevel }}" data-sectionname="{{ $advisories->className }}" data-employee = "{{ $advisories->employee_id }}" data-description="{{ $advisories->subjectCode}}"><i class="fa fa-pencil-square-o" aria-hidden="true"> </i> Edit</a>
                            <a href="#" class="delete-modal btn btn-danger" data-target="#myModal" data-toggle="modal" data-id="{{ $advisories->id }}" data-schoolyear="{{ $advisories->schoolYear }}" data-gradelevel="{{ $advisories->gradeLevel }}" data-sectionname="{{ $advisories->className }}" data-employee = "{{ $advisories->employee_id }}" data-description="{{ $advisories->subjectCode}}"><i class="fa fa-trash-o" aria-hidden="true"> </i> Delete</a>
                          </td>
                        </tr> 
                    @endforeach
                  </tbody>
                </table>
                </div>
             </div>
            </div>
          </div>
          <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <form action="" method="POST" class="form-horizontal">
                    @csrf
                    <input type="hidden" class="form-control" name="id" id="id" >
                    <div class="form-group">
                        <label class="col-form-label"> School Year </label>
                      <select name="schoolYear" id="a" class="form-control" >
                            <option value="" selected disabled>-Select Grade Level-</option>
                            @foreach ($schoolyear as $yearlevels)
                                <option value="{{ $yearlevels->schoolYear }}">{{ $yearlevels->schoolYear }}</option>
                            @endforeach
                        </select>
                     </div>
                    <div class="form-group">
                        <label class="col-form-label">Grade Level</label>
                        <select name="gradeLevel" id="gradeLevel" class="form-control dynamic2" data-dependent="className">
                            <option value="" selected disabled>-Select Grade Level-</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Class Name</label>
                          <select name="className" id="className2" class="form-control">
                            <option value="" selected disabled>-Select Class Name-</option>
                            @foreach ($yearlevel as $yearlevels)
                                <option value="{{ $yearlevels->className}}">{{ $yearlevels->className}}</option>
                            @endforeach
                          </select> 
                    </div>
                    <div class="form-group">
                      <label for="c">Teacher Name</label>
                      {{-- <input type="text" class="form-control" name="employee_id" id="c"> --}}
                      <select name="employee_id" id="c" class="form-control">
                        @foreach ($user as $users)
                            <option value="{{ $users->employee_id }}"> {{ $users->firstName }} {{ $users->middleName }} {{ $users->lastName }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                        <label for="d">Subject Description</label>
                        {{-- <input type="text" class="form-control" name="employee_id" id="c"> --}}
                        <select name="subjectCode" id="d" class="form-control">
                          @foreach ($subjects as $subject)
                            <option value="{{$subject->subjectCode}}">{{ $subject->description}}</option>
                          @endforeach
                        </select>
                      </div>
                   
                  </form>
                  <div class="deleteContent" style="text-align:center;">
                    Are you sure you want to delete this?
                  </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn actionBtn" data-dismiss="modal">Update</button>
                    <button type="button" class="btn btn-danger delete" data-dismiss="modal">Delete</button>
                    <button type="button" class="btn" data-dismiss="modal">Cancel</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  @endSection
@section('scripts')
  <script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
    
    $(document).on('click', '.modal', function() {
      $('.modal-title').text('Teacher Advisory')
    });
    $(document).on('click', '.edit-modal', function(){
      $('.form-horizontal').show();
      $('.deleteContent').hide();
      $('.actionBtn').show();
      $('.delete').hide();
      $('.modal-title').text('Edit Teacher advisory');
      $('.actionBtn').addClass('btn-dark');
      $('#id').val($(this).data('id'));
      $('#a').val($(this).data('schoolyear'));
      $('.dynamic2').val($(this).data('gradelevel'));
      $('#className2').val($(this).data('sectionname'));
      $('#c').val($(this).data('employee'));
      $('#d').val($(this).data('description'));
      id = $('#id').val();
      $('#myModal').show();
    });

    $('.modal-footer').on('click', '.actionBtn', function() {
        $.ajax({
            type: 'PUT',
            url:  'advisory/' +id,
            data: {
              '_token': $('input[name=_token]').val(),
              'id':$('#id').val(),
              'schoolYear': $('#a').val(),
              'gradeLevel': $('.dynamic2').val(),
              'className': $('#className2').val(),
              'employee_id': $('#c').val(),
              'subjectCode': $('#d').val()
            },
            success: function(data) {
              alert('Successfully updated!');
              $(document).ajaxStop(function(){
                      setTimeout("window.location = '/advisory'",100);
              });
            }
        });
    });
    $(document).on('change', '.dynamic', function() {
        if($(this).val() != '')
        {
          select = $(this).attr("id");
          value  = $(this).val();
          dependent =$(this).data('dependent');
          _token = $('input[name="_token"]').val();
          $.ajax({
            url: "{{ route('dynamicdependent2.fetch')}}",
            method: "POST",
            data: {
              select: select,
              value: value,
              _token: _token,
              dependent: dependent
            },
            success:function(result)
            {
              $('#'+dependent).html(result);
            }

          })
        }
    });

    $(document).on('change', '.dynamic2', function() {
        if($(this).val() != '')
        {
          select = $(this).attr("id");
          value= $(this).val();
          dependent =$(this).data('dependent');
          _token = $('input[name="_token"]').val();
          $.ajax({
            url: "{{ route('advisory.fetch')}}",
            method: "POST",
            data: {
              select: select,
              value: value,
              _token: _token,
              dependent: dependent
            },
            success:function(result)
            {
              $('#'+dependent).val(result);
            }

          })
        }
    });
   

    $(document).on('click','.delete-modal', function(){
      $('.delete').show();
      $('.actionBtn').hide();
      $('.modal-title').text('Delete this advisory');
      $('.deleteContent').show();
      $('.form-horizontal').hide();
      $('#id').val($(this).data('id'));
      id = $('#id').val();
      $('#myModal').show();
    });

    $(document).on('click', '.delete', function() {
        $.ajax({
            type: 'DELETE',
            url: 'advisory/' +id,
            data: {
              '_token': $('input[name=_token').val(),
              'id': id
            },
            success:function(data) {
              $('.post' + $('#id').val()).remove();
            }
        });
    });
  </script>
@endSection