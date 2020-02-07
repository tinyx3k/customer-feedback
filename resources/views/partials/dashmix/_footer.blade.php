@if(auth()->user()->hasRole('Super Admin'))
<!-- Footer -->
<footer id="page-footer" class="bg-body-light">
    <div class="content py-0">
        <div class="row font-size-sm">
            <div class="col-sm-6 order-sm-2 mb-1 mb-sm-0 text-center text-sm-right">
                <span><a href="{{ url('/') }}">Rewards App</a> © {{ date('Y') }}</span>
            </div>
            <div class="col-sm-6 order-sm-1 text-center text-sm-left">
                <span class="ml-auto">Powered by <a href="javascript:void(0);/">IDM</a></span>
            </div>
        </div>
    </div>
</footer>
<!-- END Footer -->
@else
<!-- Footer -->
<footer id="page-footer" class="bg-body-light">
    <div class="content py-0">
        <div class="row justify-content-between">
            <a href="{{ route('dashboard') }}" class="btn {{ Request::is('/') ? 'text-black' : '' }}">
                <i class="fa fa-home"></i>
                <br>
                <small>Home</small>
            </a>
            <a href="{{ route('bonus.index') }}" class="btn">
                <i class="fa fa-plus-circle"></i>
                <br>
                <small>Bonus</small>
            </a>
            <a href="{{ route('deal.index') }}" class="btn {{ Request::is('deal*') ? 'text-black' : '' }}">
                <i class="fa fa-trophy"></i>
                <br>
                <small>Rewards</small>
            </a>
            <a href="{{ route('history.index') }}" class="btn">
                <i class="fa fa-list"></i>
                <br>
                <small>History</small>
            </a>
            <a href="{{ route('special.index') }}" class="btn">
                <i class="fa fa-star"></i>
                <br>
                <small>Specials</small>
            </a>
        </div>
    </div>
</footer>
<!-- END Footer -->
@endif
