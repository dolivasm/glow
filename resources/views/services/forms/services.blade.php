	
<div class="form-group">
		{!!Form::label('name', 'Servicio', array('class' => 'color-text'));!!}
	</div>
<div class="form-group">
	    {!!Form::text('name',null,['id'=>'name','required','minlength '=>'4','class'=>'form-control','maxlength'=>'255','placeholder'=>'Eje: Depilado de cejas'])!!}
	</div>
		
<div class="form-group">
		{!!Form::label('price', 'Precio', array('class' => 'color-text'));!!}
	</div>
<div class="form-group">
	    {!!Form::number('price',null,['id'=>'price','required','min' => '1','max' => '99999999','class'=>'form-control','placeholder'=>'Eje: 1000'])!!}
	</div>


	
<div class="form-group">
		{!!Form::label('duration', 'Duración', array('class' => 'color-text'));!!}
	</div>
<div class="form-group">
	    {!!Form::time('duration',null,['id'=>'duration','required','class'=>'form-control'])!!}
	</div>

	
	
<div class="form-group">
			{!!Form::label('description', 'Descripción', array('class' => 'color-text'));!!}
		</div>
<div class="form-group">
		{!!Form::textarea('description', null, ['id'=>'description','size'=>'30x4', 'class' => 'form-control','required'])!!}
	</div>
<div class="form-group">
			{!!Form::label('name', 'Imagen', array('class' => 'color-text'));!!}
			
		</div>
		<div class="fileinput fileinput-new" data-provides="fileinput">
		  <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">@if(isset($services))<img src="{{$services->imageUrl}}"></img>@endif</div>
		  <div>
		    <span class="btn btn-default btn-file"><span class="fileinput-new">Nueva</span><span class="fileinput-exists">Cambiar</span>{!!Form::file('imageUrl', ['id'=>'imageUrl','name'=>'imageUrl' ,'class' => 'inputfile','accept'=>'image/jpeg']) !!}</span>
		    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remover</a>
		  </div>
		</div>
		