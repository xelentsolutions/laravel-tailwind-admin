<div>
    <form action="{{ route('settings.update') }}" method="POST" role="form">
        @csrf
        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 space-y-6 sm:p-6">
                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Footer & SEO
                    </h3>
                    <p class="mt-1 text-sm text-gray-500">
                        Footer Copyright & page meta seo tags
                    </p>
                </div>

                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-2">
                        <label
                            for="footer_copyright_text"
                            class="block text-sm font-medium text-gray-700"
                        >
                            Copyright Text
                        </label>
                        <div class="mt-1">
                            <textarea
                                id="footer_copyright_text"
                                name="footer_copyright_text"
                                rows="3"
                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                placeholder="Copyright &copy; 2021"
                                >{{
                                    config("settings.footer_copyright_text")
                                }}</textarea
                            >
                        </div>
                    </div>

                    <div class="col-span-6 sm:col-span-2">
                        <label
                            for="about"
                            class="block text-sm font-medium text-gray-700"
                        >
                            SEO Meta Title
                        </label>
                        <div class="mt-1">
                            <textarea
                                id="about"
                                name="about"
                                rows="3"
                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                placeholder="Copyright &copy; 2021"
                            ></textarea>
                        </div>
                    </div>

                    <div class="col-span-6 sm:col-span-2">
                        <label
                            for="about"
                            class="block text-sm font-medium text-gray-700"
                        >
                            SEO Meta Description
                        </label>
                        <div class="mt-1">
                            <textarea
                                id="about"
                                name="about"
                                rows="3"
                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                placeholder="Copyright &copy; 2021"
                            ></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button
                    type="submit"
                    class="bg-indigo-600 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    Update Settings
                </button>
            </div>
        </div>
    </form>
</div>
