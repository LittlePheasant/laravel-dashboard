@extends('layouts.app')

@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Downloads</h1>
        <a href="#" class="btn btn-primary">Add</a>
    </div>
    <hr />
    <div class="table-container">

        <table class="table table-hover text-center">
            <thead class="table-primary">
                <tr>
                    <th>#</th>
                    <th>Filename</th>
                    <th>Uploaded At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if($downloads)
                @php $i = 1; @endphp
                    @foreach($downloads as $download)
                        <tr>
                            <td>
                                {{$i}}
                            </td>
                            <td>
                                {{$download->_filename}}
                            </td>
                            <td>
                                {{$download->uploaded_at}}
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button class="btn m-1 btn-warning btn-circle"><i class="fas fa-fw fa-pen"></i></button>
                                    <form action="#" method="POST" type="button" onsubmit="return confirm('Delete?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn m-1 btn-danger btn-circle"><i class="fas fa-fw fa-archive"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @php $i++; @endphp
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
@endsection


