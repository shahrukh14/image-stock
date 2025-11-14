@extends('admin.layouts.app')

@section('panel')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card b-radius--10">
                <div class="card-body p-0">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                                <tr>
                                    {{-- <th>@lang('S.N')</th> --}}
                                    <th>@lang('Image')</th>
                                    <th>@lang('Category')</th>
                                    <th>@lang('Contributor')</th>
                                    <th>@lang('Download By')</th>
                                    <th>@lang('Type')</th>
                                    <th>@lang('Downloaded At')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($downloads as $download)
                                    <tr>
                                        {{-- <td>
                                            {{ $downloads->firstItem() + $loop->index }}
                                        </td> --}}
                                        <td class="sm-text">
                                            {{ __($download->imageFile->image->title) }} |
                                            {{ __($download->imageFile->resolution) }} 
                                        </td>

                                        <td>
                                            {{ (implode(' | ', $download->imageFile->image->categoryName($download->imageFile->image->category_id))) }}
                                        </td>

                                        <td>
                                            <a href="{{ route('admin.users.detail', $download->contributor_id) }}">
                                                {{ $download->contributor->fullname }}
                                           </a> 
                                        </td>

                                        <td>
                                            <a href="{{ route('admin.users.detail', $download->user_id) }}">
                                                {{ $download->user->firstname." ".$download->user->lastname }}
                                           </a>
                                        </td>

                                        <td>
                                            {{ $download->type }}
                                        </td>

                                        <td>
                                            {{ showDateTime($download->created_at) }}
                                            {{-- {{ date('M d, Y - H:i A', strtotime($download->created_at)) }} --}}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                @if ($downloads->hasPages())
                    <div class="card-footer py-4">
                        {{ paginateLinks($downloads) }}
                    </div>
                @endif
            </div>
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
                <form action="{{ route('admin.plan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>@lang('Name')</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="form-group">
                            <label>@lang('Description')</label>
                            <input type="text" class="form-control" name="title" required>
                        </div>
                        <div class="form-group">
                            <label>@lang('Plan For')</label>
                            <select class="form-control" name="plan_for" required>
                                <option value="">Select</option>
                                <option value="photo">Photos | Vectors & Graphics</option>
                                <option value="video">Videos</option>
                            </select>
                        </div>
                        {{-- <div class="form-group">
                            <label>@lang('Monthly Price')</label>
                            <div class="input-group">
                                <input type="number" step="any" class="form-control" name="monthly_price" required>
                                <span class="input-group-text">{{ __($general->cur_text) }}</span>
                            </div>
                        </div> --}}
                        <div class="form-group">
                            <label>@lang('Yearly Price')</label>
                            <div class="input-group">
                                <input type="number" step="any" class="form-control" name="yearly_price" required>
                                <span class="input-group-text">{{ __($general->cur_text) }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>@lang('Daily Download Limit')</label>
                            <input type="number" class="form-control" name="daily_limit" required>
                            <small class="text--info"><i class="las la-info-circle"></i> @lang('-1 for unlimited download limit')</small>
                        </div>
                        <div class="form-group">
                            <label>@lang('Monthly Download Limit')</label>
                            <input type="number" class="form-control" name="monthly_limit" required>
                            <small class="text--info"><i class="las la-info-circle"></i> @lang('-1 for unlimited download limit')</small>
                        </div>
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
    <button class="btn btn-outline--primary h-45 cuModalBtn" data-modal_title="@lang('Add Plan')">
        <i class="las la-plus"></i>@lang('Add New')
    </button>
@endpush
