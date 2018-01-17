@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        Hobuse andmed
    </div>
    <div class="panel-body">
        <table class="table table-striped hobune-table">
            <tbody>
                <tr>
                    <td> <th> Hobuse nimi  </th> </td>
                    <td class="table-text">
                        <div> {{ $hobune->name }}</div>
                    </td>
                </tr> 
                <tr>
                    <td><th>
                        Omaniku nimi
                    </th></td>        
                    <td class="table-text">
                        <div> {{ $hobune->omanik }}</div>
                    </td>
                    
                </tr>
            </tbody>
        </table>
    </div>
    <div class="panel-footer">
        <form action="{{ url('/edit/'.$hobune->id)}}"> 
            <button> Muuda</button>
        </form>
        <form action =" {{'SuksuController@kustutamine', $hobune->id}}", method= "POST">
            {!! csrf_field() !!}
            {!! method_field('DELETE') !!}
            <button> Kustuta </button>
        </form>
        
        <button> Tagasi</button></form>
    </div>
</div>
          
@endsection