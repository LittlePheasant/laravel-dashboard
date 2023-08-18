<!-- resources/views/products/index.blade.php -->
@extends('layouts.app')
  
@section('title', 'Dashboard')
  
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Accomplishment Reports</h1>
        <a href="#" class="btn btn-primary">Add Report</a>
    </div>
    <hr />
    <div class="table-container">
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>College/Campus</th>
                <th>Inclusive Dates</th>
                <th>Title</th>
                <th>Type of Beneficiary</th>
                <th>Male</th>
                <th>Female</th>
                <th>Total</th>
                <th>1 Poor</th>
                <th>2 Fair</th>
                <th>3 Satisfactory</th>
                <th>4 Very Satisfactory</th>
                <th>5 Excellent</th>
                <th>Duration</th>
                <th>Service Rendered</th>
                <th>Partners</th>
                <th>Faculty/Staff</th>
                <th>Cost and Funding Source</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <td>
            Hello
        </td>
        <td>
            Hello
        </td>
        <td>
            Hello
        </td>
        <td>
            Hello
        </td>
        <td>
            Hello
        </td>
        <td>
            Hello
        </td>
        <td>
            Hello
        </td>
        <td>
            Hello
        </td>
        <td>
            Hello
        </td>
        <td>
            Hello
        </td>
        <td>
            Hello
        </td>
        <td>
            Hello
        </td>
        <td>
            Hello
        </td>
        <td>
            Hello
        </td>
        <td>
            Hello
        </td>
        <td>
            Hello
        </td>
        <td>
            Hello
        </td>
        <td>
            Hello
        </td>
        <td>
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="#" type="button" class="btn"><i class="fas fa-fw fa-lock"></i></a>
                <a href="#" type="button" class="btn"><i class="fas fa-fw fa-lock-open"></i></a>
                <a href="#" type="button" class="btn"><i class="fas fa-fw fa-pen"></i></a>
                <form action="#" method="POST" type="button" onsubmit="return confirm('Delete?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn m-0"><i class="fas fa-fw fa-archive"></i></button>
                </form>
            </div>
        </td>
        
        </tbody>
    </table>
    </div>
@endsection