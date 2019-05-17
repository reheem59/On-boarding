@foreach($threads as $thread)
    <tr class="table-light clickable-row" data-href="Thread.html">
        <th scope="row" href="Thread.html">{{$thread->title}}</th>
        <td>{{$thread->rate}}</td>
        <td>{{$thread->user_name}}</td>
        <td>{{$thread->created_at}}</td>
    </tr>
@endforeach