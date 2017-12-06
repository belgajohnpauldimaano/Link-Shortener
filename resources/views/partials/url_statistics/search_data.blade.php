
<h2>URL Information</h2>
<table class="table table-bordered table-striped">
    <tr>
        <th>Actual Link</th>
        <td>{{ $Link->actual_link }}</td>
    </tr>
    <tr>
        <th>Shortened Link</th>
        <td>{{ $Link->full_shortened_link }}</td>
    </tr>
</table>

<h2>Visitor's Informtion</h2>
<table class="table table-bordered table-striped">
    <tr>
        <th>Name</th>
        <th>Age</th>
        <th>Email</th>
        <th>Address</th>
        <th>Citizenship</th>
        <th>Country</th>
    </tr>
    <tbody>
        @if ($Link->user_visits)  
            {{--  {{ json_encode($Link->user_visits) }}  --}}
            @foreach($Link->user_visits as $data)
            {{--  {{ json_encode($user) }}  --}}
                <tr>
                    <td>
                        {{ $data->user->name }} 
                    </td>
                    <td>
                        {{ $data->user->age }} 
                    </td>
                    <td>
                        {{ $data->user->email }} 
                    </td>
                    <td>
                        {{ $data->user->address }} 
                    </td>
                    <td>
                        {{ $data->user->citizenship->citizenship_name }} 
                    </td>
                    <td>
                        {{ $data->user->country->country_name }} 
                    </td>
                </tr>
            @endforeach

        @endif
    </tbody>
</table>