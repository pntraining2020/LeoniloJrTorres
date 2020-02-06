<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>Time Tracker</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <style>
    .card {
        height: 100vh;
    }
    </style>


</head>

<body>
    <div class="container">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="selectName">Names</label>
                                <form action="{{ route('checkEmp') }}" method="post" class="form">
                                    @csrf
                                    <select class="form-control" name="current_emp" id="selectName">
                                        <option hidden value="null">
                                            {{ $data['current_emp']->firstname . " ".$data['current_emp']->lastname }}
                                        </option>
                                        @foreach ($data['names'] as $name)
                                        <option "{{ $data['current_emp']->id === $name->id ?'selected':'' }}"
                                            value="{{ $name->id }}">{{ $name->firstname.' '.$name->lastname }}
                                        </option>
                                        @endforeach
                                    </select>
                                </form>
                            </div>

                            <p class="h3">Time : <span id="time"><span></p>
                            <br>

                        </div>
                    </div>

                    <a href="{{ route('timeIn' , ['id'=>$data['current_emp']->id]) }}">
                        <button type="button" class="btn btn-primary">Clock in</button>
                    </a>
                    <button type="button" class="btn btn-outline-primary" disabled></button>
                    <hr>
                    Break:
                    <br>
                    <a href="{{ route('start_break' , ['id'=>$data['current_emp']->id]) }}">
                        <button type="button" class="btn btn-primary">Start Time</button>
                    </a>
                    <button type="button" class="btn btn-outline-primary" disabled>{{date('H:i')}}</button>
                    <br>
                    <br>
                    <a href="{{ route('end_break' , ['id'=>$data['current_emp']->id]) }}">
                        <button type="button" class="btn btn-warning">End Time</button>
                    </a>
                    <button type="button" class="btn btn-outline-warning" disabled>{{date('H:i')}}</button>

                    <hr>
                    Break:
                    <br>
                    <a href="{{ route('timeOut' , ['id'=>$data['current_emp']->id]) }}">
                        <button type="button" class="btn btn-danger">Clock out</button>
                    </a>
                    <button type="button" class="btn btn-outline-danger" disabled>{{date('H:i')}}</button>


                    <hr>
                    <b>Break:</b>
                    <br>

                    Total Time Worked :
                    <br>
                    Total Hours Left Before Timeout :
                    <br>
                    Total Break Used :



                </div>

            </div>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
        <script>
        $("#selectName").change(() => {
            $(".form").submit();
        })

        function time() {
            var d = new Date();
            var m = d.getMinutes();
            var h = d.getHours();
            $("#time").text(`${h} : ${m}`)

        }

        setInterval(time, 500);
        </script>
</body>

</html>