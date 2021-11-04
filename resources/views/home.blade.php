@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ $title }}</div>

                <div class="card-body">
                  <table class="table table-bordered">
                              <thead class="bg-light">
                                <tr>
                                          @if (isset($headers))
                                            <th scope='col' class='font-weight-bold'>Line#</th>
                                            @foreach($headers as $header)
                                                <th scope='col' class='font-weight-bold'>{{ucfirst($header)}}</th>
                                            @endforeach
                                          @endif
                                </tr>
                              </thed>
                              <tbody>
                                          @if (isset($data) && isset($headers))
                                            @foreach($data as $row)
                                            <tr>
                                              <td scope='col' class='font-weight-bold'>{{ $loop->iteration }}</td>
                                              @foreach($headers as $header)
                                                @if (isset($row[$header]))
                                                  <td scope='col' class='font-weight-bold'>{{$row[$header]}}</td>
                                                @else
                                                  <td></td>
                                                @endif
                                              @endforeach
                                            </tr>
                                            @endforeach
                                          @endif
                              </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
