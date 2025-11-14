@extends($activeTemplate . 'layouts.master')
@section('content')
    <div class="col-12 mb-4">
        <div class="card custom--card">
            <div class="card-body">
                <b class="text-center">
                    @lang('Downloads are available for a year from the initial download. After a year, the download
                           history will be automatically purged.')
                </b>
            </div>
        </div>
    </div>
    <div class="custom--table-container table-responsive--md">
        <table class="table custom--table">
            <thead>
                <tr>
                    <th class="sm-text">@lang('Image')</th>
                    <th class="sm-text">@lang('Category')</th>
                    <th class="sm-text">@lang('Last Download')</th>
                    <th class="sm-text">@lang('Type')</th>
                    <th class="sm-text">@lang('Media type')</th>
                    <th class="sm-text">@lang('Action')</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($downloads as $key=>$download)
                <tr>
                        <td class="sm-text">
                            {{ __($download->imageFile->image->title) }} |
                            {{ __($download->imageFile->resolution) }} 
                           <div>
                            <span>- @lang('By')</span> <a href="{{ route('member.images', $download->contributor->username) }}">
                                 {{ $download->contributor->fullname }}
                            </a> 
                           </div>
                            
                        </td>
                        
                        <td class="sm-text">
                            {{ (implode(' | ', $download->imageFile->image->categoryName($download->imageFile->image->category_id))) }}
                        </td>
                      
                        <td class="sm-text">
                            {{ showDateTime($download->updated_at) }}
                        </td>
                        <td class="sm-text">
                            {{ $download->type }}
                        </td>
                        <td class="sm-text">
                            {{ __($download->imageFile->image->file_type) }} 
                        </td>
                        <td>
                            <a href="{{ route('user.image.download.file', ['id'=>$download->imageFile->id]) }}" class="btn btn--base btn-sm">
                                <i class="las la-download"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center sm-text">{{ __($emptyMessage) }}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        @if ($downloads->hasPages())
            <div class="mt-3 d-flex justify-content-end">
                {{ paginateLinks($downloads) }}
            </div>
        @endif


    </div>
@endsection
