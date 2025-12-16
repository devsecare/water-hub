@extends('layouts.frontend')

@section('title', 'PPP Water Hub')

@section('content')


<section class="bg-gradient-to-r from-[#070648] to-[#2CBE9D] text-white px-6 lg:px-16 relative">

  <div class="max-w-7xl mx-auto  py-20 sm:py-24 lg:py-28">
    <h1 class="text-[18px] text-[#37C6F4] font-semibold mb-6">CONTACT US</h1>
    <p class=" font-appetite text-3xl sm:text-5xl font-bold leading-none max-w-[710px]">
      Get in touch with the Water and Wastewater PPP Hub
    </p>
  </div>
</section>
<section class="px-6 lg:px-16 pb-[70px] md:pb-[150px]">
  <div class="max-w-7xl mx-auto  py-16">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-16">

      <!-- LEFT TEXT COLUMN -->
      <div class="space-y-6 lg:max-w-[490px]">
        <p class="text-[#000000] text-[16px] font-semibold">
          Whether you have questions about PPP resources, want to contribute content,
          or need guidance on using the Hub, we’re here to help. We welcome enquiries
          from government officials, practitioners, investors, and anyone working to
          improve water and wastewater services worldwide.
        </p>

        <h2 class="text-[22px] font-bold text-[#1E1D57]">What you can contact us about</h2>

        <div class="space-y-4 text-gray-800">
          <p>
            <span class="font-bold">General enquiries:</span> Questions about the Hub, registration, or accessing
            resources.
          </p>
          <p>
            <span class="font-bold">Content contributions:</span> Share PPP materials, case studies, or insights from
            your projects.
          </p>
          <p>
            <span class="font-bold">Feedback and suggestions:</span> Tell us what’s working, what’s missing, or how we
            can improve.
          </p>
          <p>
            <span class="font-bold">Partnership opportunities:</span> Explore ways to collaborate with AquaFed and our
            global network.
          </p>
        </div>
      </div>

      <!-- RIGHT FORM COLUMN -->
      <form id="contact-form" action="{{ route('contactus.store') }}" method="POST" class="space-y-6">
        @csrf

        <!-- Name -->
        <div>
          <label class="block text-gray-700 mb-1">Name</label>
          <input type="text" id="name" name="name" value="{{ old('name') }}" class="w-full bg-gray-100 rounded-full px-4 py-3 focus:outline-none" />
          <span id="name-error" class="text-red-500 text-sm">@error('name') {{ $message }} @enderror</span>
        </div>

        <!-- Organisation -->
        <div>
          <label class="block text-gray-700 mb-1">Organisation</label>
          <input type="text" id="organisation" name="organisation" value="{{ old('organisation') }}" class="w-full bg-gray-100 rounded-full px-4 py-3 focus:outline-none" />
          <span id="organisation-error" class="text-red-500 text-sm">@error('organisation') {{ $message }} @enderror</span>
        </div>

        <!-- Email -->
        <div>
          <label class="block text-gray-700 mb-1">Email</label>
          <input type="email" id="email" name="email" value="{{ old('email') }}" class="w-full bg-gray-100 rounded-full px-4 py-3 focus:outline-none" />
          <span id="email-error" class="text-red-500 text-sm">@error('email') {{ $message }} @enderror</span>
        </div>

        <!-- Message -->
        <div>
          <label class="block text-gray-700 mb-1">Message</label>
          <textarea id="message" name="message" rows="6"
            class="w-full bg-gray-100 rounded-xl px-4 py-3 focus:outline-none resize-none">{{ old('message') }}</textarea>
          <span id="message-error" class="text-red-500 text-sm">@error('message') {{ $message }} @enderror</span>
        </div>

        <!-- reCAPTCHA v3 token (hidden) -->
        <input type="hidden" id="recaptcha_token" name="recaptcha_token" />

        <!-- Success Message -->
        @if(session('success'))
          <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg" role="alert">
            {{ session('success') }}
          </div>
        @endif

        <!-- Button -->
        <button type="submit" id="submit-btn"
          class="w-full text-xl bg-[#27C1F9] text-[#121858] font-semibold py-3 rounded-full hover:opacity-90 transition hover:bg-[#1E1D57] hover:text-[#37C6F4]">
          Send
        </button>

      </form>

    </div>
  </div>
</section>

@push('scripts')
<!-- Google reCAPTCHA v3 -->
@php
  $recaptchaSiteKey = config('services.recaptcha.site_key', '');
