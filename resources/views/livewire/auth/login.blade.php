 <form wire:submit.prevent="authUser">
     <div class="mb-4">
         <x-inputs.text-field wire:model="loginForm.email" label="{{ __('Email') }}" fieldName="loginForm.email"
             fieldType="text" />
     </div>

     <div class="mb-4">
         <x-inputs.text-field wire:model="loginForm.password" label="{{ __('local.password') }}"
             fieldName="loginForm.password" fieldType="password" />
     </div>

     <div class="flex items-center mb-4">
         <x-checkbox wire:model="loginForm.remember" id="remember_me" name="loginForm.remember" />
         <label for="remember_me"
             class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('local.Remember me') }}</label>
     </div>

     <div class="flex items-center justify-between mb-4">
         @if (Route::has('password.request'))
             <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                 href="{{ route('password.request') }}" wire:navigate>
                 {{ __('local.Forgot-your-password?') }}
             </a>
         @endif

         <x-inputs.button class="bg-blue-500 hover:bg-blue-600 text-white">
             {{ __('local.Log-in') }}
         </x-inputs.button>
     </div>
 </form>