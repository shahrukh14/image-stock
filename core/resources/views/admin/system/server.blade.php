@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-xl-12">
            <div class="card b-radius--10 ">
              <div class="card-body p-0">
                <ul class="list-group">
                    <li>
                        <span>@lang('PHP Version')</span>
                        <span>{{ $currentPHP }}</span>
                    </li>
                    <li>
                        <span>@lang('Server Software')</span>
                        <span>{{ @$serverDetails['SERVER_SOFTWARE'] }}</span>
                    </li>
                    <li >
                        <span>@lang('Server IP Address')</span>
                        <span>{{ @$serverDetails['SERVER_ADDR'] }}</span>
                    </li>
                    <li>
                        <span>@lang('Server Protocol')</span>
                        <span>{{ @$serverDetails['SERVER_PROTOCOL'] }}</span>
                    </li>
                    <li>
                        <span>@lang('HTTP Host')</span>
                        <span>{{ @$serverDetails['HTTP_HOST'] }}</span>
                    </li>
                    <li>
                        <span>@lang('Server Port')</span>
                        <span>{{ @$serverDetails['SERVER_PORT'] }}</span>
                    </li>
                </ul>
              </div>
            </div>
        </div>
    </div>
@endsection
@push('style')
<style>
  .list-group-item span{
    font-size: 22px !important;
    padding: 8px 0px
  }
</style>
@endpush
