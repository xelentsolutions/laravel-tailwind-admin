<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $pageTitle }}
        </h2>
    </x-slot>

    @include('partials.flash')

    <div class="flex flex-wrap" id="tabs-id">
  <div class="w-full">
    <ul class="flex mb-0 list-none flex-wrap pt-3 pb-4 flex-row">
      <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
        <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-white bg-blue-600" onclick="changeAtiveTab(event,'tab-general')">
          <i class="fas fa-space-shuttle text-base mr-1"></i>  General
        </a>
      </li>
      <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
        <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-blue-600 bg-white" onclick="changeAtiveTab(event,'tab-logo')">
          <i class="fas fa-cog text-base mr-1"></i>  Site Logo
        </a>
      </li>
      <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
        <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-blue-600 bg-white" onclick="changeAtiveTab(event,'tab-footer')">
          <i class="fas fa-briefcase text-base mr-1"></i>  Footer &amp; SEO
        </a>
      </li>
      <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
        <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-blue-600 bg-white" onclick="changeAtiveTab(event,'tab-social')">
          <i class="fas fa-briefcase text-base mr-1"></i>  Social Links
        </a>
      </li>
      <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
        <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-blue-600 bg-white" onclick="changeAtiveTab(event,'tab-analytics')">
          <i class="fas fa-briefcase text-base mr-1"></i>  Analytics
        </a>
      </li>
      <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
        <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-blue-600 bg-white" onclick="changeAtiveTab(event,'tab-payments')">
          <i class="fas fa-briefcase text-base mr-1"></i>  Payments
        </a>
      </li>
    </ul>
    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
      <div class="px-4 py-5 flex-auto">
        <div class="tab-content tab-space">
          <div class="block" id="tab-general">
            <p>
            @include('settings.includes.general')
            </p>
          </div>
          <div class="hidden" id="tab-logo">
            <p>
            @include('settings.includes.logo')
            </p>
          </div>
          <div class="hidden" id="tab-footer">
            <p>
            @include('settings.includes.footer_seo')
            </p>
          </div>
          <div class="hidden" id="tab-social">
            <p>
            @include('settings.includes.social_links')
            </p>
          </div>
          <div class="hidden" id="tab-analytics">
            <p>
            @include('settings.includes.analytics')
            </p>
          </div>
          <div class="hidden" id="tab-payments">
            <p>
            @include('settings.includes.payments')
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function changeAtiveTab(event,tabID){
    let element = event.target;
    while(element.nodeName !== "A"){
      element = element.parentNode;
    }
    ulElement = element.parentNode.parentNode;
    aElements = ulElement.querySelectorAll("li > a");
    tabContents = document.getElementById("tabs-id").querySelectorAll(".tab-content > div");
    for(let i = 0 ; i < aElements.length; i++){
      aElements[i].classList.remove("text-white");
      aElements[i].classList.remove("bg-blue-600");
      aElements[i].classList.add("text-blue-600");
      aElements[i].classList.add("bg-white");
      tabContents[i].classList.add("hidden");
      tabContents[i].classList.remove("block");
    }
    element.classList.remove("text-blue-600");
    element.classList.remove("bg-white");
    element.classList.add("text-white");
    element.classList.add("bg-blue-600");
    document.getElementById(tabID).classList.remove("hidden");
    document.getElementById(tabID).classList.add("block");
  }
</script>

</x-app-layout>