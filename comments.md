hobused.blade.php
  @foreach ($hobused as $hobune)
                                    <tr>
                                        <td class="table-text">
                                            <div><a href="{{ url('/hobune/'.$hobune->id)}}">{{ $hobune->name }}</a></div>
                                        </td> 
                                        <td>
                                            <button>Muuda</button>
                                        </td> 
                                        <td>
                                            <form action="{{ url('/hobune/'.$hobune->id)}}" method="POST">
                                                {!! csrf_field() !!}
                                                {!! method_field('DELETE') !!}
                                                <button>Kustuta</button>
                                            </form>
                                        </td>
                                    </tr> 
                                @endforeach
                                
<td>
                                            <form action="{{ url('/hobune/'.$hobune->id)}}" method="POST">
                                                {!! csrf_field() !!}
                                                {!! method_field('DELETE') !!}
                                                <button>Kustuta</button>
                                            </form>
                                        </td>

