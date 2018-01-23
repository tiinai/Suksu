@extends('layouts.app')

@section('content')
    <div class="panel-body">
        
        <!-- uue hobuse lisamine vorm -->
        <form action="{{ url('hobune')}}" method="POST" class="form-horizontal" enctype = "multipart/form-data">
            {!! csrf_field() !!}
            <div class="form-group row">
                <label for="hobune" class="col-sm-3 control-label">Hobuse nimi</label>
                <div class="col-sm-6">
                    <input type="text" name="name" id="hobune-name" class="form-control"/>
                 </div>
            </div>
             <div class="form-group row">
                <label for="omanik" class="col-sm-3 control-label">Omaniku nimi</label>
                <div class="col-sm-6">
                    <input type="text" name="omanik" id="omanik-name" class="form-control"/>
                </div>
            </div>
            <div class="form-group row">
                <label for="pilt" class="col-sm-3 control-label">Pildi lisamine</label>
                <div class="col-sm-6">
                    <input type="file" name="image"/>
                 </div>
          </div>
            <div class="form-group row">
                <div class="col-sm-9 col-sm-offset-3">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Lisa hobune
                    </button>
                </div>
            </div>
        </form>
        @if(count($hobused) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">
                    Hobused meie tallides
                </div>
                <div class="panel-body">
                    <table class="table table-striped hobune-table">
                        <thead>
                            <th>Hobuse nimi</th>
                            <th>Foto</th>
                        </thead>
                        <tbody>
                            @foreach ($hobused as $hobune)
                                <tr>
                                    <td class="table-text">
                                        <div><a href="{{ url('/hobune/'.$hobune->id)}}">{{ $hobune->name }}</a></div>
                                    </td> 
                                    <td class="image">
                                       <div> <img src="storage/app/upload/images/"> {{ $hobune->image }} </div>
                                    </td>
                                </tr> 
                            @endforeach
                        </tbody>
                        
                    </table>
                </div>
            </div>
        @endif
    </div>

  
       

@endsection