<section class="content">
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
    
    <form method="post" action="{{ route('profile.update') }}" class="form-horizontal">
        @csrf
        @method('patch')

        <div class="form-group row">
            <label class="col-sm-2 col-form-label"> {{ __('Name') }} </label>
            <div class="col-sm-10">
            <input id="name" name="name" type="text" class="form-control" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label"> {{ __('Surname') }} </label>
            <div class="col-sm-10">
            <input id="surname" name="surname" type="text" class="form-control" :value="old('surname', $user->surname)" required autofocus autocomplete="surname" />
            <x-input-error class="mt-2" :messages="$errors->get('surname')" />
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label"> {{ __('Restaurant') }} </label>
            <div class="col-sm-10">
            <input id="restaurant" name="restaurant" type="text" class="form-control" :value="old('restaurant', $user->restaurant)" required autofocus autocomplete="restaurant" />
            <x-input-error class="mt-2" :messages="$errors->get('restaurant')" />
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label"> {{ __('Street') }} </label>
            <div class="col-sm-10">
            <input id="street" name="street" type="text" class="form-control" :value="old('street', $user->street)" required autofocus autocomplete="street" />
            <x-input-error class="mt-2" :messages="$errors->get('street')" />
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label"> {{ __('Housenumber') }} </label>
            <div class="col-sm-10">
            <input id="housenumber" name="housenumber" type="text" class="form-control" :value="old('housenumber', $user->housenumber)" required autofocus autocomplete="housenumber" />
            <x-input-error class="mt-2" :messages="$errors->get('housenumber')" />
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label"> {{ __('Town') }} </label>
            <div class="col-sm-10">
            <input id="town" name="name" type="text" class="form-control" :value="old('town', $user->town)" required autofocus autocomplete="town" />
            <x-input-error class="mt-2" :messages="$errors->get('town')" />
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label"> {{ __('Phone') }} </label>
            <div class="col-sm-10">
            <input id="phone" name="phone" type="text" class="form-control" :value="old('phone', $user->phone)" required autofocus autocomplete="phone" />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label"> {{ __('Email') }} </label>
            <div class="col-sm-10">
            <input id="email" name="email" type="email" class="form-control" :value="old('email', $user->email)" required autocomplete="email" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
            </div>

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
            <button type="submit" class=" btn btn-primary">{{ __('Save') }}</button>

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