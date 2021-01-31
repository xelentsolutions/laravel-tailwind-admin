<div>
    <form action="{{ route('settings.update') }}" method="POST" role="form">
        @csrf
      <div class="shadow sm:rounded-md sm:overflow-hidden">
        <div class="bg-white py-6 px-4 space-y-6 sm:p-6">
          <div>
            <h3 class="text-lg leading-6 font-medium text-gray-900">Analytics</h3>
            <p class="mt-1 text-sm text-gray-500">Add code for analytics of system for Google / Facebook</p>
          </div>

          <div class="grid grid-cols-6 gap-6">
            <div class="col-span-6 sm:col-span-2">
              <label for="google_analytics" class="block text-sm font-medium text-gray-700">Google Analytics</label>
              <textarea
                                id="google_analytics"
                                name="google_analytics"
                                rows="3"
                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                placeholder="SEO Meta Description"
                            >{{
                                    config("settings.google_analytics")
                                }}</textarea>
            </div>

            <div class="col-span-6 sm:col-span-2">
              <label for="facebook_pixels" class="block text-sm font-medium text-gray-700">Facebook Pixel</label>
              <textarea
                                id="facebook_pixels"
                                name="facebook_pixels"
                                rows="3"
                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                placeholder="SEO Meta Description"
                            >{{
                                    config("settings.facebook_pixels")
                                }}</textarea>
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
