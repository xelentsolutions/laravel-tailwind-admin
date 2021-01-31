<div>
    <form action="{{ route('settings.update') }}" method="POST" role="form">
        @csrf
      <div class="shadow sm:rounded-md sm:overflow-hidden">
        <div class="bg-white py-6 px-4 space-y-6 sm:p-6">
          <div>
            <h3 class="text-lg leading-6 font-medium text-gray-900">Social Links</h3>
            <p class="mt-1 text-sm text-gray-500">Enter Full URL to your Social Profiles</p>
          </div>

          <div class="grid grid-cols-6 gap-6">
            <div class="col-span-6 sm:col-span-2">
              <label for="social_facebook" class="block text-sm font-medium text-gray-700">Facebook</label>
              <input type="text" name="social_facebook" id="social_facebook" value="{{ config('settings.social_facebook') }}" autocomplete="social_facebook" placeholder="Enter Facebook profile link" class="mt-1 placeholder-gray-400 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <div class="col-span-6 sm:col-span-2">
              <label for="social_twitter" class="block text-sm font-medium text-gray-700">Twitter</label>
              <input type="text" name="social_twitter" id="social_twitter" value="{{ config('settings.social_twitter') }}" autocomplete="social_twitter" placeholder="Enter site title" class="mt-1 placeholder-gray-400 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <div class="col-span-6 sm:col-span-2">
              <label for="social_instagram" class="block text-sm font-medium text-gray-700">Instagram</label>
              <input type="text" name="social_instagram" id="social_instagram" value="{{ config('settings.social_instagram') }}" autocomplete="email" placeholder="Enter email address" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <div class="col-span-6 sm:col-span-2">
              <label for="social_linkedin" class="block text-sm font-medium text-gray-700">Linkedin</label>
              <input type="text" name="social_linkedin" id="social_linkedin" value="{{ config('settings.social_linkedin') }}" autocomplete="text" placeholder="Enter address" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
          </div>
        </div>
        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
          <button type="submit" class="bg-indigo-600 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Update Settings
          </button>
        </div>
      </div>
    </form>
</div>
