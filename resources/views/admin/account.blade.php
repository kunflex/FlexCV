@extends('admin-layout')

@section('title', 'Admindashboard | Account Details')

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
        .nls:hover{
            border-left:2px solid #0095FF;
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
            margin: 10px;
            float: inline-end;
            border-bottom: 2px solid #0095ff;
            transition: 2ms ease;
        }

        .search-bar input {
            width: 200px;
            height: 40px;
            padding: 10px;
            border-style: none;
            outline-style: none;
        }
    </style>
@endsection

@section('content')
    <div>
        <div class="header">
            <a href="{{url('admin')}}">
                {{ __('AdminDashboard') }}
            </a>/Account
        </div><br>

        <h3>Account Details</h3><br>
        <div style="background-color: #fff;border-radius:8px;padding:20px;">
            <div class="search-bar">
                <form action="{{ route('search.account') }}" method="GET">
                    <input type="text" placeholder="Search..." name="search">
                    <button hidden>Search</button>
                </form>
            </div>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone </th>
                    <th>Profile</th>
                    <th>Location</th>
                    <th>Action</th>
                </tr>

                @forelse ($dataUsers as $dataUsers)
                    <tr class="nls">
                        <td>{{ $dataUsers->name }}</td>
                        <td>{{ $dataUsers->email }}</td>
                        <td>059326548</td>
                        <td></td>
                        <td>Accra</td>
                        <td>
                            <div>
                                <a href="{{ url('account/update/' . $dataUsers->id) }}"><button
                                        class="ols-blue">update</button></a>
                                <a href="{{ url('account/delete/' . $dataUsers->id) }}"><button
                                        class="ols-red">delete</button></a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">{{ $result }}</td>
                    </tr>
                @endforelse
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script></script>
@endsection
