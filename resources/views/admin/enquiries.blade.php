@extends('admin-layout')

@section('title', 'Admindashboard | Enquiries')

@section('styles')
    <style>
        .header {
            user-select: none;
        }

        .header a {
            text-decoration: none;
            color: black;
        }

        h3 {
            text-align: center;
        }

        table {
            width: 100%;
            height: auto;
            border: 1px solid #ddd;
            border-collapse: collapse;
        }

        tr th,
        td {
            height: 50px;
            width: auto;
            text-align: center;
        }

        tr:nth-child(odd) {
            background-color: #ffffff;
            /* Color for odd-numbered rows */
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
            /* Color for even-numbered rows */
        }

        .ols-blue {
            background-color: darkblue;
            color: white;
            border-style: none;
            padding: 6px;
            border-radius: 6px;
        }

        .ols-red {
            background-color: darkred;
            color: white;
            border-style: none;
            padding: 6px;
            border-radius: 6px;
        }

        .search-bar {
            width: auto;
            height: auto;
        }

        .search-bar input {
            width: 200px;
            height: 40px;
            padding: 10px;
            float: inline-end;
            border-style: none;
            outline-style: none;
            border-bottom: 2px solid #0095FF;
        }

        .search-bar .ols-blue {
            float: inline-start;
            height: 40px;
            padding: 10px;
            font-size: 16px;
        }
    </style>
@endsection

@section('content')
    <div>
        <div class="header">
            <a href="{{url('admin')}}">
                {{ __('AdminDashboard') }}
            </a>/Enquiries
        </div><br>

        <h3>Enquiries Details</h3><br>
        <div style="background-color: #fff;border-radius:8px;padding:20px;">
            <div class="search-bar">
                <form action="{{ route('search.enquiries') }}" method="GET">
                    <input type="text" placeholder="Search..." name="search">
                    <button hidden>Search</button>
                </form>
            </div><br><br>
            <br>
            <table>
                <tr>
                    <th>Fullname</th>
                    <th>Email</th>
                    <th>Advertisement</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>

                @forelse ($enquiries as $enquiries)
                    <tr>
                        <td>{{ $enquiries->fullname }}</td>
                        <td>{{ $enquiries->email }}</td>
                        <td>{{ $enquiries->advertisement }}</td>
                        <td>{{ $enquiries->description }}</td>
                        <td>
                            <div>
                                <a href="{{ url('enquiries/update/' . $enquiries->id) }}"><button
                                        class="ols-blue">update</button></a>
                                <a href="{{ url('enquiries/delete/' . $enquiries->id) }}"><button
                                        class="ols-red">delete</button></a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">{{ $result }}</td>
                    </tr>
                @endforelse
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script></script>
@endsection