@endphp
@if(!empty($recaptchaSiteKey))
<script src="https://www.google.com/recaptcha/api.js?render={{ $recaptchaSiteKey }}"></script>
<script>
  (function() {
    // Store site key in JavaScript variable (using JSON to ensure proper escaping)
    const RECAPTCHA_SITE_KEY = {!! json_encode($recaptchaSiteKey) !!};

    // Wait for reCAPTCHA to load, then initialize
    if (typeof grecaptcha === 'undefined') {
      console.error('reCAPTCHA script not loaded');
      return;
    }

    grecaptcha.ready(function() {
      const contactForm = document.getElementById("contact-form");
      if (!contactForm) {
        console.error('Contact form not found');
        return;
      }

      // Execute reCAPTCHA on form submit
      contactForm.addEventListener("submit", function(event) {
        event.preventDefault();

        // Get form elements
        const name = document.getElementById("name");
        const email = document.getElementById("email");
        const message = document.getElementById("message");

        // Get error elements
        const nameError = document.getElementById("name-error");
        const emailError = document.getElementById("email-error");
        const messageError = document.getElementById("message-error");
        const submitBtn = document.getElementById("submit-btn");

        let isValid = true;

        // Clear previous error messages
        nameError.textContent = "";
        emailError.textContent = "";
        messageError.textContent = "";

        // Name validation
        if (name.value.trim() === "") {
          nameError.textContent = "Please enter your name";
          isValid = false;
        }

        // Email validation
        const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        if (email.value.trim() === "") {
          emailError.textContent = "Please enter your email";
          isValid = false;
        } else if (!emailPattern.test(email.value.trim())) {
          emailError.textContent = "Please enter a valid email address";
          isValid = false;
        }

        // Message validation
        if (message.value.trim() === "") {
          messageError.textContent = "Please enter your message";
          isValid = false;
        }

        // If validation fails, don't proceed with reCAPTCHA
        if (!isValid) {
          return;
        }

        grecaptcha.execute(RECAPTCHA_SITE_KEY, {action: 'contact_form'})
          .then(function(token) {
            if (!token) {
              console.error('reCAPTCHA token is empty');
              if (window.showToast) {
                window.showToast('reCAPTCHA verification failed. Please refresh the page and try again.', 'error');
              } else {
                alert('reCAPTCHA verification failed. Please refresh the page and try again.');
              }
              return;
            }

            // Set the token in the hidden input
            const tokenInput = document.getElementById('recaptcha_token');
            if (tokenInput) {
              tokenInput.value = token;
            }

            // Now submit the form
            const formData = new FormData(contactForm);

            // Explicitly ensure the token is in FormData
            formData.set('recaptcha_token', token);

            // Debug: Log token (remove in production)
            console.log('reCAPTCHA token set:', token ? 'Token received' : 'Token missing');

            const submitBtn = document.getElementById("submit-btn");
            const originalText = submitBtn.textContent;

            // Disable submit button
            submitBtn.disabled = true;
            submitBtn.textContent = "Sending...";

            fetch(contactForm.action, {
              method: 'POST',
              body: formData,
              headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
              }
            })
            .then(response => response.json())
            .then(data => {
              if (data.success) {
                // Show success message
                if (window.showToast) {
                  window.showToast(data.message || 'Thank you for contacting us! We will get back to you soon.', 'success');
                } else {
                  const successDiv = document.createElement('div');
                  successDiv.className = 'bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-4';
                  successDiv.textContent = data.message || 'Thank you for contacting us! We will get back to you soon.';
                  contactForm.insertBefore(successDiv, submitBtn);
                }

                // Reset form
                contactForm.reset();
                document.getElementById('recaptcha_token').value = '';
              } else {
                // Handle validation errors
                if (data.errors) {
                  if (data.errors.name) {
                    document.getElementById('name-error').textContent = data.errors.name[0];
                  }
                  if (data.errors.email) {
                    document.getElementById('email-error').textContent = data.errors.email[0];
                  }
                  if (data.errors.message) {
                    document.getElementById('message-error').textContent = data.errors.message[0];
                  }
                  if (data.errors.organisation) {
                    document.getElementById('organisation-error').textContent = data.errors.organisation[0];
                  }
                  if (data.errors.recaptcha_token) {
                    if (window.showToast) {
                      window.showToast(data.errors.recaptcha_token[0], 'error');
                    } else {
                      alert(data.errors.recaptcha_token[0]);
                    }
                  }
                } else if (data.message) {
                  if (window.showToast) {
                    window.showToast(data.message, 'error');
                  } else {
                    alert(data.message);
                  }
                }
              }
            })
            .catch(error => {
              console.error('Error:', error);
              if (window.showToast) {
                window.showToast('An error occurred. Please try again.', 'error');
              } else {
                alert('An error occurred. Please try again.');
              }
            })
            .finally(() => {
              // Re-enable submit button
              submitBtn.disabled = false;
              submitBtn.textContent = originalText;
            });
          })
          .catch(function(error) {
            console.error('reCAPTCHA error:', error);
            if (window.showToast) {
              window.showToast('reCAPTCHA verification failed. Please refresh the page and try again.', 'error');
            } else {
              alert('reCAPTCHA verification failed. Please refresh the page and try again.');
            }
          });
      });
    });
  })();
</script>
@else
<script>
  console.error('reCAPTCHA site key is not configured');
</script>
@endif
@endpush

<!-- <div class=" bottom-0 left-0 right-0">
  <svg class="w-full h-[30px] md:h-[80px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 24 150 28"
    preserveAspectRatio="none">
    <defs>
      <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s58 18 88 18
        58-18 88-18 58 18 88 18v44h-352z" />
    </defs>
    <g class="parallax">
      <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(30, 29, 87, 0.25)" />
      <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(30, 29, 87, 0.49)" />
      <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(55, 198, 244, 0.49)" />
      <use xlink:href="#gentle-wave" x="48" y="7" fill="#1E1D57" />
    </g>
  </svg>
</div> -->



@endsection
