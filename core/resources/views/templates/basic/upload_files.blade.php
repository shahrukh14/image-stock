@extends($activeTemplate . 'layouts.frontend')
@section('content')
    <section class="section section-hero---v9 mg-bottom-50px">
        <div class="container-default w-container">
            <div class="inner-container _660px center">
                <div data-w-id="0bfd5bbe-5127-f853-0c49-ab8adba09f99"
                    style="transform: translate3d(0px, 0%, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); opacity: 1; transform-style: preserve-3d;"
                    class="inner-container _493px center">
                    <div class="inner-container _420px---mbl center">
                        <div class="text-center mg-bottom-32px keep">
                            <h1 class="display-1 mg-bottom-12px">Upload <span class="text-no-wrap">files</span></h1>
                        </div>
                    </div>
                </div>
                <div data-w-id="0bfd5bbe-5127-f853-0c49-ab8adba09fa0" style="opacity: 1;"
                    class="card resource---form w-form">
                    <form id="wf-form-Resource-Form" name="wf-form-Resource-Form-2" data-name="Resource Form" method="get"
                        data-wf-page-id="6435f1a7d0dbc5ee852cefdd" data-wf-element-id="0bfd5bbe-5127-f853-0c49-ab8adba09fa1"
                        aria-label="Resource Form">
                        <div class="w-layout-grid grid-2-columns form-v2">
                            <div id="w-node-_0bfd5bbe-5127-f853-0c49-ab8adba09fb3-852cefdd"><label
                                    for="title">Title</label><input type="text" class="input w-input" maxlength="256"
                                    name="Title" data-name="Title" placeholder="ex. 3d black render" id="title"
                                    required=""></div>
                            <div><label for="resolution">Resolution</label><input type="text" class="input w-input"
                                    maxlength="256" name="Resolution" data-name="Resolution" placeholder="ex. 3840 x 2160"
                                    id="resolution" required="">
                            </div>
                            <div><label for="size">Size</label><input type="text" class="input w-input"
                                    maxlength="256" name="Size" data-name="Size" placeholder="ex. 6.42MB" id="size"
                                    required=""></div>
                            <div><label for="file-type">File type</label><input type="text" class="input w-input"
                                    maxlength="256" name="File-type" data-name="File type"
                                    placeholder="ex. JPG, PNG, MP4..." id="file-type" required=""></div>
                            <div><label for="price">Price</label><input type="text" class="input w-input"
                                    maxlength="256" name="Price" data-name="Price" placeholder="ex. $29.90 USD"
                                    id="price" required=""></div>
                            <div id="w-node-_0bfd5bbe-5127-f853-0c49-ab8adba09fb7-852cefdd" class="text-area-wrapper"><label
                                    for="description">Description</label>
                                <textarea id="description" name="Description" maxlength="5000" data-name="Description"
                                    placeholder="Describe your resource" required="" class="text-area mg-bottom-0 w-input"></textarea>
                            </div>
                            <div id="w-node-_853f4718-7d5d-f227-7792-681c33093033-852cefdd" class="mg-bottom-8px">
                                <div class="label mg-bottom-24px">Category</div>
                                <div class="w-layout-grid grid-2-columns checkbox-grid"><label
                                        id="w-node-_858e9fbb-c4a0-865e-2567-6aab657ad2bc-852cefdd"
                                        class="w-checkbox checkbox-field-wrapper upload-image-field">
                                        <div
                                            class="w-checkbox-input w-checkbox-input--inputType-custom checkbox upload-image">
                                        </div>
                                        <input type="checkbox" id="photographs" name="Photographs" data-name="Photographs"
                                            style="opacity:0;position:absolute;z-index:-1"><span
                                            class="checkbox-label text-200 medium w-form-label"
                                            for="Photographs">Photographs</span><img
                                            id="w-node-_96e1d7a3-131f-edf7-471e-25af83f8bbc6-852cefdd"
                                            alt="Photography Icon - Stock X Webflow Template"
                                            src=".\assets\images\app_images\_photographies-icon-stock-x-webflow-template.svg"
                                            class="checkbox-icon">
                                    </label><label id="w-node-db5a0595-e0a4-9f21-7d1d-ea44332f6aec-852cefdd"
                                        class="w-checkbox checkbox-field-wrapper upload-image-field">
                                        <div
                                            class="w-checkbox-input w-checkbox-input--inputType-custom checkbox upload-image">
                                        </div>
                                        <input type="checkbox" id="videos" name="Videos" data-name="Videos"
                                            style="opacity:0;position:absolute;z-index:-1"><span
                                            class="checkbox-label text-200 medium w-form-label"
                                            for="Videos">Videos</span><img
                                            id="w-node-db5a0595-e0a4-9f21-7d1d-ea44332f6af0-852cefdd"
                                            alt="Videos Icon - Stock X Webflow Template"
                                            src=".\assets\images\app_images\_videos-icon-stock-x-webflow-template.svg"
                                            class="checkbox-icon">
                                    </label><label id="w-node-_53147561-1517-7f00-0b33-f4fb86894f20-852cefdd"
                                        class="w-checkbox checkbox-field-wrapper upload-image-field">
                                        <div
                                            class="w-checkbox-input w-checkbox-input--inputType-custom checkbox upload-image">
                                        </div>
                                        <input type="checkbox" id="vectors-graphics" name="Vectors-and-Graphics"
                                            data-name="Vectors and Graphics"
                                            style="opacity:0;position:absolute;z-index:-1"><span
                                            class="checkbox-label text-200 medium w-form-label"
                                            for="Vectors-and-Graphics">Vectors
                                            &amp;&nbsp;graphics</span><img
                                            id="w-node-_53147561-1517-7f00-0b33-f4fb86894f24-852cefdd"
                                            alt="Vectors And Graphics Icon - Stock X Webflow Template"
                                            src=".\assets\images\app_images\_vectors-and-graphics-icon-stock-x-webflow-template.svg"
                                            class="checkbox-icon">
                                    </label></div>
                            </div>
                            <div id="w-node-_0bfd5bbe-5127-f853-0c49-ab8adba09fbb-852cefdd"><label
                                    for="resource-link">asste
                                    link</label><input type="text" class="input w-input" maxlength="256"
                                    name="Resource-Link" data-name="Resource Link" placeholder="ex. drive.google.com/"
                                    id="resource-link" required=""></div>
                            <div id="w-node-_0bfd5bbe-5127-f853-0c49-ab8adba09fbf-852cefdd"><label
                                    for="profile-link">Profile
                                    link</label><input type="text" class="input w-input" maxlength="256"
                                    name="Profile-Link" data-name="Profile Link"
                                    placeholder="ex. www.stock.com/johncarter" id="profile-link" required="">
                            </div>
                            <div><label for="full_name">Full name</label><input type="text" class="input w-input"
                                maxlength="256" name="full_name" data-name="full_name" placeholder="Enter Your Full Name"
                                id="full_name" required="">
                            </div>
                            <div><label for="user_name">User Name</label><input type="text" class="input w-input"
                                maxlength="256" name="user_name" data-name="user_name" placeholder="Enter Your User name" id="user_name"
                                required=""></div>
                            <div id="w-node-_9eb9b4a8-abc6-d1d3-38aa-da6b1d25671d-852cefdd">You don’t have a profile? <a
                                    href="https://stocktemplate.webflow.io/apply-as-author"
                                    class="text-link text-medium color-neutral-800">Become a contributor</a></div><input
                                type="submit" value="Upload files" data-wait="Please wait..."
                                id="w-node-_0bfd5bbe-5127-f853-0c49-ab8adba09fcb-852cefdd"
                                class="btn-primary width-100 mg-top-16px w-button">
                        </div>
                    </form>
                    <div class="success-message w-form-done" tabindex="-1" role="region"
                        aria-label="Resource Form success">
                        <div>
                            <div class="line-rounded-icon success-message-check large"></div>
                            <h2 class="display-4 mg-bottom-8px">Thank you</h2>
                            <div>Your message has been submitted. <br>We will get back to you within 24-48 hours.</div>
                        </div>
                    </div>
                    <div class="error-message w-form-fail" tabindex="-1" role="region"
                        aria-label="Resource Form failure">
                        <div>Oops! Something went wrong.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
