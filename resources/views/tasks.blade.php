<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{url('css/style.css')}}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>ToDo List</title>
</head>
<body>
<div class="container-fluid w-100 m-0 p-0">
    <div class="container mt-5">
        <div class="row mb-3">
            <div class="col-4 p-0">
                <button class="btn btn-success px-4" id="addTaskBtn" data-bs-toggle="modal" data-bs-target="#addTaskModal">Add</button>
            </div>
        </div>
        <div class="row">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th width="5%">Status</th>
                    <th width="5%">ID</th>
                    <th width="85%">Name</th>
                    <th width="5%">Action</th>
                </tr>
                </thead>
                <tbody id="tasksTableBody">
                @include('tables/tasks_table')
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
@include('modals/tasks_add_modal');

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script src="{{url('js/script.js')}}"></script>
</html>
