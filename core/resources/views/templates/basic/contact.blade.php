@extends($activeTemplate . 'layouts.frontend')
@section('content')
    @php
        $content = getContent('contact.content', true);
    @endphp
    <section class="section section-hero---v3">
        <div class="container-default w-container">
          <div class="inner-container _1146px center">
            <div class="w-layout-grid grid-2-columns contact-form-side-details">
              <div id="w-node-_8c1563e2-8c31-9390-4fcb-8ac70f2bf395-c050df8a" class="contact-form-left-side">
                <div data-w-id="01fd488e-8379-bd50-6551-292d4daf86af" style="opacity: 1;"
                  class="inner-container _480px _100-tablet">
                  <div class="contact-form-block">
                    {{-- {{ route('contact.form') }} --}}
                    <form id="wf-form-Contact-Form"  action="{{route('contact.form')}}" data-name="Contact Form" method="post" class="verify-gcaptcha"  
                      data-wf-page-id="64358b7d9abc70e5c050df8a" data-wf-element-id="8c1563e2-8c31-9390-4fcb-8ac70f2bf397"
                      aria-label="Contact Form">
                      @csrf
                      <div class="w-layout-grid grid-2-columns form">
                        <div>
                          <label for="name" class="label small">Name</label>
                          <input type="text" value="" class="input small w-input" name="name" data-name="Name" placeholder="John Carter" id="name" required>
                        </div>
                        <div>
                          <label for="email" class="label small">Email address</label>
                          <input type="email" class="input small w-input" name="email" data-name="Email" value="" placeholder="example@email.com" id="email" required>
                        </div>
                        <div>
                          <label for="phone" class="label small">Phone number</label>
                          <input type="tel" class="input small w-input" name="phone_no" data-name="phone_no" placeholder="(123) 456 - 7890" id="phone_no" required>
                        </div>
                        <div>
                          <label for="subject" class="label small">Subject</label>
                          <input type="text" value="" class="input small w-input" name="subject" data-name="Subject" placeholder="ex. Advertising" id="subject" required>
                        </div>
                        <div id="w-node-_8c1563e2-8c31-9390-4fcb-8ac70f2bf3a9-c050df8a" class="text-area-wrapper">
                          <label for="message" class="label small">Message</label>
                          <textarea id="message" name="message"  maxlength="5000" data-name="Message" placeholder="Type your message here..." required class="text-area small w-input">{{ old('message') }}</textarea>
                        </div>
                        <input type="submit" value="Send Message" data-wait="Please wait..." id="w-node-_8c1563e2-8c31-9390-4fcb-8ac70f2bf3ad-c050df8a" class="btn-primary small w-button">
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div id="w-node-_8c1563e2-8c31-9390-4fcb-8ac70f2bf3b9-c050df8a"
                data-w-id="8c1563e2-8c31-9390-4fcb-8ac70f2bf3b9" style="opacity: 1;" class="contact-form-right-side border-left-green">
                <div id="w-node-_032e8a53-5b2e-ec2b-8a9b-1e458f37e486-c050df8a" class="contact-form-rigth-side-content">
                  <div class="inner-container _465px width-100">
                    <h1 class="display-1 mg-bottom-12px">Get <span class="text-no-wrap">in touch</span></h1>
                    <p class="mg-bottom-24px keep">Follow us on our social media channels.
                      <span class="text-no-wrap">We will respond within 24 hours.</span></p>
                      <div class="w-layout-grid social-media-grid-top">
                        <a href="https://facebook.com/" target="_blank" class="social-icon w-inline-block">
                            <div class="facebook social"></div>
                        </a>
                        <a href="https://twitter.com/" target="_blank" class="social-icon w-inline-block">
                            <div class="twitter social"></div>
                        </a>
                        <a href="https://instagram.com/" target="_blank" class="social-icon w-inline-block">
                            <div class="instagram social"></div>
                        </a>
                        <a href="https://pinterest.com/" target="_blank" class="social-icon w-inline-block">
                            <div class="pinterest social"></div>
                        </a>
                        <a href="https://linkedin.com/" target="_blank" class="social-icon w-inline-block">
                            <div class="linkedIn social"></div>
                        </a>
                        <a href="https://youtube.com/" target="_blank" class="social-icon w-inline-block">
                            <div class="youtube social"></div>
                        </a>
                    </div>
                  </div>
                </div>
                <div id="w-node-_8c1563e2-8c31-9390-4fcb-8ac70f2bf3cc-c050df8a"
                  class="divider contact-form-right-divider divider-green"></div>
                <div id="w-node-_46774866-e091-148f-7933-7502d5602db4-c050df8a" class="contact-form-rigth-side-content">
                  <div class="inner-container _465px width-100">
                    <h2 class="heading-h5-size mg-bottom-21px">More contact information</h2>
                    <div class="flex-horizontal start contact-links">
                      <a href="mailto:support@greenstockpro.com" class="contact-link w-inline-block">
                        <div class="inner-container _48px mg-right-12px">
                          <div class="image-wrapper">
                            <img src=".\assets\images\app_images\_email-icon-stock-x-webflow-template.svg" alt="Email Icon - Stock X Webflow Template" class="image">
                          </div>
                        </div>
                        <div>
                          <div class="text-200 mg-bottom-8px">Send us an email</div>
                          <div class="text-200 bold color-neutral-800">support@greenstockpro.com</div>
                        </div>
                      </a>
                      <a href="tel:(414)435-094" class="contact-link w-inline-block">
                        <div class="inner-container _48px mg-right-12px">
                          <div class="image-wrapper">
                            <img src=".\assets\images\app_images\_phone-icon-stock-x-webflow-template.svg" alt="Phone Icon - Stock X Webflow Template" class="image">
                          </div>
                        </div>
                        <div>
                          <div class="text-200 mg-bottom-8px">Give us a call</div>
                          <div class="text-200 bold color-neutral-800">(727) 219 - 2805</div>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection

