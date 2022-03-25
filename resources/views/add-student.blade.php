@extends('/master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <br />
        <h3>Add Student</h3>
        <br />

        <a href="{{url('select-school')}}" id="button" class="btn">View students</a>
        <br />
        <br />
        <br />

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if(Session::has('student_add'))
        <span id="studentAdd">{{Session::get('student_add')}}</span>
        @endif

        <form method="post" action="{{route('save.student')}}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Enter name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email_address" class="form-label">Enter email address</label>
                <input type="email" class="form-control" id="email_address" name="email_address" required>
            </div>
            <div class="mb-3">
                <label for="select" class="form-label">Select school(s)</label>
                <select class="form-select" name="schools[]" multiple aria-label="multiple select example">
                    @foreach($schools as $row)
                    <option value="{{$row['id']}}">{{$row['school_name']}}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection