@extends('layouts.principal')

@section('external-css')
    {!!Html::style('assets/css/external/dataTables.bootstrap.min.css')!!}
    
    {!!Html::style('assets/css/external/daterangepicker.css')!!}
    
@endsection

@section('content')
    <!-- Section Title -->
    <section id="section-title" class="bg-alternative">
        <div id="top-img-bg">
            <h1 class="text-center">Administración de Usuarios</h1>
        </div>
    </section>
    <!-- End Section Title -->
    
    <div class="container">
        
        <div class="row">
	  	    <div class="col-lg-offset-5 col-lg-3">
		        <a class="btn btn-normal-add btn-lg" OnClick="addUser('users/create');" style="padding-bottom=10px;"><i class="fa fa-plus-circle" aria-hidden="true"></i> 
 Agregar Usuario Nuevo</a>
		    </div>
	    </div>
        <div class="table-responsive">
            <table class="table text-center table-hover table-striped" id="usersTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <td>Nombre</td>
                        <td>Primer Apellido</td>
                        <td>Segundo Apellido</td>
                        <td>Fecha de Nacimiento</td>
                        <td>Nombre de Usuario</td>
                        <td>Correo Electrónico</td>
                        <td>Teléfono</td>
                        <td>Estado</td>
                        <td>Opciones</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->firstName}}</td>
                        <td>{{$user->lastName}}</td>
                        <td>{{$user->birthday}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        @if($user->trashed())
                        <td>Eliminado</td>
                        @else
                        <td>Activo</td>
                        @endif
                        <td>
                        <a id="btn_updateUser" OnClick="editUser({{$user->id}});" class="btn btn-normal-edit">Editar</a>
                        @if(!$user->trashed())
                        <a OnClick="getDeleteUser({{$user->id}}, '{{$user->name}}', '{{$user->firstName}}');" class="btn btn-danger-delete">Eliminar</a>
                        @else
                        <a OnClick="getActivateUser({{$user->id}}, '{{$user->name}}', '{{$user->firstName}}');" class="btn btn-normal-react">Activar</a>
                        @endif
                         </td>
                        </tr>
                    @endforeach
                </tbody> 
            </table>
        </div>
    </div>
    
    <!--Modals Section-->
     <div id="div-modals">
        @include('users.edit_user_modal');
        @include('users.add_user_modal');
        
        @include('users.activate_user_modal')
        @include('users.delete_user_modal');
    </div>
     <!--End Modals Section-->
@endsection

@section('external-js')
    {!!Html::script('assets/js/external/jquery.dataTables.min.js')!!}
    {!!Html::script('assets/js/external/dataTables.bootstrap.min.js')!!}
    
    {!!Html::script('assets/js/external/moment.min.js')!!}
    <!-- Incluye el Date Range Picker -->
    {!!Html::script('assets/js/external/daterangepicker.js')!!}
    {!!Html::script('js/mydatapicker.js')!!}
@endsection

@section('js')
    {!!Html::script('js/admin/admin-user.js')!!}
@endsection