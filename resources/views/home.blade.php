@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-uppercase font-weight-bold">{{ __('My Courses') }}</div>

                <div class="card-body">
                    <table class="table table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>Name</th>
                                <th>Hours</th>
                                <th>Started At</th>
                                <th>Status</th>
                                <th>Certification</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($courses as $course)
                                <tr>
                                    <td><strong>{{ $course->name }}</strong></td>
                                    <td>{{ $course->hours }} Hrs</td>
                                    <td>{{ $course->created_at->toDateString() }}</td>
                                    <td>{{ $course->pivot->progress }}</td>
                                    <td>
                                        <a href="{{ route('get-certification', ['course' => $course->id]) }}" class="btn btn-sm {{ ($course->pivot->progress == 'Finished') ? 'btn-primary' : 'btn-light disabled' }}">Get Certification</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">You dont have any courses yet.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
