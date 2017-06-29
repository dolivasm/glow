    {!!Form::model($products,['id'=>'formEditProducts','method'=>'POST','files' => 'true'])!!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
    <input type="hidden" value="{{ $products->id }}" id="id">
    	@include('products.forms.products')
    {!!  Form::submit('Actualizar',['class' => 'btn btn-normal-add btn-block','id' => 'editProductSubmit'])!!} 
    {!!Form::close()!!}