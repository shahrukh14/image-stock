@extends($activeTemplate . 'layouts.frontend')
@section('content')
    @php
        $user = auth()->user();
    @endphp
    <div class="photo-page">
        <div class="container">
            <div class="row g-4 gy-md-0">
                <div class="col-md-7 col-lg-8 col-xl-9">
                    <div class="photo-view">
                        <img class="photo-view__img" src="{{ imageUrl(getFilePath('stockImage'), $image->image_name) }}" alt="@lang('Image')">
                    </div>
                    <div class="photo-info">
                        @php echo $image->description @endphp
                    </div>
                    <div class="related-category">
                        <h5 class="related-category__title">@lang('Keywords')</h5>
                        <ul class="list list--row related-category__list flex-wrap">
                            @foreach ($image->tags as $tag)
                                <li>
                                    <a class="search-category__btn" href="{{ route('search', ['type' => 'image', 'tag' => $tag]) }}">{{ __($tag) }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col-md-5 col-lg-4 col-xl-3">
                    <div class="user align-items-center">
                        <div class="user__img user__img--lg">
                            <img class="user__img-is" src="{{ getImage(getFilePath('userProfile') . '/' . @$image->user->image, null, 'user') }}" alt="@lang('image')">
                        </div>
                        <div class="user__content">
                            <span class="user__name"><a
                                   href="{{ route('member.images', @$image->user->username) }}">{{ __(@$image->user->fullname) }}</a>/{{ shortNumber($image->user->images->count()) }}
                                @lang('images')</span>
                            @if ($image->user_id != @$user->id)
                                <ul class="list list--row flex-wrap" style="--gap: 0.5rem">
                                    @php
                                        $liked = null;
                                        $followed = null;
                                        
                                        if ($user) {
                                            $liked = $user->likes->where('image_id', $image->id)->first();
                                            $followed = $user->followings->where('following_id', $image->user->id)->first();
                                        }
                                    @endphp

                                    @if ($liked)
                                        <li>
                                            <button class="follow-btn unlike-btn active" data-has_icon="0" data-image="{{ $image->id }}" type="button">@lang('Unlike')</button>
                                        </li>
                                    @else
                                        <li>
                                            <button class="follow-btn like-btn" data-has_icon="0" data-image="{{ $image->id }}" type="button">@lang('Like')</button>
                                        </li>
                                    @endif

                                    @if ($followed)
                                        <li>
                                            <button class="follow-btn unfollow active" data-following_id="{{ $image->user->id }}" type="button">@lang('Unfollow')</button>
                                        </li>
                                    @else
                                        <li>
                                            <button class="follow-btn follow" data-following_id="{{ $image->user->id }}" type="button">@lang('Follow')</button>
                                        </li>
                                    @endif
                                </ul>
                            @endif
                        </div>
                    </div>

                    <div class="photo-details my-4">
                        <div class="photo-details__head">
                            <div class="photo-details__title">
                                <span class="photo-details__icon">
                                    <i class="las la-camera-retro"></i>
                                </span>
                                <span class="photo-details__title-link">{{ __($image->title) }} </span>

                                @if (@$user->id == @$image->user_id)
                                    <a class="btn btn-sm btn--primary" data-bs-toggle="tooltip" href="{{ route('user.image.edit', $image->id) }}" title="Edit">
                                        <i class="las la-pen"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="photo-details__body">
                            <ul class="list" style="--gap: 0.5rem">
                                <li class="py-2">
                                    <div class="d-flex align-items-center justify-content-between gap-3">
                                        <span class="d-inline-block sm-text lh-1"> @lang('Image type') </span>
                                        <span class="d-inline-block sm-text lh-1">
                                            @if ($image->extensions)
                                                {{ __(strtoupper(implode(', ', $image->extensions))) }}
                                            @endif
                                        </span>
                                    </div>
                                </li>

                                <li class="py-2">
                                    <div class="d-flex align-items-center justify-content-between gap-3">
                                        <span class="d-inline-block sm-text lh-1"> @lang('Published') </span>
                                        <span class="d-inline-block sm-text lh-1">
                                            {{ showDateTime($image->upload_date, 'F d, Y') }}
                                        </span>
                                    </div>
                                </li>
                                <li class="py-2">
                                    <div class="d-flex align-items-center justify-content-between gap-3">
                                        <span class="d-inline-block sm-text lh-1"> @lang('Views') </span>
                                        <span class="d-inline-block sm-text lh-1"> {{ $image->total_view }} </span>
                                    </div>
                                </li>
                                <li class="py-2">
                                    <div class="d-flex align-items-center justify-content-between gap-3">
                                        <span class="d-inline-block sm-text lh-1"> @lang('Downloads') </span>
                                        <span class="d-inline-block sm-text lh-1"> {{ $image->totalDownloads }} </span>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>

                    <div class="photo-details my-4">
                        <div class="photo-details__body">

                            @foreach ($imageFiles as $key => $imageFile)
                                <div
                                     class="d-flex align-items-center justify-content-between {{ !$key ? '' : 'border-top' }} py-2">
                                    <div>
                                        <span class="d-inline-block sm-text lh-1"> {{ $imageFile->resolution }} </span>
                                        <span class="px-2">|</span>
                                        @if ($imageFile->is_free == Status::PREMIUM)
                                            <span class="d-inline-block sm-text lh-1">{{ showAmount($imageFile->price) }}
                                                {{ __($general->cur_text) }} </span>
                                        @else
                                            <span class="d-inline-block sm-text lh-1"> @lang('Free') </span>
                                        @endif
                                    </div>
                                    <div class="d-flex">
                                        @php
                                            $downloadActionClass = 'login-btn';
                                            if (auth()->check() || $imageFile->is_free) {
                                                $downloadActionClass = 'confirmationBtn';
                                            }
                                        @endphp
                                        <button class="btn btn--base btn-sm {{ $downloadActionClass }}" data-action="{{ route('image.download', encrypt($imageFile->id)) }}" data-question="@lang('Are you sure to download of this file ?')" type="button">
                                            <i class="las la-download"></i>
                                        </button>
                                        @if (@$user->id == @$image->user_id)
                                            @if ($imageFile->status == Status::ENABLE)
                                                <button class="btn btn btn-sm btn-success confirmationBtn ms-2" data-action="{{ route('user.image.file.status', $imageFile->id) }}" data-question="@lang('Are you sure to change status?')" data-bs-toggle="tooltip" type="button" title="@lang('Make disabled')">
                                                    <i class="la la-eye"></i>
                                                </button>
                                            @else
                                                <button class="btn btn btn-sm btn-danger confirmationBtn ms-2" data-action="{{ route('user.image.file.status', $imageFile->id) }}" data-question="@lang('Are you sure to change status?')" data-bs-toggle="tooltip" type="button" title="@lang('Make enabled')">
                                                    <i class="la la-eye-slash"></i>
                                                </button>
                                            @endif
                                        @endif

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    @if (gs('donation_module') && @$imageFiles?->where('is_free', 1)->isNotEmpty() && $image->user_id != @$user->id)
                        <div class="photo-details my-4">
                            <div class="photo-details__body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <span class="d-inline-block sm-text lh-1"> {{ __(gs('donation_setting')?->subtitle) }}</span>
                                    </div>
                                    <div class="d-flex">
                                        <button class="btn btn--base btn-sm donateBtn" type="button">
                                            <i class="las la-hand-holding-usd"></i>
                                        </button>
                                    </div>
                                </div>
                                <form class="donationForm d-none mt-3" method="post" action="{{ route('donation.insert', $image->id) }}">
                                    @csrf
                                    <input name="currency" type="hidden">

                                    <h5 class="card__title">
                                        @lang('Buy ') <i>{{ __(@$image->user->fullname) }}</i> @lang('a') {{ keyToTitle(__(gs('donation_setting')?->item)) }}
                                    </h5>

                                    <div class="card__box">
                                        <div class="d-flex align-items-center justify-center">
                                            <span class="icon">@php echo gs('donation_setting')?->icon @endphp </span>
                                            <span class="icon"><i class="las la-times"></i></span>
                                            <input class="form--control form-control" id="donation" name="donation_quantity" data-donation_amount="{{ gs('donation_setting')?->amount }}" type="text" type="number" value="1" min="1" max="9">
                                            <nav aria-label="Page navigation example">
                                                <ul class="donation-quantity">

                                                    <li class="quantity-item"><button class="quantity-button active" data-donation_amount="{{ gs('donation_setting')?->amount }}" type="button">@lang('1')</button></li>
                                                    <li class="quantity-item"><button class="quantity-button" data-donation_amount="{{ gs('donation_setting')?->amount }}" type="button">@lang('3')</button></li>
                                                    <li class="quantity-item"><button class="quantity-button" data-donation_amount="{{ gs('donation_setting')?->amount }}" type="button">@lang('5')</button></li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <input class="form-control form--control amount" name="amount" type="hidden" value="{{ gs('donation_setting')?->amount }}" step="any" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="form-label">@lang('Donation Method')</label>
                                        <select class="form-control form-select" name="gateway" required>
                                            <option value="">@lang('Select One')</option>
                                            @auth
                                                <option value="balance">@lang('Using wallet Balance') ({{ gs('cur_sym') . showAmount($user->balance) }})</option>
                                            @endauth
                                            @foreach ($gatewayCurrency as $data)
                                                <option data-gateway="{{ $data }}" value="{{ $data->method_code }}" @selected(old('gateway') == $data->method_code)>
                                                    {{ $data->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="preview-details d-none my-3">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item d-flex justify-content-between flex-wrap">
                                                <span>@lang('Limit')</span>
                                                <span><span class="min fw-bold">0</span> {{ __($general->cur_text) }} - <span class="max fw-bold">0</span> {{ __($general->cur_text) }}</span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between flex-wrap">
                                                <span>@lang('Charge')</span>
                                                <span><span class="charge fw-bold">0</span> {{ __($general->cur_text) }}</span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between flex-wrap">
                                                <span>@lang('Payable')</span> <span><span class="payable fw-bold"> 0</span> {{ __($general->cur_text) }}</span>
                                            </li>
                                            <li class="list-group-item justify-content-between d-none rate-element">
                                            </li>
                                            <li class="list-group-item justify-content-between d-none in-site-cur">
                                                <span>@lang('In') <span class="base-currency"></span></span>
                                                <span class="final_amo fw-bold">0</span>
                                            </li>
                                            <li class="list-group-item justify-content-center crypto_currency d-none">
                                                <span>@lang('Conversion with') <span class="method_currency"></span> @lang('and final value will Show on next step')</span>
                                            </li>
                                        </ul>
                                    </div>
                                    @guest
                                        <div class="form-group mb-3">
                                            <label class="form-label">@lang('Name')</label>
                                            <input class="form-control form--control" name="name" type="text" value="{{ old('name', @$user->fullname) }}" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-label">@lang('Email')</label>
                                            <input class="form-control form--control" name="email" type="email" value="{{ old('email', @$user->email) }}" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-label">@lang('Mobile')</label>
                                            <input class="form-control form--control" name="mobile" type="tel" value="{{ old('email', @$user->mobile) }}" required>
                                        </div>
                                    @endguest
                                    <div class="form-group mt-3">
                                        <button class="btn btn--base w-100 donation-submit-button" type="submit">@lang('Support Me')</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif



                    <div class="mt-4">
                        <h5 class="mb-2 mt-0">@lang('Share')</h5>
                        <ul class="list list--row social-list">
                            <li>
                                <a class="t-link social-list__icon" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank">
                                    <i class="lab la-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a class="t-link social-list__icon" href="https://twitter.com/intent/tweet?text={{ $image->title }}&amp;url={{ urlencode(url()->current()) }}" target="_blank">
                                    <i class="lab la-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a class="t-link social-list__icon" href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ urlencode(url()->current()) }}&amp;title={{ $image->title }}&amp;summary={{ $image->title }}" target="_blank">
                                    <i class="lab la-linkedin-in"></i>
                                </a>
                            </li>
                            <li>
                                <a class="t-link social-list__icon" href="http://pinterest.com/pin/create/button/?url={{ urlencode(url()->current()) }}&description={{ $image->description }}" target="_blank">
                                    <i class="lab la-pinterest-p"></i>
                                </a>

                            </li>
                        </ul>
                    </div>
                </div>
                @if ($relatedImages->count())
                    <div class="col-12">
                        <div class="related-photo">
                            <h5 class="related-photo__title">@lang('Related Photos')</h5>
                            @include($activeTemplate . 'partials.image_grid', [
                                'images' => $relatedImages,
                                'class' => 'gallery--sm',
                            ])
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="photo-modal">
            <div class="photo-modal__img">
                <img class="photo-modal__image" src="{{ imageUrl(getFilePath('stockImage'), $image->thumb) }}" alt="image">
            </div>
            <div class="photo-modal__content">
                <h6 class="photo-modal__title">@lang('Give Thanks!')</h6>
                <p class="photo-modal__description">
                    @lang('Give thanks to ')@<span class="fw-bold">{{ @$image->user->username }}</span> @lang('for sharing this photo, the easiest way, sharing on social network')
                </p>
                <ul class="list list--row social-list">
                    <li>
                        <a class="t-link social-list__icon" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank">
                            <i class="lab la-facebook-f"></i>
                        </a>
                    </li>
                    <li>
                        <a class="t-link social-list__icon" href="https://twitter.com/intent/tweet?text={{ $image->title }}&amp;url={{ urlencode(url()->current()) }}" target="_blank">
                            <i class="lab la-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a class="t-link social-list__icon" href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ urlencode(url()->current()) }}&amp;title={{ $image->title }}&amp;summary={{ $image->title }}" target="_blank">
                            <i class="lab la-linkedin-in"></i>
                        </a>
                    </li>
                    <li>
                        <a class="t-link social-list__icon" href="http://pinterest.com/pin/create/button/?url={{ urlencode(url()->current()) }}&description={{ $image->description }}" target="_blank">
                            <i class="lab la-pinterest-p"></i>
                        </a>

                    </li>
                </ul>
                <button class="photo-modal__close" type="button">
                    <i class="las la-times"></i>
                </button>
            </div>
        </div>
    </div>

    <x-confirmation-modal />

    @include($activeTemplate . 'partials.collection_modal')
    @include($activeTemplate . 'partials.share_modal')
    @include($activeTemplate . 'partials.login_modal')

@endsection


@push('style')
    <style>
        .form-select:focus {
            border: 1px solid hsl(var(--border));
        }
    </style>
@endpush

@push('script')
    <script>
        "use strict";

        let likeRoutes = {
            updateLike: "{{ route('user.image.like.update') }}"

        };
        let likeParams = {
            loggedStatus: @json(Auth::check()),
            csrfToken: "{{ csrf_token() }}"
        }

        let followRoutes = {
            updateFollow: "{{ route('user.follow.update') }}",
        }

        let followParams = {
            loggedStatus: @json(Auth::check()),
            csrfToken: "{{ csrf_token() }}",
            appendStatus: 0
        }

        $('.login-btn').on('click', function() {
            let modal = $('#loginModal');
            modal.modal('show');
        });

        $('.photo-modal__close').on('click', function() {
            $('.photo-modal').removeClass('active');
        });
        $('.download-form').on('submit', function() {
            downloadModal.modal('hide');
            setTimeout(() => {
                $('.photo-modal').addClass('active');
            }, 3000);
        })
        $('#confirmationModal [type="submit"]').on('click', function() {
            $('#confirmationModal').modal('hide');
        })
    </script>
    <script src="{{ asset($activeTemplateTrue . 'js/like.js') }}"></script>
    <script src="{{ asset($activeTemplateTrue . 'js/follow.js') }}"></script>
@endpush
@push('script')
    <script>
        (function($) {
            "use strict";
            $('select[name=gateway]').on('change', function() {

                if ($('select[name=gateway]').val() == 'balance') {
                    $('.preview-details').addClass('d-none');
                    $('.charge').text('0');
                    $('.payable').text('0');
                    $('.final_amo').text('0');
                    return false;
                }

                if (!$('select[name=gateway]').val()) {
                    $('.preview-details').addClass('d-none');
                    return false;
                }
                var resource = $('select[name=gateway] option:selected').data('gateway');
                var fixed_charge = parseFloat(resource.fixed_charge);
                var percent_charge = parseFloat(resource.percent_charge);
                var rate = parseFloat(resource.rate)
                if (resource.method.crypto == 1) {
                    var toFixedDigit = 8;
                    $('.crypto_currency').removeClass('d-none');
                } else {
                    var toFixedDigit = 2;
                    $('.crypto_currency').addClass('d-none');
                }
                $('.min').text(parseFloat(resource.min_amount).toFixed(2));
                $('.max').text(parseFloat(resource.max_amount).toFixed(2));
                var amount = parseFloat($('input[name=amount]').val());
                if (!amount) {
                    amount = 0;
                }
                if (amount <= 0) {
                    $('.preview-details').addClass('d-none');
                    return false;
                }
                $('.preview-details').removeClass('d-none');
                var charge = parseFloat(fixed_charge + (amount * percent_charge / 100)).toFixed(2);
                $('.charge').text(charge);
                var payable = parseFloat((parseFloat(amount) + parseFloat(charge))).toFixed(2);
                $('.payable').text(payable);
                var final_amo = (parseFloat((parseFloat(amount) + parseFloat(charge))) * rate).toFixed(toFixedDigit);
                $('.final_amo').text(final_amo);
                if (resource.currency != '{{ $general->cur_text }}') {
                    var rateElement = `<span class="fw-bold">@lang('Conversion Rate')</span> <span><span  class="fw-bold">1 {{ __($general->cur_text) }} = <span class="rate">${rate}</span>  <span class="base-currency">${resource.currency}</span></span></span>`;
                    $('.rate-element').html(rateElement)
                    $('.rate-element').removeClass('d-none');
                    $('.in-site-cur').removeClass('d-none');
                    $('.rate-element').addClass('d-flex');
                    $('.in-site-cur').addClass('d-flex');
                } else {
                    $('.rate-element').html('')
                    $('.rate-element').addClass('d-none');
                    $('.in-site-cur').addClass('d-none');
                    $('.rate-element').removeClass('d-flex');
                    $('.in-site-cur').removeClass('d-flex');
                }
                $('.base-currency').text(resource.currency);
                $('.method_currency').text(resource.currency);
                $('input[name=currency]').val(resource.currency);
                $('input[name=amount]').on('input');
            });
            $('input[name=amount]').on('input', function() {
                $('select[name=gateway]').change();
                $('.amount').text(parseFloat($(this).val()).toFixed(2));
            });


            $('.donateBtn').on('click', function() {
                $('.donationForm').toggle();
                $('.donationForm').removeClass('d-none');

            })


            $("#donation").on('change', function() {
                $(`.quantity-button`).removeClass('active');
                if ($(this).val()) $(`.quantity-button:contains("${$(this).val()}")`).addClass('active');

                var value = $(this).val()
                var unitAmount = $(this).data('donation_amount');

                var amount = parseFloat(value * unitAmount);
                setDonationAmount(amount);
            }).change();


            $(".quantity-button").on('click', function(event) {
                $(this).toggleClass('active');

                if ($(this).hasClass('active')) {

                    var unitAmount = $(this).data('donation_amount');
                    $('.quantity-button').removeClass('active');
                    $(this).addClass('active');
                    var linkText = $(this).text();
                    var totalItem = parseInt(linkText)
                    var amount = parseFloat(totalItem * unitAmount);
                    setDonationAmount(amount);
                    $("#donation").val(linkText);
                } else {
                    setDonationAmount();
                    $("#donation").val(1);
                }
            });

            function setDonationAmount(amount = `{{ @gs('donation_setting')?->amount }}`) {
                $('.amount').val(amount);
                $('.donation-submit-button').text(`Support {{ gs('cur_sym') }}${amount}`);
            }

        })(jQuery);
    </script>
@endpush
