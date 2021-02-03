<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add New Product
        </h2>
        @include('partials.flash')
    </x-slot>
    <div class="mt-5 md:mt-0 md:col-span-2">
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
          <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
              <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                  <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                  <input type="text" name="name" id="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                </div>
  
                <div class="col-span-6 sm:col-span-3">
                  <label for="sku" class="block text-sm font-medium text-gray-700">SKU</label>
                  <input type="text" name="sku" id="sku" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                </div>
  
                <div class="col-span-6 sm:col-span-3">
                  <label for="uom" class="block text-sm font-medium text-gray-700">UOMs</label>
                  <select id="uom" name="uom" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                    <option value="">Select Uom</option>
                    @if(isset($uoms))
                    @foreach ($uoms as $uom)
                    <option value="{{ $uom->id }}">{{ $uom->name }}</option>
                    @endforeach
                    @endif
                  </select>
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="email_address" class="block text-sm font-medium text-gray-700">Opening Date</label>
                    <input type="date" name="opening_date" id="opening_date" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                  </div>

  
                <div class="col-span-6 sm:col-span-3">
                  <label for="opening_qty" class="block text-sm font-medium text-gray-700">Opening Qunatity</label>
                  <input type="number" name="opening_qty" id="opening_qty" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required> 
                </div>

                <div class="col-span-6 sm:col-span-3">
                  <label for="min_qty" class="block text-sm font-medium text-gray-700">Min Stock Limit</label>
                  <input type="number" name="min_qty" id="min_qty" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required> 
                </div>
              </div>
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
              <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Save
              </button>
            </div>
          </div>
        </form>
      </div>
</x-app-layout>