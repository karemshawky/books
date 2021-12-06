<div class="col-6 mx-auto mt-3">
@if (session('message'))
    @switch(session('type'))
        @case('error')
            <div class="m-alert m-alert--icon m-alert--outline alert alert-danger" role="alert">
                <div class="m-alert__icon">
                    <i class="la la-warning"></i>
                </div>
                <div class="m-alert__text text-center">
                    <strong>{{ session('message') }}</strong> 	
                </div>
                @if( !empty( session('url') ) )
                <div class="m-alert__actions" style="width: 200px;">
                    <a href="{{ route(session('url')) }}" class="btn m-btn--pill m-btn--air m-btn m-btn--gradient-from-danger m-btn--gradient-to-warning">رجوع </a>
                </div>			  	
                @endif	
            </div>
        @break
        @case('success')
            <div class="m-alert m-alert--icon m-alert--outline alert alert-success" role="alert">
                <div class="m-alert__icon">
                    <i class="la la-check"></i>
                </div>
                <div class="m-alert__text text-center">
                    <strong>{{ session('message') }}</strong> 
                </div>	
                @if( !empty( session('url') ) )
                <div class="m-alert__actions" style="width: 200px;">
                    <a href="{{ route(session('url')) }}" class="btn m-btn--pill m-btn--air m-btn m-btn--gradient-from-success m-btn--gradient-to-accent">رجوع </a>	
                </div>	
                @endif			  	
            </div>
        @break
    @endswitch
@endif
@if ($errors->any())
    <div class="m-alert m-alert--icon m-alert--outline alert alert-danger" role="alert">
        <div class="m-alert__icon">
            <i class="la la-warning"></i>
        </div>
        <div class="m-alert__text text-center">
            <strong>{{ $errors->first() }}</strong> 	
        </div>	
    </div>
@endif
</div>