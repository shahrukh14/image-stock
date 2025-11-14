@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                                <tr>
                                    <th>@lang('Title')</th>
                                    <th>@lang('Code')</th>
                                    <th>@lang('Start Date')</th>
                                    <th>@lang('Expiry Date')</th>
                                    {{-- <th>@lang('Minium Purchase')</th> --}}
                                    <th>@lang('Coupon For')</th>
                                    <th>@lang('Offer Type')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($coupons as $coupon)
                                    <tr>
                                        <td> 
                                            {{ __(@$coupon->coupon) }}
                                        </td>
                                      
                                        <td>
                                            {{ __(@$coupon->code) }}
                                        </td>
                                        <td>
                                            {{ showDateTime($coupon->start_date, 'd M,Y') }}
                                        </td>
                                        <td>
                                            {{ showDateTime($coupon->expiry_date, 'd M,Y') }}
                                        </td>
                                        {{-- <td>
                                            {{ __(@$coupon->minimun_purchase) }}
                                        </td> --}}
                                        <td>
                                            {{ (@$coupon->coupon_for == 'plan') ? 'Plans' : 'Photos ,vectors or videos' }}
                                        </td>
                                        <td>
                                            {{ (@$coupon->type == 'percent') ? 'Percent' : 'Amount' }}
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-end flex-wrap gap-2">
                                                <button class="btn btn-outline--primary cuModalBtn btn-sm" data-modal_title="@lang('Update Coupon')" data-resource="{{ $coupon }}"><i class="las la-pen"></i>@lang('Edit')
                                                </button>
                                                <button class="btn btn-outline--danger btn-sm confirmationBtn" data-question="@lang('Are you sure to Delete this Coupon Code ?')" data-action="{{ route('admin.coupon.delete', $coupon->id) }}">
                                                    <i class="las la-trash"></i>@lang('Delete')
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
                @if ($coupons->hasPages())
                    <div class="card-footer py-4">
                        {{ paginateLinks($coupons) }}
                    </div>
                @endif
            </div><!-- card end -->
        </div>
    </div>
    <div id="cuModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </button>
                </div>
                <form action="{{ route('admin.coupon.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>@lang('Title')</label>
                            <input type="text" class="form-control" name="coupon" required>
                        </div>
                        <div class="form-group">
                            <label>@lang('Code')</label>
                            <input type="text" class="form-control" name="code" required>
                        </div>
                        <div class="form-group">
                            <label>@lang('Start Date')</label>
                            <input type="date" class="form-control" name="start_date" required>
                        </div>
                        <div class="form-group">
                            <label>@lang('Expiry Date')</label>
                            <input type="date" class="form-control" name="expiry_date" required>
                        </div>

                        <div class="form-group">
                            <label>@lang('Coupon For')</label>
                            <select name="coupon_for" class="form-control" required>
                                <option>Select</option>
                                <option value="plan">Plan</option>
                                <option value="photo">Photo,vector & graphics or videos</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>@lang('Discount Type')</label>
                            <select name="type" class="form-control" required>
                                <option>Select</option>
                                <option value="percent">Percenteage</option>
                                <option value="amount">Amount</option>
                            </select>
                        </div>
                       
                        {{-- <div class="form-group">
                            <input type="radio" class="form-check-input" name="type" value="percent" id="percent">
                            <label class="form-check-label" for="percent">Percenteage</label>
                            <input type="radio" class="form-check-input" name="type" value="amount" id="amount">
                            <label class="form-check-label" for="amount">Amount</label>
                        </div> --}}

                        <div class="form-group">
                            <label>@lang('Discount')</label>
                            <input type="number" class="form-control" name="discount" required>
                        </div>
                       
                        {{-- <div class="form-group">
                            <label>@lang('Minimum Purchase')</label>
                            <input type="number" class="form-control" name="minimun_purchase" required>
                        </div> --}}
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn--primary w-100 h-45">@lang('Submit')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <x-confirmation-modal />

@endsection

@push('breadcrumb-plugins')
    <x-search-form />
    <button class="btn btn-outline--primary h-45 cuModalBtn" data-modal_title="@lang('Add Coupon')">
        <i class="las la-plus"></i>@lang('Add New')
    </button>
@endpush
