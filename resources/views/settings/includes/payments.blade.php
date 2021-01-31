<div>
    <form action="{{ route('settings.update') }}" method="POST" role="form">
        @csrf
      <div class="shadow sm:rounded-md sm:overflow-hidden">
        <div class="bg-white py-6 px-4 space-y-6 sm:p-6">
          <div>
            <h3 class="text-lg leading-6 font-medium text-gray-900">Payments</h3>
            <p class="mt-1 text-sm text-gray-500">Setup Strip / Paypal payment integration keys</p>
          </div>

          <div class="grid grid-cols-6 gap-6">
            <div class="col-span-6 sm:col-span-2">

                <label for="stripe_payment_method" class="block text-sm font-medium text-gray-700">Stripe</label>
                <select id="stripe_payment_method" name="stripe_payment_method" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                <option value="1" {{ (config('settings.stripe_payment_method')) == 1 ? 'selected' : '' }}>Enabled</option>
                <option value="0" {{ (config('settings.stripe_payment_method')) == 0 ? 'selected' : '' }}>Disabled</option>
                </select>

            </div>

            <div class="col-span-6 sm:col-span-2">
              <label for="stripe_key" class="block text-sm font-medium text-gray-700">Stripe Key</label>
              <input type="text" name="stripe_key" id="stripe_key" value="{{ config('settings.stripe_key') }}" autocomplete="stripe_key" placeholder="Enter Stripe Key" class="mt-1 placeholder-gray-400 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div class="col-span-6 sm:col-span-2">
              <label for="stripe_secret_key" class="block text-sm font-medium text-gray-700">Stripe Secret Key</label>
              <input type="text" name="stripe_secret_key" id="stripe_secret_key" value="{{ config('settings.stripe_secret_key') }}" autocomplete="stripe_secret_key" placeholder="Enter Stripe Key" class="mt-1 placeholder-gray-400 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>


            <div class="col-span-6 sm:col-span-2">

                <label for="paypal_payment_method" class="block text-sm font-medium text-gray-700">PayPal</label>
                <select id="paypal_payment_method" name="paypal_payment_method" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                <option value="1" {{ (config('settings.paypal_payment_method')) == 1 ? 'selected' : '' }}>Enabled</option>
                <option value="0" {{ (config('settings.paypal_payment_method')) == 0 ? 'selected' : '' }}>Disabled</option>
                </select>

            </div>

            <div class="col-span-6 sm:col-span-2">
              <label for="paypal_client_id" class="block text-sm font-medium text-gray-700">PayPal Client ID</label>
              <input type="text" name="paypal_client_id" id="paypal_client_id" value="{{ config('settings.paypal_client_id') }}" autocomplete="paypal_client_id" placeholder="Enter PayPal Client ID" class="mt-1 placeholder-gray-400 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div class="col-span-6 sm:col-span-2">
              <label for="paypal_secret_id" class="block text-sm font-medium text-gray-700">PayPal Secret ID</label>
              <input type="text" name="paypal_secret_id" id="paypal_secret_id" value="{{ config('settings.paypal_secret_id') }}" autocomplete="stripe_secret_key" placeholder="Enter Stripe Key" class="mt-1 placeholder-gray-400 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
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
