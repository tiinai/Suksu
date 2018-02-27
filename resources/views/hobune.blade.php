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
                <tr>
                    <td><th>
                        Omaniku nimi
                    </th></td>        
                    <td class="table-text">
                        <div> {{ $hobune->isa }}</div>
                    </td>
                </tr>
                    
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class ="col-md-8 col-md-offset-2">
            <div> <img class="img-responsive" src="/storage/images/{{ $hobune->pilt }}"/> </div>
        </div>
    </div>    
    <div class="panel-footer">
        <form action="{{ url('/edit/'.$hobune->id)}}"> 
            <button> Muuda</button>
            </form>
        <form action="{{ url('hobune/'.$hobune->id) }}" method="POST">
            {!! csrf_field() !!}
            {!! method_field('DELETE') !!}
            <button> Kustuta </button>
        </form>
        <a href="/hobused" class="btn btn-default"> Tagasi</a>"
    </div>
</div>
          
@endsection