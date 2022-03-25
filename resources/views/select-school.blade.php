@extends('/master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <br />
        <h3>Select School</h3>
        <br />

        <a href="{{url('add-student')}}" id="button" class="btn">Add student</a>
        <br />
        <br />
        <br />


        <form method="post" action="{{route('list.student')}}">
            @csrf

            <div class="mb-3">

                <select class="form-select" name="schoolSelection">
                    <option value="">Please select a school</option>
                    @foreach($schoolsArray as $row)
                    <option value="{{$row['id']}}">{{$row['school_name']}}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

            <br />
            <br />

        </form>


    </div>
</div>
@endsection