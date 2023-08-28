@extends('layouts.app')
@section('content')
    <form action="{{route('ep_upload')}}" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Episode Number: </td>
                <td><input type="text" name="epi_no"></td>
            </tr>
            <tr>
				<td colspan=3><br></td>
            </tr>
            <tr>
                <td>Episode Name: </td>
                <td><textarea name="epi_name" placeholder="Enter name here..."></textarea></td>
            </tr>
            <tr>
				<td colspan=3><br></td>
            </tr>
            <tr>
                <td>Episode Summary: </td>
                <td><textarea name="epi_summary" placeholder="Enter Summary here..."></textarea></td>
            </tr>
            <tr>
				<td colspan=3><br></td>
            </tr>
            <tr>
                <td>Episode Upload: </td>
                <td><input type="File" name="epi_file"></td>
            </tr>
            <tr>
					<td colspan=3><br></td>
            </tr>
            <tr>
                <td>Series Name: </td>
                <td>
                    <select id="series" name="ser">
                    @foreach($data as $d)
                        <option value="{{$d->name}}">{{$d->name}}</option>
                    @endforeach
                </select>
                </td>
            </tr>
        </table>
        <br><br>
        {{@csrf_field()}}
        <input type="submit" name="submit" value="Upload">
    </form>
@endsection