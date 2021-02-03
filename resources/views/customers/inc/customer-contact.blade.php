<div class="contact-information-row">
<input type="hidden" value="{{ isset($customercontact) ? $customercontact->id : 0  }}" id="contact_id" name="contact_id[]"/>
<div class="col-span-6 sm:col-span-6 lg:col-span-2">
    <label for="contact_name" class="block text-sm font-medium text-gray-700">Name</label>
    <input type="text" name="contact_name[]" id="contact_name[]" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ isset($customercontact) ? $customercontact->name : ''  }}">
  </div>
  <div class="col-span-6 sm:col-span-6 lg:col-span-1">
    <label for="contact_phone" class="block text-sm font-medium text-gray-700">Phone</label>
    <input type="text" name="contact_phone[]" id="contact_phone[]" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ isset($customercontact) ? $customercontact->phone : ''  }}">
  </div>
  <div class="col-span-6 sm:col-span-6 lg:col-span-1">
    <label for="contact_mobile" class="block text-sm font-medium text-gray-700">Mobile</label>
    <input type="text" name="contact_mobile[]" id="contact_mobile[]" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ isset($customercontact) ? $customercontact->mobile : ''  }}">
  </div>
  <div class="col-span-6 sm:col-span-6 lg:col-span-1">
    <label for="contact_eamil" class="block text-sm font-medium text-gray-700">Email</label>
    <input type="email" name="contact_eamil[]" id="contact_eamil[]" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ isset($customercontact) ? $customercontact->email : ''  }}">
  </div>
  <div class="col-span-6 sm:col-span-6 lg:col-span-1">
    <label for="button" class="block text-sm font-medium text-gray-700"><br></label>
    <button type="button" data-id="{{ isset($customercontact) ? $customercontact->id  : 0}}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 remove-row">
    Remove
    </button>
  </div>
</div>