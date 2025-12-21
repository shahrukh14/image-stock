<div class="modal custom--modal fade" id="pricingModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog  modal-lg modal-dialog-centered">
        <div class="modal-content  border-0">
            <div class="modal-header">
                <h5 class="modal-title">@lang('Package Plans')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
               <div class="grid-container">
                    @forelse ($plans as $plan)
                    <div class="grid-item text-align-center padding-20px">
                        <h2 class="display-5 text-align-center">{{ $plan->name }}</h2>
                        @if($plan->plan_for == "photo")
                        <h4 class="text-align-center">Photos | Vectors & graphics</h4>
                        @else
                        <h4 class="text-align-center">Videos</h4>
                        @endif
                        <h3>${{ __(showAmount($plan->yearly_price)) }}</h3>
                        <div class="product-page-main-content---top">
                            <p class="mg-bottom-0">{{ $plan->title}}</p>
                        </div>
                        <button class="buyButton purchase-btn" data-current="{{ auth()->user()?->purchasedPlan?->plan_id == $plan->id }}" data-daily_limit="{{ $plan->dailyLimitText }}" data-id="{{ $plan->id }}" data-monthly_limit="{{ $plan->monthlyLimitText }}" data-plan_name="{{ __($plan->name) }}" @if($plan->plan_for == 'video') data-plan_type="videos" @else data-plan_type="photos, vectors or graphics images" @endif >Buy</button>
                    </div>
                    @empty
                    <div class="grid-item text-align-center padding-20px">
                        <h2>No Plans Found</h2>
                    </div>
                    @endforelse
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn--dark" data-bs-dismiss="modal">@lang('close')</button>
            </div>
        </div>
    </div>
</div>