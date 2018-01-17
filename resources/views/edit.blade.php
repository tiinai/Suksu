@extends('layouts.app')


@section('content')
    <div class="panel-body">
        
        <!-- kuvab vormi olemasolemad andmed, mida võimaldab muuta-->
        <form action="{{ url('hobune') }}" method="PUT" class="form-horizontal">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="hobune" class="col-sm-3 control-label">Hobuse nimi</label>
                <div class="col-sm-6">
                    <input type="text" name="name" id="hobune-name" value="{{$hobune ->name}}" class="form-control"/>
                 </div>
            </div>
             <div class="form-group">
                <label for="omanik" class="col-sm-3 control-label">Omaniku nimi</label>
                <div class="col-sm-6">
                    <input type="text" name="omanik" id="omanik-name" value="{{$hobune ->omanik}}" class="form-control"/>
                </div>
            </div>
            
    </div>
            <div class="form-group">
                <div class="col-sm-6 col-sm-offset-3">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Muuda
                    </button>
                </div>
            </div>
        </form>
    </div>