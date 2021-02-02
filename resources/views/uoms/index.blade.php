<x-app-layout>
    <x-slot name="header">
    <div class="flex items-center justify-between">
    <h3 class="text-lg leading-6 font-medium text-gray-900">
    {{ $pageTitle }}
    </h3>
    <div class="mt-3 mt-0 ml-4">
        <button x-data="{usedKeyboard: false}"
        @keydown.window.tab="usedKeyboard = true"
        @click="$dispatch('open-menu', { createsection: true })"
        :class="{'focus:outline-none': !usedKeyboard}" type="button" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
        Create New UOM's
        </button>
    </div>
    </div>
        @include('partials.flash')
    </x-slot>
<div class="flex flex-col">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-blue-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-blue-200">
          <thead class="bg-blue-50">
            <tr>
            <th scope="col" class="px-6 py-3 text-left text-medium font-medium text-gray-500 uppercase tracking-wider">
                ID
              </th>
              <th scope="col" class="px-6 py-3 text-left text-medium font-medium text-gray-500 uppercase tracking-wider">
                Name
              </th>
              <th scope="col" class="px-6 py-3 text-left text-medium font-medium text-gray-500 uppercase tracking-wider">
                Status
              </th>
              <th scope="col" class="px-6 py-3 text-left text-medium font-medium text-gray-500 uppercase tracking-wider">
                Last Updated
              </th>
              <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Edit</span>
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
          @foreach($uoms as $uom)
            <tr>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm font-medium text-gray-900">
                    {{$uom->id}}
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm font-medium text-gray-900">
                    {{$uom->name}}
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                @if($uom->status == 0)
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                    Disabled
                    </span>
                    @elseif($uom->status == 1)
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                    Active
                    </span>
                 @endif
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{$uom->updated_at}}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <span class="relative z-0 inline-flex shadow-sm rounded-md">
                    <button x-data="{usedKeyboard: false}"
			@keydown.window.tab="usedKeyboard = true"
			@click="$dispatch('open-menu', { open: true,id: {{ $uom->id }} })"
			:class="{'focus:outline-none': !usedKeyboard}" type="button" class="relative inline-flex items-center px-4 py-2 rounded-l-md border border-green-700 bg-green-600 text-sm font-medium text-white hover:bg-green-500 focus:z-10 focus:outline-none focus:ring-1 focus:ring-green-500 focus:border-green-500">
                    <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                        Edit
                    </button>
                    <form action="{{ route('uoms.delete', $uom->id) }}" method="DELETE" onsubmit="return confirm('Are you sure want to delete UOM\'S?')">
                      @csrf @method('DELETE')
                    <button type="submit" class="-ml-px relative inline-flex items-center px-3 py-2 rounded-r-md border border-red-300 bg-red-500 text-sm font-medium text-white hover:bg-red-600 focus:z-10 focus:outline-none focus:ring-1 focus:ring-red-500 focus:border-red-500">
                    <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                    Delete
                    </button>
                    </form>
                </span>
              </td>
            </tr>
            @endforeach

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>



{{-- Edit Section --}}
<section
	x-data="slideout()"
	x-cloak
	@open-menu.window="open = $event.detail.open,id = $event.detail.id"
	@keydown.window.tab="usedKeyboard = true"
  @keydown.escape="open = false"
	x-init="init()">
	<div
		x-show.transition.opacity.duration.500="open"
		@click="open = false"
		class="fixed inset-0 bg-black bg-opacity-25"></div>
	<div
		class="fixed transition duration-300 right-0 top-0 transform w-full max-w-2xl h-screen bg-gray-100 overflow-hidden"
		:class="{'translate-x-full': !open}">
		<div class="p-16 px-6 absolute top-0 h-full overflow-y-scroll">
		<div class="w-screen max-w-2xl">
        <form class="h-full flex flex-col bg-white shadow-xl overflow-y-scroll" action="{{ route('uoms.update') }}" method="post">
          <input type="hidden" value="" name="id" id="uom_id"/>
          @csrf
          <div class="flex-1">
            <!-- Header -->
            <div class="px-4 py-6 bg-gray-50 sm:px-6">
              <div class="flex items-start justify-between space-x-3">
                <div class="space-y-1">
                  <h2 id="slide-over-heading" class="text-lg font-medium text-gray-900">
                    Update UOM's
                  </h2>
                  <p class="text-sm text-gray-500">
                    
                  </p>
                </div>
                <div class="h-7 flex items-center">
                  <button @click="open = false" type="button"
			x-ref="closeButton"
			:class="{'focus:outline-none': !usedKeyboard}" class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <span class="sr-only">Close panel</span>
                    <!-- Heroicon name: x -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                  </button>
                </div>
              </div>
            </div>

            <!-- Divider container -->
            <div class="py-6 space-y-6 sm:py-0 sm:space-y-0 sm:divide-y sm:divide-gray-200">
              <!-- UOM name -->
              <div class="space-y-1 px-4 sm:space-y-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 sm:py-5">
                <div>
                  <label for="uom_name_label" class="block text-sm font-medium text-gray-900 sm:mt-px sm:pt-2">
                    Name
                  </label>
                </div>
                <div class="sm:col-span-2">
                  <input type="text" name="name" id="uom_name" class="block w-full shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                </div>
              </div>
              <!-- UOM Status -->
              <div class="space-y-1 px-4 sm:space-y-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 sm:py-5">
                <div>
                  <label for="uom_status_label" class="block text-sm font-medium text-gray-900 sm:mt-px sm:pt-2">
                    Status
                  </label>
                </div>
                <div class="sm:col-span-2">
                  <input type="checkbox" name="status" id="uom_status" class="form-checkbox h-5 w-5 text-blue-600"><span class="ml-2 text-gray-700">
                </div>
              </div>
            </label>

          <!-- Action buttons -->
          <div class="flex-shrink-0 px-4 border-t border-gray-200 py-5 sm:px-6">
            <div class="space-x-3 flex justify-end">
              <button @click="open = false" type="button"
              x-ref="closeButton"
              :class="{'focus:outline-none': !usedKeyboard}" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Cancel
              </button>
              <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Update
              </button>
            </div>
          </div>
        </form>
      </div>
		</div>
	</div>
