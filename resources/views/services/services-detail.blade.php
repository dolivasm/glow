            <?php
                $count=0;
                $addOptionAggregate=false;

            ?>
            @if($services->count()==0)
                <div class="row">
                @if (!Auth::guest())
                    @if((Auth::user()->rol_id=1))
                        @include('services.add-services-option')
                    @endif
                @endif
                    <div class="col-md-4 col-sm-12 col-xs-12 home-blog-item">
                        <h2>No hay resultados</h2>   
                    </div>
                        
                </div>
            @endif
            
              @foreach($services as $service)
                @if($count==0)
                    <div class="row">
                @endif
                 <!-- We check if the user is an admin -->
                @if (!Auth::guest())
                @if((Auth::user()->rol_id=1) && $addOptionAggregate==false)
                       @include('services.add-services-option')
                 <?php
                    $count=$count+1;
                    $addOptionAggregate=true;
                 ?>
                @endif
            @endif 
          
             <div class="col-md-4 col-sm-12 col-xs-12 home-blog-item">
                    <div class="blog-post-main-img">
                        <figure class="image-overlay">
                            <a href="{{$service->imageUrl}}" data-lightbox="webdesign">
                                <span class="hover-image-wrap"><span class="hover-image"><i class="fa fa-search"></i></span></span>
                                <img src="{{$service->imageUrl}}" class="img-responsive fixed-img" alt="{{$service->name}}">
                                
                            </a>
                        </figure>
                    </div>
                     
                    @if (!Auth::guest())
                        @if((Auth::user()->rol_id=1))
                        <!--If the user is an admin, the button to edit and delete are available-->
                            <div class="vs-20"></div>
                            <p><a href="#" class="btn btn-normal-edit" OnClick='editServices({{$service->id}});'><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                             Editar</a><a href="#" class="btn btn-danger-delete" OnClick='deleteServices({{$service->id}});'><i class="fa fa-trash-o" aria-hidden="true"></i>
                             Eliminar</a></p>
                        @endif
                    @endif

                    <h1 class="news-post-title bold-text">
                        {{$service->name}}
                    </h1>
                    <div class="blog-post-title-details">
                      <span class="color-text">  <i class="fa fa-calendar-o"></i> {{$service->created_at}} &nbsp;&nbsp;&nbsp;|Publicado por el administrador &nbsp;&nbsp;&nbsp;</span>
                    </div>
                    <div class="vs-1"></div>
                     <h3 class="blog-post-price">
                        <p>
                           <a>Precio: ¢{{$service->price}}</a>
                        </p>
                                
                     </h3>
                    <div class="blog-post-content">
                        <p>
                           {{$service->description}}
                        </p>
                                
                    </div>
                     
                </div>
                 <?php
                    $count=$count+1;
                ?>
                
                @if($count==3)
                   </div>
                  <?php
                    $count=0;
                    ?>
                @endif
               
			@endforeach