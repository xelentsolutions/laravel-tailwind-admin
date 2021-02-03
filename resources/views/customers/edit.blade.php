<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Update Customer
        </h2>
        @include('partials.flash')
    </x-slot>
    <div class="mt-5 md:mt-0 md:col-span-2">
        <form action="{{ route('customers.update') }}" method="POST">
            @csrf
            <input type="hidden" value="{{ isset($customer) ? $customer->id : ''  }}" name="id"/>
          <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
              <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                  <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                  <input type="text" name="name" id="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required value ="{{ isset($customer) ? $customer->name : ''  }}">
                </div>
  
                <div class="col-span-6 sm:col-span-3">
                  <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                  <input type="text" name="phone" id="phone" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required value ="{{ isset($customer) ? $customer->phone : ''  }}">
                </div>
  
                <div class="col-span-6 sm:col-span-3">
                  <label for="mobile" class="block text-sm font-medium text-gray-700">Mobile</label>
                  <input type="text" name="mobile" id="mobile" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required value ="{{ isset($customer) ? $customer->mobile : ''  }}">
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="email_address" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required value ="{{ isset($customer) ? $customer->email : ''  }}">
                  </div>
  
                <div class="col-span-6">
                  <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                  <select id="city" name="city" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                    <option value="">Select City</option>
                    @if(isset($cities))
                    @foreach ($cities as $city)
                    <option value="{{ $city->id }}" {{ isset($customer) && $customer->city_id == $city->id ? 'selected' : ''  }}>{{ $city->name }}</option>
                    @endforeach
                    @endif
                  </select>
                </div>
  
                <div class="col-span-6">
                  <label for="street_address" class="block text-sm font-medium text-gray-700">Address</label>
                  <input type="text" name="address" id="address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required value ="{{ isset($customer) ? $customer->address : ''  }}"> 
                </div>
                <div class="contact-information">
                @if(isset($customer->customerContact))
                @foreach ($customer->customerContact as $key => $customercontact)
                @include('customers.inc.customer-contact')    
                @endforeach
                @endif
                </div>
              </div>
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button type="button" id="add-more-contacts" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  Add More
                </button>
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
@include('customers.inc.custom-js')