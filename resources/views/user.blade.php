@extends('main.main')

@section('container')
    <div class="card mx-4 my-4 p-4 card-shadow">
        <div class="card-body">
            <div>
                <h1 class="h2 text-dark mb-4">List of User</h1>
                <p>Anim ea exercitation nisi ut labore in dolor deserunt aliquip ullamco.</p>   
                <hr>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-dark">
                    <thead>
                        <th class="align-middle">No</th>
                        <th class="align-middle">Username</th>
                        <th class="align-middle">Email</th>
                        <th class="align-middle">Role</th>
                    </thead>
                    <tbody>
                        @if (empty($responses->count()))
                            <tr>
                                <td colspan="5" class="align-middle text-center">No Data Available</td>
                            </tr>
                        @else
                            @foreach ($responses as $key => $response)
                                <tr class="text-center">
                                    <td class="align-middle">{{ $key + 1 }}</td>
                                    <td class="align-middle">{{ $response['name'] }}</td>
                                    <td class="align-middle">{{ $response['email'] }}</td>
                                    <td class="align-middle">{{ $response['role'] }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
