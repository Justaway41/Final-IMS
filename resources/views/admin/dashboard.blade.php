@extends('layouts.adminlayout')

@section('content')
<div class="boxmain">
    <div class="box">
        <h1 class="total">{{ $totalinterns }}</h1>
        <span>
            <i class="fa fa-users fa-5x"></i>
        </span>
        <h1>Intern</h1>
    </div>
    <div class="box">
        <h1 class="total">20</h1>
        <span>
            <i class="fa fa-pencil-square-o fa-5x"></i>
        </span>
        <h1 class="nice">Projects</h1>
    </div>
    <div class="bigBox">
        <h1>Recent Projects</h1>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Project Title   </th>
                <th scope="col">Department</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>UI/UX Design</td>
                <td>UI Team</td>
                <td>review</td>
              </tr>
            </tbody>
          </table>
    </div>
    </div>
@endsection
