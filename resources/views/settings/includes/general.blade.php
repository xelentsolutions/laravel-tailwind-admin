<div>
    <form action="{{ route('settings.update') }}" method="POST" role="form">
        @csrf
      <div class="shadow sm:rounded-md sm:overflow-hidden">
        <div class="bg-white py-6 px-4 space-y-6 sm:p-6">
          <div>
            <h3 class="text-lg leading-6 font-medium text-gray-900">General Settings</h3>
            <p class="mt-1 text-sm text-gray-500">Site & Invoice Settings</p>
          </div>

          <div class="grid grid-cols-6 gap-6">
            <div class="col-span-6 sm:col-span-2">
              <label for="site_name" class="block text-sm font-medium text-gray-700">Site Name</label>
              <input type="text" name="site_name" id="site_name" value="{{ config('settings.site_name') }}" autocomplete="site_name" placeholder="Enter site name" class="mt-1 placeholder-gray-400 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <div class="col-span-6 sm:col-span-2">
              <label for="site_title" class="block text-sm font-medium text-gray-700">Site Title</label>
              <input type="text" name="site_title" id="site_title" value="{{ config('settings.site_title') }}" autocomplete="site_title" placeholder="Enter site title" class="mt-1 placeholder-gray-400 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <div class="col-span-6 sm:col-span-2">
              <label for="email_address" class="block text-sm font-medium text-gray-700">Email address</label>
              <input type="text" name="email_address" id="email_address" value="{{ config('settings.email_address') }}" autocomplete="email" placeholder="Enter email address" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <div class="col-span-6 sm:col-span-2">
              <label for="site_address" class="block text-sm font-medium text-gray-700">Address</label>
              <input type="text" name="site_address" id="site_address" value="{{ config('settings.site_address') }}" autocomplete="text" placeholder="Enter address" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div class="col-span-6 sm:col-span-1">
              <label for="site_city" class="block text-sm font-medium text-gray-700">City</label>
              <input type="text" name="site_city" id="site_city" value="{{ config('settings.site_city') }}" autocomplete="text" placeholder="Enter address" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div class="col-span-6 sm:col-span-1">
              <label for="site_state" class="block text-sm font-medium text-gray-700">State</label>
              <input type="text" name="site_state" id="site_state" value="{{ config('settings.site_state') }}" autocomplete="text" placeholder="Enter address" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div class="col-span-6 sm:col-span-2">
              <label for="site_country" class="block text-sm font-medium text-gray-700">Country</label>
              <input type="text" name="site_country" id="site_country" value="{{ config('settings.site_country') }}" autocomplete="text" placeholder="Enter address" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div class="col-span-6 sm:col-span-2">
              <label for="site_website" class="block text-sm font-medium text-gray-700">Website</label>
              <input type="text" name="site_website" id="site_website" value="{{ config('settings.site_website') }}" autocomplete="text" placeholder="Enter address" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div class="col-span-6 sm:col-span-2">
              <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
              <input type="text" name="phone" id="phone" value="{{ config('settings.phone') }}" autocomplete="text" placeholder="Enter address" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div class="col-span-6 sm:col-span-2">
              <label for="mobile" class="block text-sm font-medium text-gray-700">Mobile</label>
              <input type="text" name="mobile" id="mobile" value="{{ config('settings.mobile') }}" autocomplete="text" placeholder="Enter address" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
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
