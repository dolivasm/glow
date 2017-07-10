   {!!Form::open(['id'=>'addProductsForm','class'=>'forms-add','files' => 'true'])!!}

    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
     @include('products.forms.products')
     {!!  Form::submit('GUARDAR',['class' => 'btn btn-normal-add btn-block text-uppercase','id' => 'addProductSubmit'])!!}
    {!!Form::close()!!}