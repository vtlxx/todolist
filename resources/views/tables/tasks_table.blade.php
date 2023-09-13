@foreach($tasks as $task)
{{--    @foreach($taskGroup as $task)--}}
        <tr data-id="{{$task['id']}}" class="{{$task['completed'] ? 'strike' : ''}}">
            <td class="text-center align-middle"><h5 class="m-0"><i class="check-icon {{($task['completed'] ? 'bi-check-square' : 'bi-square')}}" data-completed="{{$task['completed']}}" id="check-{{$task['id']}}"></i></h5></td>
            <td class="align-middle">{{$task['id']}}</td>
            <td class="align-middle column-name ">{{$task['name']}}</td>
            <td class="text-center align-middle">
                <h5 class="m-0"><i class="bi-x-square delete-icon"></i></h5>
            </td>
        </tr>
{{--    @endforeach--}}
@endforeach
