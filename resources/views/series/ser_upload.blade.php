@extends('layouts.app')
@section('content')
    <form action="{{route('ser.upload')}}" method="POST" enctype="multipart/form-data">
    {{@csrf_field()}}
        <table>
            <tr>
                <td>Series Name: </td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
				<td colspan=3><br></td>
            </tr>
            <tr>
                <td>Series Type: </td>
                <td><input type="text" name="type"></td>
            </tr>
            <tr>
				<td colspan=3><br></td>
            </tr>
            <tr>
                <td>Series Genre: </td>
                <td><input type="text" name="genre"></td>
            </tr>
            <tr>
				<td colspan=3><br></td>
            </tr>
            <tr>
                <td>Series Description: </td>
                <td><textarea name="description" placeholder="Enter Summary here..."></textarea></td>
            </tr>
            <tr>
					<td colspan=3><br></td>
            </tr>
            <tr>
                <td>Episode Count: </td>
                <td><input type="text" name="ep_count"></td>
            </tr>
            <tr>
					<td colspan=3><br></td>
            </tr>
            <tr>
                <td>Series Poster: </td>
                <td><input type="file" name="poster"></td>
            </tr>
            <tr>
					<td colspan=3><br></td>
            </tr>
            <tr>
                <td>trailer: </td>
                <td><input type="text" name="trailer"></td>
            </tr>
            <tr>
					<td colspan=3><br></td>
            </tr>
        </table>
        <br><br>
        
        <input type="submit" name="submit" value="Upload">
    </form>
@endsection