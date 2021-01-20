<div>
    <form action="{{ route('settings.update') }}" method="POST" role="form" enctype="multipart/form-data">
        @csrf
      <div class="shadow sm:rounded-md sm:overflow-hidden">
        <div class="bg-white py-6 px-4 space-y-6 sm:p-6">
          <div>
            <h3 class="text-lg leading-6 font-medium text-gray-900">Site Logo</h3>
            <p class="mt-1 text-sm text-gray-500">Logo & Favicon Settings</p>
          </div>

          <div class="grid grid-cols-6 gap-6">
            <div class="col-span-6 sm:col-span-2">
                <label class="block text-sm font-medium text-gray-700">
                Site Logo
                </label>
                <div class="mt-2 flex items-center space-x-5">
                    <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                    @if (config('settings.site_logo') != null)
                    <img src="{{ asset('images/'.config('settings.site_logo')) }}" id="logoImg" style="width: 80px; height: auto;">
                    @else
                    <svg class="h-full w-full text-gray-300" fill="currentColor" id="logoImg" viewBox="0 0 24 24">
                        <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    @endif
                    </span>
                    <input class="form-control" type="file" name="site_logo" onchange="loadFile(event,'logoImg')"/>

                </div>
            </div>

            <div class="col-span-6 sm:col-span-2">
            <label class="block text-sm font-medium text-gray-700">
                Site Favicon
                </label>
                <div class="mt-2 flex items-center space-x-5">
                    <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                    @if (config('settings.site_favicon') != null)
                    <img src="{{ asset('images/'.config('settings.site_favicon')) }}" id="faviconImg" style="width: 80px; height: auto;">
                    @else
                    <svg class="h-full w-full text-gray-300" fill="currentColor" id="faviconImg" viewBox="0 0 24 24">
                        <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    @endif
                    </span>
                    <input class="form-control" type="file" name="site_favicon" onchange="loadFile(event,'faviconImg')"/>

                </div>
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

    <script>
        loadFile = function(event, id) {
            var output = document.getElementById(id);
            output.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
