<div class="tile">
    <form action="{{ route('settings.update') }}" method="POST" role="form">
        @csrf
        <h3 class="mb-5 py-3 border-b-2 border-indigo-700">General Settings</h3>

        <div class="grid grid-cols-3 gap-2">
            <div class="mb-3 pt-0">
                <label class="control-label" for="site_name">Site Name</label>

                <input
                    type="text"
                    placeholder="Enter Site name"
                    id="site_name"
                    name="site_name"
                    value="{{ config('settings.site_name') }}"
                    placeholder="Placeholder"
                    class="px-3 py-3 placeholder-gray-400 text-gray-700 relative bg-white rounded text-sm shadow outline-none focus:outline-none focus:shadow-outline w-full"
                />
            </div>

            <div class="mb-3 pt-0">
                <label class="control-label" for="site_title">Site Title</label>
                <input
                    type="text"
                    placeholder="Enter Site title"
                    id="site_title"
                    name="site_title"
                    value="{{ config('settings.site_title') }}"
                    placeholder="Enter site title"
                    class="px-3 py-3 placeholder-gray-400 text-gray-700 relative bg-white rounded text-sm shadow outline-none focus:outline-none focus:shadow-outline w-full"
                />
            </div>

            <div class="mb-3 pt-0">
                <label class="control-label" for="email_address"
                    >Email Address</label
                >
                <input
                    type="text"
                    placeholder="Enter email address"
                    id="email_address"
                    name="email_address"
                    value="{{ config('settings.email_address') }}"
                    placeholder="Enter email address"
                    class="px-3 py-3 placeholder-gray-400 text-gray-700 relative bg-white rounded text-sm shadow outline-none focus:outline-none focus:shadow-outline w-full"
                />
            </div>
        </div>
        <div class="tile-body">
            <div class="form-group">
                <label class="control-label" for="currency_code"
                    >Currency Code</label
                >
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter store currency code"
                    id="currency_code"
                    name="currency_code"
                    value="{{ config('settings.currency_code') }}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="currency_symbol"
                    >Currency Symbol</label
                >
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter store currency symbol"
                    id="currency_symbol"
                    name="currency_symbol"
                    value="{{ config('settings.currency_symbol') }}"
                />
            </div>
        </div>
        <div class="tile-footer">
            <div class="row d-print-none mt-2">
                <div class="col-12 text-right">
                    <button class="btn btn-success" type="submit">
                        <i class="fa fa-fw fa-lg fa-check-circle"></i>Update
                        Settings
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
