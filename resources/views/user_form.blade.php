<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ isset($user)?_('Edit User') : _('New User') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <!-- image preview -->
                    <div class="mt-2">
                        <img  id="profilePreview"
                        src=" {{ isset($user) && $user->profile ?
                        asset('storage/Uploads/users-profile/' . $user-profile) :
                        asset('storage/Uploads/users-profile/user.png') }}"
                        alt="Image Preview" style="max-width: 64px; display {{ isset($user) ? 'block' : 'none' }};"/>
                    </div>/.mt-2

                    <form method = 'POST' action = "{{ route('user.store') }}" enctype = "multipart/form-date">
                        @csrf
                        <!-- Profile -->
                        <div class = "p-8">
                        <x-input-label for="profile" :value = "__('Profile')" />
                        <input id="profile" class = "block mt-1 w-full" type = "file" name = "profile"/>
                        <x-input-error :messages = "$errors->get('profile')" class = "mt-2" />
                        </div>/.p-8

                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value = "__('Name')" />
                            <input id="name" class = "block mt-1 w-full" type = "text" name = "profile"/>
                            <x-input-error :messages = "$errors->get('name')" class = "mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                        <x-input-label for="password" :value = "__('Password')" />

                        <x-text-input id = "password" class="block mt-1 w-full" 
                                    type = "password"
                                    name = "password"
                                    autocomplete = "new-password" />
                        
                        <x-input-error :messages = "$errors->get('password')" class = "mt-2" />
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('profile').addEventListener('change', function(event) {
            const input = event.target;
            const preview = document.getElementById('profilePreview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';

                };
                reader.readAsDataURL(input.files[0]);
            }else {
                preview.style.display = 'none';
            }
        });
    </script>
</x-app-layout>