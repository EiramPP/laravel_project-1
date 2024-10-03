<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ isset($user)?_('Edit User') : _('New User') }}
        </h2>
    </x-slot>
    <div class="py-24">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mt-2">
                        <img  id="profilePreview"
                        src=" {{ isset($user) && $user->profile ?
                        asset('storage/Uploads/users-profile/' . $user-profile) :
                        asset('storage/Uploads/users-profile/user.png') }}"
                        alt="Image Preview" style="max-width: 64px; display {{ isset($user) ? 'block' : 'none' }};"/>
                    </div>
                    <form>
                        <label for="profile">Profile</label>
                        <input type="file" name="profile" id="profile"/>
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