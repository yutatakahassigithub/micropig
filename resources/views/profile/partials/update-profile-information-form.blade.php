<section>
    <nav class="mb-4">
        <a href="{{ url('/dashboard') }}" class="btn">Top　</a>
        <a href="{{ url('/impression') }}" class="btn">impression</a>
        <a href="{{ url('/Matching') }}" class="btn">　Matching</a>
    </nav>
    
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <!-- Profile Update Form with enctype attribute for file upload -->
    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')
            
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="owner" :value="__('owner')" />
            <x-text-input id="owner" name="owner" type="text" class="mt-1 block w-full" :value="old('owner', $user->owner)" required autofocus autocomplete="owner" />
            <x-input-error class="mt-2" :messages="$errors->get('owner')" />
        </div>

        <!-- Picture upload input -->
        <div>
            <x-input-label for="picture" :value="__('picture')" />
            <input id="picture" type="file" name="picture"  class="mt-1 block w-full" onchange="previewImage(this);">
            <x-input-error class="mt-2" :messages="$errors->get('picture')" />
            <!-- プレビュー表示エリアを追加 -->
            <img id="imagePreview" src="{{ old('picture', $user->picture_url ?? '') }}" alt="Image Preview" style="max-width: 200px; margin-top: 15px; display: none;">
        </div>


        <div>
            <x-input-label for="explain" :value="__('explain')" />
            <x-text-input id="explain" name="explain" type="text" class="mt-1 block w-full" :value="old('', $user->explain)" required autofocus autocomplete="explain" />
            <x-input-error class="mt-2" :messages="$errors->get('explain')" />
        </div>

        <div>
            <x-input-label for="area" :value="__('Area')" />
            <div class="mt-2 space-y-2">
                <label class="inline-flex items-center">
                    <input type="radio" class="form-radio" name="area" value="east" @if($user->area == 'east') checked @endif>
                    <span class="ml-2">east</span>
                </label>
                
                <label class="inline-flex items-center">
                    <input type="radio" class="form-radio" name="area" value="west" @if($user->area == 'west') checked @endif>
                    <span class="ml-2">west</span>
                </label>

        
                <label class="inline-flex items-center">
                    <input type="radio" class="form-radio" name="area" value="islands" @if($user->area == 'islands') checked @endif>
                    <span class="ml-2">islands</span>
                </label>
            </div>
            <x-input-error class="mt-2" :messages="$errors->get('area')" />
        </div>

        <div>
            <x-input-label for="sns" :value="__('sns')" />
            <x-text-input id="sns" name="sns" type="text" class="mt-1 block w-full" :value="old('', $user->sns)" required autofocus autocomplete="sns" />
            <x-input-error class="mt-2" :messages="$errors->get('sns')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
<script>
function previewImage(input) {
    const file = input.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const imagePreview = document.getElementById('imagePreview');
            imagePreview.src = e.target.result;
            imagePreview.style.display = 'block';
        }
        reader.readAsDataURL(file);
    }
}

</script>
