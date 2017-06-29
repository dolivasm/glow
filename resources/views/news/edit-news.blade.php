    {!!Form::model($news,['id'=>'formEditNews','method'=>'POST','files' => 'true'])!!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
    <input type="hidden" value="{{ $news->id }}" id="id">
    	@include('news.forms.news')
    {!!  Form::submit('Actualizar',['class' => 'btn btn-normal-add btn-block text-uppercase','id' => 'editNewsSubmit'])!!} 
    {!!Form::close()!!}