</section>


{{-- Create Section --}}
<section
	x-data="createsectionslideout()"
	x-cloak
	@open-menu.window="createsection = $event.detail.createsection"
	@keydown.window.tab="usedKeyboard = true"
  @keydown.escape="createsection = false"
	x-init="init()">
	<div
		x-show.transition.opacity.duration.500="createsection"
		@click="createsection = false"
		class="fixed inset-0 bg-black bg-opacity-25"></div>
	<div
		class="fixed transition duration-300 right-0 top-0 transform w-full max-w-2xl h-screen bg-gray-100 overflow-hidden"
		:class="{'translate-x-full': !createsection}">
		<div class="p-16 px-6 absolute top-0 h-full overflow-y-scroll">
		<div class="w-screen max-w-2xl">
        <form class="h-full flex flex-col bg-white shadow-xl overflow-y-scroll" action="{{ route('uoms.store') }}" method="post">
          @csrf
          <div class="flex-1">
            <!-- Header -->
            <div class="px-4 py-6 bg-gray-50 sm:px-6">
              <div class="flex items-start justify-between space-x-3">
                <div class="space-y-1">
                  <h2 id="slide-over-heading" class="text-lg font-medium text-gray-900">
                    Add New UOM's
                  </h2>
                  <p class="text-sm text-gray-500">
                    
                  </p>
                </div>
                <div class="h-7 flex items-center">
                  <button type="button" @click="createsection = false"
			x-ref="closeButton"
			:class="{'focus:outline-none': !usedKeyboard}" class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <span class="sr-only">Close panel</span>
                    <!-- Heroicon name: x -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                  </button>
                </div>
              </div>
            </div>

            <!-- Divider container -->
            <div class="py-6 space-y-6 sm:py-0 sm:space-y-0 sm:divide-y sm:divide-gray-200">
              <!-- UOM name -->
              <div class="space-y-1 px-4 sm:space-y-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 sm:py-5">
                <div>
                  <label for="uom_name_label" class="block text-sm font-medium text-gray-900 sm:mt-px sm:pt-2">
                    Name
                  </label>
                </div>
                <div class="sm:col-span-2">
                  <input type="text" name="name" id="uom_name" class="block w-full shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                </div>
              </div>

              <!-- UOM Status -->
              <div class="space-y-1 px-4 sm:space-y-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 sm:py-5">
                <div>
                  <label for="uom_status_label" class="block text-sm font-medium text-gray-900 sm:mt-px sm:pt-2">
                    Status
                  </label>
                </div>
                <div class="sm:col-span-2">
                  <input type="checkbox" name="status" id="uom_status" class="form-checkbox h-5 w-5 text-blue-600"><span class="ml-2 text-gray-700">
                </div>
              </div>
            </label>

          <!-- Action buttons -->
          <div class="flex-shrink-0 px-4 border-t border-gray-200 py-5 sm:px-6">
            <div class="space-x-3 flex justify-end">
              <button @click="createsection = false"
              x-ref="closeButton"
              :class="{'focus:outline-none': !usedKeyboard}" type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Cancel
              </button>
              <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Save
              </button>
            </div>
          </div>
        </form>
      </div>
		</div>
	</div>
</section>


<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
function slideout() {
	return {
		open: false,
    usedKeyboard: false,
    id:0,
		init() {
			this.$watch('open', value => {
        value && this.$refs.closeButton.focus()
        debugger;
        if(value == false){
          this.toggleOverlay()
        }else{
            this.$watch('id', value => {
            debugger;
            getUomDetail(this.id)
            this.toggleOverlay()
          })
        }	
      })
      
		},
		toggleOverlay() {
			document.body.classList[this.open ? 'add' : 'remove']('h-screen', 'overflow-hidden')
		}
	}
}
function getUomDetail(id){
  var url = '{{ route("uoms.edit", ":id") }}';
  url = url.replace(':id', id );
  $.ajax({
      method: "GET",
      url: url,
      data: {id: id, _token: '{{csrf_token()}}'},
      dataType: 'json',
      success: function(response){
      if(response.status == 'success'){
        $("#uom_name").val(response.uoms.name);
        $("#uom_id").val(response.uoms.id);
        if(response.uoms.status == 1)
        $("#uom_status").prop('checked',true);
      }
    }
 });
}


function createsectionslideout() {
	return {
		createsection: false,
    usedKeyboard: false,
		init() {
			this.$watch('createsection', value => {
        value && this.$refs.closeButton.focus()
        this.toggleOverlay()
      })
      
		},
		toggleOverlay() {
			document.body.classList[this.createsection ? 'add' : 'remove']('h-screen', 'overflow-hidden')
		}
	}
}

</script>

</x-app-layout>
