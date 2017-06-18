<!-- Nombre -->
<div class="form-group">
	{!!Form::label('name', 'Nombre*', array('class' => 'color-text'));!!}
</div>
<div class="form-group">
	   {!!Form::text('name',null,['id'=>'name','class'=>'form-control', 'required'])!!}
</div>

<!-- Primer Apellido-->
<div class="form-group">
	{!!Form::label('firstName', 'Primer Apellido*', array('class' => 'color-text'));!!}
</div>
<div class="form-group">
	{!!Form::text('firstName', null, ['id'=>'firstName','size'=>'30x4', 'class' => 'form-control', 'required'])!!}
</div>

<!-- Segundo Apellido  -->
<div class="form-group">
	{!!Form::label('lastName', 'Segundo Apellido', array('class' => 'color-text'));!!}
</div>
<div class="form-group">
	{!!Form::text('lastName', null, ['id'=>'lastName','size'=>'30x4', 'class' => 'form-control'])!!}
</div>

<!-- Fecha Nacimiento -->
<div class="form-group">
	{!!Form::label('birthday', 'Fecha de Nacimiento*', array('class' => 'color-text'));!!}
</div>
@if(!empty($user))
<div class="form-group">
	{!!Form::text('birthday', null, ['id'=>'birthday', 'name' => 'birthday', 'class' => 'form-control', 'readonly', 'required'])!!}
</div>
@else
<div class="form-group">
	{!!Form::text('birthday', null, ['id'=>'birthday2', 'name' => 'birthday2', 'class' => 'form-control', 'readonly', 'placeholder'=>'Haga Click Aquí', 'required'])!!}
</div>
@endif
<!-- Nombre Usuario -->
<div class="form-group">
	{!!Form::label('username', 'Nombre de Usuario*', array('class' => 'color-text'));!!}
</div>
<div class="form-group">
	{!!Form::text('username', null, ['id'=>'username','size'=>'30x4', 'class' => 'form-control', 'required'])!!}
</div>

<!-- Correo -->
<div class="form-group">
	{!!Form::label('email', 'Correo Electrónico*', array('class' => 'color-text'));!!}
</div>
<div class="form-group">
	{!!Form::email('email', null, ['id'=>'email','size'=>'30x4', 'class' => 'form-control', 'required'])!!}
</div>

<!-- Teléfono -->
<div class="form-group">
	{!!Form::label('phone', 'Teléfono', array('class' => 'color-text'));!!}
</div>
<div class="form-group">
	{!!Form::text('phone', null, ['id'=>'phone','size'=>'30x4', 'class' => 'form-control'])!!}
</div>

<!-- Rol de usuario -->
<div class="form-group">
	{!!Form::label('role', 'Tipo de Usuario*', array('class' => 'color-text'));!!}
</div>
<div class="form-group">
	{!!Form::select('role_id', $role_id, null, ['id'=>'role_id','class' => 'selectpicker form-control color-white', 'required','data-live-search'=>'true','data-style'=>'btn-success'])!!}
</div>

<div class="form-group">
	<p>* Campos obligatorios.</p>
</div>