@extends('layouts.app')

@section('template_title')
    Calificacione
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Calificacione') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('calificaciones.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        
                                        <th>No</th>
                                        
										<th>Nota</th>
										<th>Estudiante Id</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($calificaciones as $calificacione)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $calificacione->nota }}</td>
											<td>{{ $calificacione->estudiante->name }}</td>

                                            <td>
                                                <form action="{{ route('calificaciones.destroy',$calificacione->id) }}" class="d-inline formulario-eliminar" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('calificaciones.show',$calificacione->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('calificaciones.edit',$calificacione->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>

                                                    
                                                    <tr>

                                                        <td>
                                                      <form action="upload.php" method="post" enctype="multipart/form-data">
                                                       Select archivo to upload:
                                                      <input type="file" name="fileToUpload" id="fileToUpload">
                                                     </form>
                                        
                                         
                                                       </td>
                                                   </tr>
                                                </form>
                                            </td>
                                        </tr>
                                        



                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $calificaciones->links() !!}
            </div>
        </div>
    </div>
   
@endsection
